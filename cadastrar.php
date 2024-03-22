<?php
// Inclui o arquivo "conectar.php" que provavelmente contém a configuração de conexão com o banco de dados.
include_once("conectar.php");

// Obtém os valores passados via método GET.
$nome = $_GET['nome'];
$preco = $_GET['preco'];

// Verifica se a conexão foi estabelecida com sucesso.
if (!$strcon) {
    die('Erro ao conectar ao banco de dados: ' . mysqli_connect_error());
}
// Monta a consulta SQL para inserir os valores na tabela "carrinho".
$sql = "INSERT INTO carrinho (nome, preco) VALUES ";
$sql .= "('$nome', '$preco' )";

// Executa a consulta SQL e verifica se foi bem-sucedida.
if (mysqli_query($strcon, $sql)) {
    echo " ";
} else {
    // Se ocorrer um erro durante a consulta, exibe uma mensagem de erro.
    echo "<p>Erro ao tentar cadastrar curriculo  : " . mysqli_error($strcon) . "</p>";
}

mysqli_close($strcon); // Fecha a conexão com o banco de dados
?>