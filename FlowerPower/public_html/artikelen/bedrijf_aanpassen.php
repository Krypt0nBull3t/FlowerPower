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
include_once("../../includes/configs/config.inc.php");


//gegevens ophalen uit de database
$data = $sql->query("SELECT * FROM iims_bedrijf WHERE id='" . $_GET['id'] . "'");
$datal = $sql->assoc($data);
$landD = $sql->query("SELECT Land 
                        FROM iims_landen");
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
                    <div class='el_title'>Land:</div>
                    <div class='el_value'><select id="eland"><?php
				while ($Landen = $sql->assoc($landD)) {
				echo '<option ' . ($datal["Land"]==$Landen["Land"] ? 'selected' : '') . ' value="' . $Landen["Land"] . '">' . $Landen["Land"] . '</option>';
				}
				?></select></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Bedrijf:</div>
                    <div class='el_value'><input type="text" value="<?php echo $datal['Bedrijf']; ?>" id="ebedrijf" /></div>
                    <div class='el_extra'><span id="bedrijfError" class="errorSpan" >A.u.b een bedrijfsnaam invoeren.</span></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Adres:</div>
                    <div class='el_value'><input type="text" value="<?php echo $datal['Straat']; ?>" id="estraat" /></div>
                    <div class='el_extra'><span id="straatError" class="errorSpan" >A.u.b een geldig adres invoeren.</span></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Postcode:</div>
                    <div class='el_value'><input type="text" value="<?php echo $datal['Postcode']; ?>" id="epostcode" /></div>
                    <div class='el_extra'><span id="postcodeError" class="errorSpan" >A.u.b een geldige postcode invoeren.</span></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Plaats:</div>
                    <div class='el_value'><input type="text" value="<?php echo $datal['Plaats']; ?>" id="eplaats" /></div>
                    <div class='el_extra'><span id="plaatsError" class="errorSpan" >A.u.b een plaats invoeren.</span></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Tel.nr.:</div>
                    <div class='el_value'><input type="text" value="<?php echo $datal['Telefoonnummer1']; ?>" id="etelefoonnummer1" /></div>
                    <div class='el_extra'><span id="telefoonnummer1Error" class="errorSpan" >A.u.b een geldig telefoonnummer invoeren.</span></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Fax:</div>
                    <div class='el_value'><input type="text" value="<?php echo $datal['Fax']; ?>" id="efax" /></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Site:</div>
                    <div class='el_value'><input type="text" value="<?php echo $datal['Site']; ?>" id="esite" /></div>
                    <div class='el_extra'><span id="siteError" class="errorSpan" >Webadres moet worden voorafgegaan door http(s)://</span></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Email:</div>
                    <div class='el_value'><input type="text" value="<?php echo $datal['Email']; ?>" id="eemail" /></div>
                    <div class='el_extra'><span id="emailError" class="errorSpan" >A.u.b een geldig mailadres invoeren.</span></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Klantnummer:</div>
                    <div class='el_value'><input type="text" value="<?php echo $datal['Klantnummer']; ?>" id="eklantnummer" /></div>
                </div>
            <div>

<script>
    $(function () {
        
        
        $('#edit_company').dialog('option', 'buttons', {
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
        $('#ebedrijf').blur(function(){
            if(!$.Validate.NotEmpty(this.value)) { $('#bedrijfError').css('display', 'block') }
            else {
                $('#bedrijfError').css('display', 'none')
            };
        });
        $('#eplaats').blur(function(){
            if(!$.Validate.NotEmpty(this.value)) { $('#plaatsError').css('display', 'block') }
            else {
                $('#plaatsError').css('display', 'none')
            };
        });
        $('#eland').change(function(){
            if(this.value === 'Nederland'){
                if(!$.Validate.Postcode($('#epostcode').val())) { $('#postcodeError').css('display', 'block') }
                else {
                    $('#postcodeError').css('display', 'none')
                };
                if(!$.Validate.Telefoonnummer($('#etelefoonnummer1').val())) { $('#telefoonnummer1Error').css('display', 'block') }
                else {
                    $('#telefoonnummer1Error').css('display', 'none')
                };
            } else {
                if(!$.Validate.NotEmpty($('#epostcode').val())) { $('#postcodeError').css('display', 'block') }
                else {
                    $('#postcodeError').css('display', 'none')
                };
                if(!$.Validate.NotEmpty($('#etelefoonnummer1').val())) { $('#telefoonnummer1Error').css('display', 'block') }
                else {
                    $('#telefoonnummer1Error').css('display', 'none')
                };
            }}); 
        
        
        $('#epostcode').blur(function(){
            if($('#eland').val() === 'Nederland'){
                if(!$.Validate.Postcode(this.value)) { $('#postcodeError').css('display', 'block') }
                else {
                    $('#postcodeError').css('display', 'none')
                };
            } else {
                if(!$.Validate.NotEmpty(this.value)) { $('#postcodeError').css('display', 'block') }
                else {
                    $('#postcodeError').css('display', 'none')
                };
            };
        });  
        $('#estraat').blur(function(){
            if(!$.Validate.Adres(this.value)) { $('#straatError').css('display', 'block') }
                else {
                    $('#straatError').css('display', 'none')
                };
        });  
        $('#etelefoonnummer1').blur(function(){
            if($('#eland').val() === 'Nederland'){
                if(!$.Validate.Telefoonnummer(this.value)) { $('#telefoonnummer1Error').css('display', 'block') }
                else {
                    $('#telefoonnummer1Error').css('display', 'none')
                };
            } else {
                if(!$.Validate.NotEmpty(this.value)) { $('#telefoonnummer1Error').css('display', 'block') }
                else {
                    $('#telefoonnummer1Error').css('display', 'none')
                }; 
            };
        });
        $('#esite').blur(function(){
            if($.Validate.NotEmpty(this.value)){
                if(!$.Validate.Site(this.value)) { $('#siteError').css('display', 'block') }
                else {
                    $('#siteError').css('display', 'none')
                };
            }
        });
        $('#eemail').blur(function(){
            if($.Validate.NotEmpty(this.value)){
                if(!$.Validate.Email(this.value)) { $('#emailError').css('display', 'block') }
                else {
                    $('#emailError').css('display', 'none')
                };
            }
        });
        
    });
    
    // functie voor het doorvoeren van gegevens naar de database
    function do_edit(id) {
        var error2 = false;
        
        var bedrijf = $('#ebedrijf').val();
        var straat = $('#estraat').val();
        var postcode = $('#epostcode').val();
        var plaats = $('#eplaats').val();
        var land = $('#eland').val();
        var telefoonnummer1 = $('#etelefoonnummer1').val();
        var fax = $('#efax').val();
        var site = $('#esite').val();
        var email = $('#eemail').val();
        var klantnummer = $('#eklantnummer').val();
        var id = '<?php echo $_GET['id']; ?>';
        
        
        // validaties bij opslaan
        if(!$.Validate.NotEmpty(bedrijf)) {
            error2=true; $('#bedrijfError').css('display', 'block') }
        if(!$.Validate.NotEmpty(plaats)) { 
            error2=true; $('#plaatsError').css('display', 'block') }
        if(land === 'Nederland'){
            if(!$.Validate.Postcode(postcode)) { 
                error2=true; $('#postcodeError').css('display', 'block') }
            if(!$.Validate.Adres(straat)) {
                error2=true; $('#straatError').css('display', 'block') }
            if(!$.Validate.Telefoonnummer(telefoonnummer1)) {
                error2=true; $('#telefoonnummer1Error').css('display', 'block') }
        } else {
            if(!$.Validate.NotEmpty(postcode)) { 
                error2=true; $('#postcodeError').css('display', 'block') }
            if(!$.Validate.NotEmpty(straat)) {
                error2=true; $('#straatError').css('display', 'block') }
            if(!$.Validate.NotEmpty(telefoonnummer1)) {
                error2=true; $('#telefoonnummer1Error').css('display', 'block') }
        }
        if($.Validate.NotEmpty(email)){
            if(!$.Validate.Email(email)) {
                error2=true; $('#emailError').css('display', 'block') } }
        if($.Validate.NotEmpty(site)){
            if(!$.Validate.Site(site)) {
                error2=true; $('#siteError').css('display', 'block') } }
        
        
        
        postdata = 'bedrijf=' + bedrijf 
            + '&straat=' + straat 
            + '&postcode=' + postcode 
            + '&plaats=' + plaats 
            + '&land=' + land 
            + '&telefoonnummer1=' + telefoonnummer1 
            + '&fax=' + fax 
            + '&site=' + site 
            + '&email=' + email 
            + '&klantnummer=' + klantnummer 
            + '&id=' + id;
        
        
        if(error2 === true){
            
        }
        if(error2 === false){
            result = post_return_response('content/adresboek/posts.php?action=edit_company', postdata);
        } else {
            result = '200';
        }
        
        
        result = result.split("::");
        
        if(result[0] == '100'){
            $('#edit_company').dialog('close');
            
            $('#list').trigger('reloadGrid');
            
            wait_dialog_close();
        } else {
            result_dialog('Het aanpassen is mislukt.', 0);
        }
    }
    
    var error2 = false;

</script>
