<?php
require "scripts/global.php";
mksession();
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Search Stock</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- Fontawesome for icons -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/watchList.css">
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/watchList.js"></script>
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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome
            </a>
            <div style="left: -95%;" class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="profile.php">Profile</a>
              <a class="dropdown-item" href="portfolio.php">Portfolio</a>
              <a class="dropdown-item" href="#">Watch List</a>
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
      <h1>Search</h1>
      
      <!--<form action="">-->
          <div class="form-group">
            <!--<input type="text" class="form-control" id="symbol" placeholder="Add Share By Symbol e.g. GOOG, FB, YHOO" minlength="1">-->
            <input list="stocks" class="form-control" id="symbol" placeholder="Add Share By Symbol e.g. GOOG, FB, YHOO" minlength="1">
            <datalist id="stocks">
              <!-- load data from xml file -->

            </datalist>
          </div>
          <div class="form-group mydiv">
            <label for="bDate"><strong>Start Date:</strong><input type="date" class="form-control mydate" id="sDate" name="sDate"></label>
          </div>
          <div class="form-group mydiv ">
            <label for="bDate"><strong>Frequency:</strong><select class="form-control" id="freq" name="freq">
              <option value="0">Select</option>
              <option value="1d">Daily</option>
              <option value="1wk">Weekly</option>
              <option value="1mo">Monthly</option>
            </select></label>
          </div>
          <div class="form-group mydiv">
            <label for="eDate"><strong>End Date:</strong><input type="date" class="form-control mydate" id="eDate" name="eDate"></label>
          </div>
          <div class="form-group fullLen">
            <input type="submit" class="form-control bts" id="submit" value="Search">
          </div>
          <div class="form-group fullLen">
            <input type="reset" class="form-control bts" id="reset" value="Reset">
          </div>  
      <!--</form>-->
      <p><h3 id="currPrice">Current Price: <span id="cprice"></span></h3></p>
      <div class="table-responsive-md">
          <table id="my_table" class="table table-bordered table-hover">
            <thead>
              <tr class = "hrow">
                <th class="headers" scope="col">Date</th>
                <th class="headers" scope="col">Closing Price</th>
              </tr>
            </thead>
            <!--Rows are added by JavaScript in tbody-->
            <tbody></tbody>
          </table>
      </div>
      </div>
    </div>
  </body>
</html>