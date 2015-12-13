@extends('app')

@section('content')
    <div class="conteiner">
        <h3>Products</h3>
        
        <a href="{{ route('admin.products.create') }}" class="btn btn-default">Nuovo prodotto</a>
        
        <table class="table table-border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Prodotto</th>
                    <th>Categoria</th>
                    <th>Azione</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <th>{{ $product->id }}</th>
                    <th>{{ $product->name }}</th>
                    <th>{{ $product->category->name }}</th>
                    <th>
                        <a href="{{route('admin.products.edit', ['id'=>$product->id])}}" class="btn btn-default btn-sm">Modifica</a>
                        <a href="{{route('admin.products.destroy', ['id'=>$product->id])}}" class="btn btn-default btn-sm">Elimina</a>
                    </th>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        
        {!! $products->render() !!}
        
    </div>


@stop