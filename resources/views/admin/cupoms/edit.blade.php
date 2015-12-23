@extends('app')

@section('content')
    <div class="conteiner">
        <h3>Modifica cupom: {{$cupom->code}} (id: {{$cupom->id}})</h3>
        
        @include('errors._check')
        
        {!! Form::model($cupom, ['route'=>['admin.cupoms.update', $cupom->id]]) !!}
        
        @include('admin.cupoms._form')
        
        <div class="form-group">
             {!! Form::submit('Salva', ['class'=>'btn btn-primary']) !!}
        </div>
        
        {!! Form::close() !!}
        
    </div>


@stop