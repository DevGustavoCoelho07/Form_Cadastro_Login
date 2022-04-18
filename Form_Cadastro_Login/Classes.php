<?php





Class  PdoConnect {
public static function conectar() {

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
  }

}
 

Class UsuarioOnline {
  


  public static function online(){
      if(isset($_SESSION['online'])){
          $token=$_SESSION['online'];
          $horario_atual= date('Y-m-d H:i:s');
          $sql = PdoConnect::conectar()->prepare("UPDATE `tb_users.online` set ultima_acao = ? where token = ? ");
          $sql->execute(array($ip,$horario_atual,$token));
  
        } else{
          $_SESSION['online'] = uniqid();
          $ip = $_SERVER['REMOTE_ADDR'];
          $token = $_SESSION['online'];
          $horario_atual= date('Y-m-d H:i:s');
          $sql = PdoConnect::conectar()->prepare("INSERT INTO `tb_users.online` values (null,?,?,?)");
          
          $sql->execute(array($ip,$horario_atual,$token));
      }
  
      } }

      ?>