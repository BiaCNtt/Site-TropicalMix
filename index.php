<?php
    require 'run.php';
    $clientes = new Clientes();
    $dados = $clientes->getAll();
?>

<?php require 'head.php'; ?>
<body>
<?php require 'navbar.php'; ?>


<?php require 'footer.php'; ?>



