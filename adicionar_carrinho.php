<?php
require 'run.php';
$produtos = new Produtos();

if (isset($_POST['adicionar'])) 
    if (isset($_POST['id_produto'])) {
        $id_produto = $_POST['id_produto'];
        // Obtem as informações do produto com base no ID usando o método get() existente
        $produto_info = $produtos->get($id_produto);
        $produto_existente = false;
        
        if (!empty($_SESSION['carrinho'])) {
            foreach ($_SESSION['carrinho'] as &$item) {
                if ($item['id_produto'] == $id_produto) {
                
                    $novo_valor = $_POST['quantidade']; 
                    $item['quantidade'] += $novo_valor;
                    $produto_existente = true;

                    // Verificar se a quantidade no carrinho é maior do que a registrada no banco
                    if ($item['quantidade'] > $produto_info['quantidade_em_estoque']) {
                        // Quantidade no carrinho é maior do que a quantidade em estoque, corrige para o valor maximo do estoque
                        $item['quantidade'] = $produto_info['quantidade_em_estoque'];

                    }
                    break;
                }
            }
        }

        //valor que o usuario digitou pelo usuario.
        $quantidade = $_POST['quantidade'];

        if (!$produto_existente) {
            if ($quantidade > $produto_info['quantidade_em_estoque']) {
                $quantidade = $produto_info['quantidade_em_estoque'];   //valor que o usuario colocar so vai ficar 
                                                                        //a quantidade maxima do estoque, irá somar até a quantidade max
            }

            $_SESSION['carrinho'][] = [
                'id_produto' => $produto_info['id_produto'],
                'nome' => $produto_info['nome'],
                'preco' => $produto_info['preco'],
                'quantidade' => $quantidade
            ];
        }
    }


        header("Location: Comprar.php");
       


?>
