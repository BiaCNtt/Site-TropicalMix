<?php
    require 'run.php';
    $clientes = new Clientes();
    $dados = $clientes->getAll();
?>

<?php require 'head.php'; ?>

<html>
<nav class="navbar bg-body">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="logo.png" alt="Logo" width="80" height="80" class="d-inline-block align-text-top">
    </a>
   <div class ="titulo">Tropical Mix</div> 
  </div>
</nav>

</html>