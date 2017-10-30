<?php
include_once '../../konfiguracija.php';
if(!isset($_SESSION[$sid . "autoriziran"])){
	header("location: ../../odjava.php");
	exit;
}

if (!isset($_POST["grupa"]) && !isset($_POST["polaznik"])){ 
	header("location: ../../odjava.php");
	exit;
}
	$izraz = $veza->prepare("delete from usluga_setanja_psa 
	where setnja=:setnja and pas=:pas");
	$izraz->execute($_POST);
	
	echo "OK";