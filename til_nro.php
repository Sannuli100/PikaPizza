<?php

// Otetaan yhteys tietokantaan 
$palvelin = "localhost";
$kayttaja = "root";
$salasana = "";
$tietokanta = "pikapizza";

$link = mysqli_connect($palvelin, $kayttaja, $salasana, $tietokanta);

if(mysqli_connect_error()){

	die("Tietokantaan ei saatu yhteytt�");
	
	}
	
		$kysely = "SELECT TIL_NO FROM tilaaja";
		$vastaus = mysqli_query($link, $kysely);
		$rivit=mysqli_fetch_assoc($vastaus);
  header("Content-type: image/jpg");
		echo $rivit['kuva'];
?>