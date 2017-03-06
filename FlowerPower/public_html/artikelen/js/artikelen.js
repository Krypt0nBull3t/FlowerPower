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
        $edit_artikel = ndialog('edit_artikel','','Artikel aanpassen', 850,550,false,false);
        $add_artikel = ndialog('add_artikel','','Artikel toevoegen', 850,550,false,false);
        
  // buttons on main page    
  $('#ab_jq_buttonset').buttonset();
   
  $("#add").button( { icons: {primary:'ui-icon-plus'}, text: true } ).click(function()   { artikel_toevoegen();  document.getElementById("add").checked = ''; });
  $("#reload").button( { icons: {primary:'ui-icon-refresh'}, text: true } ).click(function()   { $('#list').trigger('reloadGrid');  document.getElementById("reload").checked = ''; });
      
  // actual grid    
  $("#list").jqGrid({
    url:root+'artikelen/grid_gegevens.php',
    datatype: "json",
    colNames:['Artikelcode','Artikel','Prijs','Foto','Op Voorraad','Actions'],
    colModel :[ 
      {name:'artikelcode', index:'artikelcode', width:160, search:true}, 
      {name:'artikel', index:'artikel', width:160, search:false}, 
      {name:'prijs', index:'prijs', width:160, search:false}, 
      {name:'foto', index:'foto', width:160, search:false}, 
      {name:'opvoorraad', index:'opvoorraad', width:160, search:false},
      {name:'act', index:'act', width:120, sortable:false, search:false}
    ],
    pager: '#pager',
    width: 1020,
    height: 415,
    scrollOffset: 0,
    rowNum:18,
    rowList:[18,36,54],
    sortname: 'artikelcode',
    sortorder: 'asc',
    viewrecords: true,
    recreateFilter: true,
    gridview: true
  });
  $("#list").jqGrid('filterToolbar',{stringResult: true, searchOnEnter : false});
}); 

  
    /**
     * Dialog open/load functions 
     */
       
    function artikel_aanpassen(id){
        
        $('#edit_artikel').dialog().html('');
        $('#edit_artikel').dialog().load(root+'flowerpower/public_html/artikelen/artikel_aanpassen.php?action=artikelaanpassen&id='+id);
        $('#edit_artikel').dialog('open');
        
    }
    
    function artikel_toevoegen(){
        
        $('#add_artikel').dialog().html('');
        $('#add_artikel').dialog().load(root+'flowerpower/public_html/artikelen/artikel_toevoegen.php?action=toevoegen');
        $('#add_artikel').dialog('open');
    }
    
    function artikel_verwijderen(id)
    {
        var ok= confirm('Weet u zeker dat u dit record wilt verwijderen?')
        if (ok==true)
            {
                 var id = id;
                 
                 postdata = '&id=' + id;
                 
                 post_return_response('flowerpower/public_html/artikelen/posts.php?action=artikelverwijderen', postdata, reload);
                 $('#list').trigger('reloadGrid');
            }
            
    }
    