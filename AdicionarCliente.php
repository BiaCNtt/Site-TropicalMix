<?php  //enviando os valores pelo metodo post que ta pegando do form
    $nome      = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $celular =  $_POST['celular'];
    $endereco  = $_POST['endereco'];
    $email= $_POST['email'];
    
   // Checa se o campo 'nome' não foi enviado no formulário
        require 'run.php'; // Inclui o arquivo 'run.php'
        $clientes = new Clientes(); // Cria uma instância da classe Clientes
        $clientes->cadastro($nome, $cpf, $celular, $endereco, $email); // Chama o método 'adicionar' da instância de Clientes com os parâmetros fornecidos
       
        
        $mtdpagamento; 
        if (isset($_POST['mtdpagamento'])) {
            $mtdpagamento = $_POST['mtdpagamento'];
            // Faça o que quiser com $mtdpagamento, como armazená-lo no banco de dados
            echo "Método de Pagamento Selecionado: $mtdpagamento";
        } else {
            echo "Erro: Método de pagamento não selecionado.";
        }
        
    
    
?>
