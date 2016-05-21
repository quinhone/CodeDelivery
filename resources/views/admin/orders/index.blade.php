@extends('app')

@section('content')

	<div class="container">
		<h1>Pedidos</h1>
		@foreach($orders as $order)
			<div class="panel-group">
				<div class="panel @if($order->status == 0) panel-warning @elseif($order->status == 1) panel-info @elseif($order->status == 2) panel-success @endif">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" href="#collapse{{$order->id}}">
								<strong>Pedido Número:</strong> <span>#{{$order->id}}</span>
								<strong> | Cliente:</strong> <span>{{$order->user->name}}</span>
								<strong> | Entregador:</strong> <span>@if($order->deliveryman) {{$order->deliveryman->name}} @else --- @endif</span>
							</a>
						</h4>
					</div>
					<div id="collapse{{$order->id}}" class="panel-collapse collapse">
						<div class="panel-body">
							<table class="table table-bordered table-condensed">
								<thead>
								<tr class="active">
									<th width="50%">Produto</th>
									<th width="10%">Qde</th>
									<th width="20%">Preço</th>
									<th width="20%">Subtotal</th>
								</tr>
								</thead>
								<tbody>
								@foreach($order->items as $item)
									<tr>
										<td>{{$item->product->name}}</td>
										<td>{{$item->qtd}}</td>
										<td class="text-right">R$ {{number_format($item->price, 2, ',','.')}}</td>
										<td class="text-right">R$ {{number_format($item->price * $item->qtd, 2, ',','.')}}</td>
									</tr>
								@endforeach
									<tr>
										<td colspan="3" class="text-right">Total Geral: </td>
										<td class="text-right">R$</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="panel-footer text-right">
							<a href="{{route('admin.orders.edit', ['id' => $order->id])}}" class="btn btn-primary">Editar</a>
						</div>
					</div>
				</div>
			</div>
		@endforeach

		<div>
			<span class="status bg-warning pull-left">PENDENTE</span>
			<span class="status bg-info pull-left">A CAMINHO</span>
			<span class="status bg-success pull-left">ENTREGUE</span>
		</div>

		<div class="text-center">
			{!! $orders->render() !!}
		</div>

	</div>
@endsection