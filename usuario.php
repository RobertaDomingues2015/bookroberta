<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    		<meta name="viewport" content="width=device-width, initial-scale=1">
    		<meta name="description" content="">
    		<meta name="author" content="">
		<title> Pós Gradução Desesvolvimento Web - Atividade 5
		</title>
		
		<link rel="stylesheet" href="css/estilo.css" />
		<link rel="shortcut icon" href="../../assets/ico/favicon.ico">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link href="css/signin.css" rel="stylesheet">
		<body>
		<?php
		session_start();
				if(isset($_SESSION["logged"]) && $_SESSION["logged"]==true){   //protege o acesso caso não exista a variável logged
		if (empty($_SESSION["cont"])) {
		$_SESSION["cont"] = 1;
		} else {
		$_SESSION["cont"]++;
		}
	
		if(count($_SESSION)>0){		
			foreach($_SESSION as $chave=>$valor);
		}
		
		}
		else{	//mensagem de erro para acesso não autorizado
		
		header ("location:index.html");
		echo "ERRO:  Faça o login";

		}
		?>
		<section class="cabecalho">
            <p><img src="img/logo_puc_minas_virtual.jpg" alt="Logo Puc Minas" title="Logo Puc Minas" class="logo"/>
			</p>			
			<h1>Pós-Graduação - Desenvolvimento de Aplicações Web</h1>
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
