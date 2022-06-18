<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Create</title>
</head>

<body>
    <div class="container m-4">
        <h2 class="fw-bold text-uppercase">Cadastro de Cidade</h2>

        <a class="btn btn-primary" href="{{route('cidade.index')}}">
            VOLTAR
        </a>

        <form action="{{ route('cidade.store') }}" method="POST">
            @csrf

            <div class="my-4">
                <input class="form-control" type='text' name='nome' placeholder="NOME">
            </div>
            <div class="mb-4">
                <input class="form-control" type='text' name='porte' placeholder="PORTE">

            </div>

            <input class="btn btn-success" type="submit" value="Salvar">
        </form>
    </div>

</body>

</html>