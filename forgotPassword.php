<?php
  require "scripts/connection.php";
  $Email = "";
  $html= "<h2></h2>";
  $contents = file_get_contents('http://167.172.209.156/getmob.php?user=$email');
  $mob = json_decode( $contents)[0][0];
  echo $mob;
  if (isset($_REQUEST['Email']) && isset($_REQUEST['Mob']) && (strlen($_REQUEST['Password']) == 0) ){
    $Email = $_REQUEST['Email'];
    $Mob = $_REQUEST['Mob'];
    $qry = "select EmailID,MobileNo from TblUser where EmailID='$Email' and MobileNo = '$Mob'";
    $result = $conn->query($qry);
    if($result->num_rows === 1) { 
      echo '<style type="text/css">#pass{
        visibility: visible;
      }</style>';
      $html = "<h2>$Email</h2>";       
    }else{
      echo "<script type='text/javascript'>alert('Please Enter correct EmailId and Mobile no');</script>";
    }
  }elseif (isset($_REQUEST['Password']) && isset($_REQUEST['CnfPassword']) && (strlen($_REQUEST['Password']) > 0)) {    
    $dom = new domDocument('1.0', 'utf-8'); 
    $dom->loadHTML($html); 
    $dom->preserveWhiteSpace = false; 
    $hTwo= $dom->getElementsByTagName('h2');
    echo $hTwo->item(0)->nodeValue;
    $Password = $_REQUEST['Password'];
    $CnfPassword = $_REQUEST['CnfPassword'];
    if($Password == $CnfPassword) {
      $qry = "Update TblUser SET `Password` = '$Password' where EmailID = '$Email'";    
      if($conn->query($qry) === TRUE){
        echo "<script type='text/javascript'>alert('Password has been successfully changed!');</script>"; 
        //echo '<script type="text/javascript">window.location.href = "../html/login.php";</script>';
      }else{
        echo "<script type='text/javascript'>alert('Please try again');</script>";
      }
    }else {
      echo "<script type='text/javascript'>alert('Passwords does not match');</script>";
    }   
  }else{
    echo '<style type="text/css">#pass{visibility: hidden;}</style>';
  }
?>

<html>
<head>
  <title>Forgot Password</title>
  <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- Fontawesome for icons -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <!--<link rel="stylesheet" type="text/css" href="css/forgotPassword.css">-->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>


  <link rel="stylesheet" type="text/css" href="css/forgotPassword.css">
</head>
<body>
  <!-- Navbar using bootstrap-->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
      <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
        <span class="navbar-toggler-icon"></span>
      </button>
        
      <div class="collapse navbar-collapse" id="collapse_target">
        <a class="navbar-brand" href="index.php"><i class="fas fa-home"></i></a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="login.php">Log In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Register</a>
          </li>
        </ul>
      </div>
    </nav>

  <div class="login_form">
    <form action="forgotpassword.php">
      <h1>Enter your Registered Email id and phone number to change password</h1>
      <p>Email Address</p>
      <h2 id="hid"></h2>
      <input type="text" name="Email"><br>
      <p>Registered Mobile Number</p>
      <input type="number" name="Mob"><br>
      <input type="password" name="pass"><br>

      <input type="submit" value="Change Password"><br>

      <input type="password" id="pass" name="Password" placeholder="New Password"><br>
      <input type="password" id="pass" name="CnfPassword" placeholder="Confirm New Password"><br>
      <input type="submit" value="Save" id="pass">
      <p>
    </form>
  </div>      
</body>
</html>
