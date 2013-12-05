<?php
require_once('../config.php');
if(!empty($_POST['name']) && !empty($_POST['waka']) && !empty($_POST['address'])){
  $name = htmlspecialchars($_POST['name']);
  $waka = htmlspecialchars($_POST['waka']);
  $address = htmlspecialchars($_POST['address']);
  $name = mb_convert_encoding($name,'UTF-8');
  $waka = mb_convert_encoding($waka,'UTF-8');
  $address = mb_convert_encoding($address,'UTF-8');
  try{  
    $pdo = new PDO('mysql:dbname='.DB_NAME.';host='.DB_URL,DB_HOST, DB_PASS);
    $sql = 'INSERT INTO `wakamon`(`name`, `waka`, `create_date`, `address`) VALUES (?,?,now(),?)';
    $stmt = $pdo -> query("SET NAMES utf8;"); 
    $stmt = $pdo->prepare($sql);
    $flag = $stmt->execute(array(
      $name,
      $waka,
      $address
    ));
    if($flag){
      echo true;
    }else{
      echo false;
    }
  }catch(PDOException $e){
    print('データベースに接続出来ませんでした'.$e->getMessage());
    die(); 
  }
}else{
  echo 'error1';
}
?>
