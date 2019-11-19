<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Validacion de cuenta BECATEL</title>
</head>
<body>
    <div class="container">
        <p>Hola! Se ha creado una nueva cuenta en Becatel porfavor confirma si eres tu.</p>
        <p>Si no fue usted porfavor reportelo aqui</p>
        <a href="http://localhost:3000/validFalse">No he sido yo.</a>
        <ul>
            <div class="shadow-lg p-3 mb-5 bg-white rounded">
                <li class="text-info text-center">Usuario: {{ $user->user }}</li>
                <li class="text-info text-center">Email: {{ $user->email }}</li>
                <li class="text-info text-center">Codigo: {{ $user->id }}</li>
                <li class="text-info text-center">Estado: {{ $user->state}}</li>
            </div>
        </ul>
        <p class="text-primary">Ingresa en ese link para validar la cuenta:</p>
        <ul>
            <div class="shadow-lg p-3 mb-5 bg-white rounded">
                <li class="card-title">Aplicacion: BECATEL</li>
                <li class="card-title">Este correo no debe ser respondido</li>                
                <button type="button" class="btn btn-success">
                    <a href="{{ route ('verify', $user->id)}}">Clink aqui para validar el correo</a>
                </button>
            </div>
        </ul>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>