<?php
$link=mysql_connect("br-cdbr-azure-south-a.cloudapp.net", "be3b14652c834a", "20f6a7f0");
if (!$link){
	echo "Erro de Conexão:".mysql_error();
	}else{
		//RELACIONAR BANCO DE dADOS
		$seleciona = mysql_select_db("daw_yearbook", $link);
		if(!$seleciona){
			echo "erro ao selecionar Base de dados".mysql_error();
		}
	}
	

?>