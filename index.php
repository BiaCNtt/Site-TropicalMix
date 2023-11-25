<?php
    require 'run.php';
    $clientes = new Clientes();
    $dados = $clientes->getAll();
?>

<?php require 'head.php'; ?>

<html>

<body>
<?php require 'navbar.php'; ?>


</body>
</html>



