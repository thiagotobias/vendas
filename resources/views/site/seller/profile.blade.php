@extends('site.layouts.app')

@section('conteudo')
    <div class="columns">
		<div class="column is-10 is-offset-1">
			<table class="table is-striped">
				<thead>
					<tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOME</th>
                        <th scope="col">E-MAIL</th>
						<th scope="col">COMISSÃO</th>
                        <th scope="col">DATA ADMISSÃO</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<th>{{ $dados['seller']->id }}</th>
						<th>{{ $dados['seller']->name }}</th>
                        <th>{{ $dados['seller']->email }}</th>
						<th>{{ $dados['seller']->commission }}%</th>
                        <th>{{ $dados['seller']->created_at }}</th>						
						<th>
							<a class="btn btn-primary" role="button" href="{{ url('/seller/' . $dados['seller']->id . '/edit')}}">Alterar</a>
						</th>
					</tr>
				</tbody>

			</table>
			<div class="row">    
				<hr>    
				<div class="col-md-12 bg-primary text-center" style="padding: 10px">
					<p>Vendas</p>
				</div>
			</div>
			@if (count($dados['allSales']) != 0)
				<table class="table is-striped">
					<thead>
						<tr>
							<th scope="col">ID</th>
                    		<th scope="col">NOME</th>
                    		<th scope="col">E-MAIL</th>
							<th scope="col">COMISSÃO</th>
                    		<th scope="col">Valor da Venda</th>
							<th scope="col">Data Venda</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($dados['allSales'] as $sellerSale) 
							<tr>
								<th>{{ $sellerSale->id }}</th>
								<th>{{ $sellerSale->name }}</th>
								<th>{{ $sellerSale->email }}</th>
								<th>{{ $sellerSale->commission }}%</th>
								<th>R$ {{ $sellerSale->sale_value }}</th>
								<th>{{ $sellerSale->created_at }}</th>
							</tr>
						@endforeach					
					</tbody>
				</table>
				<div class="row">    
				<hr>    
				<div class="col-md-12 bg-primary text-center" style="padding: 10px">
					<p>Total Vendas: R$ {{ $dados['totalVendas'] }}</p>
				</div>
			</div>
			@endif

			<div>
				<a class="btn btn-primary" role="button" href=" {{ url('/seller')}} ">Ver todos os vendedores</a>		
			</div>
            <a class="btn btn-primary" role="button" href="{{ url('seller/create') }}">Novo Vendedor</a>
		</div>
	</div>
@endsection