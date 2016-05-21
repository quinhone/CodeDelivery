@extends('app')

@section('content')

	<div class="container">
		<h1>Nova Categoria</h1>

		@include('errors._check')

		{!! Form::open(['route'=>'admin.categories.store']) !!}

		<div class="form-group">
			{!! Form::label('Name', 'Nome:') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Salvar Categoria', ['class'=>'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}


	</div>
@endsection