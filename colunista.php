<?php

    include("conexao.php");

    if(isset($_FILES['arquivo'])){
        $arquivo = $_FILES['arquivo'];

        if($arquivo['error'])
            die("Falha ao enviar o arquivo");

        $pasta = "arquivos/";
        $nomeArquivo = $arquivo['name'];
        $novoNomeArquivo = uniqid();//dar um nome aleatorio para o arquivo para não sobrescrever
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

        if($extensao == "php")
            die("Tipo de arquivo invalido");

        $path = $pasta . $novoNomeArquivo . "." . $extensao;

            $deuCerto = move_uploaded_file($arquivo["tmp_name"], $path);
            if($deuCerto){
                $mysqli->query("INSERT INTO arquivos (nome, path) VALUES ('$nomeArquivo', '$path')") or die($mysqli->error);
                echo "Arquivo enviado com sucesso";
            }
            else
                echo "Falha ao enviar arquivo";
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do colunista</title>
</head>
<body>
    <h1>Área do colunista</h1>
    
    <form enctype="multipart/form-data" method="POST" action="">
        <h3>Digite o assunto <input type="text"> </h3>
        <p><label for="">Selecione o arquivo</label>
        <input name="arquivo" type="file"></p>
        <button name="upload" type="submit">Enviar arquivo</button>
    </form>

    <a href="index.php">Home</a>

</body>
</html>