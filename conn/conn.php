<?php
  try{

   $pdo = new PDO('mysql:dbname=shoppingdb;host=localhost;','root','root');
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
   
  }catch(Exception $e){
     print "Error: ".$e->getMessage() ."<br/>";
     die();
  }
 ?>
