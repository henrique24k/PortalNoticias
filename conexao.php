<?php
$host = "localhost:3306";
$user = "root";
$pass = "root";
$base = "noticias";

$mysqli = new mysqli($host, $user, $pass, $base);

if ($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}

$con = mysqli_connect($host, $user, $pass, $base);

echo "<br/> Conexão ok.<br/>";
mysqli_close($con);

?>