<x-layout title="Séries" :mensagem-sucesso="$mensagemSucesso">
@auth
<a class="btn btn-primary mb-2" href="{{ route('series.create') }}">Adicionar</a>
@endauth

<ul class="list-group">
    @foreach ($series as $serie)
    <li class="list-group-item d-flex justify-content-between">

        @auth<a href="{{ route('seasons.index', $serie->id) }}">@endauth
            {{ $serie->nome }}
        @auth</a>@endauth
        @auth
        <div class="d-flex align-items-center">
            <div>
                <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-info btn-sm me-2">Editar</a>
            </div>
            <div class="text-danger fw-bolder">
                <form method="post" action="{{ route('series.destroy', $serie->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        X
                    </button>            
                </form>
            </div>
        </div>     
        @endauth
       
    </li>

    @endforeach
</ul>

</x-layout>

