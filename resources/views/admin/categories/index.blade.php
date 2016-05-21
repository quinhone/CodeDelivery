@extends('app')

@section('content')

	<div class="container">
		<h1>Categorias</h1>

		<div class="adicionar">
			<a href="{{route('admin.categories.create')}}" class="btn btn-success">Nova Categoria</a>
		</div>

		<table class="table table-striped table-bordered">
			<thead>
			<tr>
				<th width="10%">ID</th>
				<th width="70%">Nome</th>
				<th width="20%"></th>
			</tr>
			</thead>
			<tbody>
			@foreach($categories as $category)
				<tr>
					<td>{{$category->id}}</td>
					<td>{{$category->name}}</td>
					<td class="text-center">
						<a href="{{route('admin.categories.edit', ['id' => $category->id])}}" class="btn btn-primary">editar</a>
						<a href="{{route('admin.categories.delete', ['id' => $category->id])}}" class="btn btn-danger">Excluir</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<div class="text-center">
			{!! $categories->render() !!}
		</div>

	</div>
@endsection