<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('series.index') }}">Séries</a>
          @auth
          <a href="{{ route('logout') }}"><button class="btn btn-primary btn-sm">Sair</button></a>       
          @endauth
          @guest
            <a href="{{ route('login.index') }}"><button class="btn btn-primary btn-sm">Entrar</button></a>
          @endguest
        </div>
      </nav><div class="container">

<h1>{{ $title }}</h1>
@isset($mensagemSucesso)
<div class="alert alert-success">
    {{ $mensagemSucesso }}
</div>
@endisset
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{{ $slot }}
</div>
</body>
</html>

