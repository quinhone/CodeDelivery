@extends('app')

@section('content')

	<div class="container">
		<h1>Produtos</h1>

		<div class="adicionar">
			<a href="{{route('admin.products.create')}}" class="btn btn-success">Novo Produto</a>
		</div>

		<table class="table table-striped table-bordered">
			<thead>
			<tr>
				<th width="10%">ID</th>
				<th width="40%">Produto</th>
				<th width="20%">Categoria</th>
				<th width="10%">Preço</th>
				<th width="20%"></th>
			</tr>
			</thead>
			<tbody>
			@foreach($products as $product)
				<tr>
					<td>{{$product->id}}</td>
					<td>{{$product->name}}</td>
					<td>{{$product->category->name}}</td>
					<td>{{$product->price}}</td>
					<td class="text-center">
						<a href="{{route('admin.products.edit', ['id' => $product->id])}}" class="btn btn-primary">Editar</a>
						<a href="{{route('admin.products.delete', ['id' => $product->id])}}" class="btn btn-danger">Excluir</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		<div class="text-center">
			{!! $products->render() !!}
		</div>

	</div>
@endsection