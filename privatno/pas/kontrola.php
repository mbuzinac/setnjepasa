<?php

//radi provjere
	$_POST["ime"]=trim($_POST["ime"]);
	if(strlen($_POST["ime"])==0){
		$poruke["ime"]="ime obavezno";
	}
	$_POST["spol"]=trim($_POST["spol"]);
	if(strlen($_POST["spol"])==0){
		$poruke["spol"]="spol obavezno";
	}
	
	$_POST["opis"]=trim($_POST["opis"]);
	if(strlen($_POST["opis"])==0){
		$poruke["opis"]="opis obavezno";
	}
	if($_POST["vlasnik_psa"]==0){
		$poruke["vlasnik_psa"]="Vlasnik psa obavezno";
	}
	
	