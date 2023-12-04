<?php
session_start();

if (isset($_GET['id_produto'])) {
    $idProduto = $_GET['id_produto'];

    if (!empty($_SESSION['carrinho'])) {
        foreach ($_SESSION['carrinho'] as $index => $item) {
            if ($item['id_produto'] == $idProduto) {
                // Remove completamente o item do carrinho
                unset($_SESSION['carrinho'][$index]);
                break; // Interrompe o loop após encontrar o item a ser removido
            }
        }
    }
                // Redireciona de volta para a página do carrinho
                header("Location: Carrinho.php");
                exit();
            }

// Se o ID do produto não for fornecido ou o produto não for encontrado no carrinho, redirecione para o carrinho
header("Location: Carrinho.php");
exit();
?>
