<?php
    require 'run.php';
    $clientes = new Clientes();
    $dados = $clientes->getAll();
?>
 
<?php require 'head.php'; ?>
<?php require 'navbar.php'; ?>

<body>
<div class="container-fluid">
<img src="images/banner.png" class="img-fluid" alt="banner">
  <div class="container text-center">
    <div class="row align-items-center">
      <p class ="texto"> Embarque nesta jornada de bem-estar e paladares exóticos, onde cada taça de açaí é 
        cuidadosamente preparada para oferecer uma explosão de frescor e vitalidade.</p>
    </div>
  </div>
  <section class="faixa"></section>  
  <h3 class = "produtostitulo">Nossos produtos<h3>
</div>

</body>


<?php require 'footer.php'; ?>



