<?php
/**
 * Created by PhpStorm.
 * User: LuisCarlos
 * Date: 19/05/2016
 * Time: 18:17
 */

namespace CodeDelivery\Http\Controllers;


use CodeDelivery\Http\Requests\CheckoutRequest;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

	private $repository;
	private $userRepository;
	private $productRepository;
	private $orderService;

	public function __construct (OrderRepository $repository,
	                             UserRepository $userRepository,
	                             ProductRepository $productRepository, OrderService $orderService)
	{
		$this->repository = $repository;
		$this->userRepository = $userRepository;
		$this->productRepository = $productRepository;
		$this->orderService = $orderService;
	}

	public function index()
	{
		$userId = $this->userRepository->find(Auth::user()->id);

		$orders = $this->repository->scopeQuery(function($query) use($userId){
			return $query->where('user_id', '=', $userId->id);
		})->paginate();

		return view('customer.order.index', compact('orders'));
	}



	public function create()
	{
		$products = $this->productRepository->lista();
		return view('customer.order.create', compact('products'));
	}

	public function store(CheckoutRequest $request)
	{
		$data = $request->all();

		$userId = $this->userRepository->find(Auth::user()->id);
		$data['user_id'] = $userId->id;
		$this->orderService->create($data);

		return redirect()->route('customer.order.index');
	}


}