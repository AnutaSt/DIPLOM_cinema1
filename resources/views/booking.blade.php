@extends('layouts.guest')

@section('content')
    <main>
        <section class="buying">
            <form action="{{ route('ticket') }}" method="post">
                @csrf
                <div class="buying__info">
                    <div class="buying__info-description">
                        <h2 class="buying__info-title">{{ $booking->movie->title }}</h2>

                        <p class="buying__info-start">
                            Начало сеанса:
                            {{ date_parse("$booking->date_time")['hour'] . ':' . date_parse("$booking->date_time")['minute'] }}
                        </p>

                        <p class="buying__info-hall">{{ $booking->hall->title }}</p>
                    </div>

                    <div class="buying__info-hint">
                        <p>Тапните дважды,<br>чтобы увеличить</p>
                    </div>
                </div>

                <div class="buying-scheme">
                    <p class="shoose-places">Выберите места</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif

                    <div class="buying-scheme__wrapper">
                        @foreach ($booking->hall->hall_rows as $row)
                            <div class="buying-scheme__row">
                                @foreach ($row->columns as $column)
                                    @if ($column->status == 'busy')
                                        <span class="buying-scheme__chair buying-scheme__chair_taken"></span>
                                    @else
                                        @switch($column->view)
                                            @case('standart')
                                                <input class="check-chair" type="checkbox" name="{{ $column->column }}"
                                                    id="check-chair{{ $column->id }}">
                                                <label for="check-chair{{ $column->id }}"
                                                    class="buying-scheme__chair buying-scheme__chair_standart"></label>
                                            @break

                                            @case('vip')
                                                <input class="check-chair" type="checkbox" name="{{ $column->column }}"
                                                    id="check-chair{{ $column->id }}">
                                                <label for="check-chair{{ $column->id }}"
                                                    class="buying-scheme__chair buying-scheme__chair_vip"></label>
                                            @break
                                        @endswitch
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    </div>

                    <div class="buying-scheme__legend">
                        <div class="col">
                            <p class="buying-scheme__legend-price"><span
                                    class="buying-scheme__chair buying-scheme__chair_standart"></span> Свободно (<span
                                    class="buying-scheme__legend-value">{{ $price->price_for_standart }}</span>руб)</p>
                            <p class="buying-scheme__legend-price"><span
                                    class="buying-scheme__chair buying-scheme__chair_vip"></span> Свободно VIP (<span
                                    class="buying-scheme__legend-value">{{ $price->price_for_vip }}</span>руб)</p>
                        </div>

                        <div class="col">
                            <p class="buying-scheme__legend-price"><span
                                    class="buying-scheme__chair buying-scheme__chair_taken"></span> Занято</p>
                            <p class="buying-scheme__legend-price"><span
                                    class="buying-scheme__chair buying-scheme__chair_selected"></span> Выбрано</p>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="movie_title" value="{{ $booking->movie->title }}">
                <input type="hidden" name="movie_time"
                    value="{{ date_parse("$booking->date_time")['hour'] . ':' . date_parse("$booking->date_time")['minute'] }}">
                <input type="hidden" name="movie_hall" value="{{ $booking->hall->title }}">

                <button type="submit" class="acceptin-button">Забронировать</button>
            </form>
        </section>
    </main>
@endsection
