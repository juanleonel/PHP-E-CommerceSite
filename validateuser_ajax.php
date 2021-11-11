<?php
 
    include_once 'common/utilities.php';

    $datos = GetRequestAjax();
     

    if (isset($datos)) {
        
        include_once 'conn/conn.php';
        
        $email = $datos["email"];
        $password = $datos["password"];
         
        $stmt = $pdo->prepare('CALL spLoginCustomer(?);');

        $stmt->bindParam(1, $email);

        $stmt->execute();
  
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
  

        $pdo = null;
        
        if($data){
            if(PasswordVerify($password, $data["password"])){
                session_start();
                $_SESSION['data'] =  $data;
                
                echo json_encode( array("status" => 1, "message" => "permitido", "route" => "index.php" ));

            }else{
                echo json_encode( array("status" => 1, "message" => "invalido") );
            }
        }else{
            echo json_encode( array("status" => 1, "data" => $data) );
        }
        
        
       
    }