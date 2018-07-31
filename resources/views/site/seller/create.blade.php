@extends('site.layouts.app')

@section('conteudo')
    <div class="columns">		
		<div class="column is-10 is-offset-1">
			<form action="/seller" method="post">				
				{{ csrf_field() }}
                <h3>Adicionar Vendedor</h3>
                <div class="form-group">
                    <label for="name">Nome: </label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome" required>
                </div>
                <div class="form-group">
                    <label for="email">E-MAIL: </label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="e-mail" required>
                </div>

                <div class="text-center">
                    <button class="btn btn-primary" role="submit">Salvar</button>
                </div>
			</form>	
			<a href=" {{ url('/seller')}} ">Ver todos os vendedores</a>		
		</div>
	</div>
@endsection