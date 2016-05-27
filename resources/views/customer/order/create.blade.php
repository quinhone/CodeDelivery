@extends('app')

@section('content')
	
	<div class="container">
		<h1>Novo Pedido</h1>
		
		@include('errors._check')
		
		{!! Form::open(['route'=>'customer.order.store']) !!}
		
		<div class="form-group col-xs-2">
			<div class="row">
				<div class="total">
					{!! Form::label('Total', 'Total:') !!}
					<p id="total">R$ 0,00</p>
				</div>
				<a href="#" id="btnNewItem" class="btn btn-primary">Novo Item</a>
			</div>
		</div>
		
		<table class="table table-bordered table-condensed">
			<thead>
			<tr>
				<th width="80%">Produto</th>
				<th width="20%" class="text-center">Quantidade</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>
					<select class="form-control" name="items[0][product_id]">
						<option value="0,00" data-price="0">Selecione um Produto...</option>
						@foreach($products as $p)
							<option value="{{$p->id}}" data-price="{{$p->price}}">{{$p->name}} --- {{$p->price}}</option>
						@endforeach
					</select>
				</td>
				<td>
					{!! Form::text('items[0][qtd]', 1, ['class'=>'form-control text-center']) !!}
				</td>
			</tr>
			</tbody>
		</table>

		<div class="form-group">
			{!! Form::submit('Criar Pedido', ['class'=>'btn btn-success']) !!}
		</div>
		
		{!! Form::close() !!}
	
	
	</div>
@endsection

@section('script')
	<script>
		$('#btnNewItem').click(function(){

			var row = $('table tbody > tr:last'),
				newRow = row.clone(),
				length = $('table tbody tr').length;

			newRow.find('td').each(function(){

				var td = $(this),
					input = td.find('input,select'),
					name = input.attr('name');


				input.attr('name', name.replace((length - 1) + "", length + ""));

			});

			newRow.find('input').val(1);
			newRow.insertAfter(row);
			calculateTotal();
		});

		$(document.body).on('click','select', function(){
			calculateTotal();
		});

		$(document.body).on('blur','input', function(){
			calculateTotal();
		});

		function calculateTotal(){
			var total = 0,
				trLength = $('table tbody tr').length,
				tr = null,
				price,
				qtd;

			for (var i = 0; i < trLength; i++){

				tr = $('table tbody tr').eq(i);
				price = tr.find(':selected').data('price');
				qtd = tr.find('input').val();
				total += price * qtd;
			}
			if(total != 0){
				$('#total').html('R$ ' + numeroParaMoeda(total, 2, ',', '.'));
			}else{
				$('#total').html('R$ 0,00');
			}
		}

		function numeroParaMoeda(n, c, d, t)
		{
			c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
			return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
		}
	</script>
@endsection