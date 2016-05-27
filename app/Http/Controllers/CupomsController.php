<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminCupomRequest;
use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Repositories\OrderRepository;

class CupomsController extends Controller
{

	private $repository;
	private $orderRepository;

	public function __construct (CupomRepository $repository, OrderRepository $orderRepository)
	{
		$this->repository = $repository;
		$this->orderRepository = $orderRepository;
	}

	public function index()
	{
		$cupoms = $this->repository->paginate();
		return view('admin.cupoms.index', compact('cupoms'));
	}

	public function create()
	{
		return view('admin.cupoms.create', compact('orders'));
	}

	public function store(AdminCupomRequest $request)
	{
		$data = $request->all();
		$this->repository->create($data);

		return redirect()->route('admin.cupoms.index');
	}

	public function edit($id)
	{
		$cupom = $this->repository->find($id);

		return view('admin.cupoms.edit', compact('cupom'));
	}

	public function update(AdminCupomRequest $request, $id)
	{
		$data = $request->all();
		$this->repository->update($data, $id);

		return redirect()->route('admin.cupoms.index');
	}

	public function delete($id)
	{
		$this->repository->delete($id);

		return redirect()->route('admin.cupoms.index');
	}

}
