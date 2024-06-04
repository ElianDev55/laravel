@extends('layouts.app')

@section('content')
    <h1>{{ $survey->title }}</h1>

          
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
    <!-- Aquí puedes agregar más código para mostrar los detalles de la encuesta -->
@endsection