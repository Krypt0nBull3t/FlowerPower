<?php
ob_start();
session_start();
/** 
 * posts.php
 *
 * @author M. van Houten
 * @version $Revision v1.00$
 * @copyright Copyright (c) 2011, Intra-IT Automatisering
 * @opdrachtgever Intra-IT Automatisering
 
 * @package IntraNET
 */

include_once("databaseconn.php");

// Action variabele instellen.
if (!IsSet($_GET['action'])) {
    $Action = 'overview';
} else {
    $Action = $_GET['action'];
}


$sql = new connDatabase();

// Queries voor Artikelen.
//
//  
// Toevoegen van een artikel.
if ($Action == "add_artikel") {
  extract($_POST);


  $uploadedFoto=$_FILES['fotoUpload']['name'];
  if($uploadedFoto !=''){
    $upload_directory = "img/";
    $TargetPath=$uploadedFoto;
    if(move_uploaded_file($_FILES['fotoUpload']['tmp_name'], $upload_directory.$TargetPath)){
    $sql->query("INSERT INTO artikel (artikel, prijs, Foto, opVoorraad)
               VALUES ('" . mysql_real_escape_string($_POST['naamArtikel']) . "', 
                       '" . mysql_real_escape_string($_POST['prijs']) . "',
                       'img/$TargetPath',
                       '" . mysql_real_escape_string($_POST['opVoorraad']) . "')");
  }
  }

  header("Location: artikelen.php");
}


// Aanpassen van een artikel.
if ($Action == "edit_artikel") {
 extract($_POST);


  $uploadedFoto=$_FILES['efotoUpload']['name'];
    if($uploadedFoto !=''){
    $upload_directory = "img/";
    $TargetPath=$uploadedFoto;
    if(move_uploaded_file($_FILES['efotoUpload']['tmp_name'], $upload_directory.$TargetPath)){
    $sql->query("UPDATE artikel 
                     SET artikel = '" . mysql_real_escape_string($_POST['naamArtikelModal']) . "', 
                         prijs = '" . mysql_real_escape_string($_POST['eprijs']) . "', 
                         foto = 'img/$TargetPath',
                         opVoorraad = '" . mysql_real_escape_string($_POST['eopVoorraad']) . "'       
                   WHERE artikelcode = '" . mysql_real_escape_string($_POST['eartikelcode']) . "'");
    }
  } else
  {
    $sql->query("UPDATE artikel 
                     SET artikel = '" . mysql_real_escape_string($_POST['naamArtikelModal']) . "', 
                         prijs = '" . mysql_real_escape_string($_POST['eprijs']) . "',
                         opVoorraad = '" . mysql_real_escape_string($_POST['eopVoorraad']) . "'       
                   WHERE artikelcode = '" . mysql_real_escape_string($_POST['eartikelcode']) . "'");
  }
            
            header("Location: artikelen.php");    
}


// Verwijderen van een artikel.
if ($Action == "artikelverwijderen") {
   $date = date('Y-m-d H:i:s');
    $sql->query("UPDATE artikel
                    SET deletedDate = '$date', deleted = '1'                  
                  WHERE artikelcode=" . mysql_real_escape_string($_POST['deleteArtikelCode']) . "")
            OR die(mysql_error());
  

  header("Location: artikelen.php");    
}
?>
