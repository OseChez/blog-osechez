<div class="form-group">
	{{ Form::label('name','Nombre') }}
	{{ Form::text('name',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('email','email') }}
	{{ Form::text('email',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::submit('Guardar',['class' => 'btn btn-lg btn-success']) }}
</div>