@extends('site.layouts.app')

@section('conteudo')
    <div class="columns">		
		<div class="column is-10 is-offset-1">
			<form action="/sale" method="post">				
				{{ csrf_field() }}
                <h3>Adicionar Nova Venda</h3>
                <div class="form-group">
                    <label for="name">Vendedor: </label>
                    <select class="form-control" name="seller_id">
                        @foreach ($sellers as $seller) 
                            <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Valor da Venda: </label>
                    <input type="text" class="form-control" id="sale_value" name="sale_value" placeholder="Valor da Venda" required>
                </div>

                <div class="text-center">
                    <button class="btn btn-primary" role="submit">Salvar</button>
                </div>
			</form>	
			<a class="btn btn-primary" role="button" href=" {{ url('/sale')}} ">Ver todos os vendedores</a>		
		</div>
	</div>
@endsection