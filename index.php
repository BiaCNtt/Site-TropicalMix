<?php
    require 'run.php';
    $clientes = new Clientes();
    $dados = $clientes->getAll();
?>

<?php require 'head.php'; ?>

<?php require 'navbar.php'; ?>
<body>
<!-- 
<img src="logo.png" class="img-fluid" alt="..."> -->
<div class="container text-center">
  <div class="row align-items-center">
    <div class="col">
      One of three columns
    </div>
    <div class="col">
      One of three columns
    </div>
  </div>
</div>
    
</body>

<?php require 'footer.php'; ?>



