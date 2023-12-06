<?php
// Inicia a sessão
session_start();

// Limpa as variáveis de sessão relacionadas ao carrinho
session_unset();

// Destroi a sessão
session_destroy();
// Redireciona de volta para a página do carrinho ou para onde você desejar
echo '<script>alert("O carrinho foi limpo"); window.location.href = "Carrinho.php";</script>';
?>
