<!doctype html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>FlowerPower</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/simple-sidebar.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="login/loginscript.js" type="text/javascript"></script>
        <?php require_once "login/login.php"; ?>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="container"></div>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Flowerpower</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">

                <?php  if (isset($_SESSION['user_session'])) {
                        print' <form name="form_logout" id="form_logout" method="post" class="navbar-form navbar-right" role="form">
                        <div class="form-group">';
                        print"    <p>" . $_SESSION['user_session'] . "</p>";
                        print '</div>
                        <a class="btn btn-success" href="login/logout.php" role="button">Uitloggen</a>
                    </form>';

                } else {
                   print' <form name="form_login" id="form_login" method="post" class="navbar-form navbar-right" role="form">
                        <div class="form-group">
                            <input name="username" type="text" id="username" placeholder="Gebruikersnaam" class="form-control">
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" id="password" placeholder="Wachtwoord" class="form-control">
                        </div>
                        <button name="submit" type="submit" id="submit" class="btn btn-success">Inloggen</button>
                    </form>';
                }
                    ?>
                    <ul class="nav navbar-nav hidden-sm hidden-md hidden-lg">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="profiel.php">Profiel</a></li>
<?php  if (isset($_SESSION['user_session'])) { print' <li><a href="artikelen.php">Artikelen</a></li>';}?>
                </div><!--/.navbar-collapse -->
            </div>
        </nav>
 <div id="wrapper">
        <div id="sidebar-wrapper" role="navigation">
            <ul class="sidebar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="profiel.php">Profiel</a></li>
                <?php  if (isset($_SESSION['user_session'])) { print' <li><a href="artikelen.php">Artikelen</a></li>';}?>
            </ul>
        </div>    

        <div id="myCarousel" class="carousel slide maxheightcarousel" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/Bloemenwinkel1.jpg" alt="Bloemenwinkel">
    </div>

    <div class="item">
      <img src="img/Boeket oranjegeel.jpg" alt="Boeket">
    </div>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div>
                    <h2>FlowerPower</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>

            <hr>

            <footer>
                <p>&copy; Fast Development 2017</p>
            </footer>
        </div> <!-- /container --> 
        </div>       <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
