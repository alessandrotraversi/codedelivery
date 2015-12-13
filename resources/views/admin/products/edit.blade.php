@extends('app')

@section('content')
    <div class="conteiner">
        <h3>Modifica prodotto: {{$product->name}} (id: {{$product->id}})</h3>
        
        @include('errors._check')
        
        {!! Form::model($product, ['route'=>['admin.products.update', $product->id]]) !!}
        
        @include('admin.products._form')
        
        <div class="form-group">
             {!! Form::submit('Salva', ['class'=>'btn btn-primary']) !!}
        </div>
        
        {!! Form::close() !!}
        
    </div>


@stop