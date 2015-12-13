@extends('app')

@section('content')
    <div class="conteiner">
        <h3>Modifica ordine: (id: {{$order->id}}) - $ {{$order->total}}</h3>
        <h4>Cliente: {{$order->client->user->name}}</h4>
        <h5>Creato: (id: {{$order->created_at}})</h5>
        
        <p>
            <b>Inviare in:</b><br />
            {{$order->client->address }} - {{$order->client->city }} - {{$order->client->state }}
        </p>
        
        @include('errors._check')
        
        {!! Form::model($order, ['route'=>['admin.orders.update', $order->id]]) !!}
        
        <div class="form-group">
             {!! Form::label('Status','Status:') !!}
             {!! Form::select('status', $list_status, null , ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
             {!! Form::label('Coriere','Coriere:') !!}
             {!! Form::select('user_deliveryman_id', $deliveryman, null , ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
             {!! Form::submit('Salva', ['class'=>'btn btn-primary']) !!}
        </div>
        
        {!! Form::close() !!}
        
    </div>


@stop