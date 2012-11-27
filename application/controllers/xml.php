<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xml extends CI_Controller {
	/**
	 * Author: Ivan Sowa (Programação) e Fernando Cobalchini (Designer)
	 * Programação: Ivan Sowa
	 * Designer: Fernando Cobalchini	
	 * E-mail: ivan@intersowa.com - www.intersowa.com
	 * E-mail: fnd@hotmail.com - www.fndesigner.com
	 # Todos os direitos reservados - Proibida reprodução parcial e total e uso indevido.
	 */
	 	function __construct()
	{
		parent::__construct();
	
		$this->load->helper(array('email','captcha', 'string','form','date','file','xml'));
		$this->load->model('Padrao');
		$this->load->library('form_validation','javascript'); //Estamos usando criptografia nessa página
		$this->load->library('encrypt');//Estamos usando criptografia nessa página
		//Carregamos os dados do banco de dados
		$this->load->database();
		
	}
public function index() {		

}
function xml_cliente(){

#Consultamos os dados no Banco de dados
$xml_cliente = $this->Padrao->fc_padrao('cliente');	
#Fazemos loop e depois gravamos os dados no arquivo XML
$endereco = "assets/xml/clientes.xml";
$data='<?xml version="1.0"?><clientes>';
write_file($endereco, $data);
foreach ($xml_cliente as $row) {

$data= "<cliente><id_cli>".$row->CODCLI."</id_cli>";
write_file($endereco, $data,'a+');
$data = "<nome>".$row->NOMCLI."</nome></cliente>";
write_file($endereco, $data, 'a+');

}
$data = "</clientes>";
write_file($endereco, $data, 'a+');
/*
if (!write_file('assets/xml/clientes.xml', $data)){
     echo 'Não foi possível atualizar o arquivo ';
}else{
     echo 'Arquivo Atualizado !';
}




*/

}
function importa_xml(){


$xml = simplexml_load_file('assets/xml/cb.xml');


foreach($xml as $dados_xml){

		#Recebemos os dados
 		$nome= (string) $dados_xml->cliente['NOME'];
		$empresa= (string) $dados_xml->cliente['EMPRESA'];		
        $email = (string) $dados_xml->cliente['EMAIL_CONTATO'];
        $telefone = (string) $dados_xml->cliente['TELEFONE'];
        $celular = (string) $dados_xml->cliente['CELULAR'];
		$end = (string) $dados_xml->cliente['ENDERECO'];
		$end_cep = (string) $dados_xml->cliente['CEP'];
		$end_bairro = (string) $dados_xml->cliente['BAIRRO'];
		$rg = (string) $dados_xml->cliente['IE'];
		$tpf_j = (string) $dados_xml->cliente['TIPO_PESSOA'];
		$cpf = (string) $dados_xml->cliente['CNPJ'];
		$complemento = (string) $dados_xml->cliente['COMPLEMENTO'];

	
		
		//declaramos o array que enviaremos para a função
		 $data = array('NOMCLI' => $nome,'RAZCLI' => $empresa,'ENDCLI' => $end,'BAICLI' => $end_bairro,'CEPCLI' => $end_cep,'TELCLI' => $telefone,'CELCLI' => $celular,'RGCLI' => $rg,'CNPCLI' => $cpf,'EMACLI' => $email,'TIPCLI' => $tpf_j,'COMCLI' => $complemento);  
		
		
		//modulo que realiza o cadastro
		$this->Padrao->fadd_geral('cliente',$data);
		

}





}



} //fecha a classe geral
