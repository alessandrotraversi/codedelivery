@extends('app')

@section('content')
    <div class="conteiner">
        <h3>Nuova categoria</h3>
        
        @include('errors._check')
        
        {!! Form::open(['route'=>'admin.categories.store']) !!}
        
            @include('admin.categories._form')

            <div class="form-group">
                 {!! Form::submit('Crea categoria', ['class'=>'btn btn-primary']) !!}
            </div>
        
        {!! Form::close() !!}
        
    </div>


@stop