<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="register">

    <title>Регистрация</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </head>

<body class="text-center">
  <div class="container">
    <form class="form-signin" method="post">
      {!!csrf_field()!!}
      <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Пожалуйста, войдите</h1>
      <label for="inputEmail" class="sr-only">Email адрес</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email адрес" required autofocus>
      <label for="inputPassword" class="sr-only">Пароль</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="1" name="remember"> Запомнить
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
    </form>
  </div>
</body>

</html>