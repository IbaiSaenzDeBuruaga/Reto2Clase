@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <h2>Gestión de Bodegas</h2>
                <a class="btn btn-primary" href="{{ route('bodega.create') }}">
                    <i class="bi bi-plus-circle"></i> Añadir Bodega
                </a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Localización</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($bodegas as $bodega)
                <tr>
                    <td>{{ $bodega->nombre }}</td>
                    <td>{{ $bodega->direccion }}</td>
                    <td>{{ $bodega->telefono }}</td>
                    <td>{{ $bodega->email }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('bodega.view', $bodega->id) }}">
                            <i class="bi bi-box-arrow-in-right"></i> Entrar
                        </a>
                        <form action="{{ route('bodega.delete', $bodega->id) }}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Borrar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
