<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../css/login.css">
</head>

<body>
  <div class="login-container">
    <div class="login-header">
      <h2>Login</h2>
    </div>
    <form class="login-form" action="../validateLogin.php" method="post">
      <input type="email" name="email" class="input-field" placeholder="Email" required>
      <input type="password" name="password" class="input-field" placeholder="Password" required>
      <input type="submit" value="Login" class="submit-button">
      <p>
        Não tem conta ?
        <a href="tela-cadastro.php" class="signup-link">Criar uma</a>
      </p>
    </form>
  </div>
</body>

</html>