<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title> P�s Gradu��o Desesvolvimento Web - Atividade 5
		</title>
		<meta charset="uft-8"/>
		<link rel="stylesheet" href="css/estilo.css" />
		<link rel="shortcut icon" href="../../assets/ico/favicon.ico">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link href="css/signin.css" rel="stylesheet">
		<body>
		<?php
		session_start();
				if(isset($_SESSION["logged"]) && $_SESSION["logged"]==true){   //protege o acesso caso n�o exista a vari�vel logged
		if (empty($_SESSION["cont"])) {
		$_SESSION["cont"] = 1;
		} else {
		$_SESSION["cont"]++;
		}
	
		if(count($_SESSION)>0){		
			foreach($_SESSION as $chave=>$valor);
		}
		
		}
		else{	//mensagem de erro para acesso n�o autorizado
		
		header ("location:index.html");
		echo "ERRO:  Fa�a o login";

		}
		?>
		<section class="cabecalho">
            <p><img src="img/logo_puc_minas_virtual.jpg" alt="Logo Puc Minas" title="Logo Puc Minas" class="logo"/>
			</p>			
			<h1>P�s-Gradua��o - Desenvolvimento de Aplica��es Web</h1>
		</section>
		 </header>
            
         <section class= "corpo">
             <div id="dados">
			 <?php 
				$nome=$_SESSION['nomeCompleto'];
				$email=$_SESSION['email'];
				$login=$_GET['login'];
				include'conexao2.php';
				$sql="SELECT * FROM participantes where login='$login'";
				$consulta= mysql_query($sql);	
				while($dados=mysql_fetch_assoc($consulta)){
                 echo"<img class = 'foto' src='uploads/$dados[login]/$dados[arquivoFoto]' alt='$dados[nomeCompleto]' class= '$dados[nomeCompleto]'/>";
                 echo"<p><strong>$dados[nomeCompleto]</strong></p>";
                echo"<p><strong>$dados[email] </strong></p>";
                echo"<p>$dados[descricao]</p>";
                 
				 
                 
             echo"</div>";
			 echo"<nav class='alterar'>";
				echo"<ul>";
					echo"<li>";
						echo"<a href='principal.php'>Voltar</a>";
					echo"</li>";
					
				echo"</ul>";
			echo"</nav>";
			setcookie("ultimo",$dados['nomeCompleto'],time()+60*60*24*30);
			}
					
					
			?>
         </section>
		</body> 
	</html>