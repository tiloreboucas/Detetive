<?php
    header('Content-Type: text/html; charset=UTF-8');

    include "Conect.php";

    // Procura Nome de Partida Já Existente na base
    $result = mysql_query( "SELECT id, name, host FROM Games ORDER BY name ASC" );

    $rows = array();
	while($r = mysql_fetch_assoc($result)) {
	    $rows[] = $r;
	}

	print json_encode($rows);
?>