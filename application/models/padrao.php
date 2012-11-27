<?
class Padrao extends CI_Model { 

function __construct() 
{ 
// Call the Model constructor 
parent::__construct(); 
$this->load->database();
}


//Função padrão de consulta de tabela, get geral padrão.
function get_padrao($tabela) {
$data = $this->db->get($tabela);
return $data;
}

//Função Atualizar
//onde dados é o que vai ser atualizado
function fupdate_geral($tabela, $campo_id, $id, $dados ) {
    	 $this->db->where($campo_id, $id);
    	 $this->db->update($tabela, $dados); 	
	}
#mascara em php	
function mascara_string($mascara,$string)
{
   $string = str_replace(" ","",$string);
   for($i=0;$i<strlen($string);$i++)
   {
      $mascara[strpos($mascara,"#")] = $string[$i];
   }
   return $mascara;
}	
#RETIRAR MASCARA
function delete_mascara_string($string)
{
   #apagar
   $apagar = array("(",")","-","/",".");
   $string = str_replace($apagar,"",$string);
   return $string;
}
		
#Função para incluir dados (de maneira geral)
function fadd_geral($tabela, $dados) {
		$this->db->insert($tabela, $dados); 
	}
#Função para deletar dados (de maneira geral)
function fdelete_geral($tabela, $campo_id, $id) {
	$this->db->where($campo_id, $id);
	$this->db->delete($tabela); 
	}
#Função de consulta padrão	
  function fc_padrao($tabela) {
 	//Consulta padrão
	$query = $this->db->get($tabela); 
	//while da consulta
	if ($query->num_rows() > 0) {
		$data = $query->result();
		return $data;
	}else return false;
}//fecha função	
#Função de consulta padrão	
  function fcp_ol($tabela,$campo_order, $order, $limite) {
 	//Consulta padrão
	 $this->db->order_by($campo_order, $order);
	 $this->db->limit($limite);
	 $query = $this->db->get($tabela);
	 
	//while da consulta
	if ($query->num_rows() > 0) {
		$data = $query->result();
		return $data;
	}else return false;
}//fecha função	
  function fcp_ol_where($tabela,$campo_order, $order,$bd_where,$where, $limite) {
 	//Consulta padrão
	 $this->db->order_by($campo_order, $order);
	 $this->db->limit($limite);
	 $this->db->where($bd_where, $where); 
	 $query = $this->db->get($tabela);
	 
	//while da consulta
	if ($query->num_rows() > 0) {
		$data = $query->result();
		return $data;
	}else return false;
}//fecha função	

#Função que busca em mais de 1 campo, valor padrao para campob_ = n
function fc_like($tabela,$campo_order,$order,$limite, $busca,$campob_1,$campob_2,$campob_3,$campob_4,$campob_5) {
 	//Consulta padrão
	 $this->db->order_by($campo_order, $order);
	 $this->db->limit($limite);
	 $this->db->like($campob_1, $busca);
	if($campob_2!="n") { $this->db->or_like($campob_2, $busca); }
	if($campob_3!="n") { $this->db->or_like($campob_3, $busca); }
	if($campob_4!="n") { $this->db->or_like($campob_4, $busca); }
	if($campob_5!="n") { $this->db->or_like($campob_5, $busca); } 
	 $query = $this->db->get($tabela);
	 
	//while da consulta
	if ($query->num_rows() > 0) {
		$data = $query->result();
		return $data;
	}else return false;
}//fecha função	



#Função de consulta padrão	
  function fc_where($tabela, $array_where) {
 	//Consulta padrão com where id
	#$query = $this->db->get_where($tabela, array('id' => $id), $limit, $offset);
	$query = $this->db->get_where($tabela, $array_where);
	//while da consulta
	if ($query->num_rows() > 0) {
	  $data = $query->result();
	  return $data;
   }else return false;
}//fecha função	



#Função para LOGIN, verifica se o email e senha digitado existe
function fc_login($email, $senha) {
	#Primeiro, verificamos se o email existe
	$verifica_email= $this->db->query("SELECT CODFUN,EMAIL FROM funcionario WHERE EMAIL='".$email."'");
	$consulta = $verifica_email->row(); 

	if ($verifica_email->num_rows() == 1) {
    $id = $consulta->CODFUN;   
	#Em seguida, verificamos se a senha do email encontrado é igual a digitada!
	$verifica_senha= $this->db->query("SELECT CODFUN,EMAIL,NOMFUN,senha, rh_cargos_id FROM funcionario WHERE CODFUN=".$id);
	$consulta_senha = $verifica_senha->row(); 
    #Comparamos a senha digitada com a senha decodificada
	 if($senha == $this->encrypt->decode($consulta_senha->senha)){ 
	 //Caso for verdadeira, retornamos a url
	 $array_dados['id']=$id;
	 $array_dados['nome']=$consulta_senha->NOMFUN;
	 $array_dados['senha']=$consulta_senha->senha;
	 $array_dados['email']=$consulta_senha->EMAIL;
	 $array_dados['cargo']=$consulta_senha->rh_cargos_id;
		
		return $array_dados;
	  } else return false;  
#Caso contrario (caso o email não exista), retorna falso	
} else return false; 
	}//fim função login	
//Função para LOGIN CLIENTE, verifica se o email e senha digitado existe
function fc_login_cliente($email, $senha) {
	#Primeiro, verificamos se o email existe
	$verifica_email= $this->db->query("SELECT CODCLI,EMACLI FROM cliente WHERE EMACLI='".$email."'");
	$consulta = $verifica_email->row(); 

	if ($verifica_email->num_rows() == 1) {
    $id = $consulta->CODCLI;   
	#Em seguida, verificamos se a senha do email encontrado é igual a digitada!
	$verifica_senha= $this->db->query("SELECT CODCLI,EMACLI,NOMCLI,senha FROM cliente WHERE CODCLI=".$id);
	$consulta_senha = $verifica_senha->row(); 
    #Comparamos a senha digitada com a senha decodificada
	 if($senha == $this->encrypt->decode($consulta_senha->senha)){ 
	 //Caso for verdadeira, retornamos a url
	 $array_dados['id']=$id;
	 $array_dados['nome']=$consulta_senha->NOMCLI;
	 $array_dados['senha']=$consulta_senha->senha;
	 $array_dados['email']=$consulta_senha->EMACLI;
		
		return $array_dados;
	  } else return false;  
#Caso contrario (caso o email não exista), retorna falso	
} else return false; 
	}//fim função login	
	
function entre($data1, $data2,$tipo){
if($data2==""){
$data2 = date("d/m/Y H:i");
}
if($tipo==""){
$tipo = "h";
}
for($i=1;$i<=2;$i++){
${"dia".$i} = substr(${"data".$i},0,2);
${"mes".$i} = substr(${"data".$i},3,2);
${"ano".$i} = substr(${"data".$i},6,4);
${"horas".$i} = substr(${"data".$i},11,2);
${"minutos".$i} = substr(${"data".$i},14,2);
}
$segundos = mktime($horas2,$minutos2,0,$mes2,$dia2,$ano2)-mktime($horas1,$minutos1,0,$mes1,$dia1,$ano1);
switch($tipo){
case "m":
$difere = $segundos/60;
break;
case "H":
$difere = $segundos/3600;
break;
case "h":
$difere = round($segundos/3600);
break;
case "D":
$difere = $segundos/86400;
break;
case "d":
$difere = round($segundos/86400);
break;
}
return $difere;
}	
	
	
}//fecha a classe