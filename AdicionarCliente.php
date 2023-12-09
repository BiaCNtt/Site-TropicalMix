<?php  
    require './run.php'; 
    $produtos = new Produtos();

   
    
    
//enviando os valores pelo metodo post que ta pegando do form
    $nome      = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $celular =  $_POST['celular'];
    $endereco  = $_POST['endereco'];
    $email= $_POST['email'];
    
    $clientes = new Clientes(); 
    $clientes->cadastro($nome, $cpf, $celular, $endereco, $email); //cadastra no banco

    $mtdpagamento; 
    if (isset($_POST['mtdpagamento'])) {
        $mtdpagamento = $_POST['mtdpagamento'];
    } else {
        echo "Erro: Método de pagamento não selecionado.";
    }    


//parte que calcula a quantidade do item do carrinho pelo id

    foreach ($_SESSION['carrinho'] as $item) {
        $id_produto          = intval($item['id_produto']);
        $quantidade_carrinho = intval($item['quantidade']);
        $dados = $produtos->get($id_produto);
        $quantidade_em_estoque = intval($dados['quantidade_em_estoque']);
        // Calcula a nova quantidade disponível após a compra
        $qtddisponivel = $quantidade_em_estoque - $quantidade_carrinho;
       if($qtddisponivel>0){
        $produtos->atualizar_estoque($id_produto,$qtddisponivel);
       }
       else{
        echo "Quantidade não disponivel";
       }

       if(isset($_SESSION['carrinho'])){
        unset($_SESSION['carrinho']);  
       }  
       header("Location: obrigado.php");
        exit;


 
    
} 

       
       
    
?>

