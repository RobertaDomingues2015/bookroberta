<?php
include 'conexao2.php';
$permissoes = array("gif", "jpeg", "jpg", "png", "image/gif", "image/jpeg", "image/jpg", "image/png");  //strings de tipos e extensoes validas
$temp=explode(".", basename($_FILES["fileName"]["name"]));
$extensao = end($temp);
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
	  $dirUploads = "uploads/";
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

$login=$_POST['login'];
$senha=$_POST['senha'];
$nomeCompleto= $_POST['nomeCompleto'];
$arquivoFoto= $_FILES['fileName']['name'];
$cidade=$_POST['cidade'];
$email=$_POST['email'];
$descricao=$_POST['descricao'];

$sql="insert into participantes values('$login','$senha','$nomeCompleto','$arquivoFoto','$cidade','$email','$descricao')";

$insert=  mysql_query($sql);
$id_log=mysql_insert_id();
if(!$insert){
	die('Erro inserÃ§Ã£o'.mysql_error());
}
else{ 
	echo "Dados Inseridos";
		 header("location:msg_cad.php?mensagem='Aluno cadastrado com sucesso'");
		
}
?>

