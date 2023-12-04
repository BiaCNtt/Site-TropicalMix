<?php
    require 'run.php';
    $clientes = new Clientes();
    $dados = $clientes->getAll();

    $produtos = new Produtos();
    $produtos = $produtos->getAll();
?>
 
<?php require 'head.php'; ?>
<?php require 'navbar.php'; ?>

<body>
<div class="container-fluid">
<img src="images/acai.png" class="img-fluid" alt="banner">
  <div class="container text-center">
    <div class="row align-items-center">
      <p class ="texto"> Embarque nesta jornada de bem-estar e paladares exóticos, onde cada taça de açaí é 
        cuidadosamente preparada para oferecer uma explosão de frescor e vitalidade.</p>
    </div>
  </div>
  <section class="faixa"></section>  
  <h3 class = "produtostitulo">Nossos produtos<h3>
</div>

<div class="row">
        <?php foreach ($produtos as $produto) : ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body d-flex flex-column align-items-center">
                      <div class="text-center">
                          <?php if(!empty($produto['imagem'])): ?>
                              <img src="images/temporario/<?php echo $produto['imagem']; ?>" class="card-img-top img-fluid" alt="Imagem do Produto">
                          <?php else: ?>
                              <img src="images/foto_padrao.png" class="card-img-top img-fluid img-produto" alt="Imagem Padrão">
                          <?php endif; ?>
                          </div>
              
                        <h5 class="card-title"><?php echo $produto['nome']; ?></h5>
                        <!-- Preço, Quantidade, Ingredientes -->
                        <p class="card-text">
                            Preço: <?php echo $produto['preco']; ?><br>
                            Quantidade: <?php echo $produto['quantidade_em_estoque']; ?><br>
                            Descrição: <?php echo $produto['descricao']; ?>
                        </p>
                                
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>




</body>


<?php require 'footer.php'; ?>



