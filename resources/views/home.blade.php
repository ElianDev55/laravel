@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                @role('admin')
                <h1>
                    Admin Dashboard
                </h1>
                @endrole

                @role('colaborador')
                <h1>
                    Colaborador Dashboard
                </h1>
                @endrole

                @role('empleado')
                <h1>
                    Empleador Dashboard
                </h1>
                @endrole
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
