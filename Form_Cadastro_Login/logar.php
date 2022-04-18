<?php 
require_once './Classes.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php

date_default_timezone_set('America/Sao_Paulo');




// UsuarioOnline::online();
session_start();
$_SESSION['logado']= true;




//se existir sessao login....


//faça aquele sql

//pode dar echo em SESSIONS , precisa ser exatamente o mesmo nome
?>






 <h1>Bem vindo ao painel <?php echo $_SESSION['nome']; ?></h1>


  <h5>Cargo de <?php echo cargos($_SESSION['cargo']); ?></h5>   
    <a href="index.php?desloguei">Sair</a>
</body>
</html>


<?php
function cargos($c){
    $arr = [
    "0" => "Usuário",
    "1" => "Administrador"
];  
    // valores do banco atribuídos aos seus respectivos nomes

    return $arr[$c]; 
}

// impede que o usuário acesse diretamente
if(!isset($_SESSION['nome']) && (!isset($_SESSION['cargo']))){
    $_SESSION['logado'] = false;
    if( $_SESSION['logado'] = false);{
        header('Location: index.php');
        }
}

?>

