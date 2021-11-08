<?php
     include_once 'conn/conn.php';
     include_once 'common/utilities.php';

    if ($_REQUEST && isset($_REQUEST['Id'])) {
         
        try{
             
            $id = session_status $_REQUEST['Id'];        
        
            $sql = 'CALL spSelProductDetails(?)';
            
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(1, $id);

            $stmt->execute();

            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            unset($stmt);
            
        // var_dump($product);
            if ($product) {
                

                echo '
                        <div class="col-md-4 col-sm-4">
                            <div  class="">
                                <img src="https://www.am-design.es/Content/img/Bootstrap1.png" alt="...">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <form method="post" action="cart.php" id="frmAddCart" class="form-horizontal">
                                <input type="hidden" name="iproductoid" id="iproductoid" value="' .$product['Id']. '">
                                <div class="">                        
                                    <div class="col-md-6">
                                            
                                                <h1>' . $product['product_name'] . '</h1>                       
                                            
                                                <h3>' . $product['category_name'] . '</h3>
                                                <p>' . $product['description'] . '</p>
                                                <p>' . $product['item_code'] . ',' . $product['weight'] . '</p>
                    
                                                <label class=""> Quantity</label>
                                                <div class="">
                                                    <input class="form-control" value="1" type="number" name="quantity" id="quantity" min="1">
                                                </div>   
                                                
                                                <label class=""> Price: </label> <strong>  $ ' . number_format($product['price']) . ' </strong>                                
                                                <p>
                                                <button type="submit" class="btn btn-default" value="Buy Now" name="BuyNow" >Buy Now</button>
                                                <button type="submit" class="btn btn-primary" value="Add Cart" name="AddCart" >Add Cart</button>                                    
                                                
                                                </p> 
                                                                            
                                            
                                        </div>            
                                    </div> 
                                </div>               
                            </form>
                        </div>
                    ';
            }else{
                MessageWarning("Hubo un problema");
            }

        }catch(Exception $e){
            MessageWarning("Hubo un problema");
            die();
        }

        
    }else{
       
        MessageWarning("Hubo un problema");
    }

    

?>