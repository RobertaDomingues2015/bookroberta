
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cadastro de Agenda</title>
<link href="css/layout2.css" rel="stylesheet" type="text/css" />
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
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<style type="text/css">
tabela div {
	border: 1px solid #999;
}
</style></head>

<body>

<?php
include 'conexao.php';


?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td align="center" valign="top">
      <table width="100%" border="0" cellpadding="2" cellspacing="2">
        <tr>
          <td width="20%" height="358" align="center" valign="top" bgcolor="#CCCCCC" class="menulado"><table width="100%" border="0" cellpadding="2" cellspacing="2">
            <tr>
              <td height="28" align="center" valign="middle" bgcolor="#FFCC33">Professores</td>
            </tr>
            <tr>
              <td align="left" valign="top"><a href="cad_professores.php">&gt;Cadastro de Professores</a></td>
            </tr>
            <tr>
              <td align="left" valign="top"><a href="prescons_pf.php">&gt;Consulta Professores</a></td>
            </tr>
            <tr>
              <td align="left" valign="top"><?php $professor=0;
			  echo" <a href='cad_disciplina.php?id_professor=$professor'>&gt;Cadastro de Disciplinas</a>"?></td>
            </tr>
            <tr>
              <td align="left" valign="top"><a href="consulta_dis.php">&gt;Consulta Disciplina</a></td>
            </tr>
            <tr>
              <td height="28" align="center" valign="middle" bgcolor="#CCCCCC">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
          </table></td>
          <td width="80%" valign="top"><form id="form1" name="frmAjax" method="post" action="gravar_dispf.php">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="4" id="titulocad">Cadastro de Turmas</td>
                </tr>
              <tr>
                <td colspan="4" id="titulocadd2">Dados De Aulas</td>
                </tr>
              <tr>
                <td colspan="2">Disciplina</td>
                <td colspan="2">&nbsp;</td>
                </tr>
              <tr>
                <td height="27" colspan="2"><span id="spryselect2">
                <select name='estado' onchange="Dados(this.value);">
                  <option value = '-1'> </option>
                  <?php include 'conexao2.php';
				$sql2 = "select * from estados order by sigaEstado";
				$exec_sql2 = mysql_query($sql2);
				
		 		


				while ($dados2 = mysql_fetch_assoc($exec_sql2)){
					echo "<option value = $dados2[idEstado]> $dados2[sigaEstado]</option>";
				}
				
				?>
                </select>
                &nbsp;<br />
                <span class="selectInvalidMsg">Selecione um item.</span><span class="selectRequiredMsg">Selecione um item.</span></span></td>
                <td colspan="2">&nbsp;</td>
                </tr>
              <tr>
                <td width="31%">Professor:</td>
                <td width="26%">&nbsp;</td>
                <td width="43%" colspan="2" valign="middle">&nbsp;</td>
                </tr>
              <tr>
                <td colspan="2"><select name="cidade">
                  <option id="opcoes" value="0">--Primeiro selecione adisciplina--</option>
                </select></td>
                <td width="43%" colspan="2" rowspan="6" valign="middle"><label for="email"></label></td>
              </tr>
                    
            
              <tr>
                <td width="31%" >&nbsp;</td>
                <td width="26%" >&nbsp;</td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td><label for="cpf"></label></td>
                </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
                </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
              <tr valign="top">
                <td>&nbsp;</td>
                <td><label for="cidade"></label></td>
                <td rowspan="5"><label for="responsavel"></label>                  <label for="obs"></label></td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
              <tr>
                <td align="right"><label for="cep">
                  <input type="submit" name="salvar" id="salvar" value="   Salvar   " class ="botao"/>
                </label></td>
                <td>&nbsp;</td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
              <tr>
                <td><label for="telefone"></label></td>
                <td><label for="celular"></label></td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                </tr>
            </table>
          </form></td>
        </tr>
      </table>
<p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
</table>
<script type="text/javascript">
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {invalidValue:"-1"});
</script>
</body>
</html>