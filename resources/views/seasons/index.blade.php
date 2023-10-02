<x-layout title="Séries">
        <div class="text-center mb-sm-4">
            <h1>{!! $series->nome !!}</h1>
        </div>
    <div class="d-flex justify-center">
        <img src="{{ asset('storage/' . $series->cover) }}"
             style="height: 250px"
             alt="Capa da série"
             class="img-fluid">
    </div>

    <div class="description-box">
        <p>{{ $series->descricao }}</p>
    </div>

    <ul class="list-group my-sm-3">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a class="text-decoration-none series-name" href="{{ route('episodes.index', $season->id) }}">
                    Temporada {{ $season->number }}
                </a>

                <span class="badge bg-secondary">
                    {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>
