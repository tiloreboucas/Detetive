<?php
    header('Content-Type: text/html; charset=UTF-8');

    include "Conect.php";

    // Recupera Dados
    $id = $_REQUEST["id"];

    // Procura Sala na base
    $result = mysql_query( "SELECT * FROM Games WHERE id='".$id."'");

    $rows = array();
	while($r = mysql_fetch_assoc($result)) {
	    $rows[] = $r;
	}

	print json_encode($rows);
?>