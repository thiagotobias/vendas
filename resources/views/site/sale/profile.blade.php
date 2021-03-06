@extends('site.layouts.app')

@section('conteudo')
    <div class="columns">
		<div class="column is-10 is-offset-1">
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
					<tr>
                    <th>{{ $sale->id }}</th>
                        <th>{{ $sale->seller->name }}</th>
                        <th>{{ $sale->seller->email }}</th>
                        <th>R$ {{ $sale->commission_value }}</th>
                        <th>R$ {{ $sale->sale_value }}</th>
                        <th>{{ $sale->created_at }}</th>					
						<th>
							<a class="btn btn-primary" role="button" href="{{ url('/sale/' . $sale->id . '/edit')}}">Alterar</a>
						</th>
					</tr>
				</tbody>
			</table>
			<div>
				<a class="btn btn-primary" role="button" href=" {{ url('/sale')}} ">Ver todos as Vendas</a>		
			</div>
            <a class="btn btn-primary" role="button" href="{{ url('sale/create') }}">Nova Venda</a>
		</div>
	</div>
@endsection