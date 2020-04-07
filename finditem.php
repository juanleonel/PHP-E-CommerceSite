<?php
     include_once 'conn/conn.php';
    

    if ($_REQUEST && isset($_REQUEST['Id'])) {
        
        $id =  $_REQUEST['Id'];        
       
        $sql = 'CALL spSelProductDetails(?)';
        
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(1, $id);

        $stmt->execute();

        $product = $stmt->fetch(PDO::FETCH_ASSOC);

       // var_dump($product);

        if ($product) {
            
            echo '
                    <div class="col-md-4 col-sm-4">
                        <div  class="thumbnail">
                            <img src="https://www.am-design.es/Content/img/Bootstrap1.png" alt="...">
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <form method="post" action="cart.php" >
                            <input type="hidden" value="' .$product['Id']. '">
                            <div class="thumbnail">                        
                                <h1>' . $product['product_name'] . '</h1>                       
                                <div class="caption">
                                    <h3>' . $product['category_name'] . '</h3>
                                    <p>' . $product['description'] . '</p>
                                    <p>' . $product['item_code'] . ',' . $product['weight'] . '</p>
                                    <div class="">
                                        <label class=""> Quantity</label>
                                        <div class="">
                                            <input class="" type="number" min="1">
                                        </div>                                    
                                    </div>                                    
                                        <label class=""> Price: </label> <strong>  $ ' . number_format($product['price']) . ' </strong>                                
                                    <p>
                                    <button type="submit" class="btn btn-default">Buy Now</button>
                                    <button type="submit" class="btn btn-primary">Add Cart</button>                                    
                                    
                                    </p>            
                            </div>                  
                        </form>
                    </div>
                ';
        }else{
            echo '
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Warning!</strong> Any result
            </div>';
        }
    }else{
      
        echo '
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Warning!</strong> Any result
        </div>';
    }


?>