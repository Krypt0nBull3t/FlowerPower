<?php
ob_start();
session_start();
/** 
 * contact_aanpassen
 *
 * @author M. van Houten
 * @version $Revision v1.00$
 * @copyright Copyright (c) 2011, Intra-IT Automatisering
 * @opdrachtgever Intra-IT Automatisering
 
 * @package IntraNET
 */

 // database connection
 include_once("../../includes/configs/config.inc.php");
 
 // landen ophalen uit de database
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
                    <div class='el_value'><select id="land"><?php
				while ($Landen = $sql->assoc($landD)) {
				echo '<option ' . ('Nederland'==$Landen["Land"] ? 'selected' : '') . ' value="' . $Landen["Land"] . '">' . $Landen["Land"] . '</option>';
				}
				?></select></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Bedrijf:</div>
                    <div class='el_value'><input type="text" id="bedrijf" /></div>
                    <div class='el_extra'><span id="bedrijfError" class="errorSpan" >A.u.b een bedrijfsnaam invoeren.</span></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Adres:</div>
                    <div class='el_value'><input type="text" id="straat" /></div>
                    <div class='el_extra'><span id="straatError" class="errorSpan" >A.u.b een geldig adres invoeren.</span></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Postcode:</div>
                    <div class='el_value'><input type="text" id="postcode" /></div>
                    <div class='el_extra'><span id="postcodeError" class="errorSpan" >A.u.b een geldige postcode invoeren.</span></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Plaats:</div>
                    <div class='el_value'><input type="text" id="plaats" /></div>
                    <div class='el_extra'><span id="plaatsError" class="errorSpan" >A.u.b een plaats invoeren.</span></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Tel.nr.:</div>
                    <div class='el_value'><input type="text" id="telefoonnummer1" /></div>
                    <div class='el_extra'><span id="telefoonnummer1Error" class="errorSpan" >A.u.b een geldig telefoonnummer invoeren.</span></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Fax:</div>
                    <div class='el_value'><input type="text" id="fax" /></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Contact Algemeen:</div>
                    <div class='el_value'><input type="text" id="voornaamAlgemeen" placeholder="Voornaam" /><input type="text" id="achternaamAlgemeen" placeholder="Achternaam" /></div>
                    <div class='el_extra'><span id="voornaamAlgemeenError"  class="errorSpan" >A.u.b een voornaam invoeren.</span><span id="achternaamAlgemeenError" class="errorSpan" >A.u.b een achternaam invoeren.</span></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Contact Administratief:</div>
                    <div class='el_value'><input type="text" id="voornaamAdministratief" placeholder="Voornaam" /><input type="text" id="achternaamAdministratief" placeholder="Achternaam" /></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Contact RMA:</div>
                    <div class='el_value'><input type="text" id="voornaamRMA" placeholder="Voornaam" /><input type="text" id="achternaamRMA" placeholder="Achternaam" /></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Site:</div>
                    <div class='el_value'><input type="text" id="site" placeholder="http://" /></div>
                    <div class='el_extra'><span id="siteError" class="errorSpan" >Webadres moet worden voorafgegaan door http(s)://</span></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Email:</div>
                    <div class='el_value'><input type="text" id="email" /></div>
                    <div class='el_extra'><span id="emailError" class="errorSpan" >A.u.b een geldig mailadres invoeren.</span></div>
                </div>
                <div class='form_element'>
                    <div class='el_title'>Klantnummer:</div>
                    <div class='el_value'><input type="text" id="klantnummer" /></div>
                </div>
            <div>

<script>
    $(function () {
        
        
        $('#add_company').dialog('option', 'buttons', {
            'Annuleren': function () {
                $(this).dialog('close');
            },
            'Opslaan': function () {
                
                if(error2 === true){
                    
                }
                
                if(error2 === false){
                    
                    do_add();
                    
                }
            }
        });
        // validaties bij onblur
        $('#bedrijf').blur(function(){
            if(!$.Validate.NotEmpty(this.value)) { $('#bedrijfError').css('display', 'block') }
            else {
                $('#bedrijfError').css('display', 'none')
            };
        });
        $('#plaats').blur(function(){
            if(!$.Validate.NotEmpty(this.value)) { $('#plaatsError').css('display', 'block') }
            else {
                $('#plaatsError').css('display', 'none')
            };
        });
        $('#land').change(function(){
            if(this.value === 'Nederland'){
                if(!$.Validate.Postcode($('#postcode').val())) { $('#postcodeError').css('display', 'block') }
                else {
                    $('#postcodeError').css('display', 'none')
                };
                if(!$.Validate.Telefoonnummer($('#telefoonnummer1').val())) { $('#telefoonnummer1Error').css('display', 'block') }
                else {
                    $('#telefoonnummer1Error').css('display', 'none')
                };
            } else {
                if(!$.Validate.NotEmpty($('#postcode').val())) { $('#postcodeError').css('display', 'block') }
                else {
                    $('#postcodeError').css('display', 'none')
                };
                if(!$.Validate.NotEmpty($('#telefoonnummer1').val())) { $('#telefoonnummer1Error').css('display', 'block') }
                else {
                    $('#telefoonnummer1Error').css('display', 'none')
                };
            }}); 
        
        
        $('#postcode').blur(function(){
            if($('#land').val() === 'Nederland'){
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
        $('#straat').blur(function(){
            if(!$.Validate.Adres(this.value)) { $('#straatError').css('display', 'block') }
                else {
                    $('#straatError').css('display', 'none')
                };
        });  
        $('#telefoonnummer1').blur(function(){
            if($('#land').val() === 'Nederland'){
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
        $('#voornaamAlgemeen').blur(function(){
            if(!$.Validate.NotEmpty(this.value)) { $('#voornaamAlgemeenError').css('display', 'block') }
            else {
                $('#voornaamAlgemeenError').css('display', 'none')
            };
        });
        $('#achternaamAlgemeen').blur(function(){
            if(!$.Validate.NotEmpty(this.value)) { $('#achternaamAlgemeenError').css('display', 'block') }
            else {
                $('#achternaamAlgemeenError').css('display', 'none')
            };
        });
        $('#site').blur(function(){
            if($.Validate.NotEmpty(this.value)){
                if(!$.Validate.Site(this.value)) { $('#siteError').css('display', 'block') }
                else {
                    $('#siteError').css('display', 'none')
                };
            }
        });
        $('#email').blur(function(){
            if($.Validate.NotEmpty(this.value)){
                if(!$.Validate.Email(this.value)) { $('#emailError').css('display', 'block') }
                else {
                    $('#emailError').css('display', 'none')
                };
            }
        });
        
    });
    
    // functie voor het doorvoeren van gegevens naar de database
    function do_add() {
        var error2 = false;        
        
        var bedrijf = $('#bedrijf').val();
        var straat = $('#straat').val();
        var plaats = $('#plaats').val();
        var postcode = $('#postcode').val();
        var land = $('#land').val();
        var telefoonnummer1 = $('#telefoonnummer1').val();
        var fax = $('#fax').val();
        var voornaamAlgemeen = $('#voornaamAlgemeen').val();
        var achternaamAlgemeen = $('#achternaamAlgemeen').val();
        var voornaamAdministratief = $('#voornaamAdministratief').val();
        var achternaamAdministratief = $('#achternaamAdministratief').val();
        var voornaamRMA = $('#voornaamRMA').val();
        var achternaamRMA = $('#achternaamRMA').val();
        var site = $('#site').val();
        var email = $('#email').val();
        var klantnummer = $('#klantnummer').val();
        
        //validaties bij opslaan
        if(!$.Validate.NotEmpty(bedrijf)) {
            error2=true; $('#bedrijfError').css('display', 'block') }
        if(!$.Validate.NotEmpty(plaats)) { 
            error2=true; $('#plaatsError').css('display', 'block') }
        if( land === 'Nederland'){
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
        if(!$.Validate.NotEmpty(voornaamAlgemeen)) {
            error2=true; $('#voornaamAlgemeenError').css('display', 'block') }
        if(!$.Validate.NotEmpty(achternaamAlgemeen)) {
            error2=true; $('#achternaamAlgemeenError').css('display', 'block') }
        if($.Validate.NotEmpty(email)){
            if(!$.Validate.Email(email)) {
                error2=true; $('#emailError').css('display', 'block') } }
        if($.Validate.NotEmpty(site)){
            if(!$.Validate.Site(site)) {
                error2=true; $('#siteError').css('display', 'block') } }
        
        
        
        postdata = 'bedrijf=' + bedrijf 
            + '&straat=' + straat 
            + '&plaats=' + plaats 
            + '&postcode=' + postcode
            + '&land=' + land
            + '&telefoonnummer1=' + telefoonnummer1 
            + '&fax=' + fax 
            + '&voornaamAlgemeen=' + voornaamAlgemeen 
            + '&achternaamAlgemeen=' + achternaamAlgemeen 
            + '&voornaamAdministratief=' + voornaamAdministratief 
            + '&achternaamAdministratief=' + achternaamAdministratief 
            + '&voornaamRMA=' + voornaamRMA 
            + '&achternaamRMA=' + achternaamRMA 
            + '&site=' + site 
            + '&email=' + email 
            + '&klantnummer=' + klantnummer;
        
        
        if(error2 === true){
            
        }
        if(error2 === false){
            result = post_return_response('content/adresboek/posts.php?action=add_company', postdata);
        } else {
            result = '200';
        }
        
        
        result = result.split("::");
        
        if(result[0] == '100'){
            $('#add_company').dialog('close');
            
            $('#list').trigger('reloadGrid');
            
            wait_dialog_close();
        } else {
            result_dialog('Het toevoegen is mislukt.', 0);
        }
    }
    
    var error2 = false;
    
</script>