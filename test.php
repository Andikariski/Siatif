<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<script src="js/jquery.js">
var selected = localStorage.getItem('selected');
if (selected) {
  $(".num_apples").val(selected);
}


$(".num_apples").change(function() {
  localStorage.setItem('selected', $(this).val());
  location.reload();
});
</script>
</head>
<body>
<span> 
    There are  
    <select class="num_apples form-control">
        <option value="1">1</option>
        <option value="5" selected="selected">5
        </option><option value="50">50</option>
    </select>
    apples on the table
</span>
</form>
</body>
</html>