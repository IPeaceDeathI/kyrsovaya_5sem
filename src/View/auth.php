<!DOCTYPE html>
<html lang="rus">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='theme-color' content='#2ECC8A'>

    <title>Auth</title>

    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap-grid.css">
    <link rel="stylesheet" href="/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/auth.css">
    <link rel="stylesheet" href="/css/lity.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel='shortcut icon' type='images/jpeg' href='/images/icon.jpeg'>

</head>

<?php 
require_once "src/View/templates/header.php"
?>

<main>
    <section>
      <div class="box">
        <div class="square" style="--i:0;"></div>
        <div class="square" style="--i:1;"></div>
        <div class="square" style="--i:2;"></div>
        <div class="square" style="--i:3;"></div>
        <div class="square" style="--i:4;"></div>
        <div class="container1">
          <div id="form" class="form">
            <h2>Aвторизация</h2>
            <form method="POST" action="">
              <div class="inputBox">
                <input id="email" type="text" name="email" placeholder="Логин">
              </div>
              <div class="inputBox">
                <input id="password"  name="pass" type="password" placeholder="Пароль">
              </div>
              <div class="inputBox">
                <input id="auth_submit" type="submit" value="Войти" name="submit">
              </div>
              <p class="forget">Забыли пароль? <a id="auth_recover" href="#">Восстановить</a></p>
              <p class="forget">Еще нет аккаунта? <a id="auth_registration" href="#">Зарегестрироваться</a></p>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php 
require_once "src/View/templates/footer.php"
?>

<script type='text/javascript' src='/js/jquery.js'></script>
<script type='text/javascript' src='/js/bootstrap.popper.js'></script>
<script type='text/javascript' src='/js/bootstrap.js'></script>
<script type='text/javascript' src='/js/lity.js'></script>
<script type='text/javascript' src='/js/notif.js'></script>

</body>
</html>
