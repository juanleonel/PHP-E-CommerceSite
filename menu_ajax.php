<?php
    header('Content-type: application/json');

    if (isset($_REQUEST)) {

      include_once 'conn/conn.php';

      $stmt = $pdo->prepare('CALL spSelCategories');

      $stmt->execute();

      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $pdo = null;

      echo json_encode($data);

    }


 ?>
