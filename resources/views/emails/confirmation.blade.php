<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Confirmatito email</title>
  </head>
  <body>
    <h1>Confirme su email</h1>
     <a href='{{ url("register/confirm/{$user->token}") }}'>Confirmar</a>
  </body>
</html>
