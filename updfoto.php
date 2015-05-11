<?php
session_start();
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
$login=$_SESSION['login'];
include 'conexao2.php';
$permissoes = array("gif", "jpeg", "jpg", "png", "image/gif", "image/jpeg", "image/jpg", "image/png");  //strings de tipos e extensoes validas
$temp=explode(".", basename($_FILES["fileName"]["name"]));
$extensao = end($temp);

if ((in_array($extensao, $permissoes))
&& (in_array($_FILES["fileName"]["type"], $permissoes))
&& ($_FILES["fileName"]["size"] < $_POST["MAX_FILE_SIZE"]))
  {
  if ($_FILES["fileName"]["error"] > 0)
    {
    echo "<h1>Erro no envio, código: " . $_FILES["fileName"]["error"] . "</h1>";
    }
  else
    {
	  $dirUploads = "https://github.com/RobertaDomingues2015/bookroberta/tree/master/uploads/";
      $nomeUsuario = $_SESSION['login']."/";	  
	  
	  if(!file_exists ( $dirUploads ))
			mkdir($dirUploads, 0500);  //permissao de leitura e execucao
	  
	  $caminhoUpload = $dirUploads.$nomeUsuario;
	  if(!file_exists ( $caminhoUpload ))
			mkdir($caminhoUpload, 0700);  //permissoes de escrita, leitura e execucao
			
	  $pathCompleto = $caminhoUpload.basename($_FILES["fileName"]["name"]);
	  move_uploaded_file($_FILES["fileName"]["tmp_name"], $pathCompleto);
      
  }
  }

$arquivoFoto= $_FILES['fileName']['name'];

$sql= "UPDATE participantes SET arquivoFoto='$arquivoFoto' WHERE login='$login'"; 
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
