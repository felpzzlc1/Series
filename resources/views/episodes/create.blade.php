<x-layout title="Nova Série">
    <form action="{{ route('episodes.store', ['season' => $season->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="season" value="{{ $season->id }}">
            
            <div class="col-8">
                <label for="descricao" class="form-label">Descrição:</label>
                <input type="text"
                       autofocus
                       id="descricao"
                       name="descricao"
                       class="form-control"
                       value="{{ old('descricao') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>
