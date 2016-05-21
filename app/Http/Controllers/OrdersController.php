<?php
/**
 * Created by PhpStorm.
 * User: LuisCarlos
 * Date: 19/05/2016
 * Time: 18:17
 */

namespace CodeDelivery\Http\Controllers;


use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

	private $repository;

	public function __construct (OrderRepository $repository)
	{
		$this->repository = $repository;
	}

	public function index()
	{
		$orders = $this->repository->orderBy('id', 'desc')->paginate();

		return view('admin.orders.index', compact('orders'));
	}

	public function edit($id, UserRepository $userRepository)
	{
		$list_status = [0 => 'Pendente', 1 => 'A Caminho', 2 => 'Entregue'];

		$order = $this->repository->find($id);

		$deliveryman = $userRepository->getDeliverymen();

		return view('admin.orders.edit', compact('order', 'list_status', 'deliveryman'));
	}

	public function update(Request $request, $id)
	{
		$all = $request->all();

		$this->repository->update($all, $id);

		return redirect()->route('admin.orders.index');
	}
}