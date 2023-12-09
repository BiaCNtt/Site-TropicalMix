<?php
// Conectando ao banco de dados e recebendo os dados dos produtos
require 'run.php';
    $produtos = new Produtos();
    $produtos = $produtos->getAll();
?>
<?php require 'head.php'; ?>
<?php require 'navbar.php'; ?>

<main class="container mt-5" id="formulario">
    <br><h1 class="produtoscad">Produtos cadastrados</h1><br>
    <div class="row">
        <?php if(count($produtos) > 0): ?>
            <?php foreach ($produtos as $produto) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                    <!-- comentario -->
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="text-center">
                                <?php if(!empty($produto['imagem'])): ?>
                                    <img src="images/temporario/<?php echo $produto['imagem']; ?>" class="card-img-top img-fluid" alt="Imagem do Produto">
                                <?php else: ?>
                                    <img src="images/foto_padrao.png" class="card-img-top img-fluid img-produto" alt="Imagem Padrão">
                                <?php endif; ?>
                            </div>
                            <!-- Nome do Produto -->
                            <h5 class="card-title"><?php echo $produto['nome']; ?></h5>
                            <!-- Preço, Quantidade, Ingredientes -->
                            <p class="card-text">
                                Preço: <?php echo $produto['preco']; ?><br>
                                Quantidade: <?php echo $produto['quantidade_em_estoque']; ?><br>
                                Descrição: <?php echo $produto['descricao']; ?>
                            </p>
                            <a id="botaoexcluir" href="excluirproduto.php?id_produto=<?php echo $produto['id_produto']; ?>" onclick="return confirm('Deseja excluir esse produto?');" class="btn btn-danger">
                            Excluir
                            </a>
                                            
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<?php require 'footer.php'; ?>
