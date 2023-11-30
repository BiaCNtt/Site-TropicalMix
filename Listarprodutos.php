<?php
// Conectando ao banco de dados e recebendo os dados dos produtos
require 'run.php';
    $produtos = new Produtos();
    $produtos = $produtos->getAll();
?>
<?php require 'head.php'; ?>
<?php require 'navbar.php'; ?>

<main class="container mt-5" id="formulario">
    <br><h1 class="text-center">Produtos cadastrados</h1><br>
    <div class="row">
        <?php foreach ($produtos as $produto) : ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <?php
                    // Exibindo a imagem se existir
                    if (!empty($produto['imagem'])) {
                        echo '<img src="images/temporario' . $produto['imagem'] . '" class="card-img-top img-fluid" alt="Imagem do Produto">';
                    } else {
                        // Se não houver imagem, exibe essa imagem
                        echo '<img src="images/foto_padrao.png" class="card-img-top img-fluid" alt="Imagem Padrão">';
                    }
                    ?>
                    <div class="card-body d-flex flex-column align-items-center">
                        <!-- Nome do Produto -->
                        <h5 class="card-title"><?php echo $produto['nome']; ?></h5>
                        <!-- Preço, Quantidade, Ingredientes -->
                        <p class="card-text">
                            Preço: <?php echo $produto['preco']; ?><br>
                            Quantidade: <?php echo $produto['quantidade_em_estoque']; ?><br>
                            Descrição: <?php echo $produto['descricao']; ?>
                        </p>
                        <a href="excluirproduto.php?id_produto=<?php echo $produto['id_produto']; ?>" onclick="return confirm('Deseja excluir esse produto?');" class="btn btn-danger">
						Excluir
						</a>
                                           
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php require 'footer.php'; ?>
