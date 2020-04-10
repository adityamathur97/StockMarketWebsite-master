<?php
	require "scripts/global.php";
  mksession();
  echo '<div id="auth" style="display: none;" >"'.$_SESSION['authkey'].'</div>';
  $user = $_SESSION['Username'];
  echo '<div id="usrName" style="display: none;" >'.$user.'</div>';
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Trade</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- Fontawesome for icons -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/trade.css">
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/trade.js"></script>
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
            <a class="nav-link"></a>
          </li>
          <li class="nav-item dropdown">
            <?php
           echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome <span id="usern">'.$_SESSION["Username"].'</span>
            </a>'
            ?>
            <div style="left: -95%;" class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="profile.php">Profile</a>
              <a class="dropdown-item" href="portfolio.php">Portfolio</a>
              <a class="dropdown-item" href="watchList.php">Watch List</a>
              <a class="dropdown-item" href="stockSearch.php">Stock Search</a>
              <a class="dropdown-item" href="#">Trade</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Sign Out!</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    
    <div class="container">
      <div class="jumbotron">
      <h1>Your Trade</h1>
          
            <div class="form-group">
              <label for="stockSymbol">STOCK SYMBOL</label>
              <input type="text" class="form-control" id="stockSymbol" placeholder="e.g. GOOG, FB, YHOO" minlength="1">
            </div>
            <div class="form-group">
              <label for="transMode">TRANSACTION</label>
              <select name="transMode" id="transMode" class="form-control">
                <option value="buy">Buy</option>
                <option value="sell">Sell</option>
              </select>
            </div>
            <div class="form-group">
              <label for="qty">Quantity</label>
              <input type="number" class="form-control" id="qty" placeholder="e.g. 1,2,3..." minlength="1">
            </div>
            <div class="form-group">
              <label for="qty">Date</label>
              <input type="date" class="form-control" id="date">
            </div>
            <div class="form-group">
              <label for="qty">Repeat</label>
              <input type="number" class="form-control" id="repeat">
            </div>
            <div class="form-group">
              <input type="submit" class="form-control bts" id="add" value="ADD">
            </div> 
          

          <table id="my_table" class="table table-bordered table-hover">
            <thead>
              <tr class = "hrow">
                <th class="headers" scope="col">Symbol</th>
                <th class="headers" scope="col">Transaction</th>
                <th class="headers" scope="col">Quantity</th>
                <th class="headers" scope="col">Current Price</th>
                <th class="headers" scope="col">Date</th>
                <th class="headers" scope="col">Repeat</th>
                <th class="headers" scope="col">Delete</th>
              </tr>
            </thead>
            <!--Rows are added by JavaScript in tbody-->
            <tbody></tbody>
          </table>
          <button id="proceed" class="btn btn-success">Proceed</button>
      </div>
    </div>
  </body>
</html>