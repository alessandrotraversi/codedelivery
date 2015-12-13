@extends('app')

@section('content')
    <div class="conteiner">
        <h3>Nuovo prodotto</h3>
        
        @include('errors._check')
        
        {!! Form::open(['route'=>'admin.products.store']) !!}
        
            @include('admin.products._form')

            <div class="form-group">
                 {!! Form::submit('Crea prodotto', ['class'=>'btn btn-primary']) !!}
            </div>
        
        {!! Form::close() !!}
        
    </div>


@stop