@extends('layouts.guest')

@section('content')
    <header class="page-header">
        <h1 class="page-header__title">Идём<span>в</span>кино</h1>
    </header>

    <main>
        <section class="ticket">

            <header class="tichet__check">
                <h2 class="ticket__check-title">Электронный билет</h2>
            </header>

            <div class="ticket__info-wrapper">
                <p class="ticket__info">На фильм: <span class="ticket__details ticket__title">{{ $movieTitle }}</span></p>

                <p class="ticket__info">Места:
                    <span class="ticket__details ticket__chairs">
                        @foreach ($places as $place)
                            {{ $place }},
                        @endforeach
                    </span>
                </p>

                <p class="ticket__info">В зале: <span class="ticket__details ticket__hall">{{ $movieHall }}</span></p>

                <p class="ticket__info">Начало сеанса: <span
                        class="ticket__details ticket__start">{{ $movieTime }}</span></p>

                <img class="ticket__info-qr" src="storage/qr-code.png">

                <p class="ticket__hint">Покажите QR-код нашему контроллеру для подтверждения бронирования.</p>
                <p class="ticket__hint">Приятного просмотра!</p>
            </div>
        </section>
    </main>
@endsection
