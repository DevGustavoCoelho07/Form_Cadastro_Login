<?php



class PdoConnect {
    
  private static $pdo;
  public static function conectar(){
      if(self::$pdo == null){
try{
      self::$pdo = new PDO("mysql:host=localhost;dbname=db_teste",'root','');
      }catch(Exception $e){
          echo 'Falha na conexão';
      }
          
          
  }
  return self::$pdo;
}
  
}
 

// Class UsuarioOnline {
  


//   public static function online(){
//       if(isset($_SESSION['online'])){
//           $token=$_SESSION['online'];
//           $horario_atual= date('Y-m-d H:i:s');
//           $sql = PdoConnect::conectar()->prepare("UPDATE `tb_users.online` set ultima_acao = ? where token = ? ");
//           $sql->execute(array($ip,$horario_atual,$token));
  
//         } else{
//           $_SESSION['online'] = uniqid();
//           $ip = $_SERVER['REMOTE_ADDR'];
//           $token = $_SESSION['online'];
//           $horario_atual= date('Y-m-d H:i:s');
//           $sql = PdoConnect::conectar()->prepare("INSERT INTO `tb_users.online` values (null,?,?,?)");
          
//           $sql->execute(array($ip,$horario_atual,$token));
//       }
  
//       } }

      ?>