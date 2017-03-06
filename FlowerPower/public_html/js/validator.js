/** 
 * validator.js
 *
 * Form Validator
 *
 * @Author Mark
 * @version $Revision v3.00$
 * @copyright Copyright (c) 2013, Intra-IT Automatisering
 
 * @package IntraNET
 * @subpackage Abonnementen
 */


$(function() {
    
    $.Validate = {
        
        NotEmpty : function(value) {
            if (value == ""){ 
                return true;
            } else {
                return false;
            }
        },
        
        Adres : function (value) {
            var straatTest = /^[a-zA-Z ]{1,63}$/i;
                if (!straatTest.test(value)) { 
                    return true;
                } else { 
                    return false;
                }
        },
        
        AdresNo : function (value) {
            var adresNo = /^[0-9]{1,5}$/i;
            
                if(!adresNo.test(value)){
                    return true;
                } else {
                    return false;
                }
               
        },
        
        AdresWithNo : function (value) {
            var straatTest = /^([1-9][e][\s])*([a-zA-Z]+(([\.][\s])|([\s]))?)+[1-9][0-9]*(([-][1-9][0-9]*)|([\s]?[a-zA-Z]+))?$/i;
                if (!straatTest.test(value)) { 
                    return true;
                } else { 
                    return false;
                }
        },
        
        Postcode : function (value) {
            var postcodeTest = /^[1-9][0-9]{3}\s?([a-zA-Z]{2})?$/;
                if (!postcodeTest.test(value)) { 
                    return true;
                } else { 
                    return false;
                }            
        },
        
        Telefoonnummer : function(value) {
            //var telefoonnummerTest = /^(((0)[1-9]{2}[0-9][-]?[1-9][0-9]{5})|((\\+31|0|0031)[1-9][0-9][-]?[1-9][0-9]{6}))$/;
            var telefoonnummerTest = /^(((0)[1-9]{2}[0-9][-]?[1-9][0-9]{5})|((\\+31|0|0031)[1-9][0-9][-]?[1-9][0-9]{6}))$/;
            if (!telefoonnummerTest.test(value)) { 
                return true;
            } else { 
                return false;
            }           
        },
        
        Mobielnummer : function (value) {
            //var mobielnummerTest = /^(((\\+31|0|0031)6){1}[-]?[1-9]{1}[0-9]{7})$/i;
            var mobielnummerTest = /^(((\\+31|0|0031)6){1}[1-9]{1}[0-9]{7})$/i;
                if (!mobielnummerTest.test(value)) { 
                    return true;
                } else { 
                    return false;
                }  
        },
        
        Email : function(value) {
            var emailTest = /^[a-z0-9][a-z0-9_.-]{0,63}@([a-z0-9]+\.)*[a-z0-9][a-z0-9\-]+\.([a-z]{2,6})$/i;
                if (!emailTest.test(value)) { 
                    return true;
                } else { 
                    return false;
                }
        },
        
        Site : function (value) {
            var siteTest = /^((http|https|ftp):\/\/)/
                if (!siteTest.test(value)) { 
                    return true;
                } else { 
                    return false;
                }
        },
        
        Name : function(value) {
            var nameTest = /^[a-zA-Z _.-]+$/i
             if(!nameTest.test(value)){
                 return true;
             } else {
                 return false;
             }
        },
        
        BIC : function(value) {
            var bicTest = /^[a-zA-Z]{4}[a-zA-Z]{2}[a-zA-Z0-9]{2}([a-zA-Z0-9]{3})?/i;
            if(!bicTest.test(value)){
                return true;
            } else {
                return false;
            }
        },
        
        IBAN : function(value) {
            var ibanTest = /^[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{4}[0-9]{7}([a-zA-Z0-9]?){0,16}$/i;
            if(!ibanTest.test(value)){
                return true;
            } else {
                return false;
            }
        },
        
        Number : function(value) {
            var numberTest = /^[0-9]+$/i;
            if(!numberTest.test(value)) {
                return true;
            } else {
                return false;
            }
        },
        
        BTW : function(value) {

            var BETest = /^((BE)?0?[0-9]{9})$/i;
            var DETest = /^((DE)?[0-9]{9})$/i;
            var NLTest = /^((NL)\.?[0-9]{9}\.B[0-9]{2})$/i;
            
            if     (
                    !BETest.test(value) & 
                    !DETest.test(value) &
                    !NLTest.test(value) 
                   ){ return true;  }
            else                        { return false; }
//                        (AT)?U[0-9]{8} |                              # Austria
//                        (BE)?0?[0-9]{9} |                             # Belgium
//                        (BG)?[0-9]{9,10} |                            # Bulgaria
//                        (CY)?[0-9]{8}L |                              # Cyprus
//                        (CZ)?[0-9]{8,10} |                            # Czech Republic
//                        (DE)?[0-9]{9} |                               # Germany
//                        (DK)?[0-9]{8} |                               # Denmark
//                        (EE)?[0-9]{9} |                               # Estonia
//                        (EL|GR)?[0-9]{9} |                            # Greece
//                        (ES)?[0-9A-Z][0-9]{7}[0-9A-Z] |               # Spain
//                        (FI)?[0-9]{8} |                               # Finland
//                        (FR)?[0-9A-Z]{2}[0-9]{9} |                    # France
//                        (GB)?([0-9]{9}([0-9]{3})?|[A-Z]{2}[0-9]{3}) | # United Kingdom
//                        (HU)?[0-9]{8} |                               # Hungary
//                        (IE)?[0-9]S[0-9]{5}L |                        # Ireland
//                        (IT)?[0-9]{11} |                              # Italy
//                        (LT)?([0-9]{9}|[0-9]{12}) |                   # Lithuania
//                        (LU)?[0-9]{8} |                               # Luxembourg
//                        (LV)?[0-9]{11} |                              # Latvia
//                        (MT)?[0-9]{8} |                               # Malta
//                        (NL)?[0-9]{9}B[0-9]{2} |                      # Netherlands
//                        (PL)?[0-9]{10} |                              # Poland
//                        (PT)?[0-9]{9} |                               # Portugal
//                        (RO)?[0-9]{2,10} |                            # Romania
//                        (SE)?[0-9]{12} |                              # Sweden
//                        (SI)?[0-9]{8} |                               # Slovenia
//                        (SK)?[0-9]{10}                                # Slovakia
//                        )$/i;
        }
    }
});