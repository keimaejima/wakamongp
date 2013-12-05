<?php
require_once('../config.php');
  try{  
    $pdo = new PDO('mysql:dbname='.DB_NAME.';host='.DB_URL,DB_HOST, DB_PASS);
    $sql = 'select * from wakamon order by id desc limit 5';
    $pdo -> query("SET NAMES utf8;"); 
    $stmt = $pdo -> query($sql); 
    $i = 0; 
    $data = Array();  
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
      $data[$i] = $result; 
      $i++; 
    } 
    echo json_encode($data);
  }catch(PDOException $e){
    print('データベースに接続出来ませんでした'.$e->getMessage());
    die(); 
  }
?>
