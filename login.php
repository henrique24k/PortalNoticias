<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: adm.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }

    }

}

if(isset($_POST['emailColunista']) || isset($_POST['senhaColunista'])) {

  if(strlen($_POST['emailColunista']) == 0) {
      echo "Preencha seu e-mail";
  } else if(strlen($_POST['senhaColunista']) == 0) {
      echo "Preencha sua senha";
  } else {

      $email = $mysqli->real_escape_string($_POST['emailColunista']);
      $senha = $mysqli->real_escape_string($_POST['senhaColunista']);

      $sql_code = "SELECT * FROM colunista WHERE email = '$email' AND senha = '$senha'";
      $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

      $quantidade = $sql_query->num_rows;

      if($quantidade == 1) {
          
          $usuario = $sql_query->fetch_assoc();

          if(!isset($_SESSION)) {
              session_start();
          }

          $_SESSION['id'] = $colunista['id'];
          $_SESSION['nome'] = $colunista['nome'];

          header("Location: colunista.php");

      } else {
          echo "Falha ao logar! E-mail ou senha incorretos";
      }

  }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Área administrativa</title>
</head>
<body>
  <h1>Área do Admin</h1>
  <form action="" method="post">
    <p>
      <label>Email</label>
      <input type="text" name="email">
    </p>
    <p>
      <label>Senha</label>
      <input type="password" name="senha">
    </p>
    <p>
      <button type="submit">Entrar</button>
    </p>
  </form>

<br><br>

  <h1>Área do Colunista</h1>
  <form action="" method="post">
    <p>
      <label>Email</label>
      <input type="text" name="emailColunista">
    </p>
    <p>
      <label>Senha</label>
      <input type="password" name="senhaColunista">
    </p>
    <p>
      <button type="submit">Entrar</button>
    </p>
  </form>
<br><br>
  <a href="index.php">Voltar</a>

</body>
</html>