@extends('app')

@section('content')

	<div class="container">
		<h1>Cupoms</h1>

		<div class="adicionar">
			<a href="{{route('admin.cupoms.create')}}" class="btn btn-success">Novo Cupom</a>
		</div>

		<table class="table table-striped table-bordered">
			<thead>
			<tr>
				<th width="10%">ID</th>
				<th width="35%">Código</th>
				<th width="35%">Valor</th>
				<th width="20%"></th>
			</tr>
			</thead>
			<tbody>
			@foreach($cupoms as $cupom)
				<tr>
					<td>{{$cupom->id}}</td>
					<td>{{$cupom->code}}</td>
					<td class="text-right">{{$cupom->value}}</td>
					<td class="text-center">
						<a href="{{route('admin.cupoms.edit', ['id' => $cupom->id])}}" class="btn btn-primary">editar</a>
						<a href="{{route('admin.cupoms.delete', ['id' => $cupom->id])}}" class="btn btn-danger">Excluir</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<div class="text-center">
			{!! $cupoms->render() !!}
		</div>

	</div>
@endsection