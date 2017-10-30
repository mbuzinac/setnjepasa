<?php
include_once '../../konfiguracija.php';
if(!isset($_SESSION[$sid . "autoriziran"])){
	header("location: ../../odjava.php");
	exit;
}
	$izraz = $veza->prepare("select * 
				   	from pas;
						$izraz->execute(array("uvjet" => "%" . $_GET["term"] . "%",
						"setnja" => $_GET["setnja"]));
						$rezultati=$izraz->fetchAll(PDO::FETCH_OBJ);
	$t=new stdClass();
	$t->sifra=0;
	$t->brojugovora="";
	$t->ime="Nisu prikazani svi rezultati, filtrirajte dodatnim unosom";
	$t->prezime="";
	$rezultati[]=$t;
	echo json_encode($rezultati);