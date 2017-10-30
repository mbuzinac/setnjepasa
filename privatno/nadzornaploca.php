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
		
		<div id="container" style="min-width: 100%; height: 500px; margin: 0 auto"></div>

		
		<?php
	include_once "../predlozak/skripta.php";
		?>
		<script src="<?php echo $putanjaAPP ?>js/highcharts.js"></script>
		<script src="<?php echo $putanjaAPP ?>js/exporting.js"></script>
		<script>
			$(function () {

    $(document).ready(function () {

        // Build the chart
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ime i prezime
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Grupe',
                colorByPoint: true,
                data: [
                
                
                
               
                ]
            }]
        });
    });
});
		</script>
	</body>
</html>
