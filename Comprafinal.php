<?php
    require 'run.php';
    $clientes = new Clientes();
    $dados = $clientes->getAll();
?>

<?php require 'head.php'; ?>

<?php

// Inicializa o preço total como zero
$precoTotal = 0;
// Verifica se a chave 'carrinho' está definida na sessão
if (isset($_SESSION['carrinho'])) {
    // Calcula o preço total de todos os produtos no carrinho
    foreach ($_SESSION['carrinho'] as $item) {
        // Converte as strings para números (ponto flutuante)
        $precoItem = floatval($item['preco']);
        $quantidade = intval($item['quantidade']);

        // Calcula o preço total do item
        $precoTotal += $precoItem * $quantidade;
    }
}?>

<html>
    <main>
    <br><h1 class="text-center">Meu pedido</h1><br>
<table class="table">
    <thead>
        <tr>
            <th>Produto</th>
            <th>Preço Unitário</th>
            <th>Quantidade</th>
            <th>Preço Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($_SESSION['carrinho'])) {
            foreach ($_SESSION['carrinho'] as $item) :
        ?>
                <tr>
                    <td><?php echo $item['nome']; ?></td>
                    <td>R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></td>
                    <td><?php echo $item['quantidade']; ?></td>
                    <td>R$ <?php echo number_format(floatval($item['preco']) * intval($item['quantidade']), 2, ',', '.'); ?></td>
                </tr>
        <?php endforeach;} ?>
    </tbody>
</table>
<div class="text-right">
    <h4 class = "tituloprecototal"><strong>Preço Total: R$<?php echo number_format($precoTotal, 2, ',', '.'); ?></strong></h4>
</div>
<div class="col-md-6">
    <h3>Informe seus dados</h3>
    <form method="POST" action="AdicionarCliente.php">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" required placeholder="Seu nome">
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" class="form-control" name="cpf" id="cpf" required placeholder="Seu CPF">
            </div>
        </div>
        <div class="mb-3">
        <label for="celular" class="form-label">Celular</label>
        <input type="tel" class="form-control" id="celular" name="celular"placeholder="Informe seu celular" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco" required placeholder="Seu endereço">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name ="email" required placeholder="Seu email">
        </div>
        <button type="submit" class="btn btn-success" >Enviar</button>
    </form>
</div>
</div>
        </div>
</main>
<?php require 'footer.php'; ?>