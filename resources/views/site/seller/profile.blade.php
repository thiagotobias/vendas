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
						<th>{{ $seller->id }}</th>
						<th>{{ $seller->name }}</th>
                        <th>{{ $seller->email }}</th>
						<th>{{ $seller->commission }}%</th>
                        <th>{{ $seller->created_at }}</th>						
						<th>
							<a href="{{ url('/seller/' . $seller->id . '/edit')}}">Alterar</a>
						</th>
					</tr>
				</tbody>

			</table>

			<div>
				<a href=" {{ url('/seller')}} ">Ver todos os vendedores</a>		
			</div>
            <a href="{{ url('seller/create') }}">Novo Vendedor</a>
		</div>
	</div>
@endsection