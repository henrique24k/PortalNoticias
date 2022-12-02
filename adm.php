<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Admnistrador</title>
</head>
<body>
    <h1>Área do Admnistrador</h1>
    <form method="post">
        Id :<input type="text" name="id"> 
            <button name="enviar">Deletar</button>
    </form>

    <a href="index.php">Home</a>

</body>
</html>

<?php

$host = "localhost:3306";
$user = "root";
$pass = "root";
$base = "noticias";

$con = mysqli_connect($host, $user, $pass, $base);


$id = $_POST ['id'];
$res2 = mysqli_query ($con, "select * from arquivos where id = $id");

#echo "$res2 [0]";

$contalinha = $res2->num_rows;
echo $contalinha;

    if($contalinha>0)
    {
        $res = mysqli_query($con,"delete from arquivos where id = $id");
        echo "deletado";
    }
    else
    {
        echo "nao deletado";
    }

?>
