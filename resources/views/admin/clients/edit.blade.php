@extends('app')

@section('content')
    <div class="conteiner">
        <h3>Modifica cliente: {{$client->user->name}} (id: {{$client->id}})</h3>
        
        @include('errors._check')
        
        {!! Form::model($client, ['route'=>['admin.clients.update', $client->user->id]]) !!}
        
        @include('admin.clients._form')
        
        <div class="form-group">
             {!! Form::submit('Salva', ['class'=>'btn btn-primary']) !!}
        </div>
        
        {!! Form::close() !!}
        
    </div>


@stop