<?php
session_start(); 
if (empty($_SESSION['carrinho'])) {
    // Carrinho já está vazio, exibe mensagem de aviso
    echo '<script>alert("O carrinho já está vazio."); window.location.href = "Carrinho.php";</script>';
} else {
    session_unset();

    // Destroi a sessão
    session_destroy();

    echo '<script>alert("O carrinho foi limpo."); window.location.href = "Carrinho.php";</script>';
}
?>