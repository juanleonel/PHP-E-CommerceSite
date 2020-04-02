<?php
    include_once 'conn/conn.php';


    if(isset($_POST))
    {



      try {

        $stmt = $pdo->prepare("CALL spLoginCustomer(?)");

        $email          = $_POST['email'];
        $password       = $_POST['password'];

        $stmt->bindParam(1, $email);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;

        if (count($data) > 0 && verifyPassword($password, $data[0]['password']) ){
            echo '<p class="bg-primary">> Welcome ' . $data[0]['complete_name'] . ' to our Shopping Mall </p> <br> ';
        }else{
          $msg = 'Invalid Email address and/or Password <br> Not registered?
                    <a href="validatesignup.php"> Click here </a> to register.
                    <br>
                    <br>
                    <br>
                    Want to Try again
                    <br>
                    <a href="signin.php">Click here</a> to try login again.
                    <br>
                  ';

            echo $msg;
        }


      } catch (\Exception $e) {
        print "Error: ".$e->getMessage() ."<br/>";
      }

    }


    function verifyPassword($pwd, $hash)
    {
       return password_verify($pwd, $hash);
    }
?>
