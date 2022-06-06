<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Stock Maintainance</title>
    <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/6bf2318a4c.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css"/>
    <link rel="stylesheet" href="style2.css"/>
    <link rel="stylesheet" href="style3.css"/>
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
          <a class="nav-link disabled" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./view.php">View Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./edit.php">Add Entry</a>
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
<div id="welcome" class="container text-center heading">


<h1>Welcome to Dashboard,<?php echo $usr; ?></h1>


<div class="card-group">
  <div class="card">
    <img src="./images/edit.png" class="card-img-top" alt="..." width="300px" height="250px" style="justify-content:center">
    <div class="card-body">
      <h5 class="card-title"><a href="./view.php">View Stock Register</a></h5>
      <p class="card-text">View the list of entries</p>
     
    </div>
  </div>
  <div class="card">
    <img src="./images/flame.png" class="card-img-top" alt="..." width="300px" height="250px" style="justify-content:center">
    <div class="card-body">
      <h5 class="card-title"> <a href="./edit.php">Add Entry to Register</a></h5>
      <p class="card-text">Add Entry</p>

    </div>
  </div>

</div>

</div>|
<div class="navbar fixed-bottom"></div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



</body>

</html>
