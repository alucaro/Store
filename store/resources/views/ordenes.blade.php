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
                <tr>
                    <td>0046</td>
                    <td>Andres Casas</td>
                    <td>20 June 2019</td>
                    <td><span class="badge status-primary">Pendiente</span></td>
                    <td> <a href="#">Pagar</a> </td>
                </tr>
                <tr>
                    <td>0047</td>
                    <td>Juan Torres</td>
                    <td>20 June 2019</td>
                    <td><span class="badge status-error">Rechazado</span></td>
                    <td> <a href="#">Pagar</a> </td>
                </tr>
                <tr>
                    <td>0048</td>
                    <td>Ana Arango</td>
                    <td>20 June 2019</td>
                    <td><span class="badge status-success">Realizado</span></td>
                    <td> <a href="#">Pagar</a> </td>
                </tr>
                <tr>
                    <td>0049</td>
                    <td>Diego Mora</td>
                    <td>20 June 2019</td>
                    <td><span class="badge status-primary">Pendiente</span></td>
                    <td> <a href="#">Pagar</a> </td>
                </tr>

            </tbody>
        </table>
    </div>
</section>
@endsection