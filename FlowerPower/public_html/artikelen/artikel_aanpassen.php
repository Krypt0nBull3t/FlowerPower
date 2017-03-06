<?php
ob_start();
session_start();
/**
 * bedrijf_aanpassen
 *
 * @author M. van Houten
 * @version $Revision v1.00$
 * @copyright Copyright (c) 2011, Intra-IT Automatisering
 * @opdrachtgever Intra-IT Automatisering

 * @package IntraNET
 */
// database connection
include_once("../databaseconn.php");


//gegevens ophalen uit de database
$database = new connDatabase();
$data = $database->query("SELECT * FROM artikel WHERE artikelcode='" . $_GET['id'] . "'");
$datal = $database->assoc($data);
$voorradig = $database->query("SELECT voorradig
                                 FROM voorraadopties")

?>
    <style>
                .el_title{
                    width: 150px !important;
                }
                .el_value{
                    width: 350px !important;
                }
                .el_extra{
                    width: 250px !important;
                }
            </style> 
            <div class='form'>
                <div class='form_kop'>&nbsp;</div>
                <div class='form_element'>
                    <div class='el_title'>Artikelnaam:</div>
                    <div class='el_value'><input type="text" value="<?php echo $datal['artikel']; ?>" id="eartikel" /></div>
                    <div class='el_extra'><span id="artikelError" class="errorSpan" >A.u.b een artikelnaam invoeren.</span></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Prijs:</div>
                    <div class='el_value'><input type="text" value="<?php echo $datal['prijs']; ?>" id="eprijs" /></div>
                    <div class='el_extra'><span id="prijsError" class="errorSpan" >A.u.b een geldige prijs invoeren.</span></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Foto:</div>
                    <div class='el_value'><input type="file" value="<?php echo $datal['Foto']; ?>" id="efoto" /></div>    
                </div>
                <div class='form_element'>
                    <div class='el_title'>Op voorraad:</div>
                    <div class='el_value'><select id="evoorraad"><?php
                while ($opties = $sql->assoc($voorradig)) {
                echo '<option ' . ($datal["opVoorraad"]==$opties["voorradig"] ? 'selected' : '') . ' value="' . $opties["voorradig"] . '">' . $opties["voorradig"] . '</option>';
                }
                ?></select></div>
                </div>
               
            </div>

<script>
    $(function () {
        
        
        $('#edit_artikel').dialog('option', 'buttons', {
            'Annuleren': function () {
                $(this).dialog('close');
            },
            'Opslaan': function () {
                
                if(error2 === true){
                    
                }
                
                if(error2 === false){
                    
                    do_edit('<?php echo $_GET['id']; ?>');
                    
                }
            }
        });
        // validaties bij onblur
        $('#eartikel').blur(function(){
            if(!$.Validate.NotEmpty(this.value)) { $('#artikelError').css('display', 'block') }
            else {
                $('#artikelError').css('display', 'none')
            };
        });
        $('#eprijs').blur(function(){
            if(!$.Validate.NotEmpty(this.value)) { $('#prijsError').css('display', 'block') }
            else {
                $('#prijsError').css('display', 'none')
            };
        });
        
        
    });
    
    // functie voor het doorvoeren van gegevens naar de database
    function do_edit(id) {
        var error2 = false;
        
        var artikel = $('#eartikel').val();
        var prijs = $('#eprijs').val();
        var foto = $('#efoto').val();
        var voorraad = $('#evoorraad').val();
        var artikelcode = '<?php echo $_GET['id']; ?>';
        
        
        // validaties bij opslaan
        if(!$.Validate.NotEmpty(bedrijf)) {
            error2=true; $('#artikelError').css('display', 'block') }
        if(!$.Validate.NotEmpty(plaats)) { 
            error2=true; $('#prijsError').css('display', 'block') }
        
        
        
        
        postdata = 'artikel=' + artikel 
            + '&prijs=' + prijs 
            + '&foto=' + foto 
            + '&voorraad=' + voorraad 
            + '&artikelcode=' + artikelcode;
        
        
        if(error2 === true){
            
        }
        if(error2 === false){
            result = post_return_response('../artikelen/posts.php?action=edit_artikel', postdata);
        } else {
            result = '200';
        }
        
        
        result = result.split("::");
        
        if(result[0] == '100'){
            $('#edit_artikel').dialog('close');
            
            $('#list').trigger('reloadGrid');
            
            wait_dialog_close();
        } else {
            result_dialog('Het aanpassen is mislukt.', 0);
        }
    }
    
    var error2 = false;

</script>
