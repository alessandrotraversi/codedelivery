@extends('app')

@section('content')
    <div class="conteiner">
        <h3>Categories</h3>
        
        <a href="{{ route('admin.categories.create') }}" class="btn btn-default">Nuova categoria</a>
        
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
                    <th>
                        <a href="{{route('admin.categories.edit', ['id'=>$category->id])}}" class="btn btn-default btn-sm">Modifica</a>
                        <a href="{{route('admin.categories.edit', ['id'=>$category->id])}}" class="btn btn-default btn-sm">Elimina</a>
                    </th>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        
        {!! $categories->render() !!}
        
    </div>


@stop