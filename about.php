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
          <a class="nav-link active" aria-current="page" href="./dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./view.php">View Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./edit.php">Add Entry</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">About</a>
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

<div class="w3-row w3-padding-64 container" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">About Stock maintainance</h1><br>
      <h5 class="w3-center">Make Data Processing  Simple</h5>
      <p class="w3-large">The Website makes Data Processing Simple</p>
      <h5 class="w3-center">Digital Register</h5>
      <p class="w3-large">The digital register reduces the manual work</p>
    </div>
  </div>
</body>
</html>