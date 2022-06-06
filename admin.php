<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Admin Panel</title>
       <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/6bf2318a4c.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet">
        <script src="script.js"></script>
        <link rel="stylesheet" href="style.css"/>

</head>
<body>

<div id="welcome" class="container text-center heading">
<h1>ADMIN PANEL</h1>
</div>

<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (role, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form succmsg'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='index.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='admin.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
  
<div name="form" class="container form-floating mb-3 ff input-icons">
<form method="post" action="" class="form">

<div class="form-control ff2">
<label for="role"><i class="fa-solid fa-user"></i> Choose a Role:</label>
<select class="form-control" name="username" id="cars">
  <option value="staff">Staff</option>
  <option value="hod">HOD</option>
  <option value="dean">Dean</option>
  <option value="assistant">Assistant</option>
</select>
</div>
<br>
    <div name="email" class="ff2">
    <div class="form-floating mb-3">
  <input  name="email" id="email" type="email" class="form-control email" id="floatingInput" placeholder="name@example.com">
  <label for="floatingInput"> <i class="fa-solid fa-square-envelope"></i> Email address</label>
</div>
</div>
<br>

<div name="pass" class="ff2">
<div class="form-floating">
  <input  type="password" name="password" class="form-control pass" id="passw" placeholder="Password">
  <label for="passw"><i class="fa-solid fa-key"></i> Password</label>
</div></input><br>
<div class="shps">
<input type="checkbox" onclick="myFunction()"> Show Password
</div>
    </div>
<br>

<div class="text-center">
<input class="btn btn-outline-dark buttonz"
       type="submit"
       value="Submit">
</div>
  
</form>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<?php
    }
?>
</body>
</html>