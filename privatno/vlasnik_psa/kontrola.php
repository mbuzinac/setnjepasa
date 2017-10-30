<?php

//radi provjere
	$_POST["ime"]=trim($_POST["ime"]);
	if(strlen($_POST["ime"])==0){
		$poruke["ime"]="ime obavezno";
	}
	$_POST["prezime"]=trim($_POST["prezime"]);
	if(strlen($_POST["prezime"])==0){
		$poruke["prezime"]="prezime obavezno";
	}
	
	if(strlen($_POST["pas"])>50){
		$poruke["pas"]="Dužina naziva mora biti manja od 50";
	}
	
	$_POST["adresa"]=trim($_POST["adresa"]);
	if(strlen($_POST["adresa"])==0){
		$poruke["adresa"]="adresa obavezno";
	}
	
	if(strlen($_POST["email"])>50){
		$poruke["email"]="Dužina naziva mora biti manja od 50";
	}
	if(strlen($_POST["telefon"])>50){
		$poruke["telefon"]="Dužina naziva mora biti manja od 50";
	}
	$_POST["lozinka"]=trim($_POST["lozinka"]);
	if(strlen($_POST["lozinka"])==0){
		$poruke["lozinka"]="lozinka obavezno";
	}