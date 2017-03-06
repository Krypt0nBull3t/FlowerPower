/** 
 * adresboek.js
 *
 * @author M. van Houten
 * @version $Revision v1.00$
 * @copyright Copyright (c) 2012, Intra-IT Automatisering
 * @opdrachtgever Intra-IT Automatisering
 
 * @package IntraNET
 */

	
$(function(){
        /**
         * Used dialogs
         */
        $edit_company = ndialog('edit_company','','Bedrijf aanpassen', 850,550,false,false);
        $add_company = ndialog('add_company','','Bedrijf toevoegen', 850,550,false,false);
        $edit_contact = ndialog('edit_contact','','Contact aanpassen', 850,550,false,false);
        $add_contact = ndialog('add_contact','','Contact toevoegen', 850,550,false,false);
        
  // buttons on main page    
  $('#ab_jq_buttonset').buttonset();
   
  $("#add").button( { icons: {primary:'ui-icon-plus'}, text: true } ).click(function()   { bedrijf_toevoegen();  document.getElementById("add").checked = ''; });
  $("#reload").button( { icons: {primary:'ui-icon-refresh'}, text: true } ).click(function()   { $('#list').trigger('reloadGrid');  document.getElementById("reload").checked = ''; });
      
  // actual grid    
  $("#list").jqGrid({
    url:root+'content/adresboek/grid_gegevens.php',
    datatype: "json",
    colNames:['Bedrijf','Adres','Postcode','Plaats','Land','Telefoonnummer','Fax','Site','Email','Klantnummer','Actions'],
    colModel :[ 
      {name:'bedrijf', index:'bedrijf', width:160, search:true}, 
      {name:'adres', index:'adres', width:160, search:false}, 
      {name:'postcode', index:'postcode', width:160, search:false}, 
      {name:'plaats', index:'plaats', width:160, search:false}, 
      {name:'land', index:'land', width:160, search:false}, 
      {name:'telefoonnummer1', index:'telefoonnummer1', width:160, search:false},
      {name:'fax', index:'fax', width:160, search:false},
      {name:'site', index:'site', width:170, search:false},
      {name:'email', index:'email', width:170, search:false},
      {name:'klantnummer', index:'klantnummer', width:160, search:true},
      {name:'act', index:'act', width:120, sortable:false, search:false}
    ],
    pager: '#pager',
    width: 1020,
    height: 415,
    scrollOffset: 0,
    rowNum:18,
    rowList:[18,36,54],
    sortname: 'bedrijf',
    sortorder: 'asc',
    viewrecords: true,
    recreateFilter: true,
    subGrid: true,
    subGridUrl: root+'content/adresboek/subgrid_gegevens.php',
    subGridModel: [{ name: ['Voornaam', 'Achternaam', 'Telefoonnummer', 'Mobielnummer', 'Contact Fax', 'Site', 'Email', 'Gebruiker', 'Password', 'Klantnummer', 'Type','Action'],
                    width: [120,120,120,120,120,170,170,120,120,120,120,120] }],
    gridview: true
  });
  $("#list").jqGrid('filterToolbar',{stringResult: true, searchOnEnter : false});
}); 

  
    /**
     * Dialog open/load functions 
     */
    function contact_toevoegen(id){
        
        $('#add_contact').dialog().html('');
        $('#add_contact').dialog().load(root+'content/adresboek/contact_toevoegen.php?action=contacttoevoegen&bedrijfid='+id);
        $('#add_contact').dialog('open');
        
    }
    
    function contact_aanpassen(id){
        
        $('#edit_contact').dialog().html('');
        $('#edit_contact').dialog().load(root+'content/adresboek/contact_aanpassen.php?action=contactaanpassen&contactid='+id);
        $('#edit_contact').dialog('open');
        
    }
    
    function contact_verwijderen(id)
    {
        var ok= confirm('Weet u zeker dat u dit record wilt verwijderen?')
        if (ok==true)
            {
                 var contactid = id;
                 
                 postdata = '&contactid=' + contactid;
                 
                 post_return_response('content/adresboek/posts.php?action=contactverwijderen', postdata, reload);
                 $('#list').trigger('reloadGrid');
            }
            
    }
    
    function bedrijf_aanpassen(id){
        
        $('#edit_company').dialog().html('');
        $('#edit_company').dialog().load(root+'content/adresboek/bedrijf_aanpassen.php?action=bedrijfaanpassen&id='+id);
        $('#edit_company').dialog('open');
        
    }
    
    function bedrijf_toevoegen(){
        
        $('#add_company').dialog().html('');
        $('#add_company').dialog().load(root+'content/adresboek/bedrijf_toevoegen.php?action=toevoegen');
        $('#add_company').dialog('open');
    }
    
    function bedrijf_verwijderen(id)
    {
        var ok= confirm('Weet u zeker dat u dit record wilt verwijderen?')
        if (ok==true)
            {
                 var id = id;
                 
                 postdata = '&id=' + id;
                 
                 post_return_response('content/adresboek/posts.php?action=bedrijfverwijderen', postdata, reload);
                 $('#list').trigger('reloadGrid');
            }
            
    }
    