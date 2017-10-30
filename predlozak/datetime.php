<?php include_once '../konfiguracija.php';  ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="<?php echo $putanjaAPP ?>css/datetimepicker.css"/>
<style type="text/css">

.custom-date-style {
	background-color: red !important;
}

.input{	
}
.input-wide{
	width: 500px;
}

</style>
</head>
<body>

	<input type="text" class="some_class" value="" id="some_class_1"/>
	
</body>
<script src="<?php echo $putanjaAPP ?>js/vendor/jquery.js"></script>
<script src="<?php echo $putanjaAPP ?>js/datetimepicker.full.js"></script>
<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/

$.datetimepicker.setLocale('hr');

$('.some_class').datetimepicker();

</script>
</html>
