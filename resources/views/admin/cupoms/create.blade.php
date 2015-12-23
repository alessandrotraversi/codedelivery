@extends('app')

@section('content')
    <div class="conteiner">
        <h3>Nuovo cupom</h3>
        
        @include('errors._check')
        
        {!! Form::open(['route'=>'admin.cupoms.store']) !!}
        
            @include('admin.cupoms._form')

            <div class="form-group">
                 {!! Form::submit('Crea', ['class'=>'btn btn-primary']) !!}
            </div>
        
        {!! Form::close() !!}
        
    </div>


@stop