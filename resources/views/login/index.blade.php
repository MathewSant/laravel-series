<x-layout title="Login">
    <form method="post" action="{{ route('signin') }}"> 
        @csrf 
        <div class="form-group mt-2">
            <label class="form-label" for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email">
            <label for="passwd" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password">
            <input type="submit" class="btn btn-primary mt-3" value="Entrar">

            <a href="{{ route('users.create') }}" class="btn btn-secondary mt-3">Registrar</a>
        </div>
    </form>
</x-layout>