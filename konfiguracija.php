<?php

//koristiti u produkciji
error_reporting(0);

//prikazuje sve greške, upozorenja i bilješke
error_reporting(E_ALL);

//dobro za rad
error_reporting(E_ERROR | E_WARNING | E_PARSE);
//ili
ini_set('error_reporting', E_ERROR | E_WARNING | E_PARSE);


session_start();
$sid="EWP14";
$GLOBALS["sid"]=$sid;
$dev=true;

$formatDatumaPHP="d.m.Y H:i";
$formatDatumaJS="dd.mm.yy. hh:ii";



if($_SERVER["SERVER_NAME"]==="localhost"){
	$putanjaAPP="/setnjepasa/";
	$server="localhost";
	$imeBaze="setnje_pasa";
	$korisnik="edunova";
	$lozinka="edunova";
}else{
	$putanjaAPP="/setnjepasa/";
	$server="sql307.byethost7.com";
	$imeBaze="b7_19191796_setnjepasa";
	$korisnik="b7_19191796";
	$lozinka="26101988";
}


$veza = new PDO(
	"mysql:host=" . $server . ";dbname=" . $imeBaze,
	$korisnik,
	$lozinka,
	array(
		PDO::ATTR_EMULATE_PREPARES=> false,
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8",
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
	)
);






