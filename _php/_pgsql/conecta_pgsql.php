<?php 
	$dbconn = pg_connect("host=localhost port=5432 dbname=teste user=postgres password=B123*")
        or die('Could not connect: ' . pg_last_error());
/*
	$con_string = "host=PRCWOPSVTCC4110 port=5432 dbname=teste user=postgres password=B951753123*";
	$conexao = pg_connect($con_string);
*/
 ?>