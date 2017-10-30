<?php
include_once '../../konfiguracija.php';
if(!isset($_SESSION[$sid . "autoriziran"])){
	header("location: ../../odjava.php");
	exit;
}

if (!isset($_POST["setnja"]) && !isset($_POST["pas"])){ 
	header("location: ../../odjava.php");
	exit;
}
	$izraz = $veza->prepare("insert into usluga_setanja_psa (setnja, pas) 
	values (:grupa,:polaznik)");
	$izraz->execute($_POST);
	
	echo "OK";