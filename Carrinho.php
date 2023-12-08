<script>
    function removerItem(id) {
        // Redireciona para removerItemCarrinho.php com o ID do produto
        window.location.href = 'excluircarrinho.php?id_produto=' + id;
    }

    function limparcarrinho() {
        // Redireciona para Limparcarrinho.php para limpar o carrinho
        window.location.href = 'Limparcarrinho.php';
    }
</script>

<?php
session_start();

// Inicializa o preço total como zero
$precoTotal = 0;
$mtdpagamento;

if (isset($_SESSION['carrinho'])) {
    // Calcula o preço total de todos os produtos no carrinho
    foreach ($_SESSION['carrinho'] as $item) {
        // Certifique-se de que 'preco' e 'quantidade' são convertidos para inteiros
        $preco = (float)$item['preco'];
        $quantidade = (int)$item['quantidade'];
        // Adiciona ao preço total
        $precoTotal += $preco * $quantidade;
    }
}

?>
    <?php require 'head.php'; ?>
    <?php require 'navbar.php'; ?>

    <main class="container mt-5" id="formulario">
        <br><h1 class="text-center">Carrinho de Compras</h1><br>

        <!-- Tabela de produtos no carrinho -->
        <table class="table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço Unitário</th>
                    <th>Quantidade</th>
                    <th>Preço Total</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Verifica se a chave 'carrinho' está definida na sessão
                if (isset($_SESSION['carrinho'])) {
                    foreach ($_SESSION['carrinho'] as $item) :
                ?>
                        <tr>
                            <td><?php echo $item['nome']; ?></td>
                            <td>R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></td>
                            <td><?php echo $item['quantidade']; ?></td>
                            <td>R$ <?php echo number_format((float)$item['preco'] * (int)$item['quantidade'], 2, ',', '.'); ?></td>

                            <td>
                                <!-- Botão "Excluir" -->
                                <button type="button" class="btn btn-danger" onclick="removerItem(<?php echo $item['id_produto']; ?>)">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path d="M16 1.75V3h5.25a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1 0-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75Zm-6.5 0V3h5V1.75a.25.25 0 0 0-.25-.25h-4.5a.25.25 0 0 0-.25.25ZM4.997 6.178a.75.75 0 1 0-1.493.144L4.916 20.92a1.75 1.75 0 0 0 1.742 1.58h10.684a1.75 1.75 0 0 0 1.742-1.581l1.413-14.597a.75.75 0 0 0-1.494-.144l-1.412 14.596a.25.25 0 0 1-.249.226H6.658a.25.25 0 0 1-.249-.226L4.997 6.178Z"></path>
                                        <path d="M9.206 7.501a.75.75 0 0 1 .793.705l.5 8.5A.75.75 0 1 1 9 16.794l-.5-8.5a.75.75 0 0 1 .705-.793Zm6.293.793A.75.75 0 1 0 14 8.206l-.5 8.5a.75.75 0 0 0 1.498.088l.5-8.5Z"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        
                <?php endforeach;
                } ?>
            </tbody>
        </table>
        <div class="text-right">
            <h4><strong>Preço Total: R$<?php echo number_format($precoTotal, 2, ',', '.'); ?></strong></h4>
            <a href="Comprafinal.php" class="btn btn-primary btn-lg">Comprar</a>
            <button type= "button" class="btn btn-primary btn-lg" onclick="limparcarrinho()">Limpar carrinho</button>
        
        </div>
    </main>

    <?php require 'footer.php';
   ?>
            </div>