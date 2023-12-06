
<?php require 'head.php'; ?>

<html>
    <main>
                <!-- Formulário de Cadastro -->
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