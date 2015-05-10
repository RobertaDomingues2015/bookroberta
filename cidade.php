<?php //CONECTA AO MYSQL                     
require_once("conexao2.php");           

//RECEBE PARÃMETRO                     
$estado = $_POST["estado"];           

//QUERY  
$sql = " 
SELECT idCidade, estado,nomeCidade,idEstado, sigaEstado FROM cidades, estados 
WHERE Estado = $estado
AND estado = idEstado 
GROUP BY nomeCidade";


//EXECUTA A QUERY               
$sql = mysql_query($sql);       

$row = mysql_num_rows($sql);    

//VERIFICA SE VOLTOU ALGO 
if($row) {                
   //XML
   $xml  = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
   $xml .= "<cidades>\n";               
   
   //PERCORRE ARRAY            
   for($i=0; $i<$row; $i++) {  
      $codigo    = mysql_result($sql, $i, "idCidade"); 
	  $descricao = mysql_result($sql, $i, "nomeCidade");
      $xml .= "<cidade>\n";     
      $xml .= "<codigo>".$codigo."</codigo>\n";                  
      $xml .= "<nome>".$descricao."</nome>\n";         
      $xml .= "</cidade>\n";    
   }//FECHA FOR                 
   
   $xml.= "</cidades>\n";
   
   //CABEÇALHO
   Header("Content-type: application/xml; charset=iso-8859-1"); 
}//FECHA IF (row)                                               

//PRINTA O RESULTADO  
echo $xml;            
?>
