@extends('app')

@section('content')

	<div class="container">
		<h1>Meus Pedidos</h1>

		<div class="adicionar">
			<a href="{{route('customer.order.create')}}" class="btn btn-success">Novo Pedido</a>
		</div>

		<table class="table table-striped table-bordered">
			<thead>
			<tr>
				<th width="10%">ID</th>
				<th width="60%">Total</th>
				<th width="10%">Status</th>
				<th width="20%"></th>
			</tr>
			</thead>
			<tbody>
			@foreach($orders as $order)
				<tr>
					<td>{{$order->id}}</td>
					<td>{{$order->total}}</td>
					<td>{{$order->status}}</td>
					<td class="text-center">
						<a href="{{route('customer.order.edit', ['id' => $order->id])}}" class="btn btn-primary">Editar</a>
						<a href="{{route('customer.order.delete', ['id' => $order->id])}}" class="btn btn-danger">Excluir</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<div class="text-center">
			{!! $orders->render() !!}
		</div>

	</div>
@endsection