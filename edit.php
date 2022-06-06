<?php
include("auth_session.php");
include('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Stock Maintainance</title>
    <link href="css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/datatables-1.10.25.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css"/>
    <link rel="stylesheet" href="style2.css"/>
    <link rel="stylesheet" href="style3.css"/>
    <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 83%;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">AURCT Stock Maintainance</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./dashboard_hod.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./view.php">View Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-current="page" href="#">Add Entry</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./about.php">About</a>
        </li>
    
      </ul>

<?php
  // Define Email Address
  $email  = $_SESSION['username'];
  
  // Get the username by slicing string
  $usr = strstr($email, '@', true);
  
  // Display the username
  
?> 

      <form class="d-flex">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <p class="top-usr" style="color:white">Hey, <?php echo $_SESSION['username'];"\n"; ?>!</p>
        </li>
</ul>
     
      <a href="logout.php"><button class="btn btn-outline-light lgt" type="button">Logout</button></a>

</form>
    </div>
  </div>
</nav>
<br>

<div class="container">
  <h4 class="text-center">Add entry to register </h4>

<form id="addEntry" action="add_entry.php" method="post">
<div class="mb-3 row">
  <label for="addBillField" class="col-md-3 form-label">Bill /Invoice No :</label>
  <div class="col-md-9">
    <input type="text" class="form-control" id="addBillField" name="bill" placeholder="Eg: SL104116">
  </div>
</div>

<div class="mb-3 row">
  <label for="addNameField" class="col-md-3 form-label">Name :</label>
  <div class="col-md-9">
    <input type="text" class="form-control" id="addNameField" name="name" placeholder="HP Laptop">
  </div>
</div>

<div class="mb-3 row">
  <label for="addCostField" class="col-md-3 form-label">Cost/Unit (₹):</label>
  <div class="col-md-9">
    <input type="text" class="form-control" id="addCostPerField" name="pcost" placeholder="10000">
  </div>
</div>


<div class="mb-3 row">
  <label for="addQtyField" class="col-md-3 form-label">Quantity :</label>
  <div class="col-md-9">
    <input type="number" class="form-control" id="addQtyField" name="qty" placeholder="3">
  </div>
</div>

<div class="mb-3 row">
  <label for="addCostField" class="col-md-3 form-label"> Total Cost :</label>
  <div class="col-md-9">
    <input type="text" class="form-control" id="addCostPerField" name="tcost" placeholder="30000">
  </div>
</div>
<!-- <div class="mb-3 row">
  <label for="addCostField" class="col-md-3 form-label">Total Cost</label>
  <div class="col-md-9">
    <input type="text" class="form-control" id="addCostField" name="cost">
  </div>
</div> -->

<div class="mb-3 row">
  <label for="addWarrantyField" class="col-md-3 form-label">Warranty :</label>
  <div class="col-md-9">
    <input type="number" class="form-control" id="addWarrantyField" name="warranty" placeholder="1">
  </div>
</div>

<div class="mb-3 row">
  <label for="addStockField" class="col-md-3 form-label">Stock :</label>
  <div class="col-md-9">
    <input type="number" class="form-control" id="addStockField" name="stock" placeholder="7">
  </div>
</div>

<div class="mb-3 row">
  <label for="addSupplierField" class="col-md-3 form-label">Supplier :</label>
  <div class="col-md-9">
    <input type="text" class="form-control" id="addSupplierField" name="supplier" placeholder="HP">
  </div>
</div>

<div class="mb-3 row">
  <label for="addLocationField" class="col-md-3 form-label">Location :</label>
  <div class="col-md-9">
    <input type="text" class="form-control" id="addLocationField" name="location" placeholder="Department Office">
  </div>
</div>

<div class="mb-3 row">
<label for="addConditionField">Choose The Condition:</label>
<select id="addConditionField" name="cond" class="form-control">
<option value="Bad">Bad</option>
<option value="Average">Average</option>
<option value="Good">Good</option>
</select>
</div>

<div class="mb-3 row">
<label for="addTypeField">Choose The Type:</label>
<select id="addTypeField" name="type" class="form-control">
<option value="Consumable">Consumable</option>
<option value="Non-consumable">Non Consumable</option>
</select>
</div>

<div class="text-center">
  <button type="submit" class="btn btn-outline-dark lgt">Submit</button>
</div>
</form>



</div>




</body>
</html>