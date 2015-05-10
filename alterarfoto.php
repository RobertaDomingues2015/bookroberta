<!DOCTYPE html>
<html lang="pt-BR">

  <head>
   <link rel="stylesheet" href="css/estilo.css" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    
    <title>Alterar de Alunos</title>
	<link rel="shortcut icon" href="../../assets/ico/favicon.ico">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link href="css/signin.css" rel="stylesheet">
	<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
	<script language="JavaScript">
		function Dados(valor) {

		//verifica se o browser tem suporte a ajax
			try {
				ajax = new ActiveXObject("Microsoft.XMLHTTP");
				} 
			catch(e) {
			try {
				ajax = new ActiveXObject("Msxml2.XMLHTTP");
				}
			catch(ex) {
            try {
               ajax = new XMLHttpRequest();
				}
	        catch(exc) {
               alert("Esse browser não tem recursos para uso do Ajax");
               ajax = null;
            }
			}
		}
		//se tiver suporte ajax
		if(ajax) {
	     //deixa apenas o elemento 1 no option, os outros são excluídos
		document.forms[0].cidade.options.length = 1;
	     
		idOpcao  = document.getElementById("opcoes");
		 
	     ajax.open("POST", "cidade.php", true);
		 ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		 
		 ajax.onreadystatechange = function() {
            //enquanto estiver processando...emite a msg de carregando
			if(ajax.readyState == 1) {
			   idOpcao.innerHTML = "Carregando...!";   
	        }
			//após ser processado - chama função processXML que vai varrer os dados
            if(ajax.readyState == 4 ) {
			   if(ajax.responseXML) {
			      processXML(ajax.responseXML);
			   }
			   else {
			       //caso não seja um arquivo XML emite a mensagem abaixo
				   idOpcao.innerHTML = "--Primeiro selecione o estado--";
			   }
            }
         }
		 //passa o código do estado escolhido
	     var params = "estado="+valor;
         ajax.send(params);
		}
	}
   
	function processXML(obj){
      //pega a tag cidade
      var dataArray   = obj.getElementsByTagName("cidade");
      
	  //total de elementos contidos na tag cidade
	  if(dataArray.length > 0) {
	     //percorre o arquivo XML paara extrair os dados
         for(var i = 0 ; i < dataArray.length ; i++) {
            var item = dataArray[i];
			//contéudo dos campos no arquivo XML
			var codigo    =  item.getElementsByTagName("codigo")[0].firstChild.nodeValue;
			var nome =  item.getElementsByTagName("nome")[0].firstChild.nodeValue;
			
	        idOpcao.innerHTML = "--Selecione uma das opções abaixo--";
			
			//cria um novo option dinamicamente  
			var novo = document.createElement("option");
			//atribui um ID a esse elemento
			novo.setAttribute("id", "opcoes");
			//atribui um valor
			novo.value = codigo;
			//atribui um texto
			novo.text  = nome;
			//finalmente adiciona o novo elemento
			document.forms[0].cidade.options.add(novo);
		 }
	  }else {
	    //caso o XML volte vazio, printa a mensagem abaixo
		idOpcao.innerHTML = "--Primeiro selecione a disciplina--";
	  }	  
	}

	</script>
	</head>

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
include 'conexao2.php';
$login=$_SESSION['login'];

$sql="Select * from participantes where login = '$login'";

$exec_sql = mysql_query($sql);
$dados = mysql_fetch_assoc($exec_sql);
?>
	
	<section class="cabecalho">
            <header>
				<p><img src="img/logo_puc_minas_virtual.jpg" alt="Logo Puc Minas" title="Logo Puc Minas" class="logo"/>
					</p>			
				<h1>Pós-Graduação - Desenvolvimento de Aplicações Web</h1>
			</header>
		</section>
    <div class="principal">
		
      <form method="post" action="updfoto.php" enctype="multipart/form-data" class="form-signin" role="form">
        <h2 class="form-signin-heading">Alterar Foto</h2>
        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" >
		<p>Inserir foto:<input type="file" name="fileName" id="fileName" placeholder="Escolha um arquivo"> </p>
		<button class="btn btn-lg btn-success btn-block" type="submit">Enviar</button>
      </form>

    </div> 
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {invalidValue:"-1"});</script>
  </body>
</html>
