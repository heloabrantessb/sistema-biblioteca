<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprovante de devolução</title>
</head>

<body>

    <body>
        <h1>Comprovante de Devolução</h1>
        <p><strong>Usuário:</strong> {{ $usuario->name }} (CPF: {{ $usuario->cpf }})</p>
        <p><strong>Livro:</strong> {{ $livro->titulo }}</p>
        <p><strong>Data do Empréstimo:</strong> {{ $emprestimo->data_inicio }}</p>
        <p><strong>Data da Devolução:</strong> {{ $emprestimo->data_fim_real }}</p>
    </body>
</body>

</html
