<?php
include_once("conectar.php");
// Inclua o arquivo de conexão com o banco de dados (Conectar.php) aqui
// Certifique-se de que a variável $strcon seja inicializada corretamente

$nome = $_GET['nome'];
$preco = $_GET['preco'];
$quantidade = $_GET['quantidade'];
    

        $sql = "INSERT INTO cursos (nome_cursos, preco_cursos, quantidade,) VALUES ";
        $sql .= "('$nome', '$preco', '$quantidade')";

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
    
