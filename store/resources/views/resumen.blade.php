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
                    <td>0045</td>
                    <td>Doggo Dogg</td>
                    <td>20 June 2019</td>
                    <td><span class="badge status-primary">Realizado</span></td>
                    <td> <a href="#">Pagar</a> </td>
                </tr>

            </tbody>
        </table>
    </div>
</section>
@endsection