    @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Usuarios') }}</div>

                <div class="card-body">
                    <div class="card">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="25px">Nombre</th>
                                    <th width="25px">Email</th>
                                    <th colspan="3">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td width="15%">
                                      @can('users.show')
                                       <a href="{{ route('users.show',$user->id)}}" class="btn btn-sm btn-info pull-right">
                                          Ver datos
                                       </a>
                                       @endcan 
                                    </td>
                                    <td width="10%">
                                       @can('users.edit')
                                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-sm btn-warning pull-right">
                                          Editar
                                        </a>
                                        @endcan
                                    </td>
                                    <td width="10%">
                                       @can('users.delete')                                                
                                       {!! Form::open(['route'=>['users.destroy',$user],'method'=>'delete']) !!}
                                      <div class="form-group">
                                               {{ Form::submit('Borrar',['class' => 'btn btn-sm btn-danger']) }}
                                      </div>
                                        {!! Form::close() !!}
                                       @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection