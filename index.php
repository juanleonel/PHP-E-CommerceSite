<?php
  session_start();


  if(empty($_SESSION['data']))
  {
    header('Location: signin.php');
  }
  
    header('Location: itemlist.php');
  

 ?>

Welcome to Home Page
