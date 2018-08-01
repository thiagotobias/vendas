@extends('site.layouts.app')

@section('conteudo')
    <div class="columns">
		<div class="column is-10 is-offset-1">
			@if (count($dados) == 0)
				{{-- true expr --}}
				<p class="alert alert-danger text-center">Não foram encontradas vendedores.</p>
			@else
				{{-- apresentar os vendedores existentes na base de dados --}}
				{{-- contador --}}
				@php
					$total = 0;
				@endphp
				<table class="table is-striped">
					<thead>
						<tr>
							<th scope="col">ID</th>
                    		<th scope="col">NOME</th>
                    		<th scope="col">E-MAIL</th>
							<th scope="col">COMISSÃO</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($dados as $seller) 
							<tr>
								<th>{{ $seller->id }}</th>
								<th>{{ $seller->name }}</th>
								<th>{{ $seller->email }}</th>
								<th>{{ $seller->commission }} %</th>
								<th>
									<a class="btn btn-primary" role="button" href="/seller/{{ $seller->id}}">Inspecionar</a>
								</th>
								<th>
									<form action="/seller/{{$seller->id}}" method="post">
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
			<a class="btn btn-primary" role="button" href="{{ url('seller/create') }}">Novo Vendedor</a>
		</div>
	</div>
@endsection