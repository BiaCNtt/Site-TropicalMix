<?php
    require 'run.php';
    $produtos = new produtos();
    $dados = $produtos->getAll();
?>
    
    <?php require 'head.php'; ?>
    <?php require 'navbar.php'; ?>

    <div class="container" id="formulario">          
        <h3>Cadastro de Produtos</h3>
        <form method="POST" action="Adicionarproduto.php" enctype="multipart/form-data" class="custom-form">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Produto">
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="preco" class="form-label">Preço:</label>
                        <input type="text" class="form-control" id="preco" name="preco" placeholder="Preço do Produto">
                    </div>
                    <div class="col-md-6">
                        <label for="quant" class="form-label">Quantidade:</label>
                        <input type="number" class="form-control" id="quant" name="quant" placeholder="Quantidade em estoque">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="ingP" class="form-label">Descrição:</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição do produtos">
            </div>
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem:</label>
                <input type="file" class="form-control" id="imagem" name="imagem" accept="images/*" placeholder="Imagem do Produto">
            </div>
            <div class = "botaoproduct"><button type="submit" class="btn">Cadastrar</button> </div>
            
        </form>
    </div>
</div>

<?php require 'footer.php'; ?>