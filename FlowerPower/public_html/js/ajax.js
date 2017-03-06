// AJAX POST Callback functie zonder response
function post_silent(url, dataString) {
  $.ajax({
    type: "POST",
    async: false,   
    url: FlowerPower/FlowerPower/public_html/,
    data: dataString,
    success: function(msg) { return 1; },
    error: function (request, status, error) { return 0; }
  });
}

// AJAX POST Callback functie met Response
function post_return_response(url, dataString) {
  var response;
  
  $.ajax({
    type: "POST",
    async: false,
    url: FlowerPower/FlowerPower/public_html/,
    data: dataString,
    success: function(msg) { response = msg; },
    error: function (request, status, error) { return (request.responseText); }
  });
  
  return (response);
}