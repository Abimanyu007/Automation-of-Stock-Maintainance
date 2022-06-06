<?php
include('connection.php');
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
$sql = "INSERT INTO `register` (`date`, `bill`, `name`, `pcost`, `qty`, `tcost`, `warranty`, `stock`, `supplier`, `location`, `cond`, `type`) VALUES ('$date', '$bill', '$name', '$pcost', '$qty', '$tcost', '$warranty', '$stock', '$supplier', '$location', '$cond', '$type')";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
   
    echo "<script type='text/javascript'>alert('Submitted Successfully!')</script>";
    header( "refresh:2;view.php" );
   
}
else
{
    
    echo "<script type='text/javascript'>alert('Something Went Wrong!')</script>";
    header( "./edit.php" );
} 
?>
