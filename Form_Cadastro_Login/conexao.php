<?php
define('HOST','localhost');
define('db','db_teste');
define('USER','root');
define('PASS','');



try{
$pdo = new PDO('mysql:host='. HOST.';dbname='.db,USER,PASS);
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
echo '<h1>Erro ao conectar!</h1>';
}
?>