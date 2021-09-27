<html>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/jquery/jquery.js"></script>
<script src="vendor/jquery/jquery-ui.js"></script>


<script>
  
  $(document).ready(function() {
    
    var tgl_merah=[];
    $.getJSON('https://calendarific.com/api/v2/holidays?&api_key=d3f4b935e09ba279695116b7bbc02f01eeb2d64a&country=ID&year=2020', function(data) {
    //data is the JSON string    
    var i;
    for (i = 0; i < data.response.holidays.length; i++) {
    tgl_merah.push(data.response.holidays[i].date.iso.substring(0,10));
    }
    
  });
    console.log(tgl_merah);
});
</script>
  <body>
</body>
</html>
