<?php
    header('Content-Type: text/html; charset=UTF-8');

    include "conect.php";

    // Recupera Dados
    $email = $_REQUEST["email"];
    $senha = md5($_REQUEST["senha"]);

    // Procura Email Já Existente na base
    $result = mysql_query( "SELECT email FROM Users WHERE email='".$email."'");
    
    if (!$result) {
	    echo 'Não foi possível executar a consulta: ' . mysql_error();
	    exit;
	} else {
		$num_rows = mysql_num_rows($result);

		if($num_rows > 0) {
	    	echo "false";
	    } else {
	    	// Insere Dados
			$query = "INSERT INTO Users(email, senha) VALUES ('".$email."','".$senha."')";

			if(!$insert = mysql_query($query))
			{
				echo "false";
			} else {
				echo "true";
			}
	    }
	}
?>