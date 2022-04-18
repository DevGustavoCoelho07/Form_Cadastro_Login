<?php require_once 'Classes.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<script>
//projeto criado em 04/10/21




function mostrarSenha(){
    const eye = document.getElementById('eye');
    const eye_slash = document.getElementById('eye-slash'); //olho
const checked = document.getElementById("eye-pass");
const inputSenha = document.getElementById("inputsenha");

    if(checked.checked){
        inputSenha.type = "password";
        eye.style.display = 'inline'; 
        eye_slash.style.display = 'none'

       
    }else{
        inputSenha.type = "text";
        eye.style.display = 'none';
         eye_slash.style.display = 'inline'
    }


}


 </script>

<style>

*{
    box-sizing:border-box;
    font-family:roboto;
}

h2{
    text-align:center;

}
body{
    background-color:#d5e0dd;
}   
.main-form{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    background-color:#d1e4ed;
    border-radius:20px;
    padding:80px;
    padding-bottom:180px;
    box-shadow:2px 3px 7px #081c26;
   
}

form{

    
}


input[type = text]{
    margin-bottom: 12px;
    border:none;
    border-radius: 7px;
    height:20px;
    outline:none;
    width:210px;
    text-align:center;

    
}


input[type = text]:hover{
border-bottom:2px solid red;
}


input[type = password]{
    text-align:center;
    width:210px;
    margin-bottom: 3px;
    height:20px;
    border:none;
    border-radius: 7px;
    outline:none;
    
}

input[type = password]:hover{
border-bottom:2px solid red;
}

input[type = submit]{
    color:white;
    background-color:#2bb587;
    outline:none;
    cursor:pointer;
    height:30px;
    width:130px;
    border:none;
    border-bottom: 2px solid white;
    border-radius:2px;
    text-align:center;
    float:right;
    margin-top:5px;
}

.content-links > a {
    top:90%;
    margin-top:4px;
    margin-bottom:10px;
    position:absolute;
    /* right:82px; */
    left:60%;
    color: #2bb587;
    text-decoration: none;
    font-size:13px;
}
.content-links > a:hover{
    text-decoration:underline;
}

.erro-login{
display:block;
text-align:center;
color:white;
background-color:#E85043;
}

.btn-cadastro{

    margin-top:17px;
    margin-bottom:8px;
    position:absolute;
    top:60%;
    left:50%;
    transform:translate(-50%,-50%);
}

#eye-senha{
    top:185px;
    left:80%;
    position:absolute;

}

#eye-senha > input{
    
    left:0%;
    position:absolute;

}
#eye-pass{
    display:none;
}

#eye-slash{
    display:none;
}



</style>



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