{{-- PAGINA INICIAL - apresenta os vendedores existentes --}}
@extends('site.layouts.app')

@section('conteudo')
    @if (count($dados) == 0)
    	{{-- true expr --}}
    	<p class="alert alert-danger text-center">Não foram encontradas vendedores.</p>
    @else
    	{{-- apresentar os vendedores existentes na base de dados --}}
    	{{-- contador --}}
    	@php
    		$total = 0;
    	@endphp
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">E-MAIL</th>
                    <th scope="col">DATA ADMISSÃO</th>
                </tr>
            </thead>
            <tbody>

            @foreach ($dados as $vendedor) 
                <tr>
                    <th>{{ $vendedor->id }}</th>
                    <td>{{ $vendedor->name }}</td>
                    <td>{{ $vendedor->email }}</td>
                    <td>{{ $vendedor->created_at }}</td>
                </tr>
                {{-- atualizacao do total de vendedores --}}
                @php
                    $total++;
                @endphp
            @endforeach
            
            </tbody>
        </table>
    	{{-- apresenta o numero de vendedores --}}
    	<div class="row">
    		<div class="col-md-12 text-right">
    			<p>Nº total de vendedores: {{ $total }}</p>
    		</div>
    	</div>
    @endif
@endsection