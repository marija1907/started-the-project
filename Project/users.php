<?php
include ("connect.php");
//prikaz naziva stranice
echo "<h3>Lista korisnika</h3>";

//Upiti za rad sa pdo
$query = "SELECT * FROM `korisnici`";
$korisnici = $connector->query($query);
$sviKorisnici = $korisnici->fetchAll(PDO::FETCH_OBJ);
//print_r ($sveKategorije);
//prikaz podataka

foreach($sviKorisnici as $korisnik){
	$qpostovi = "select * from `project_one` where `korisnik_id` = '". $korisnik->id ."'";
	$postovi = $connector->query($qpostovi);
	$brojacPostova = $postovi->rowCount();
	echo "<a href='index.php?opcija=users&id=". $korisnik->id ."'>". $korisnik->username ."(". $brojacPostova .")</a><br>";
	
}