@extends('layouts.app')

@section('content')
<section class="media-card-3">
    <h6>Bienvenido</h6>
    <form method="POST" action="/compras">
        @csrf
        <div class="profile profile-long">
            <div class="profile__image">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/567707/dog.png" alt="Doggo" />
            </div>

            <div class="profile__info">
                <h3>Doggo Dogg</h3>
                <p class="profile__info__extra">
                    A very good boi that loves playing fetch and ice-cream! Gentle with everyone. Scared of the rain.
                </p>
            </div>

            <div class="profile__stats">
                <p class="profile__stats__title">Precio</p>
                <h5 class="profile__stats__info">$25000</h5>
            </div>

            <div class="profile__stats">
                <p class="profile__stats__title">Cantidad</p>
                <div class="content-simbol">
                    <button class="simbol"><img src="{{ asset('images/menos.png') }}" alt=""></button>
                    <div>
                        <input class="content-number" id="cantidad" name="cantidad" value="1"></input>
                    </div>
                    <button class="simbol"><img src=" {{ asset('images/mas.png') }}" alt=""></button>
                </div>
            </div>

            <div class="profile__stats">
                <p class="profile__stats__title">Total</p>
                <input type="text" class="profile__stats__info" id="total" name="total" value="25000"></input>
            </div>

            <div class="profile__cta">
                <button type="submit">Comprar!</button>
            </div>

        </div>
    </form>
</section>

@endsection