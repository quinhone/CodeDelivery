<?php

namespace CodeDelivery\Http\Controllers\Api\Deliveryman;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class DeliverymanCheckoutController extends Controller
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var OrderService
     */
    private $orderService;

    private $relations = ['user', 'items', 'cupom'];

    public function __construct ( OrderRepository $orderRepository,
                                  UserRepository $userRepository,
                                  OrderService $orderService)
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Authorizer::getResourceOwnerId();

        $orders = $this->orderRepository
            ->skipPresenter(false)
            ->with($this->relations)->scopeQuery(function($query) use($id){
            return $query->where('user_deliveryman_id', '=', $id);
        })->paginate();

        return $orders;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idDeliveryman = Authorizer::getResourceOwnerId();
        return $this->orderRepository->skipPresenter(false)->getByIdAndDeliveryman($id, $idDeliveryman);
    }

    public function updateStatus(Request $request, $id)
    {
        $idDeliveryman = Authorizer::getResourceOwnerId();
        $order = $this->orderService->updateStatus($id, $idDeliveryman, $request->get('status'));

        if($order)
            return $this->orderRepository->find($order->id);

        abort(400, 'Ordem não encontrada');
    }


}
