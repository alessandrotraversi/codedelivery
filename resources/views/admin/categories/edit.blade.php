@extends('app')

@section('content')
    <div class="conteiner">
        <h3>Modifica categoria: {{$category->name}} (id: {{$category->id}})</h3>
        
        @include('errors._check')
        
        {!! Form::model($category, ['route'=>['admin.categories.update', $category->id]]) !!}
        
        @include('admin.categories._form')
        
        <div class="form-group">
             {!! Form::submit('Salva categoria', ['class'=>'btn btn-primary']) !!}
        </div>
        
        {!! Form::close() !!}
        
    </div>


@stop