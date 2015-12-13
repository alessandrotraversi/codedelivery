@extends('app')

@section('content')
    <div class="conteiner">
        <h3>Clienti</h3>
        
        <a href="{{ route('admin.clients.create') }}" class="btn btn-default">Nuovo cliente</a>
        
        <table class="table table-border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Azione</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <th>{{ $client->id }}</th>
                    <th>{{ $client->user->name }}</th>
                    <th>
                        <a href="{{route('admin.clients.edit', ['id'=>$client->id])}}" class="btn btn-default btn-sm">Modifica</a>
                        <a href="{{route('admin.clients.edit', ['id'=>$client->id])}}" class="btn btn-default btn-sm">Elimina</a>
                    </th>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        
        {!! $clients->render() !!}
        
    </div>


@stop