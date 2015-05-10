<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title> Pós Gradução Desesvolvimento Web - Atividade 5
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
		
		header ("location:index.php");
		echo "ERRO:  Faça o login";

		}
		?>
		<section class="cabecalho">
            <header>
				<p><img src="img/logo_puc_minas_virtual.jpg" alt="Logo Puc Minas" title="Logo Puc Minas" class="logo"/>
					</p>			
				<h1>Pós-Graduação - Desenvolvimento de Aplicações Web</h1>
			</header>
		</section>
            
         <section class= "corpo">
			
             <div id="dados">
			 <?php 
				$login=$_SESSION['login'];
				$nome=$_SESSION['nomeCompleto'];
				$email=$_SESSION['email'];
				
				
				include'conexao2.php';
				$sql="SELECT * FROM participantes where login='$login'";
				$consulta= mysql_query($sql);	
				while($dados=mysql_fetch_assoc($consulta)){
				echo "<img class = 'foto3' src='uploads/$dados[login]/$dados[arquivoFoto]' alt='$dados[nomeCompleto]' class= '$dados[nomeCompleto]'/>";
                 }
					
					echo"<p>$nome</p>";
					echo"<p>$email</p>";
				?>
				<nav class="alterar">
				<ul>
					<li>
						<a href="alterar.php">Aterar Perfil</a>
					</li>
					<li>
						<a href="robertadomingues.html">Alterar Foto </a>
					</li>
					<li>
						<a href="finalizar.php">Sair</a>
					</li>
				</ul>
			</nav>
			
			<form method="post" action="consultar.php" enctype="multipart/form-data" class="form-signin" role="form">
		
			</div>
			
         </section>
		 <section class="corpo">
		  <div class="foto2">
		  <h2 class="form-signin-heading">Consulta de Alunos</h2>
				<?php
				$nomeCompleto= $_POST['nomeCompleto'];
				include'conexao2.php';
				$sql="select login, nomeCompleto, arquivoFoto from participantes where nomeCompleto like '$nomeCompleto%'";
				$consulta= mysql_query($sql);	
				while($dados=mysql_fetch_assoc($consulta)){
				echo "<a href='usuario.php?login=$dados[login]'><img src='uploads/$dados[login]/$dados[arquivoFoto]' alt='$dados[nomeCompleto]' title='$dados[nomeCompleto]' class='foto'/></a>";
				}?>
			</div>
            
		<nav class='nome'>
		<ul>
				<?php
				include'conexao2.php';
				$sql="select login, nomeCompleto, arquivoFoto from participantes where nomeCompleto like '$nomeCompleto%'";
				$consulta= mysql_query($sql);	
				while($dados=mysql_fetch_assoc($consulta)){
				echo "<li>";
				echo"<a href='usuario.php?login=$dados[login]'>$dados[nomeCompleto]</a>";
				echo"</li>";
				
				}?>
				</ul>
		</nav>
		
		</body> 
	</html>