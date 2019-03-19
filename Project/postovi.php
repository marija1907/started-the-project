<?php
include ("connect.php");
//naslovi
echo "<h3>Last posts</h3>";

//slozeni query
$qpostovi = "
	select 
		`project_one`.`id` as `post_id`,
		`project_one`.`naslov` as `post_naslov`,
		`project_one`.`tekst` as `post_tekst`,
		`project_one`.`datum` as `post_datum`,
		`project_one`.`kategorija_id` as `post_kat_id`,
		`project_one`.`korisnik_id` as `post_kor_id`,
		
		`kategorije`.`id` as `post_kategorija_id`,
		`kategorije`.`naziv` as `post_kategorija_naziv`,
		
		`korisnici`.`id` as `kor_id`,
		`korisnici`.`username` as `kor_user`
	from 
		`project_one`,`kategorije`,`korisnici`
	where
		`kategorije`.`id` = `project_one`.`kategorija_id`
	and
		`korisnici`.`id` = `project_one`.`korisnik_id`
		
	group by 
		`project_one`.`id`
	order by
		`project_one`.`datum` desc
";
//pdo kod
	$postovi = $connector->query($qpostovi);
	$sviPostovi = $postovi->fetchAll(PDO::FETCH_OBJ);
	//echo "<pre>", print_r($sviPostovi), "</pre>";
	
	
//prikaz postova
foreach($sviPostovi as $p){
	echo "<h3> Naslov : ". $p->post_naslov ."</h3>";
	echo "<p> Datum : ". $p->post_datum . "<br> Autor : ". $p->kor_user ."<br>Kategorija :". $p->post_kategorija_naziv ."</p>";
	echo "<p> Tekst : ". $p->post_tekst ."</p>";
	echo "<a href=''>Opsirnije</a><br>";
	echo "<hr>";
}


