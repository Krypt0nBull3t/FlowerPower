$('document').ready(function()
{ 
     /* validation */
  $("#form_login").validate({
      rules:
   {
   password: {
   required: true,
   },
   username: {
            required: true
            },
    },
       messages:
    {
            password:{
                      required: "voer A.U.B uw wachtwoord in"
                     },
            username: "voer A.U.B uw gebruikersnaam in",
       },
    submitHandler: submitForm 
       });  
    /* validation */
    
    /* login submit */
    function submitForm()
    {  
   var data = $("#form_login").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : 'login.php',
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
   },
   success :  function(response)
      {      
     if(response=="ok"){
         
      $("#submit").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
      setTimeout(' window.location.href = "home.php"; ',4000);
     }
     else{
         
      $("#error").fadeIn(1000, function(){      
    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
           $("#submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
         });
     }
     }
   });
    return false;
  }
    /* login submit */
});