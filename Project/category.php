<?php
include ("connect.php");
//prikaz naziva stranice
echo "<h3>Lista kategorija</h3>";

//Upiti za rad sa pdo
$query = "SELECT * FROM `kategorije`";
$kategorije = $connector->query($query);
$sveKategorije = $kategorije->fetchAll(PDO::FETCH_OBJ);
//print_r ($sveKategorije);
//prikaz podataka

foreach($sveKategorije as $kategorija){
	$qpostovi = "select * from `project_one` where `kategorija_id` = '". $kategorija->id ."'";
	$postovi = $connector->query($qpostovi);
	$brojacPostova = $postovi->rowCount();
	echo "<a href='index.php?opcija=category&id=". $kategorija->id ."'>". $kategorija->naziv ."(". $brojacPostova .")</a><br>";
	
}