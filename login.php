<?php
    require 'run.php';
    $clientes = new Clientes();
    $dados = $clientes->getAll();
?>

<?php require 'head.php'; ?>

<html>
    <main>
        <div class="container mt-5" id="formulario">
            <div class="row">
                <!-- Formulário de Login -->
                <div class="col-md-6">
                    <h3>Login</h3>
                    <form>
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="loginEmail" placeholder="Seu email">
                        </div>
                        <div class="mb-3">
                            <label for="loginSenha" class="form-label">Senha:</label>
                            <input type="password" class="form-control" id="loginSenha" placeholder="Sua senha">
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                    <a href="cadastro.php">Cadastre-se aqui</a>
                </div>

</html>
    