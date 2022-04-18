<?php
// require_once './conexao.php';
require_once 'conexao.php';
session_start();



if(isset ($_POST['logar-login'])){  
$nome = $_POST['nome'];
$senha = md5($_POST['senha']);
$sql = $pdo->prepare("SELECT * FROM `tb_login.clientes` WHERE nome = ? and senha = ?");
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

</style>
<body>




<!-- <h1>Bem vindo ao painel <//?php echo $_SESSION['nome']; ?></h1>   -->


<h2>Login</h2>

<form  method="post" >
<span>Nome</span><input type="text" name="nome"><br>
<span>Senha</span><input type="password" name="senha"><br>
<input type="submit" name="logar-login" value="Logar">
</form>
<a href="index.php">Ainda não possui uma Conta ?</a>
</body>



</html>


