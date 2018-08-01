@extends('site.layouts.app')

@section('conteudo')
    <div class="columns">
		<div class="column is-10 is-offset-1">
			@if (count($sales) == 0)
				{{-- true expr --}}
				<p class="alert alert-danger text-center">Não foram encontradas Vendas.</p>
			@else
				{{-- apresentar os vendas existentes na base de dados --}}
				{{-- contador --}}
				@php
					$total = 0;
				@endphp
				<table class="table is-striped">
					<thead>
						<tr>
							<th scope="col">ID</th>
                    		<th scope="col">VENDEDOR</th>
                    		<th scope="col">E-MAIL</th>
							<th scope="col">COMISSÃO</th>
                    		<th scope="col">VALOR</th>
							<th scope="col">DATA VENDA</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($sales as $sale) 
							<tr>
								<th>{{ $sale->id }}</th>
								<th>{{ $sale->seller->name }}</th>
								<th>{{ $sale->seller->email }}</th>
								<th>R$ {{ $sale->commission_value }}</th>
								<th>R$ {{ $sale->sale_value }}</th>
								<th>{{ $sale->created_at }}</th>
								<th>
									<a class="btn btn-primary" role="button" href="/sale/{{ $sale->id}}">Inspecionar</a>
								</th>
								<th>
									<form action="/sale/{{$sale->id}}" method="post">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}										
										<button class="button btn btn-danger">X</button>
									</form>
								</th>
							</tr>
						@endforeach					
					</tbody>
				</table>
			@endif
			<a class="btn btn-primary" role="button" href="{{ url('sale/create') }}">Nova Venda</a>
		</div>
	</div>
@endsection