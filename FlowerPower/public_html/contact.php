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
                        <a class="btn btn-primary btn-lg" href="login/logout.php" role="button">Uitloggen</a>
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
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="contact.php">Contact</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="profiel.php">Profiel</a></li>
                        <?php  if (isset($_SESSION['user_session'])) { print' <li><a href="artikelen.php">Artikelen</a></li>';}?>
                    </ul>
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

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Drachten</h2>
                    <img src = "img/Bloemenwinkel1mini.jpg" class = "inbl"/>
                    <p>Email:           <a>drachten@flowerpower.nl</a></p>
                    <p>Telefoonnummer:  0512-851848</p>
                    <p>Adres:           Fietsbel 1 9205AZ Drachten</p>
                </div>
            
        

        
                <div class="col-md-6">
                    <h2>Leeuwarden</h2>
                    <img src = "img/Bloemenwinkel1mini.jpg" class = "inbl"/>
                    <p>Email:           <a> leeuwarden@flowerpower.nl</a></p>
                    <p>Telefoonnummer:  0512-851848</p>
                    <p>Adres:           Fietsbel 1 9205AZ Leeuwarden</p>
                </div>
            </div>
        </div>

        <div class="container">
              <div class="row">
                <div class="col-md-6">
                    <h2>Heerenveen</h2>
                    <img src = "img/Bloemenwinkel1mini.jpg" class = "inbl"/>
                    <p>Email:           <a>heerenveen@flowerpower.nl</a></p>
                    <p>Telefoonnummer:  0512-851848</p>
                    <p>Adres:           Fietsbel 1 9205AZ Heerenveen</p>
                </div>
            
        
                <div class="col-md-6">
                    <h2>Sneek</h2>
                    <img src = "img/Bloemenwinkel1mini.jpg" class = "inbl"/>    
                    <p>Email:           <a>sneek@flowerpower.nl</a></p>
                    <p>Telefoonnummer:  0512-851848</p>
                    <p>Adres:           Fietsbel 1 9205AZ Sneek</p>
                </div>
            </div>
                
            

            <hr>

            <footer>
                <p>&copy; Fast Development 2017</p>
            </footer>
        </div> <!-- /container -->        
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function (b, o, i, l, e, r) {
                b.GoogleAnalyticsObject = l;
                b[l] || (b[l] =
                        function () {
                            (b[l].q = b[l].q || []).push(arguments)
                        });
                b[l].l = +new Date;
                e = o.createElement(i);
                r = o.getElementsByTagName(i)[0];
                e.src = '//www.google-analytics.com/analytics.js';
                r.parentNode.insertBefore(e, r)
            }(window, document, 'script', 'ga'));
            ga('create', 'UA-XXXXX-X', 'auto');
            ga('send', 'pageview');
        </script>

    </body>
</html>
