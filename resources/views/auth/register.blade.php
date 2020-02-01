
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="register">

    <title>Регистрация</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/dashboard.css">
  </head>

<body class="text-center">
  <div class="container">
    <form class="form-signin" method="post">
      {!!csrf_field()!!}
      <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Пожалуйста, зарегистрируйтесь</h1>
      <label for="inputEmail" class="sr-only">Email адрес</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email адрес" required autofocus>
      <label for="inputPassword" class="sr-only">Пароль</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="1" name="remember"> Запомнить
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Регистрация</button>
    </form>
  </div>
</body>

</html>