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
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
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
                    <form class="navbar-form navbar-right" role="form">
                        <div class="form-group">
                            <input type="text" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Sign in</button>
                    </form>
                    <ul class="nav navbar-nav hidden-sm hidden-md hidden-lg">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li class="active"><a href="profiel.php">Profiel</a></li>
                    </ul>
                </div><!--/.navbar-collapse -->
            </div>
        </nav>

        <div id="sidebar-wrapper" role="navigation">
            <ul class="sidebar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="profiel.php">Profiel</a></li>
            </ul>
        </div>    



        <div class="container">
            <div class="row">


                <div class="col-md-12">
                    <h4>Artikelen</h4>
                    <div class="table-responsive">


                        <table id="mytable" class="table table-bordred table-striped">

                            <thead>

                            <th><input type="checkbox" id="checkall" /></th>
                            <th>Artikel nummer</th>
                            <th>Artikel naam</th>
                            <th>Prijs</th>
                            <th>Foto</th>
                            <th>Op voorraad</th>
                            <th>Aanpassen</th>
                            <th>Verwijderen</th>
                            </thead>
                            <tbody>
                                <?php
                                require_once 'databaseconn.php';
                                $database = new connDatabase();
                                $data = $database->query("SELECT * FROM artikel WHERE deleted='0';");
                                foreach ($data as $test1) {



                                    Print'                 <tr>
                                    <td><input type="checkbox" class="checkthis" /></td>';
                                    Print "                      <td>" . $test1['artikelcode'] . "</td>";
                                    print"                      <td>" . $test1['artikel'] . "</td>";
                                    Print"                      <td>" . $test1['prijs'] . "</td>";
                                    Print"                      <td>" . $test1['Foto'] . "</td>";
                                    Print"                      <td>" . $test1['opVoorraad'] . "</td>";
                                    print'                      <td><span data-placement="top" data-toggle="tooltip" title="Aanpassen"><button class="btn btn-primary btn-xs" data-id="' . $test1['artikelcode'] . '" data-title="Edit" data-toggle="modal" data-target="#edit" data-name="' . $test1['artikel'] . '" data-prijs="' . $test1['prijs'] . '" data-foto="' . $test1['Foto'] . '" data-voorraad="' . $test1['opVoorraad'] . '"><span class="glyphicon glyphicon-pencil"></span></button></span></td>
                                    <td><span data-placement="top" data-toggle="tooltip" title="Verwijderen"><button class="btn btn-danger btn-xs" data-id="' . $test1['artikelcode'] . '" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></span></td>
                                </tr>';
                                }

                                print'                            </tbody>

                        </table>

                    </div>

                </div>
            </div>
        </div>';
                                
 print'       <form class="form-horizontal" id="form_artaanpassen" role="form" action="posts.php?action=edit_artikel" method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Artikel aanpassen</h4>
                    </div>
                    <div class="modal-body">
                    
                        <div class="form-group">
                            <input class="form-control" type="text"  name="eartikelcode" readonly id="eartikelcode">
                        </div>

                        <div class="form-group">
                            <input class="form-control"  id="naamArtikelModal" name="naamArtikelModal" type="text">
                        </div>


                        <div class="form-group">
                            <input class="form-control " id="eprijs" name="eprijs" type="text">
                        </div>

                        <div class="form-group">                     
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default btn-file">
                                            Browse… <input type="file" id="efotoUpload" name="efotoUpload">
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" readonly id="efoto">
                                </div>
                                <img id="img-upload"/>
                        </div>
                        
                        <div class="form-group">
                            <select class="form-control" name="eopVoorraad" id="eopVoorraad">
                                <option value="J">Ja</option>
                                <option value="N">Nee</option>
                            </select>
                        </div>

                    <div class="modal-footer ">
                        <button type="submit"  id="saveEdit" name="saveEdit"  class="btn btn-warning btn-lg" style="width: 100%; data-dismiss="modal"><span class="glyphicon glyphicon-ok-sign"></span> Aanpassen</button>
                    </div>
                </div>
                <!-- /.modal-content --> 
            </div>
            <!-- /.modal-dialog --> 
        </div>
 </div>
 </form>';



print '        
        <form class="form-horizontal" id="form_artverwijderen" role="form" action="posts.php?action=artikelverwijderen" method="POST">
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Artikel verwijderen</h4>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                            <input class="form-control" type="hidden"  name="deleteArtikelCode" id="deleteArtikelCode">
                        </div>
                    

                        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Weet u zeker dat u dit artikel wilt verwijderen?</div>

                    </div>
                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-success" id="Deleteart" name="Deleteart" ><span class="glyphicon glyphicon-ok-sign"></span>Ja</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Nee</button>
                    </div>
                </div>
                <!-- /.modal-content --> 
            </div>
            <!-- /.modal-dialog --> 
        </div>
        </form>'
                                ?>

                            <div class="container">
                                <form class="form-horizontal" id="form_arttoevoegen" role="form" action="posts.php?action=add_artikel" method="POST" enctype="multipart/form-data">
                                    <fieldset>

                                        <!-- Form Name -->
                                        <legend>Artikel toevoegen</legend>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="naamArtikel">Artikel Naam</label>  
                                            <div class="col-md-4">
                                                <input id="naamArtikel" name="naamArtikel" type="text" placeholder="Vaas rustiek" class="form-control input-md" required="">

                                            </div>
                                        </div>

                                        <!-- Text input-->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="prijs">Prijs</label>  
                                            <div class="col-md-4">
                                                <input id="prijs" name="prijs" type="text" placeholder="0.50" class="form-control input-md" required="">

                                            </div>
                                        </div>

                                        <!-- Button Drop Down -->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="foto">Foto uploaden</label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <span class="btn btn-default btn-file">
                                                            Browse… <input type="file" id="fotoUpload" name="fotoUpload">
                                                        </span>
                                                    </span>
                                                    <input type="text" class="form-control" readonly>
                                                </div>
                                                <img id='img-upload'/>
                                            </div>
                                        </div>

                                        <!-- Multiple Radios -->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="opVoorraad">Op voorraad</label>
                                            <div class="col-md-4">
                                                <select class="form-control" name="opVoorraad" id="opVoorraad">
                                                    <option value="J">Ja</option>
                                                    <option value="N">Nee</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Button (Double) -->
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" for="artikelOpslaan"></label>
                                            <div class="col-md-8">
                                                <button type="submit" id="artikelOpslaan" name="artikelOpslaan" class="btn btn-success">Opslaan</button>
                                                <button id="annuleren" name="annuleren" class="btn btn-danger">Annuleren</button>
                                            </div>
                                        </div>

                                    </fieldset>
                                </form>


                                <hr>

                                <footer>
                                    <p>&copy; Fast Development 2017</p>
                                </footer>
                            </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                            <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

                            <script src="js/vendor/bootstrap.min.js"></script>
                            

                            <script src="js/plugins.js"></script>
                            <script src="js/main.js"></script>
                            <script>
$(document).ready(function(){
    $('#edit').on('show.bs.modal', function (e) {
        //Get values for fields
        var id = $(e.relatedTarget).data('id');
        var naamArtikelModal = $(e.relatedTarget).data('name');
        var prijs = $(e.relatedTarget).data('prijs');
        var foto = $(e.relatedTarget).data('foto');
        var voorraad = $(e.relatedTarget).data('voorraad');
        //Pass values to fields
        $('#eartikelcode').val(id);
        $('#naamArtikelModal').val(naamArtikelModal);
        $('#eprijs').val(prijs);
        $('#efoto').val(foto);
        $('#eopVoorraad').val(voorraad);
     });

    $('#delete').on('show.bs.modal', function (e) {
        //Get values for fields
        var id = $(e.relatedTarget).data('id');
        //Pass values to fields
        $('#deleteArtikelCode').val(id);
     });
});

// $(document).ready(function(){
//     $('#delete').on('show.bs.modal', function (e) {
//         //Get values for fields
//         var id = $(e.relatedTarget).data('id');
//         //Pass values to fields
//         $('#deleteArtikelCode').val(id);
//      });
// });

$('#edit').on('hidden.bs.modal', function () {
 location.reload();
});
$('#delete').on('hidden.bs.modal', function () {
 location.reload();
});
</script>

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
