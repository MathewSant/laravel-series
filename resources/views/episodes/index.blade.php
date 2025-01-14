<x-layout title="Episódios" :mensagem-sucesso="$mensagemSucesso">
    <form method="post" action="{{ route('episodes.update', $season->id) }}"> 
  
        @csrf
        @method('PUT')
        <ul class="list-group">
            @foreach ($episodes as $episode)
            <li class="list-group-item d-flex justify-content-between">
                Episódio: {{ $episode->number }}
                <input type="checkbox" name="episodes[]" value="{{ $episode->id }}"
                @if ($episode->watched) checked @endif/>
            </li>
            @endforeach
        </ul>

        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
</x-layout>
