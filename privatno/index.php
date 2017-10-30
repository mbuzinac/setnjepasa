<?php
include_once '../konfiguracija.php';
if(!isset($_SESSION["autoriziran"])) {
	header("location: ../odjava.php");
}
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
	<head>
		<?php
		include_once '../predlozak/head.php';
		?>
	</head>
	<body>
		<?php
		include_once '../predlozak/izbornik.php';
		?>
   <?php include_once '../predlozak/footer.php';  ?>
		<?php
	include_once '../predlozak/skripta.php';
		?>
		<script src="<?php echo $putanjaAPP ?>js/highcharts.js"></script>
		<script src="<?php echo $putanjaAPP ?>js/exporting.js"></script>

	</body>
</html>

