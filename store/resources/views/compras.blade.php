@extends('layouts.app')

@section('content')
<a href="{{ url('/ordenes') }}"><button type="button" class="btn-orders">Ver Ordenes</button></a>
<section class="media-card-3">
        
    
    <form method="POST" action="/registro">
        @csrf
        <div class="profile profile-long">
            <div class="profile__image">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/567707/dog.png" alt="Doggo" />
            </div>

            <div class="profile__info">
                <h3>{{$item->name}}</h3>
                <p class="profile__info__extra">
                    {{ $item->description}}
                </p>
            </div>

            <div class="profile__stats">
                <p class="profile__stats__title">Precio</p>
                <h5 class="profile__stats__info">${{$item->price}}</h5>
            </div>

            <div class="profile__stats">
                <p class="profile__stats__title">Cantidad</p>
                <div class="content-simbol">
                    <button type="button" class="simbol_minus"><img src="{{ asset('images/menos.png') }}" alt=""></button>
                    <div>
                        <input class="content-number no-action" id="cantidad" name="cantidad" value="1"></input>
                    </div>
                    <button type="button" class="simbol_plus"><img src=" {{ asset('images/mas.png') }}" alt=""></button>
                </div>
            </div>

            <div class="profile__stats">
                <p class="profile__stats__title">Total</p>
                <input type="text" class="profile__stats__info no-action" id="total" name="total" value="25000"></input>
            </div>

            <div class="profile__cta">
                <button type="submit">Comprar!</button>
            </div>

        </div>
    </form>

</section>

@endsection