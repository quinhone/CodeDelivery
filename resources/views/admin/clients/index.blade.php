@extends('app')

@section('content')

	<div class="container">
		<h1>Clientes</h1>

		<div class="adicionar">
			<a href="{{route('admin.clients.create')}}" class="btn btn-success">Novo Cliente</a>
		</div>

		<table class="table table-striped table-bordered">
			<thead>
			<tr>
				<th width="10%">ID</th>
				<th width="50%">Nome</th>
				<th width="20%">Fone</th>
				<th width="20%"></th>
			</tr>
			</thead>
			<tbody>
			@foreach($clients as $client)
				<tr>
					<td>{{$client->id}}</td>
					<td>{{$client->user->name}}</td>
					<td>{{$client->phone}}</td>
					<td class="text-center">
						<a href="{{route('admin.clients.edit', ['id' => $client->id])}}" class="btn btn-primary">editar</a>
						<a href="{{route('admin.clients.delete', ['id' => $client->id])}}" class="btn btn-danger">Excluir</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<div class="text-center">
			{!! $clients->render() !!}
		</div>

	</div>
@endsection