<?php
// Inicia a sessão para usar carrinho de compras
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>

    <!-- Inclui a fonte Google 'Croissant One' para uso posterior -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Croissant+One&display=swap" rel="stylesheet">
    <!-- Inclui o arquivo CSS externo -->
    <link rel="stylesheet" href="css\estilo.css">
</head>

<body>
    <!-- Título e subtítulo da página -->
    <p class="title">Cursos.com</p>
    <p class="subTitle">Cursos de Programação Online</p>
    
    <!-- Container para os itens do carrinho -->
    <div class="carrinho-container">
        <?php
        // Array com os itens disponíveis
        $itens = array(
            ['nome' => 'IA para gestão empresarial', 'imagem' => 'img1.png', 'preco' => '100'],
            ['nome' => 'IA aplicada a educação', 'imagem' => 'img2.png', 'preco' => '50'],
            ['nome' => 'IA como ferramenta de marketing.', 'imagem' => 'img3.png', 'preco' => '85'],
            ['nome' => 'IA para ciência de dados.', 'imagem' => 'img4.png', 'preco' => '110']
        );
        
        // Loop para exibir cada item do array
        foreach ($itens as $key => $value) {
            ?>
            <!-- Exibindo cada produto -->
            <div class="produto">
                <img src="<?php echo $value['imagem'] ?>">
                <!-- Nome do produto -->
                <h2>
                    <?php echo $value['nome'] ?>
                </h2>
                <!-- Preço do produto -->
                <p class="preco">
                    <?php echo 'R$ ' . $value['preco'] . '.99' ?>
                </p>
                <!-- Link para adicionar o produto ao carrinho -->
                <a href="?adicionar=<?php echo $key ?>">Adicionar ao carrinho!</a>

            </div><!--produto-->
            <?php
        }
        ?>
    </div><!--carrinho-container-->

    <?php
    // Verifica se o usuário está tentando adicionar um item ao carrinho
    if (isset($_GET['adicionar'])) {
        // Vamos adicionar ao carrinho
        $idProduto = (int) $_GET['adicionar'];
        if (isset($itens[$idProduto])) {
            if (isset($_SESSION['carrinho'][$idProduto])) {
                $_SESSION['carrinho'][$idProduto]['quantidade']++;
            } else {
                $_SESSION['carrinho'][$idProduto] = array(
                    'quantidade' => 1,
                    'nome' => $itens[$idProduto]['nome'],
                    'preco' => $itens[$idProduto]['preco']
                );
            }

        } else {
            die('Você não pode adicionar um item que não existe.');
        }
    }
    ?>
    <!-- Título do carrinho -->
    <p id="carrinho" class="title">Carrinho</p>

    <?php
    if (isset($_SESSION['carrinho'])) {
        foreach ($_SESSION['carrinho'] as $key => $value) {
            echo '<div class="carrinho-item">';
            print '<p>Nome: ' . $value['nome'] . '| Quantidade: ' . $value['quantidade'] . '| Preço: ' . ($value['quantidade'] * $value['preco']) . ' </p>';
            echo '</div>';
        }
    }

     // Verifica se existem itens no carrinho 
     // cria um formulário para cada um
    if (isset($_SESSION['carrinho'])) {
        ?>
        
        <!-- Formulário para cadastrar o item -->
        <form action="cadastrar.php" method="get">
            <!-- Campos ocultos com os detalhes do item -->
            <input type="hidden" name="nome" value="<?php echo $value['nome'] ?>">
            <input type="hidden" name="preco" value="<?php echo $value['preco'] ?>">

            <?php
            $_GET['nome'] = $value['nome'];
            $_GET['preco'] = $value['preco'];
            
            // Inclui o arquivo cadastrar.php
            include_once("cadastrar.php"); 
            ?>

        </form>
    <?php }
    ?>
</body>
</html>