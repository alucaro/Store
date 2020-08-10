@extends('layouts.app')

@section('content')

<section class="forms">
    <h6>Formulario</h6>
    <form class="form-login" method="POST" action="/resumen">
        <h3>Ingresa tus datos.</h3>
        <div class="input__wrapper">
            <label class="label-form">Nombre</label>
            <input class="input-form" type="text" />
        </div>
        <div class="input__wrapper">
            <label class="label-form">Email</label>
            <input class="input-form" type="text" placeholder="email@email.com" />
        </div>
        <div class="input__wrapper">
            <label class="label-form">Celular</label>
            <input class="input-form" type="text" />
        </div>
        <div class="input__wrapper">
            <label class="label-form">Seleccione su banco</label>
            
            <select name="banco" id="banco" required>
            @foreach($bancos as $banco)
                <option value="{{ $banco['bankCode'] }}">{{ $banco['bankName'] }}</option>
            @endforeach
            </select>
            
        </div>
        <a class="button" id="login">Ir al Banco</a>
        <div class="spinner__wrapper">
            <div class="spinner-1">
                <div class="spinner" data-loading="Loading..."></div>
                <label>Redireccionando al banco...</label>
            </div>
        </div>
    </form>
</section>

<section class="modals">
    <h6>Resumen de compra</h6>
    <div class="panel">
        <div class="panel__image">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/567707/dog.png" alt="Human and Dog" />
        </div>
        <div class="panel__info">
            <h2>Ya casi es tuyo!!</h2>
            <p>
                A very good boi that loves playing fetch and ice-cream! Gentle with everyone.
            </p>
            <p>
                <strong>Cantidad: </strong> {{ $cantidad}}
            </p>
            <p>
                <strong>Total. </strong> {{ $total }}
            </p>
</section>

@endsection