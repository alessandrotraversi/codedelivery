@extends('app')

@section('content')
    <div class="conteiner">
        <h3>Copoms</h3>
        
        <a href="{{ route('admin.cupoms.create') }}" class="btn btn-default">Nuovo cupom</a>
        
        <table class="table table-border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Codice</th>
                    <th>Valore</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cupoms as $cupom)
                <tr>
                    <th>{{ $cupom->id }}</th>
                    <th>{{ $cupom->code }}</th>
                    <th>{{ $cupom->value }}</th>
                    <th>
                        <a href="{{route('admin.cupoms.edit', ['id'=>$cupom->id])}}" class="btn btn-default btn-sm">Modifica</a>
                    </th>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        
        {!! $cupoms->render() !!}
    cupoms    
    </div>


@stop