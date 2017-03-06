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

include_once("../databaseconn.php");

// Action variabele instellen.
if (!IsSet($_GET['action'])) {
    $Action = 'overview';
} else {
    $Action = $_GET['action'];
}


$sql = new connDatabase();

// Queries voor Bedrijfsgegevens.
//
//  
// Toevoegen van een bedrijf.
if ($Action == "add_artikel") {
    $sql->query("INSERT INTO artikel (artikel, prijs, foto, opVoorraad)
               VALUES ('" . mysql_real_escape_string($_POST['artikel']) . "', 
                       '" . mysql_real_escape_string($_POST['prijs']) . "', 
                       '" . mysql_real_escape_string($_POST['foto']) . "', 
                       '" . mysql_real_escape_string($_POST['opVoorraad']) . "')");
}


// Aanpassen van een bedrijf.
if ($Action == "edit_artikel") {
    $sql->query("UPDATE artikel 
                     SET artikel = '" . mysql_real_escape_string($_POST['artikel']) . "', 
                         prijs = '" . mysql_real_escape_string($_POST['prijs']) . "', 
                         foto = '" . mysql_real_escape_string($_POST['foto']) . "', 
                         opVoorraad = '" . mysql_real_escape_string($_POST['voorraad']) . "'       
                   WHERE artikelcode = '" . mysql_real_escape_string($_POST['artikelcode']) . "'");
    
            echo "100::";    
}


// Verwijderen van een bedrijf.
if ($Action == "artikelverwijderen") {
    $sql->query("UPDATE artikel
                    SET deletedDate = '".time()."', deleted = '1'                  
                  WHERE artikelcode=" . mysql_real_escape_string($_POST['artikelcode']) . "")
            OR die(mysql_error());
}
?>
