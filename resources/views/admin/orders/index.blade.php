@extends('app')

@section('content')
    <div class="conteiner">
        <h3>Ordini</h3>
        
        <table class="table table-border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Totale</th>
                    <th>Data</th>
                    <th>Prodotti</th>
                    <th>Coriere</th>
                    <th>Status</th>
                    <th>Azione</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <th>{{ $order->id }}</th>
                    <th>{{ $order->total }}</th>
                    <th>{{ $order->created_at }}</th>
                    <th>
                        <ul>
                        @foreach($order->items as $item)
                            <li>
                                {{ $item->product->name }} - {{ $item->product->price }}
                            </li>
                        @endforeach
                        </ul>
                    </th>
                    <th>
                        @if($order->deliveryman)
                            {{ $order->deliveryman->name }}
                        @else
                            --
                        @endif
                    </th>
                    <th>{{ $order->status }}</th>
                    <th>
                        <a href="{{ route('admin.orders.edit', ['id'=>$order->id]) }}" class="btn btn-default btn-sm">Modifica</a>
                    </th>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        
        {!! $orders->render() !!}
        
    </div>


@stop