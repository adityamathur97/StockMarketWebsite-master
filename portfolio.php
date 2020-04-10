<?php 
require "scripts/global.php";
mksession();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Portfolio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- Fontawesome for icons -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/portfolio.css">
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/portfolio.js"></script>
  </head>

  <body>
    <!-- Navbar using bootstrap-->
    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
      <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
        <span class="navbar-toggler-icon"></span>
      </button>
        
      <div class="collapse navbar-collapse" id="collapse_target">
        <a class="navbar-brand" href="#"><i class="fas fa-home"></i></a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link">  </a>
          </li>
          <li class="nav-item dropdown">
          <?php
           echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome <span id="usern">'.$_SESSION["Username"].'</span>
            </a>'
            ?>
            <div style="left: -95%;" class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="profile.php">Profile</a>
              <a class="dropdown-item" href="#">Portfolio</a>

              <a class="dropdown-item" href="stocksearch.php">Stock Search</a>
              <a class="dropdown-item" href="trade.php">Trade</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/scripts/logout.php">Sign Out!</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    
    <div class="container">
      <div class="jumbotron">
      <h1>Your Portfolio</h1>
      <div class="table-responsive-md">
          <table id="my_table" class="table table-bordered table-hover">
            <thead>
              <tr class = "hrow">
                <th class="headers" scope="col">Symbol</th>
                <th class="headers" scope="col">Current Price</th>
                <th class="headers" scope="col">Quantity</th>
                <th class="headers" scope="col">Price</th>
                <th class="headers" scope="col">% Change</th>
              </tr>
            </thead>
            <!--Rows are added by JavaScript in tbody-->
            <tbody>
              
            </tbody>
          </table>
      </div>
      </div>
    </div>
  </body>
</html>