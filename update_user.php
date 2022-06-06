<?php 
include('connection.php');
$id = $_POST['id'];
$date = date("Y-m-d H:i:s");
$bill = $_POST['bill'];
$name = $_POST['name'];
$pcost = $_POST['pcost'];
$qty = $_POST['qty'];
$tcost = $_POST['tcost'];
$warranty = $_POST['warranty'];
$stock = $_POST['stock'];
$supplier = $_POST['supplier'];
$location = $_POST['location'];
$cond = $_POST['cond'];
$type = $_POST['type'];
$sql = "UPDATE `register` SET `date`='$date', `bill`='$bill',`name`='$name',`pcost`='$pcost',`qty`='$qty',`tcost`='$tcost',`warranty`='$warranty',`stock`='$stock',`supplier`='$supplier',`location`='$location',`cond`='$cond',`type`='$type' WHERE `register`.`id` = '$id'";
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