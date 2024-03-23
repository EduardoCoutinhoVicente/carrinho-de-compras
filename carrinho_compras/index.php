 <?php
    session_start();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="CSS\index.css">
    <link rel="stylesheet" href="CSS/teste1.css">
    <link rel="stylesheet" href="CSS\teste2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Croissant+One&display=swap" rel="stylesheet">

</head>
<body>
    <h2 class="title">REDRAGONS CURSOS</h2>
    <section class="carrinho-container">
        
<?php
   $items = array(['nome'=> 'Curso 1','imagem'=>'imgs\item1.jpg','preco'=>'200'],
   ['nome'=> 'Curso 2','imagem'=> 'imgs\item2.jpg','preco'=>'100'],
   ['nome'=> 'Curso 3','imagem'=> 'imgs\item3.jpg','preco'=>'400'],
   ['nome'=> 'Curso 4','imagem'=> 'imgs\item4.jpg','preco'=>'500']);

   foreach($items as $key => $value){
?>
   <section class="produto">
    <img src="<?php echo $value ['imagem']?>" />
    <a class="button" href="?adicionar=<?php echo $key ?>">Adicionar ao carrinho!</a>

   </section><!--produto-->


    <?php
   }
   ?>
   </section><!--carrinho-container-->

   <?php
   if(isset($_GET['adicionar'])){ //adicionar ao carrinho.
        $idProduto = (int) $_GET['adicionar'];
      
        if(isset($items[$idProduto])){
            

            if(isset($_SESSION['carrinho'][$idProduto])){
                $_SESSION['carrinho'][$idProduto]['quantidade']++;
            }else{
            
               $_SESSION['carrinho'][$idProduto] = array('quantidade'=>1, 'nome'=>$items[$idProduto]['nome'],'preco'=>$items[$idProduto]['preco']);
        }
        echo '<script>alert("O item foi adicionado ao carrinho.");</script>';
    }else{
            die('Você não pode adicionar um item que não existe');
        }

   }

   ?>

<h2 class="title2"> Produtos Selecionados</h2>

<?php 
if(isset($_SESSION['carrinho'])){
     foreach ($_SESSION['carrinho'] as $key => $value) {
          
         echo '<div class="carrinho-item">';
    print '<p>Nome: '.$value['nome'].'|Quantidade:'.$value['quantidade'].'| Preço: '.($value['quantidade']* $value['preco']).' </p>';

    echo '</div>';
     }
 }
?>

<form action="carrinho.php" method="get">
  <input type="hidden" name="nome" value="<?php echo $value['nome'] ?>">
  <input type="hidden" name="preco" value="<?php echo $value['preco'] ?>">
  <input type="hidden" name="quantidade" value="<?php echo $value['quantidade'] ?>">
  <button class="button2" type="submit" name ="Salvar">Salvar no Carrinho</button>
   </form>

   </body>
</html>

