<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Error 404</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- Fontawesome for icons -->
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    
    <style type="text/css">
      html, body{
        height: 100%;
        width : 100%;
        font-size: 1em;
        font-size: 1vw;
        font-size: 2vh;
      }
      body{
        background: url(images/error404.jpg);
        background-size: contain; 
      }
    </style>
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

              <a class="dropdown-item" href="stocksearch.php">Stock Search</a>
              <a class="dropdown-item" href="trade.php">Trade</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/scripts/logout.php">Sign Out!</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </body>
</html>