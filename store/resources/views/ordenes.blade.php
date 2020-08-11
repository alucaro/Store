@extends('layouts.app')

@section('content')

<section class="tables">
    <h6>Listado de ordenes</h6>
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
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->transactions->first()->id_transaction}}</td>
                    <td>{{$order['customer_name']}}</td>
                    <td>{{$order['updated_at']->format('d/m/Y') }}</td>

                    @if($order['status'] == 'REJECTED')
                    <td><span id="estado" class="badge status-error">RECHAZADO</span></td>
                    <td> <a href="/">Volver</a> </td>
                    @endif
                    @if($order['status'] == 'PENDING')
                    <td><span id="estado" class="badge status-primary">PENDIENTE</span></td>
                    <td> <a href="javascript:history.back()">Reintentar</a> </td>
                    @endif
                    @if($order['status'] == 'CREATED')
                    <td><span id="estado" class="badge status-success">EXITOSO</span></td>
                    <td> <a href="/">Volver</a> </td>
                    @endif

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

@endsection