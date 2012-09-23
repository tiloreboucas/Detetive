<?php
    header('Content-Type: text/html; charset=UTF-8');

    include "Conect.php";

    // Recupera Dados
    $name = $_REQUEST["name"];
    $senha = md5($_REQUEST["senha"]);
    $host = "tilowr@gmail.com"; // Recuperar o HOST
    $players = "[{ email: \'".$host."\'}]"; // Adicionar o Host a Lista de Players

    // Procura Nome de Partida Já Existente na base
    $result = mysql_query( "SELECT name FROM Games WHERE name='".$name."'");

    if (!$result) {
	    echo 'Não foi possível executar a consulta: ' . mysql_error();
	    exit;
	} else {
		$num_rows = mysql_num_rows($result);

		if($num_rows > 0) {
	    	echo "[{status: false}]";
	    } else {
	    	// Insere Dados
			$query = "INSERT INTO Games(name, senha, host, players) VALUES ('".$name."','".$senha."','".$host."','".$players."')";

			if(!$insert = mysql_query($query))
			{
				echo "[{status: false}]";
			} else {
				$id = mysql_insert_id(); 
				echo "[{ status: true, id: ".$id.", modo: 'host'}]";
			}
	    }
	}
?>