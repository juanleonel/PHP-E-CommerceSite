<?php
     include_once 'conn/conn.php';
     include_once 'common/utilities.php';

    if (!isset($totalamount)) {
        $totalamount = 0;
    }
    $totalquantity = 0;
    if (!session_id()) {
        session_start();
    }

    try {
    
        $sessid = session_id();

        $sql = 'CALL spSelCart(?)';
                    
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(1, $sessid);

        $stmt->execute();

        $cart = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $totalQuantity = 0;
        $totalPrice = 0;
        unset($stmt);
        $table = '';

        if (count($cart) > 0) {

            echo ' <div class="grid grid--narrow">
                    
                    <div class="whole text-center">
                        <h1>Cart</h1>
                    </div>
                    <div class="">
                        <div id="list-products" class="whole list list--product">';
                            
                            

            foreach ($cart as $row) {
                
                $totalQuantity += $row['quantity'];
                $totalPrice += $row['total_price'];

                echo '<div class="list__item" id="'.$row['item_code'].'">
                        <img src="images/store/apparel/mens_logotype_black.png">
                        <div class="list__info">
                            <b>
                            '.$row['product_name'] .' (# '.$row['item_code'].')  
                            </b>
                            <span>
                            <form class="delete" style="display:inline;">
                                <input type="hidden" value="'.$row['product_id'].'" class="item-code" id="item-code" name="item-code">
                                <button class="btn btn-warning" >Delete Item</button> 
                            </form>
                            </span>
                        </div>
                        <div class="list__detail">
                            <input type="hidden" name="product-id-'.$row['item_code'].'" value="'.$row['item_code'].'">
                            <input type="hidden" name="price" value="'. $row['price'] .'">
                            <span class="alert--error"></span>
                            <div class="subtotal">
                                <span>$ '.number_format($row['price'],2).'</span>
                                <span>×</span>
                                    <input type="number" min="1" max="9999" step="1" value="'.$row['quantity'].'" name="quantity">
                                <span>=</span>
                                <b>$'.number_format($row['total_price'],2).'</b>
                            </div>
                        </div>
                    </div>';

            }
                         
                            

               echo         '<div class="list__footer">
                                <h4 >Sub-Total: $'.$totalPrice.'</h4>
                            </div>
                        </div>
                    </div>
                </div> ';

                echo '<div id="buttons-cart" class="col-md-12">
                        <form id="frmEmptyCart" action="cart.php" style="display:inline;">
                            <button class="btn btn-danger" value="Empty Cart"> Empty Cart </button>                    
                        </form>
                        <button class="btn btn-primary" value="Checkout"> Checkout </button>
                    </div>';
           



/*
            $table = '<table id="tableCart" class="table table-hover table-bordered">'
                    .'<thead>
                        <tr>
                            <th>Item Code</th>
                            <th>Quantity</th>
                            <th>Product name</th>
                            <th>Price</th>
                            <th>Total Price</th>                       
                        </tr>
                      </thead>' ;
            $table .= '<tbody>';   
            foreach ($cart as $row) {
                $totalQuantity += $row['quantity'];
                $totalPrice += $row['total_price'];

                $tr = '<tr data-id="'.$row['item_code'] . '" >';
                $tr .= '<td>' . $row['item_code']       . '</td>'
                    .  '<td>
                            <div class="col-md-4">
                                <input type="number" value="' . $row['quantity'] . '" class="form-control" min="1"/>
                            </div>
                        </td>'
                    .  '<td>' . $row['product_name']    . '</td>'
                    .  '<td>' . number_format($row['price'],2)           . '</td>'
                    .  '<td>' . number_format($row['total_price'],2)     . '</td>'
                    .  '<td>
                            <button class="btn btn-primary change-quantity" >Change Quantity</button> |
                            <form class="delete" style="display:inline;">
                                <input type="hidden" value="'.$row['product_id'].'" class="item-code" id="item-code" name="item-code">
                                <button class="btn btn-warning" >Delete Item</button> 
                            </form>
                        </td>';                    
                $tr .= '</tr>';
                $table .= $tr;
            }

            $table .= '<tr>
                            <td>Total</td> 
                            <td>'.$totalQuantity.'</td> 
                            <td></td> 
                            <td></td> 
                            <td>'.number_format($totalPrice ,2).'</td> 
                        </tr>';
            
            $table .= '</tbody></table>';  
             
            echo '<h3 class="text-center"> Item added. </h3>';
            echo $table;
            echo '<div>
                    You currently have '.$totalQuantity.' product(s) selected in your cart.    
                </div>';
            echo '<div class="col-md-12">
                    <form id="frmEmptyCart" action="cart.php" >
                        <button class="btn btn-danger" value="Empty Cart"> Empty Cart </button>                    
                    </form>
                    <button class="btn btn-primary" value="Checkout"> Checkout </button>
                </div>';*/

        }else{
                MessageWarning("Your Cart is empty");
        }
    } catch (\Exception $e){
		echo  $e->getMessage();
		die();
	}  
?>