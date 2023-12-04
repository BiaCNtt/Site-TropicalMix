<?php
require 'run.php';
$produtos = new Produtos();


/* function verificaExtrapolacao($id_produto, $quantidade_em_estoque) {
    $quantidade_em_estoque = obterQuantidadeDoBanco($id_produto);
    // Verifica se a nova quantidade ultrapassa a quantidade armazenada no banco
    if ($quantidade > $quantidade_em_estoque) {
        echo "Extrapolação detectada! A nova quantidade é maior do que a quantidade armazenada no banco.";
        return true; // Extrapolação detectada
    } else {

        return false;
    }
}

 */


if (isset($_POST['adicionar'])) {
    // Verifique se o ID do produto foi fornecido
    if (isset($_POST['id_produto'])) {
        $id_produto = $_POST['id_produto'];

        // Obtenha as informações do produto com base no ID usando o método get() existente
        $produto_info = $produtos->get($id_produto);

        // Verifica se o carrinho já contém o produto
        $produto_existente = false;
        if (!empty($_SESSION['carrinho'])) {
            foreach ($_SESSION['carrinho'] as &$item) {
                if ($item['id_produto'] == $id_produto) {
                    // Produto já existe no carrinho, soma a quantidade com o valor digitado pelo usuário
                    $novo_valor = $_POST['quantidade']; // Substitua pelo campo no formulário
                    $item['quantidade'] += $novo_valor;
                    $produto_existente = true;
                    break;
                }
            }
        }

        //valor passado pelo usuario.
        $quantidade      = $_POST['quantidade'];
        if (!$produto_existente) {
            $_SESSION['carrinho'][] = [
                'id_produto' => $produto_info['id_produto'],
                'nome' => $produto_info['nome'],
                'preco' => $produto_info['preco'],
                'quantidade'=> $quantidade
            ];
        }

        header("Location: Comprar.php");
       
    } 
} 
?>
