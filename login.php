<?php
	include('conexao2.php');
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	$query = "SELECT * FROM participantes WHERE login= '$login' and senha=$senha ";
   	$exec_sql = mysql_query($query);
	$resultados = mysql_fetch_assoc($exec_sql);
   	if (mysql_num_rows($exec_sql)==0){
		 header("location:erro_log.php");
			}
			else{
					session_start();
					$login = $resultados['login'];
                    $_SESSION['login'] = $login;
					$_SESSION['email']= $resultados['email'];
					$_SESSION['nomeCompleto']=$resultados['nomeCompleto'];
					$_SESSION["logged"]=true;
					header("location:principal.php");
				}
	
 
 
		
 
