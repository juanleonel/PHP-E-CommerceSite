<?php
include('topmenu.php');
$connect = mysqli_connect("localhost", "root", "gold", "shopping") or
die("Please, check your server connection.");
$tosearch=$_POST['tosearch'];
$query = "select * from products where ";
$query_fields = Array();
$sql = "SHOW COLUMNS FROM products";
// #1
$columnlist = mysqli_query($connect, $sql) or die(mysql_error());
// #2
while($arr = mysqli_fetch_array($columnlist, MYSQLI_ASSOC)){
// #3
extract($arr);
$query_fields[] = $Field . " like('%". $tosearch . "%')";
}
$query .= implode(" OR ", $query_fields);
$results = mysqli_query($connect, $query) or die(mysql_error());
echo "<table border=\"0\" >";
$x=1;
echo "<tr>";
while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
if ($x <= 3)
{
$x = $x + 1;
extract($row);
echo "<td style=\"padding-right:15px;\">";
echo "<a href=itemdetails.php?itemcode=$item_code>";
echo '<img src=' . $imagename . ' style="max-width:220px;max-height:240px;
width:auto;height:auto;"></img><br/>';
echo $item_name .'<br/>';
echo "</a>";
echo '$'.$price .'<br/>';
echo "</td>";
}





  $arrayName =  array('id' => 1, 'complete_name' => 'Juan'  );
  print_r($arrayName);
  foreach ($arrayName as $value) {
    echo $value;
  }
//  print_r($arrayName);
/*

 Array
 (
     [0] => Array
         (
             [id] => 2
             [email] => l@g.com
             [password] => $2y$10$EhiO3.PakhslIEWROe/3JO0WVXoREFxp1acpp/FCE1i4AReLscpuK
             [complete_name] => L
             [address_1] => L
             [address_2] => L
             [city] => L
             [state] => L
             [zipcode] => L
             [country] => L
             [cellphone_no] => L
         )

 )
*/




?>
