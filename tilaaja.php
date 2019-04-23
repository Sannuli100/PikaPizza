<?php
// Haetaan tiedot tietokannasta muuttujiin
$asno = $_GET["asno"]; 
$nimi = $_GET["nimi"]; 
$puhelin = $_GET["puhelin"]; 
$email = $_GET["email"]; 

// Otetaan yhteys tietokantaan 
$palvelin = "localhost";
$kayttaja = "root";
$salasana = "";
$tietokanta = "pikapizza";

$link = mysqli_connect($palvelin, $kayttaja, $salasana, $tietokanta);

if(mysqli_connect_error()){

	die("Tietokantaan ei saatu yhteyttä");
	
	}
// tilausno
$t = mktime();
$tilno = date("YmdHis", $t);
// tilausaika
$tilaika = date("H:i:s");
// tilauspvm
$tilpvm = date("d-m-Y");

$kysely = "INSERT INTO tilaaja (TIL_NO,TIL_ASNO,TIL_NIMI,TIL_PUH,TIL_EMAIL,TIL_PVM,TIL_AIKA) VALUES 
('$tilno','$asno','$nimi','$puhelin','$email','$tilpvm','$tilaika')";

if (mysqli_query($link, $kysely)) {
      echo "Uudet tiedostot paivitetty";
} else {
      echo "Virhe: " . $kysely . "<br>" . mysqli_error($link);
}

include ("Kiitos_tilauksesta.html");

mysqli_close($link);
?>
