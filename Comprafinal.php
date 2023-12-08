<?php
    require 'run.php';
    $clientes = new Clientes();
    $dados = $clientes->getAll();
?>

<?php require 'head.php'; ?>

<?php
$mtdpagamento;
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

<div class="container text-center">
  <div class="row align-items-start">
    <div class="col">
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
        <button type="submit" class="btn btn-success" >Confirma</button>
   
    </div>
    <div class="col">
<h3>Forma de pagamento</h3>
  <div class="form-check">
    <input class="form-check-input" type="radio" value="dinheiro" name="mtdpagamento" id="flexRadioDefault1">
    <label class="form-check-label" for="flexRadioDefault1">Dinheiro</label><br>

    <input class="form-check-input" type="radio" value="pix" name="mtdpagamento" id="flexRadioDefault2">
    <label class="form-check-label" for="flexRadioDefault2">PIX</label><br>

    <input class="form-check-input" value="debito" type="radio" name="mtdpagamento" id="flexRadioDefault3">
    <label class="form-check-label" for="flexRadioDefault3">Cartão de Débito</label><br>

    <input class="form-check-input" type="radio" value="credito" name="mtdpagamento" id="flexRadioDefault4">
    <label class="form-check-label" for="flexRadioDefault4">Cartão de Crédito</label><br>
  </div>
  </div>
</div>  
</form>
</main>
<?php require 'footer.php'; ?>