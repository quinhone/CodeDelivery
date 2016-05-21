@extends('app')

@section('content')

	<div class="container">
		<h1>Novo Produto</h1>

		@include('errors._check')

		{!! Form::open(['route'=>'admin.products.store']) !!}

		@include('admin.products._form')

		<div class="form-group">
			{!! Form::submit('Salvar Produto', ['class'=>'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}


	</div>
@endsection