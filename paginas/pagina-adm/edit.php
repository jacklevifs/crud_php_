<?php
session_start();
include_once "../../connect.php";
if (!isset($_SESSION["email"]) || !isset($_SESSION["password"])) {
  header("Location: ../tela-login.php");
  exit();
}


if (!empty($_GET["id"])) {
  $id = $_GET["id"];

  $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";
  $result = $conexao->query($sqlSelect);

  if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $nome = $row["nome"];
      $email = $row["email"];
      $password = $row["password"];
      $nivel_acesso = $row["nivel_acesso"];
    }
  } else {
    header("Location: dash-adm.php");
    exit();
  }
} else {
  header("Location: dash-adm.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Produto</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
  <style>
    body {
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 100%;
      max-width: 400px;
      box-sizing: border-box;
    }

    .form-header {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-header h2 {
      color: #df2c14;
      margin: 0;
    }

    .user-form .form-group {
      margin-bottom: 15px;
    }

    .input-field,
    .select-field {
      width: 100%;
      padding: 10px;
      border: 1px solid #c61a09;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .input-field::placeholder {
      color: #c61a09;
    }

    .select-field {
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='6' viewBox='0 0 12 6'%3E%3Cpath d='M6 0L0 6h12L6 0z' fill='%23c61a09'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 10px center;
    }

    .submit-button {
      background-color: #df2c14;
      color: #ffffff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
      text-align: center;
      display: block;
      width: 100%;
      margin-bottom: 10px;
      transition: background-color 0.3s;
    }

    .submit-button:hover {
      background-color: #c61a09;
    }

    .back-link {
      display: inline-block;
      text-align: center;
      padding: 10px 20px;
      background-color: #ffffff;
      color: #df2c14;
      border: 1px solid #df2c14;
      border-radius: 5px;
      text-decoration: none;
      transition: background-color 0.3s, color 0.3s;
    }

    .back-link:hover {
      background-color: #df2c14;
      color: #ffffff;
    }
  </style>
</head>

<body>
  <div class="form-container">
    <div class="form-header">
      <h2>Editar Usuário</h2>
    </div>
    <form class="user-form" action="saveEdit.php?id=<?php echo $id; ?>" method="post">
      <div class="form-group">
        <input type="text" id="name" name="nome" class="input-field" placeholder="Nome" required value="<?php echo htmlspecialchars($nome); ?>">
      </div>
      <div class="form-group">
        <input type="email" id="email" name="email" class="input-field" placeholder="Email" required value="<?php echo htmlspecialchars($email); ?>">
      </div>
      <div class="form-group">
        <input type="password" id="password" name="password" class="input-field" placeholder="Senha" required value="<?php echo htmlspecialchars($password); ?>">
      </div>
      <div class="form-group">
        <select name="nivel_acesso" id="role" class="select-field" required>
          <option value="2" <?php echo $nivel_acesso == 2 ? "selected" : ""; ?>>Cliente</option>
          <option value="1" <?php echo $nivel_acesso == 1 ? "selected" : ""; ?>>Admin</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" class="submit-button">Salvar</button>
        <a href="dash-adm.php" class="back-link">Voltar</a>
      </div>
    </form>
  </div>
</body>

</html>