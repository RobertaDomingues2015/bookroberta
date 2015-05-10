<!DOCTYPE html>
<html lang="pt-BR">
  <head>
   <link rel="stylesheet" href="css/estilo.css" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    
    <title>Cadastro de Alunos</title>
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
               alert("Esse browser n�o tem recursos para uso do Ajax");
               ajax = null;
            }
			}
		}
		//se tiver suporte ajax
		if(ajax) {
	     //deixa apenas o elemento 1 no option, os outros s�o exclu�dos
		document.forms[0].cidade.options.length = 1;
	     
		idOpcao  = document.getElementById("opcoes");
		 
	     ajax.open("POST", "cidade.php", true);
		 ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		 
		 ajax.onreadystatechange = function() {
            //enquanto estiver processando...emite a msg de carregando
			if(ajax.readyState == 1) {
			   idOpcao.innerHTML = "Carregando...!";   
	        }
			//ap�s ser processado - chama fun��o processXML que vai varrer os dados
            if(ajax.readyState == 4 ) {
			   if(ajax.responseXML) {
			      processXML(ajax.responseXML);
			   }
			   else {
			       //caso n�o seja um arquivo XML emite a mensagem abaixo
				   idOpcao.innerHTML = "--Primeiro selecione o estado--";
			   }
            }
         }
		 //passa o c�digo do estado escolhido
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
			//cont�udo dos campos no arquivo XML
			var codigo    =  item.getElementsByTagName("codigo")[0].firstChild.nodeValue;
			var nome =  item.getElementsByTagName("nome")[0].firstChild.nodeValue;
			
	        idOpcao.innerHTML = "--Selecione uma das op��es abaixo--";
			
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
	<section class="cabecalho">
            <header>
				<p><img src="img/logo_puc_minas_virtual.jpg" alt="Logo Puc Minas" title="Logo Puc Minas" class="logo"/>
					</p>			
				<h1>P�s-Gradua��o - Desenvolvimento de Aplica��es Web</h1>
			</header>
		</section>
    <div class="principal">

      <form method="post" action="gravar_al.php" enctype="multipart/form-data" class="form-signin" role="form">
        <h2 class="form-signin-heading">Cadastro de Alunos</h2>
        
		<p>Nome:<input type="text" name="nomeCompleto" class="form-control" placeholder="Nome completo" required autofocus></p>
        <p>E-mail:<input type="email" name="email" class="form-control" placeholder="E-mail para login" required ></p>
		<p>Login:<input type="text" name="login" class="form-control" placeholder="login" required autofocus></p>
		<p>Senha:<input type="password" name="senha" class="form-control" placeholder="Senha (4 a 8 caracteres)" required ></p>
		<p>Confirme a senha:<input type="password" name="passwdConf" class="form-control" placeholder="Confirme a senha" required ></p>
		<p>Estado:<select name='estado' onchange="Dados(this.value);" class="form-control" placeholder="Selecione" required">
                <option value = '-1'> Selecione um estado</option>
                <?php include 'conexao2.php';
					$sql2 = "select * from estados order by sigaEstado";
					$exec_sql2 = mysql_query($sql2);
					while ($dados2 = mysql_fetch_assoc($exec_sql2)){
					echo "<option value = $dados2[idEstado]> $dados2[sigaEstado]</option>";
					}
				?>
            </select></p>
		<p>Cidade:<select name="cidade" class="form-control" placeholder="Selecione" required"><option id="opcoes" value="0">--Primeiro selecione o estado--</option></select></p>
		<p>Descri��o: <textarea name="descricao" class="form-control" cols="50" rows="8" placeholder="Fale sobre voc�" required></textarea></p>
		<input type="hidden" name="MAX_FILE_SIZE" value="500000" >
		<p>Inserir foto:<input type="file" name="fileName" id="fileName" placeholder="Escolha um arquivo"> </p>
		<button class="btn btn-lg btn-success btn-block" type="submit">Enviar</button>
      </form>

    </div> 
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {invalidValue:"-1"});</script>
  </body>
</html>