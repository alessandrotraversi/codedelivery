<div class="form-group">
     {!! Form::label('Name','Nome:') !!}
     {!! Form::text('user[name]', null , ['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('Email','Email:') !!}
     {!! Form::text('user[email]', null , ['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('Telefono','Telefono:') !!}
     {!! Form::text('phone', null , ['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('Indirizzo','Indirizzo:') !!}
     {!! Form::textarea('address', null , ['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('Citta','Citta:') !!}
     {!! Form::text('city', null , ['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('Stato','Stato:') !!}
     {!! Form::text('state', null , ['class'=>'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('Zipcode','Zipcode:') !!}
     {!! Form::text('zipcode', null , ['class'=>'form-control']) !!}
</div>