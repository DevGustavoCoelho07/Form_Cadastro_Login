<?php
// require_once './conexao.php';
// require_once 'conexao.php';
require_once './Classes.php';
session_start();



if(isset ($_POST['logar-login'])){  
$nome = $_POST['nome'];
$senha = md5($_POST['senha']);
$sql = PdoConnect::conectar()->prepare("SELECT * FROM `tb_login.clientes` WHERE nome = ? and senha = ?");
$sql->execute(array($nome,$senha));
if($sql->rowCount() == 1 ){ //rowCount() quer dizer ---> Se a querry retornar 1
    $teste = $sql->fetch();
    $_SESSION['logado'] = true;
    $_SESSION['nome'] = $nome;
    $_SESSION['senha'] = $senha;
    $_SESSION['cargo'] = $teste['cargo'];
   
   header('Location: logar.php');
   
   die();
    }else{echo '<div class="erro-login"> Nome ou senha inválidos </div>';}
   
}
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="hideShowPassword.js"></script>
    <!-- projeto criado em 04/10/21 -->
    <title>Document</title>
</head>
<style>
*{
    margin:0;
}
.erro-login{
display:block;
text-align:center;
color:white;
background-color:#E85043;
}

form{
    display:flex;
   
    flex-direction:column;
    align-items:center;
}
.form-content{
    display:flex;
    flex-direction:column;
    justify-content:center;
    height:500px;
}

a{
margin-top:40px;

}

</style>
<body>




<!-- <h1>Bem vindo ao painel <//?php echo $_SESSION['nome']; ?></h1>   -->



<div class="main-form">
<h2>Login</h2><br>
<form  method="post" >
<span>Nome</span><input type="text" name="nome"><br>
<div class="ss">

<div id="eye-senha"  >
<label for="eye-pass"><i class="far fa-eye" id="eye"></i></label>
<label for="eye-pass"><i class="far fa-eye-slash" id="eye-slash"></i></label>
<input type="checkbox" name="eye-check" id="eye-pass" checked onclick="mostrarSenha();"   ><br>
</div>
<span>Senha</span><input type="password" id="inputsenha" name="senha"><br>
<input type="submit" name="logar-login" value="Logar">
<a class="content-links" href="index.php">Ainda não possui uma Conta ?</a>

</form>
</div>
<script src="https://kit.fontawesome.com/cbf4951b43.js" crossorigin="anonymous"></script>

</body>



</html>


