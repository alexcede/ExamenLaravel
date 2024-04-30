<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido!</title>
</head>
<body>
    @include("components.header")
    <h3>Inicia sesion como admin</h3>
    <form action="{{ route('login.post') }}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="form-group">
          <label for="nick">nick:</label>
          <input name="nick" type="text" class="@if(session('error')) is-invalid @endif" placeholder="Nick" value="{{ old('nick')}}" autofocus>
        </div>
        <div class="form-group">
          <label for="password">Contraseña:</label>
          <input name="password" type="password" class="@if(session('error')) is-invalid @endif" placeholder="Contraseña">
          @if(session('error'))
            <div class="invalid-feedback">{{ session('error') }}</div>
          @endif
        </div>
        <button type="submit">Iniciar sesion</button>
      </form>
    <br>
    @include("components.footer")
</body>
</html>
<style>
    .is-invalid {
      border: 2px solid red;
    }
    .invalid-feedback {
      color: red;
    }
  </style>