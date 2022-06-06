<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="./css/style01.css" />
</head>
<body>
    <div class="form">


        <h1>You have Succesfully Logged in <?php echo $_SESSION['username']; ?>! </h1><br>
        <h1>Role : <?php echo $_SESSION['role']; ?>!</h1><br>
        <h1> Redirecting to dashboard... </h1><br>
        <?php
          if ($_SESSION['role'] == "staff") {
            header( "refresh:3;url=dashboard_staff.php" );
}
else if ($_SESSION['role'] == "hod"){
    header( "refresh:3;url=dashboard_hod.php" );
}
else if ($_SESSION['role'] == "dean"){
    header( "refresh:3;url=dashboard_dean.php" );
}
else if ($_SESSION['role'] == "assistant"){
    header( "refresh:3;url=dashboard_assistant.php" );
}
?>
      <!--  <p><a href="logout.php">Logout</a></p> -->
    </div>
</body>
</html>