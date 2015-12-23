@extends('app')

@section('content')
    <div class="conteiner">
        <h3>Mia richiesta</h3>
        
        <a href="{{route('costumer.order.create')}}" class="btn btn-default">Nuova richiesta</a>
        <br /><br />
        
        <table class="table table-bordered">
        
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Total</td>
                    <td>Status</td>
                </tr>
            </thead>
            <thead>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->total}}</td>
                    <td>{{$order->status}}</td>
                </tr>
                @endforeach
            </thead>
        </table>
        
        {!! $orders->render() !!}

    </div>

@endsection