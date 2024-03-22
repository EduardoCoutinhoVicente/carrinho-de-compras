<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="stylesheet" href="css\cadastrar.css">
</head>
<body>
<?php

//chama a pagina para conectar com o banco
include_once("conectar.php");

    // Coleta os dados do formulário
    
    $nome = $_GET['nome'];
    $preco = $_GET['preco'];
  
    
    
   // Realiza a consulta ao banco de dados
    $sql = "INSERT INTO carrinho (nome, preco) VALUES ";
    $sql .= "('$nome', '$preco' )";

    if (mysqli_query($strcon, $sql)) {
        echo "<p>curriculo cadastrado com sucesso!</p>";
    } else {
        echo "<p>Erro ao tentar cadastrar curriculo  : " . mysqli_error($strcon) . "</p>";
    }

     // Fecha a conexão com o banco de dados
    mysqli_close($strcon); 
?>
<form method="post" action="principal.php">
    <button type="submit" name="consultar">Voltar ao início</button>
</form>
<p>
        <a href="logout.php">Sair</a>
    </p>
</body>
</html>
