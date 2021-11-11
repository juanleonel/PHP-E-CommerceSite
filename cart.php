<?php

	include_once 'common/utilities.php';
	
	// validar la session

	if(session_status() == PHP_SESSION_NONE)
		session_start();
	
	$data = GetRequestAjax();

 
	try {

		if (isset($data)) {
			
			include_once 'conn/conn.php';

			$quantity = "";
			$action = "";

			if(isset($data['quantity'])){
				$quantity = trim($data["quantity"]);
			}

			
			
			if($quantity == "")
				$quantity = 1;

			
			

			if($quantity <= 0){
				echo json_encode( array("status" => 1, "message" => "Quantity value is invalid" ));
				die();
			}else{

				if (isset($data['action'])) {
					$action = $data['action'];
				}

				if(isset($data['iproductoid'])){
					$productoid = $data['iproductoid'];
				}
 
			
				if ($action != 'empty') {

					$stmt = $pdo->prepare('CALL spSelProduct(?);');

					$stmt->bindParam(1, $productoid); 
	
					$stmt->execute();
			
					$result = $stmt->fetch(PDO::FETCH_ASSOC);
					unset($stmt);
					
					if (!$result) {
						echo json_encode( array("status" => 1, "message" => "Product Not Found!!" ));
						die();
					}
	
					$product_name = $result['product_name'];				
					$price = $result['price'];
					
				}


				

				if (isset($data['modified_quantity'])) {
					$modified_quantity = $data['modified_quantity'];
				}

			
			
			 


				$sessid = session_id();

				
				switch ($action) {

					case 'add':
						
							$stmt = $pdo->prepare('CALL spInsCart(?,?,?,?,?);');

							$stmt->bindParam(1, $sessid);
							$stmt->bindParam(2, $productoid);
							$stmt->bindParam(3, $quantity);
							$stmt->bindParam(4, $product_name);
							$stmt->bindParam(5, $price);
					
							$stmt->execute();
					
							$data = $stmt->fetch(PDO::FETCH_ASSOC);
							$pdo = null;
							unset($stmt);
							if($data){
								echo json_encode( array("status" => 1, "message" => "Success" ));
							}else{
								echo json_encode( array("status" => 0, "message" => "Nothing" ));
							}
							
							
						break;
					case 'change':
						
						if($modified_quantity == 0){
							
							$stmt = $pdo->prepare('CALL spDelItemCart(?,?);');

							$stmt->bindParam(1, $sessid);
							$stmt->bindParam(2, $productoid);								

							if($stmt->execute() > 0){
								echo json_encode( array("status" => 1, "message" => "Item deleted!" ));
							}else{
								echo json_encode( array("status" => 0, "message" => "Item not deleted!" ));
							}
					
							$pdo = null;

						}else {
							if($modified_quantity < 0){
								
								echo json_encode( array("status" => 1, "message" => "Invalid quantity entered" ));
								die();

							}else{
								
								$stmt = $pdo->prepare('CALL spUpdItemCart(?,?,?);');

								$stmt->bindParam(1, $sessid);
								$stmt->bindParam(2, $productoid);			
								$stmt->bindParam(3, $modified_quantity);	
		
								if($stmt->execute() > 0){
									echo json_encode( array("status" => 1, "message" => "Item updated!" ));
								}else{
									echo json_encode( array("status" => 1, "message" => "Item not updated!" ));
								}
								

								$pdo = null;
							}
						}
							
						break;
					case 'delete':
						
							$stmt = $pdo->prepare('CALL spDelItemCart(?,?);');

							$stmt->bindParam(1, $sessid);
							$stmt->bindParam(2, $productoid);								

							if($stmt->execute() > 0){
								echo json_encode( array("status" => 1, "message" => "Item deleted!", "route" => "detailcart.php" ));
							}else{
								echo json_encode( array("status" => 0, "message" => "Item not deleted!" ));
							}
					
							$pdo = null;
						
						break;
					case 'empty':
						$stmt = $pdo->prepare('CALL spEmptyCart(?);');

						$stmt->bindParam(1, $sessid); 								

						if($stmt->execute() > 0){
							echo json_encode( array("status" => 1, "message" => "Item deleted!", "route" => "detailcart.php" ));
						}else{
							echo json_encode( array("status" => 0, "message" => "Item not deleted!" ));
						}
				
						$pdo = null;
						break;
					default:
						# code...
						break;
				}

			}
	
		}

	} catch (\Exception $e){
		echo json_encode( array("status" => 0, "message" => "Oops! I have a problem! " .$e->getMessage() ));
		die();
	}

	


	 
?>