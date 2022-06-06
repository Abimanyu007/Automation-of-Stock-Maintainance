<?php 
include('connection.php');
$date = date("Y-m-d H:i:s");
$bill = $_POST['bill'];
$name = $_POST['name'];
$qty = $_POST['qty'];
$cost = $_POST['cost'];
$warranty = $_POST['warranty'];
$stock = $_POST['stock'];
$supplier = $_POST['supplier'];
$location = $_POST['location'];
$type = $_POST['type'];
$sql = "INSERT INTO `register` ( `date`, `bill`, `name`, `qty`, `cost`, `warranty`, `stock`, `supplier`, `location`, `type`) VALUES ( '$date', '$bill', '$name', '$qty', '$cost', '$warranty', '$stock', '$supplier', '$location', '$type')";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
       
    );
    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );
    echo json_encode($data);
} 

?>