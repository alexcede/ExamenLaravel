<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Casal</title>
</head>
<body>
    @include('components.header')
    <form action="{{ route('casal.update', $casal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nom">Nombre:</label>
        <input type="text" name="nom" value="{{ $casal->nom }}" required>
        @if ($errors->has('nom'))
            <div class="invalid-feedback">{{ $errors->first('nom') }}</div>
        @endif
        <br>
        <label for="data_inici">Fecha de inicio:</label>
        <input type="date" name="data_inici" value="{{ $casal->data_inici }}" required>
        @if ($errors->has('data_inici'))
            <div class="invalid-feedback">{{ $errors->first('data_inici') }}</div>
        @endif
        <br>
        <label for="data_final">Fecha final:</label>
        <input type="date" name="data_final" value="{{ $casal->data_final }}" required>
        @if ($errors->has('data_final'))
            <div class="invalid-feedback">{{ $errors->first('data_final') }}</div>
        @endif
        <br>
        <label for="n_places">Número de plazas:</label>
        <input type="number" name="n_places" value="{{ $casal->n_places }}" required>
        @if ($errors->has('n_places'))
            <div class="invalid-feedback">{{ $errors->first('n_places') }}</div>
        @endif
        <br>
        <label for="id_ciutat">Ciudad:</label>
        <select name="id_ciutat" required>
            @foreach($ciutats as $ciutat)
                <option value="{{ $ciutat->id }}" {{ $casal->id_ciutat == $ciutat->id ? 'selected' : '' }}>
                    {{ $ciutat->nom }}
                </option>
            @endforeach
        </select>
        <br>
        <button type="submit">Guardar cambios</button>
    </form>
    <a href="{{route('user.logout')}}">Cerrar sesion</a>
    <br>
    <a href="{{route('user.casals')}}">Volver atras</a>
    <br>
    <a href="{{ route('casal.add') }}">Agregar Nuevo Casal</a>
    @include('components.footer')
</body>
</html>
<style>
.invalid-feedback {
    color: red;
}
</style>