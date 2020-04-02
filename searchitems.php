<?php

    include_once 'conn/conn.php';

    $method = $_SERVER['REQUEST_METHOD'];

    if ($method === 'POST' && isset($method)){

      $param = $_REQUEST['criteria'];

      $stmt = $pdo->prepare('CALL spSelProducts(?);');

      $stmt->bindParam(1, $param);

      $stmt->execute();

      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $pdo = null;

      foreach ($data as $row) {
        echo ' <div class="col-lg-4">
        <img class="img-circle" src="' . $row['image_name'] . '" alt="Generic placeholder image" width="140" height="140">
        <h2>' . $row['product_name'] . '</h2>
        <p>' . $row['description'] . '</p>
        <p>' . '$' . number_format( $row['price'] ). '</p>
        <p>
        <a class="btn btn-default" href="itemdetails.php?itemcode=' . $row['category_href'] . '" role="button">View details &raquo;</a>
        </p>
        </div>
        ';

        echo "";
      }


    }

?>
