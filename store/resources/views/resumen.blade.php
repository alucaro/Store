@extends('layouts.app')

@section('content')

<section class="tables">
    <h6>Estado de tu compra</h6>
    <div class="table__wrapper">
        <table class="table">
            <thead class="table__header">
                <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Fecha de solicitud</td>
                    <td>Pago</td>
                    <td> </td>
                </tr>
            </thead>
            <tbody class="table__body">
                <tr>
                    <td>{{ $reference }}</td>
                    <td>{{ $name }}</td>
                    <td>{{ $fecha->format('d/m/Y') }}</td>
                    @if($estado == 'NOT_AUTHORIZED' || $estado == 'FAILED')
                    <td><span id="estado" class="badge status-error">RECHAZADO</span></td>
                    <td> <a href="/">Volver</a> </td>
                    @endif
                    @if($estado == 'PENDING')
                    <td><span id="estado" class="badge status-primary">PENDIENTE</span></td>
                    <td> <a href="javascript:history.back()">Reintentar</a> </td>
                    @endif
                    @if($estado == 'OK')
                    <td><span id="estado" class="badge status-success">EXITOSO</span></td>
                    <td> <a href="/">Volver</a> </td>
                    @endif
                </tr>

            </tbody>
        </table>
    </div>
</section>
@endsection