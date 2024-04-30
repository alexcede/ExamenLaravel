<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Casals</title>
</head>
<body>
    @include('components.header')
    <a href="{{ route('casal.add') }}">Agregar Nuevo Casal</a>
    <table id="casals" cellspacing="10">
        <tr>
            <td>Nom</td>
            <td>Data de inici</td>
            <td>Data final</td>
            <td>Num places</td>
            <td>Ciutat</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
        @foreach($casals as $casal)
            <tr>
                <td>{{ $casal->nom }}</td>
                <td>{{ $casal->data_inici }}</td>
                <td>{{ $casal->data_final }}</td>
                <td>{{ $casal->n_places }}</td>
                <td>{{ $casal->ciutat->nom }}</td>
                <td><a href="{{ route('casal.edit', $casal->id) }}">Editar</a></td>
                <td>
                    <form action="{{ route('casal.delete', $casal->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este casal?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{route('user.logout')}}">Cerrar sesion</a>
    @include('components.footer')
</body>
</html>