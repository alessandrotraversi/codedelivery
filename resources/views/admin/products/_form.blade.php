<div class="form-group">
     {!! Form::label('Name','Nome:') !!}
     {!! Form::text('name', null , ['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('Description','Descrizione:') !!}
     {!! Form::textarea('description', null , ['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('Price','Prezzo:') !!}
     {!! Form::text('price', null , ['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('Category','Categoria:') !!}
     {!! Form::select('category_id', $categories, null , ['class'=>'form-control']) !!}
</div>