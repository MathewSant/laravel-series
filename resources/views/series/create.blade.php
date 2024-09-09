<x-layout title="Nova Série">
<!-- Create Post Form -->
<form action="{{ route('series.store') }}" method="POST">
    @csrf   
    <div class="row mb-3">
    <div class="col-8">
        <label class="form-label" for="nome">Nome:</label>
        <input class="form-control" autofocus type="text" name="nome" id="nome" 
        value="{{ old('nome') }}">
    </div>
    <div class="col-2">
        <label class="form-label" for="seasonsQtd">N de Temporadas:</label>
        <input class="form-control" type="text" name="seasonsQtd" id="seasonsQtd" 
        value="{{ old('seasonsQtd') }}">
    </div>
    <div class="col-2">
        <label class="form-label" for="episodes">Eps / Temporada:</label>
        <input class="form-control" type="text" name="episodes" id="episodes" 
        value="{{ old('episodes') }}">
    </div>
</div>
    <button type="submit" class="btn btn-primary mt-2">Adicionar</button>
    </form>
</x-layout>