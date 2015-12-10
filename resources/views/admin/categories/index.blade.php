@extends('app')

@section('content')
    <div class="conteiner">
        <h3>Categories</h3>
        
        <a href="#" class="btn btn-default">Nuova categoria</a>
        
        <table class="table table-border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Azione</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <th>{{ $category->id }}</th>
                    <th>{{ $category->name }}</th>
                    <th></th>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        
        
    </div>


@stop