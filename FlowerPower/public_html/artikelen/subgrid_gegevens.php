<?php
ob_start();
session_start();
/** 
 * subgrid_gegevens
 *
 * @author M. van Houten
 * @version $Revision v1.00$
 * @copyright Copyright (c) 2011, Intra-IT Automatisering
 * @opdrachtgever Intra-IT Automatisering
 
 * @package IntraNET
 */

 // database connection
 include_once("../../includes/configs/config.inc.php");


// getting the id of the row for the requested subgrid
$id = $_GET['id'];


// the actual query for the grid data  
$SQL = "SELECT contactid, Voornaam, Achternaam, Telefoonnummer, Mobielnummer, contactFax, contactEmail, contactSite, Gebruiker, Password, contactKlantnummer, Type 
          FROM iims_contact AS C
          JOIN iims_bedrijf 
            ON C.Bedrijfid = iims_bedrijf.id  WHERE C.Bedrijfid=".$id."
           AND C.deleted = '0'
         ORDER BY Voornaam";

$result = $sql->query( $SQL );


$i=0;
$responce1=array();
while($row = $sql->assoc($result)) {
    $responce1['rows'][$i]['contactid']=$row['contactid'];
    $responce1['rows'][$i]['cell']=array($row['Voornaam'],
                                      $row['Achternaam'],
                                      $row['Telefoonnummer'],
                                      $row['Mobielnummer'],
                                      $row['contactFax'],
                                      "<a href=mailto:" . $row['contactEmail'] . ">" . $row['contactEmail'] . "</a>",
                                      "<a href=" . $row['contactSite'] . ">" . $row['contactSite'] . "</a>",
                                      $row['Gebruiker'],
                                      $row['Password'],
                                      $row['contactKlantnummer'],
                                      $row['Type'],
                                      "<img src=\"images/edit_16.gif\" onClick=\"contact_aanpassen('" . $row['contactid'] . "');\" /> ".
                                      "<img src=\"images/delete.gif\"  onClick=\"contact_verwijderen('" . $row['contactid'] . "');\" />"
        );      
    $i++; 
} 
echo json_encode($responce1);
?>
