<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Cidade</title>
</head>

<body>
    <div class="container m-4">
        <h2 class="fw-bold text-uppercase">Lista de Cidade</h2>
        <a class="btn btn-primary" href="{{ route('cidade.create') }}">
            Nova Cidade
        </a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>PORTE</th>
                    <th>INFO</th>
                    <th>EDITAR</th>
                    <th>REMOVER</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($cidades as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['nome'] }}</td>
                    <td>{{ $item['porte'] }}</td>
                    <td>
                        <a class="btn btn-warning material-symbols-outlined " href="{{ route('cidade.show', $item['id']) }}">
                            Info
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-primary material-symbols-outlined " href="{{ route('cidade.edit', $item['id']) }}">
                            build
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('cidade.destroy', $item['id']) }}" method="POST">

                            @csrf
                            @method('DELETE')
                            <button class="material-symbols-outlined btn btn-danger" type='submit'>
                                delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/scripts.js') }}" type="text/javascript"></script>

</body>

</html>