<?php
    header('Content-Type: text/html; charset=UTF-8');

    include "Conect.php";

    // Recupera Dados
    $email = $_REQUEST["email"];
    $senha = md5($_REQUEST["senha"]);

    // Procura Nome de Partida Já Existente na base
    $query = "SELECT * FROM Users WHERE email='".$email."' AND senha='".$senha."'";
    $result = mysql_query($query);

    $rows = array();
	
	while($r = mysql_fetch_assoc($result)) {
	    $rows[] = $r;
	}

	print json_encode($rows);
?>