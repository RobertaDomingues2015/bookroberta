<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/assets/ico/favicon.ico">
	<link rel="stylesheet" href="css/estilo.css" />
    <title>Login Yearbooks  </title>
	<link rel="shortcut icon" href="../../assets/ico/favicon.ico">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link href="css/signin.css" rel="stylesheet">
	<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
  </head>

  <body>
	<body>
	<section class="cabecalho">
            <header>
				<p><img src="img/logo_puc_minas_virtual.jpg" alt="Logo Puc Minas" title="Logo Puc Minas" class="logo"/>
					</p>			
				<h1>Pós-Graduação - Desenvolvimento de Aplicações Web</h1>
			</header>
	</section>

    <div class="container">

      <form method="post" action="login.php" class="form-signin" role="form">
        <h2 class="form-signin-heading text-center">Faça seu login</h2>
        
		<input type="login" name="login" class="form-control" placeholder="Login" required autofocus>
        
		<input type="password" name="senha" class="form-control" placeholder="Senha" required>
        
		<label class="checkbox">
          <input type="checkbox" name="lembrar" value="lembrar-login"> Lembrar login
        </label>
		<p><a href="cadastro.php">Ainda não sou cadastrado</a></P>
        
		<button class="btn btn-lg btn-success btn-block" type="submit">Enviar</button>
      </form>

    </div> 
	
	<div class="foto5">
		
	<?php
				
				include'conexao2.php';
				$sql="SELECT * FROM participantes";
				$consulta= mysql_query($sql);	
				while($dados=mysql_fetch_assoc($consulta)){
				echo "<img src='uploads/$dados[login]/$dados[arquivoFoto]' alt='$dados[nomeCompleto]' title='$dados[nomeCompleto]' class='foto4'/>";
				
				
				}?>
				
	</div>
	
	<script src="../dist/js/bootstrap.min.js"></script>
  </body>
</html>
