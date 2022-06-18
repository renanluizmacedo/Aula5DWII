<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Show</title>
</head>

<body>


    <div class="container my-4">

        <h2 class="fw-bold text-uppercase">informações da Cidade</h2>

        <a class="btn btn-primary" href="{{route('cidade.index')}}">
            Voltar
        </a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>PORTE</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                <tr>
                    <td>{{ $dados['id'] }}</td>
                    <td>{{ $dados['nome'] }}</td>
                    <td>{{ $dados['porte'] }}</td>
                </tr>
            </tbody>
    </div>

</body>

</html>