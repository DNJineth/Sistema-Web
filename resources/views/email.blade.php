<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecimiento de contraseña</title>
</head>
<body>
    <h1>Restablecimiento de contraseña</h1>
    <p>Nombre: {{$estudiante["Nombres_completos"]}}</p>
    <p>Correo: {{$estudiante["correo"]}}</p>
    <p>Se le ha enviado un correo electrónico con un enlace para restablecer su contraseña.</p>
    <a href='{{$estudiante["codigo"]}}'>{{$estudiante["codigo"]}}</a>
</body>
</html>
