@extends('app')

@section('content')

	<div class="container">
		<h1>Editando Produto: {{$product->name}}</h1>

		@include('errors._check')

		{!! Form::model($product, ['route'=>['admin.products.update', $product->id]]) !!}

		@include('admin.products._form')

		<div class="form-group">
			{!! Form::submit('Salvar Produto', ['class'=>'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}


	</div>
@endsection