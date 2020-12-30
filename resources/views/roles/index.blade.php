@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Roles') }}</div>

                <div class="card-body">
                    <div class="card">
                      @can('roles.show')
                        <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary pull-right">
                          Crear Nuevo Rol
                        </a>
                       @endcan 
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="25px">Nombre Rol</th>
                                    <th width="25px">Descripcion</th>
                                    <th colspan="3">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td width="15%">
                                      @can('roles.show')
                                       <a href="{{ route('roles.show',$role->id)}}" class="btn btn-sm btn-info pull-right">
                                          Ver datos
                                       </a>
                                       @endcan 
                                    </td>
                                    <td width="10%">
                                       @can('roles.edit')
                                        <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-md btn-warning pull-right">
                                          Editar
                                        </a>
                                        @endcan
                                    </td>
                                    <td width="10%">
                                       @can('roles.delete')          
                                       {!! Form::open(['route'=>['roles.destroy',$role],'method'=>'delete']) !!}
                                      <div class="form-group">
                                       {{ Form::submit('Borrar',['class' => 'btn btn-md btn-danger']) }}
                                      </div>
                                        {!! Form::close() !!}
                                       @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection