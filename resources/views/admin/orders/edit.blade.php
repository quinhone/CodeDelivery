@extends('app')

@section('content')

	<div class="container">
		<h1>Pedido: #{{$order->id}} - R$ {{$order->total}}</h1>
		<h3>Cliente: {{$order->user->name}}</h3>
		<h4>Data: {{$order->created_at}}</h4>
		<p>
			<strong>Entregar em:</strong><br>
			{{$order->user->client->address}}<br>
			{{$order->user->client->city}} - {{$order->user->client->state}}<br>
			{{$order->user->client->zipcode}}<br>
		</p>

		{!! Form::model($order, ['route'=>['admin.orders.update', $order->id]]) !!}

		<div class="form-group">
			{!! Form::label('Status', 'Status:') !!}
			{!! Form::select('status', $list_status, null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Entregador', 'Entregador:') !!}
			{!! Form::select('user_deliveryman_id', $deliveryman, null, ['class'=>'form-control']) !!}
		</div>


		<div class="form-group">
			{!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}


	</div>
@endsection