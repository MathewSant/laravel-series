<x-layout title="Novo Usuário">
    <form method="post" action="{{ route('users.store') }}">
        @csrf
        <div class="form-group mt-2">
            <label class="form-label
            " for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name">
            <label class="form-label
            " for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email">
            <label class="form-label
            " for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password">
            <input type="submit" class="btn btn-primary mt-3" value="Registrar">
        </div>
    </form>
</x-layout>