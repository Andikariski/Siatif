  $.getJSON('https://calendarific.com/api/v2/holidays?&api_key=d3f4b935e09ba279695116b7bbc02f01eeb2d64a&country=ID&year=2020', function(data) {
    //data is the JSON string
    var jsonObj = JSON.parse(data);    
  });
  