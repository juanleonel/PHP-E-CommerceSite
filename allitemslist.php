<?php

    include_once 'conn/conn.php';

    $category =  ($_REQUEST) ? $_REQUEST['category'] : '';

    $sql = 'CALL spSelProductsHref(?)';

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(1, $category);

    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


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

    $pdo = null;

?>
