<?php

for($i=7;$i<40;$i++){
	echo "insert into vlasnik_psa (ime,prezime,pas)
	values ('ime " . $i . "','prezime " . $i . "','pas " . $i . "');<br />";
}


for($i=4;$i<1200;$i++){
	$oib = "00000000000" . $i;
	$oib=substr($oib, count($oib)-11);
	echo "insert into osoba (oib,ime,prezime,email)
	values ('" . $oib . "','Ime " . $i . "', 'prezime" . $i . "',null);<br />";
}


for($i=4;$i<1190;$i++){
	$oib = "00000000000" . $i;
	$oib=substr($oib, count($oib)-11);
	echo "insert into polaznik (oib,brojugovora)
	values ('" . $oib . "','B1112');<br />";
}

for($i=1190;$i<1200;$i++){
	$oib = "00000000000" . $i;
	$oib=substr($oib, count($oib)-11);
	echo "insert into predavac (oib,ziroracun)
	values ('" . $oib . "','HR252525');<br />";
}

for($i=1;$i<301;$i++){
	echo "insert into grupa (smjer,predavac,naziv)
	values (" . rand(1,30) . "," . rand(1,10) . ",'Naziv grupe" . $i . "');<br />";
}

for($i=1;$i<1300;$i++){
	echo "insert into clan (grupa,polaznik)
	values (" . rand(1,300) . "," . rand(1,1100) . ");<br />";
}

