<?php require_once 'Classes.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>


<script type="text/javascript" src="hideShowPassword.js"></script>




<?php
session_start();

$_SESSION['logado'] = false;



?>
<body >
<div class="main-form" >
<h2>Cadastro</h2>

<form name="formulario" action="index.php" method="post"  >



<!-- <label>Nome</label> -->
 <input type="text" name="nome" id="nome-form" placeholder= "Informe um Nome de Usuário" ><br>



<!-- <label>Senha</label> --><input type="password" name="senha"   placeholder= "Informe um senha" id="inputsenha"  ><br>
<div id="eye-senha"  >
<label for="eye-pass"><i class="far fa-eye" id="eye"></i></label>
<label for="eye-pass"><i class="far fa-eye-slash" id="eye-slash"></i></label>
<input type="checkbox" name="eye-check" id="eye-pass" checked onclick="mostrarSenha();"   ><br>

</div>
<div class="btn-cadastro" >
<input type="submit" name="cadastrar-login" value="Cadastrar" ></div>
</form>



<div class= "content-links">
<a href="login.php">Ja possui uma Conta ?</a>
</div>
</div>
<script src="https://kit.fontawesome.com/cbf4951b43.js" crossorigin="anonymous"></script>


<?php

// require_once './conexao.php';


// $envia = $_POST['envia'];


if(isset($_POST['cadastrar-login'])){

   
    $nome = $_POST['nome'];
    $senha = md5($_POST['senha']);
    $erro = [];



    
      if(empty ($nome) || !isset($nome) && empty ($_POST['senha']) || !isset($_POST['senha'])){
        $erro[] = "Preencha todos os campos";
       
        
      }


     if(empty ($nome) ||!isset($nome)){
        $erro[] = "Você precisa informar um nome";
    }
     if(empty ($_POST['senha']) ||!isset($_POST['senha'])){
        $erro[] = "Informe sua senha";
    }
     

     

       
     


        if(!empty ($erro)){
            foreach($erro as $err){
                echo "<li>$err</li>";
                
        }
      
    }  else{
        $sql = PdoConnect::conectar()->prepare("INSERT INTO `tb_login.clientes` values (null,?,?,0)");
        $sql->execute(array($nome,$senha));
    }

// if($nome && $senha){
     
      

// }else{
//     echo '<div class="erro-login">Um ou mais campos devem ser preencidos</div>';

// }
          

}
    

     


 



?>



</body>
</html>




<?php
if(isset($_GET['desloguei'])){
    // session_start();
    unset($_SESSION['logado']);
    session_destroy();
    header('Location: index.php');
    
}

?> 