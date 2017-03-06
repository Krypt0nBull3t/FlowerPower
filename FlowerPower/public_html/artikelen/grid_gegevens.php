<?php
ob_start();
session_start();
/** 
 * grid_gegevens
 *
 * @author M. van Houten
 * @version $Revision v1.00$
 * @copyright Copyright (c) 2011, Intra-IT Automatisering
 * @opdrachtgever Intra-IT Automatisering
 
 * @package IntraNET
 */
 // database connection
 include_once("../../includes/configs/config.inc.php");
 
 // code for filtering
 include_once($config['basis_dir']."/includes/functions/jqGridFunctions.php");
 
 $filters = getFilter();
         
         $where = '';
         $searchFilter = " ";
         if (!empty($filters)) {
             $searchFilter .= " AND";

             $searchFilter .= implode("AND", $filters);
             
             $where .= " AND";
             $where .= implode("AND", $filters);
         }
 
// Get the requested page. By default grid sets this to 1. 
$page = $_GET['page']; 
 
// get how many rows we want to have into the grid - rowNum parameter in the grid 
$limit = $_GET['rows']; 
 
// get index row - i.e. user click to sort. At first time sortname parameter -
// after that the index from colModel 
$sidx = $_GET['sidx']; 
 
// sorting order - at first time sortorder 
$sord = $_GET['sord']; 
 
// if index is not defined use the first column for the index.
if(!$sidx) $sidx =1; 
 

// calculate the number of rows for the query. We need this for paging the result 
$result = $sql->query("SELECT COUNT(*)
                           AS count 
                         FROM iims_bedrijf"); 
$row = $sql->assoc($result); 
$count = $row['count']; 
 
// calculate the total pages for the query 
if( $count > 0 && $limit > 0) { 
              $total_pages = ceil($count/$limit); 
} else { 
              $total_pages = 0; 
} 
 
// if for some reasons the requested page is greater than the total 
// set the requested page to total page 
if ($page > $total_pages) $page=$total_pages;
 
// calculate the starting position of the rows 
$start = $limit*$page - $limit;
 
// if for some reason the start position is negative set it to 0 
// typical case is that the user typed in 0 for the requested page 
if($start <0) $start = 0; 
 
// the actual query for the grid data 
$SQL = "SELECT id, Bedrijf, Straat, Plaats, Postcode, Land, Telefoonnummer1, Fax, Site, Email, Klantnummer
          FROM iims_bedrijf
         WHERE deleted = '0' $where 
      ORDER BY $sidx $sord 
         LIMIT $start , $limit"; 
$result = $sql->query( $SQL ); 
 


$responce['page'] = $page;
$responce['total'] = $total_pages;
$responce['records'] = $count;
$i=0;
while($row = $sql->assoc($result)) {
    $responce['rows'][$i]['id']=$row['id'];
    $responce['rows'][$i]['cell']=array($row['Bedrijf'],
                                      $row['Straat'],
                                      $row['Postcode'],
                                      $row['Plaats'],
                                      $row['Land'],
                                      $row['Telefoonnummer1'],
                                      $row['Fax'],
                                      "<a href=" . $row['Site'] . ">" . $row['Site'] . "</a>",
                                      "<a href=mailto:" . $row['Email'] . ">" . $row['Email'] . "</a>",
                                      $row['Klantnummer'],
                                      "<img src=\"images/edit_16.gif\" onClick=\"bedrijf_aanpassen('" . $row['id'] . "');\" />".
                                      "<img src=\"images/delete.gif\" onClick=\"bedrijf_verwijderen('" . $row['id'] . "');\" />".
                                      "<img src=\"images/add.gif\" onClick=\"contact_toevoegen('" . $row['id'] . "');\" />"
            );
    $i++; 
} 
echo json_encode($responce);
?>
