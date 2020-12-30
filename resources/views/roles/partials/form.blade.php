<div class="form-group">
	{{ Form::label('name','Nombre') }}
	{{ Form::text('name',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
   {{ Form::label('slug','Url Amigable') }}
   {{ Form::text('slug',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
   {{ Form::label('description','Nombre') }}
   {{ Form::textarea('description',null,['class' => 'form-control']) }}
</div>
<h3>Permiso Especial</h3>
<div class="form-group">
   <label>{!! Form::radio('special','all-access') !!} Acceso Total</label>
   <label>{!! Form::radio('special','no-access') !!} No Acceso </label>
</div>
<h3>Lista de Permisos</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($permissions as $permission)
         <li>
         	<label>
         		{{ Form::checkbox('permissions[]',$permission->id,['class' => 'form-control'],null) }}
         		{{ $permission->name }}
         		<em>({{ $role->description }})</em>
         	</label>
         </li>
		@endforeach
	</ul>
</div>
<div class="form-group"></div>