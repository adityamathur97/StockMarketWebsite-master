<?php
	require "scripts/global.php";
  mksession();
  echo '<div id="usern" style="display: none;" >'.$_SESSION['Username'].'</div>';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bank Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- Fontawesome for icons -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/bank.css">
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bank.js"></script>
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
        <h1>Your Bank Details</h1>
        <table id="my_table" class="table table-bordered table-hover">
            <thead>
              <tr class = "hrow">
                <th class="headers" scope="col">Name</th>
                <th class="headers" scope="col">Account Number</th>
                <th class="headers" scope="col">Routing Number</th>
              </tr>
            </thead>
            <!--Rows are added by JavaScript in tbody-->
            <tbody></tbody>
          </table>
      </div>
      <div class="jumbotron">
      <h1>Add or Send Money</h1>
          
          <div class="form-group">
            <label for="banks"><strong>Bank Name:</strong>
              <select id="banks" name="banks" class="form-control big" style="
    max-width: 1000px;">
            <!-- from ajax call add elements-->
              </select>
            </label>
          </div>

          <div class="form-group">
            <label for="mode"><strong>Transaction:</strong>
                <select id="mode" name="mode" class="form-control big" style="
    max-width: 1000px;">
                  <option value="+">ADD</option>
                  <option value="-">Send</option>
                </select>
            </label>
          </div>

          <div class="form-group">
            <label for="amount"><strong>Amount:</strong></label>
            <input type="number" class="form-control" id="amount" name="amount" style="
    max-width: 1000px;">
          </div>          
          
          <button id="makeTrans" class="btn btn-success" onClick="alert('Transaction done!')">OK</button>
            
      </div>
      <div class="jumbotron bankInfo">
        <h1>Add A New Bank</h1>
        <button id="addBank" class="btn btn-success">Add Bank!</button>
        <div class="bankInfo2">
          <!-- inputs for bank details -->

        <!-- <div class="form-group">
            <label for="bankName"><strong>Bank Name:</strong>
              <input type="text" class="form-control myclass" id="bankName" name="bankName" minlength="1">
            </label>
        </div>

        <div class="form-group">
            <label for="accNumber"><strong>Account Number:</strong>
              <input type="number" class="form-control myclass" id="accNumber" name="accNumber">
            </label>
        </div>

        <div class="form-group">
            <label for="routNumber"><strong>Routing Number:</strong>
              <input type="number" class="form-control myclass" id="routNumber" name="accNumber">
            </label>
        </div>

        <button class="addBankDetail btn btn-success">ADD</button> -->  
        </div>
        
      </div>
    </div>
  </body>
</html>