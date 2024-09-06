<div>
    <header class="page-header">
        <h1 class="page-header__title">Идём<span>в</span>кино</h1>
    </header>

    <nav class="page-nav">
        @if ($dates)
            @foreach ($dates as $date)
                <button type="button" class="page-nav__day" wire:click="shooseDate({{ $date }})"
                    wire:key="{{ $date }}">
                    <span class="page-nav__day-number">{{ $date }}</span>
                </button>
            @endforeach
        @endif
    </nav>

    <main>
        @forelse ($schedule->unique('movie') as $movies)
            <section class="movie" wire:key="{{ $movies->movie->id }}">
                <div class="movie__info">
                    <div class="movie__poster">
                        <img class="movie__poster-image" alt="poster" src="storage/{{ $movies->movie->thumbnail }}">
                    </div>
                    <div class="movie__description">
                        <h2 class="movie__title">{{ $movies->movie->title }}</h2>
                        <p class="movie__synopsis">{{ $movies->movie->subTitle }}</p>
                        <p class="movie__data">
                            <span class="movie__data-duration">{{ $movies->movie->additional }}</span>
                        </p>
                    </div>
                </div>

                @foreach ($schedule->where('movie_id', $movies->movie->id)->unique('hall_id') as $item)
                    <div class="movie-seances__hall" wire:key="{{ $item->id }}">
                        <h3 class="movie-seances__hall-title">{{ $item->hall->title }}</h3>
                        <ul class="movie-seances__list">
                            @foreach ($item->hall->schedules->where('movie_id', $movies->movie->id)->where('hall_id', $item->hall->id) as $time)
                                <li class="movie-seances__time-block">
                                    <a class="movie-seances__time" href="{{ route('booking', $time->id) }}">
                                        {{ date_parse($time->date_time)['hour'] . ':' . date_parse($time->date_time)['minute'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </section>
        @empty
            <p>Нет сеансов</p>
        @endforelse
    </main>
</div>
