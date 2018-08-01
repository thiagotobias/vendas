@extends('site.layouts.app')

@section('conteudo')
    <div class="columns">
        <div class="column is-10 is-offset-1">

            <form action="{{"/seller/" . $seller->id}}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <h3>Editar Vendedor: {{$seller->name}}</h3>
                <div class="form-group">
                    <label for="nome">Nome: </label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome" required value="{{ $seller->name }}">
                </div>
                <div class="form-group">
                    <label for="email">E-EMAIL: </label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="e-mail" required value="{{ $seller->email }}">
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" role="submit">Alterar</button>
                </div>
            </form>	
            <a class="btn btn-primary" role="button" href=" {{ url('/seller')}} ">Ver todos os vendedores</a>		
        </div>
    </div>
@endsection