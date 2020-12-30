@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Usuarios') }}</div>

                <div class="card-body">
                    @if (session('info'))
                        <div class="alert alert-success" role="alert">
                            {{ session('info') }}
                        </div>
                    @endif
                    <p><strong>Nombre</strong> {{ $role->name }} </p>
                    <p><strong>Slug</strong> {{ $role->slug }} </p>
                    <p><strong>Descripción</strong> {{ $role->description }} </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection