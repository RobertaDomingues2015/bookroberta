<?php

include('conexao2.php');
session_start();
$login=$_SESSION['login'];
$nomeCompleto= $_POST['nomeCompleto'];
$email= $_POST['email'];
$senha= $_POST['senha'];
$cidade= $_POST['cidade'];
$descricao= $_POST['descricao'];



$sql= "UPDATE participantes SET senha='$senha',nomeCompleto='$nomeCompleto',cidade='$cidade',email='$email',descricao='$descricao' WHERE login='$login'"; 
$query=mysql_query($sql);
$insert=  mysql_query($sql);

if(!$insert){
	die('Erro inserÃ§Ã£o'.mysql_error());
}
else{ echo "Dados Inseridos";
		session_start();
					
					header("location:principal.php");
		
		
}





?>