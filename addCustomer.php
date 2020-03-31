<?php
    include_once 'conn/conn.php';


    if(isset($_POST))
    {

      try {

        $stmt = $pdo->prepare("CALL spInsCustomer(?,?,?,?,?,?,?,?,?,?)");

        $email          = $_POST['email'];
        $password       = getHashPassword($_POST['password']);
        $complete_name  = $_POST['complete_name'];
        $address1       = $_POST['address1'];
        $address2       = $_POST['address2'];
        $state          = $_POST['state'];
        $city           = $_POST['city'];
        $zip_code       = $_POST['zip_code'];
        $country        = $_POST['country'];
        $phone_no       = $_POST['phone_no'];

        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);
        $stmt->bindParam(3, $complete_name);
        $stmt->bindParam(4, $address1);
        $stmt->bindParam(5, $address2);
        $stmt->bindParam(6, $state);
        $stmt->bindParam(7, $city);
        $stmt->bindParam(8, $zip_code);
        $stmt->bindParam(9, $country);
        $stmt->bindParam(10, $phone_no);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0)
        {
         echo  "<p> Dear, " . $result[0]['complete_name'] . " your account is successfully created. </p>" ;
        }else{
          echo "Some error occurred. Please use different email address";
        }


      } catch (\Exception $e) {
        print "Error: ".$e->getMessage() ."<br/>";
      }

    }


    function getHashPassword($pwd)
    {
      return password_hash($pwd, PASSWORD_DEFAULT);
    }
?>
