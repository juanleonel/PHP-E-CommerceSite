<?php

    include_once 'conn/conn.php';

    $stmt = $pdo->prepare('CALL spSelProducts');

    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


    foreach ($data as $row) {
      echo '<div class="row">
              <div class="col-lg-4">
                <img class="img-circle" src="' . $row['image_name'] . '" alt="Generic placeholder image" width="140" height="140">
                <h2>' . $row['product_name'] . '</h2>
                <p>' . $row['description'] . '</p>
                <p>' . $row['price'] . '</p>
                <p>
                  <a class="btn btn-default" href="#" role="button">View details &raquo;</a>
                </p>
              </div>
            </div>';

      echo "<br>";
    }

?>
