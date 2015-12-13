@extends('app')

@section('content')
    <div class="conteiner">
        <h3>Nuovo cliente</h3>
        
        @include('errors._check')
        
        {!! Form::open(['route'=>'admin.clients.store']) !!}
        
            @include('admin.clients._form')

            <div class="form-group">
                 {!! Form::submit('Crea', ['class'=>'btn btn-primary']) !!}
            </div>
        
        {!! Form::close() !!}
        
    </div>


@stop