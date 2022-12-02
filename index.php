<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/noticias.png">
    <link href="css/style.css" rel="stylesheet">
    <title>The Online News</title>
</head>

<body>
    <header>
        <div class="center">
            <div class="logo"><img src="assets/noticias.png" width="20%"></div>
            <div class="menu">
                <a href="#">Home</a>
                <a href="emalta.php">Em alta</a>
                <a href="#">Entreterimento</a>
                <a href="#">Sports</a>
                <a href="#">Covid-19</a>
                <a href="login.php"><button>Àrea administrativa</button></a>
            </div>

        </div>
        
        <?php

// $login = $_POST ['login'];
// $senha = $_POST ['senha'];

$host = "localhost:3306";
$user = "root";
$pass = "root";
$base = "noticias";
$con = mysqli_connect($host, $user, $pass, $base);
$res = mysqli_query ($con, "select * from arquivos"); //consulta BD


//  executa o comando sql, no caso para pegar todos os usuários do sistema e retorna o valor da consulta em uma variável ($res)


// enquanto houver dados na tabela 
while ($arquivo = mysqli_fetch_array($res)){
    echo"</td> <td>" . $arquivo['id'] . "</td> <td>" . $arquivo['nome'] . "</td> <td>" . $arquivo['path'] . "</td> <td>" . $arquivo['data_upload'] . "</td> </tr>";

echo '<div class="container"><img src="' . $arquivo['path'] . '"/></div>';
}

echo "</table> </br> </br>";

mysqli_close($con);

?>

    <footer>
        <p>&copy Copyright 2022 | The Online News</p>
    </footer>

</body>
</html>
</footer>


</html>