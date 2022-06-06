<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Stock Maintenance</title>
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
<h1 class="login-head">STOCK MAINTENANCE APP</h1>
</div>

<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $query    = "SELECT * FROM `users` where email='$username' AND password= '" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        $sqlselect = "SELECT * FROM `users` where email='$username' AND password= '" . md5($password) . "'";
        $rslt = mysqli_query($con, $sqlselect);
        $row = mysqli_fetch_assoc($rslt);
        if ($rows == 1) {
            $role =$row['role'];
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
<div name="form" class="container form-floating mb-3 ff" >

<form action = "" method = "post" name="login">
    <div name="email" class="ff2">
    <div class="form-floating mb-3">
  <input  name="username" type="text" class="form-control email" id="floatingInput" placeholder="i">
  <label for="floatingInput"> <i class="fa-solid fa-square-envelope"></i> Email address</label>
</div>
</div>

<br>

<div name="pass" class="ff2">

<div class="form-floating">
  <input name="password" type="password" class="form-control pass" id="passw" placeholder="Password">
  <label for="passw"><i class="fa-solid fa-key"></i> Password</label>

</div></input>
<br>

<div class="shps">
<input type="checkbox" onclick="myFunction()"> Show Password
</div>
</div>

<br>
<div class="text-center">
<input class="btn btn-outline-dark buttonz"
       type="submit"
       value="Login">
</div>
</form>


</div>
<?php
    }
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>