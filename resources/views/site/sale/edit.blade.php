@extends('site.layouts.app')

@section('conteudo')
    <div class="columns">
        <div class="column is-10 is-offset-1">

            <form action="{{"/sale/" . $sale->id}}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <h3>Editar Venda</h3>
                <div class="form-group">
                    <label for="email">Valor da Venda: </label>
                    <input type="text" class="form-control" id="sale_value" name="sale_value" placeholder="Valor da Venda" required>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" role="submit">Alterar</button>
                </div>
            </form>	
            <a class="btn btn-primary" role="button" href=" {{ url('/sale')}} ">Ver todos os vendedores</a>		
        </div>
    </div>
@endsection