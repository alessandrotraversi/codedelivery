@extends('app')

@section('content')
    <div class="conteiner">
        <h3>Nuova richiesta</h3>
        
        @include('errors._check')
        
        {!! Form::open(['route'=>'costumer.order.store', 'class'=>'form']) !!}
        

            <div class="form-group">
                
                <label>Totale:</label>
                <p id="total"></p>
                <a href="#" id="btnNewItem" class="btn btn-default">Aggiungi</a>
                
                <table id="tab_prodotti" class="table table-bordered">
                
                    <thead>
                    
                        <tr>
                        
                            <th>Prodotto</th>
                            <th>Quantità</th>
                        
                        </tr>
                    
                    </thead>
                    
                    <tbody>
                    
                        <tr>
                        
                            <th>
                            
                                <select class="form-control" name="items[0][product_id]">
                                    @foreach($products as $p)
                                        <option value="{{$p->id}}" data-price="{{$p->price}}">
                                        
                                            {{$p->name}} --- {{$p->price}}
                                            
                                        </option>
                                    @endforeach
                                </select>
                            
                            </th>
                            <th>
                            
                                {!! Form::text('items[0][qtd]', 1, ['class'=>'form-control']) !!}
                            
                            </th>
                        
                        </tr>
                        
                    </tbody>
                    
                </table>
                
            </div>
            
            <div class="form-group">
                {!! Form::submit('Crea', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
        
    </div>


@endsection


@section('post-script')

<script>
$(document).ready( function(){
    
    function calculateTotal(){
    
        var total = 0,
            trLen = $('#tab_prodotti tbody tr').length,
            tr = null, price, qtd;
        
        for (var i = 0; i < trLen; i++){
        
            tr = $('#tab_prodotti tbody tr').eq(i);
            price = tr.find(':selected').data('price');
            qtd = tr.find('input').val();
            total += price * qtd;
        };
        
        $('#total').html(total);
    
    };
    
    
    $('#btnNewItem').click( function(){
    
        var row = $('#tab_prodotti tbody > tr:last'),
            newRow = row.clone(),
            length = $("table tbody tr").length;
        
        newRow.find('td').each(function(){
            
            var td = $(this),
                input = td.find('input,select'),
                name = input.attr('name');
            
            input.attr('name', name.replace((length - 1) + "", length + ""));
            
        });
        
        newRow.find('input').val(1);
        newRow.insertAfter(row); 
        calculateTotal();
    });
    
    $(document.body).on('click', 'select', function(){
        calculateTotal();
    });
    
    $(document.body).on('blur', 'input', function(){
        calculateTotal();
    });
    
    
    
});
</script>

@endsection