
<form action="{{ $action }}" method="POST">
    @csrf
    @if($update)
        @method('PUT')
    @endif
    <div>
        <label class="form-label" for="nome">Nome:</label>
        <input class="form-control" type="text" name="nome" id="nome" 
        @isset($nome)
            value="{{ $nome }}"        
        @endisset>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Adicionar</button>
    </form>