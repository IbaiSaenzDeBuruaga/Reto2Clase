@extends('layouts.app')

@section('content')
    <div class="row">
        <!-- Mensaje de éxito después de guardar -->
        @if (session('response') === true)
            <div class="alert alert-success">
                Operación realizada correctamente. <a href="{{ route('bodega.index') }}">Volver al listado</a>
            </div>
        @endif
        <!-- Formulario para crear o editar una bodega -->
        <form class="form" action="{{ route('bodega.store') }}" method="post">
            @csrf
            <!-- Campo oculto para el ID (solo si se está editando una bodega existente) -->
            <input type="hidden" name="id" value="{{ old('id', $dataToView['data']['id'] ?? '') }}" />
            <!-- Campo para el nombre de la bodega -->
            <div class="form-group">
                <label>Nombre</label>
                <input class="form-control" type="text" name="nombre" value="{{ old('nombre', $dataToView['data']['nombre'] ?? '') }}" required />
            </div>
            <!-- Campo para la dirección de la bodega -->
            <div class="form-group">
                <label>Dirección</label>
                <input class="form-control" type="text" name="direccion" value="{{ old('direccion', $dataToView['data']['direccion'] ?? '') }}" required />
            </div>
            <!-- Campo para el email -->
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" name="email" value="{{ old('email', $dataToView['data']['email'] ?? '') }}" />
            </div>
            <!-- Campo para el teléfono de la bodega -->
            <div class="form-group">
                <label>Teléfono</label>
                <input class="form-control" type="text" name="telefono" value="{{ old('telefono', $dataToView['data']['telefono'] ?? '') }}" />
            </div>
            <!-- Campo para la persona de contacto -->
            <div class="form-group">
                <label>Persona de contacto</label>
                <input class="form-control" type="text" name="contacto" value="{{ old('contacto', $dataToView['data']['contacto'] ?? '') }}" />
            </div>
            <!-- Campo para el año de fundación -->
            <div class="form-group">
                <label>Año de fundación</label>
                <input class="form-control" type="number" name="anio_fundacion" value="{{ old('anio_fundacion', $dataToView['data']['anio_fundacion'] ?? '') }}" />
            </div>
            <!-- Campo textarea para descripción o información adicional -->
            <div class="form-group">
                <label>Información adicional</label>
                <textarea class="form-control" name="info_adicional">{{ old('info_adicional') }}</textarea>
            </div>
            <!-- ¿Dispone de restaurante? -->
            <div class="form-group">
                <label>¿Dispone de restaurante?</label><br>
                <input type="radio" name="restaurante" value="si" {{ old('restaurante', $dataToView['data']['restaurante'] ?? 'no') === 'si' ? 'checked' : '' }} /> Sí
                <input type="radio" name="restaurante" value="no" {{ old('restaurante', $dataToView['data']['restaurante'] ?? 'no') === 'no' ? 'checked' : '' }} /> No
            </div>
            <!-- ¿Dispone de hotel? -->
            <div class="form-group">
                <label>¿Dispone de hotel?</label><br>
                <input type="radio" name="hotel" value="si" {{ old('hotel', $dataToView['data']['hotel'] ?? 'no') === 'si' ? 'checked' : '' }} /> Sí
                <input type="radio" name="hotel" value="no" {{ old('hotel', $dataToView['data']['hotel'] ?? 'no') === 'no' ? 'checked' : '' }} /> No
            </div>
            <!-- Botón para guardar los datos -->
            <input class="btn btn-primary" type="submit" value="Añadir" />
            <!-- Botón para cancelar y volver al listado -->
            <a class="btn btn-outline-danger" href="{{ route('bodega.index') }}">Cancelar</a>
        </form>
    </div>
@endsection
