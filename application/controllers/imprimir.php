<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imprimir extends CI_Controller {
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
	
		$this->load->helper(array('email','captcha', 'string','form','date','array'));
		$this->load->model('Padrao');
		$this->load->library('encrypt','form_validation','javascript'); //Estamos usando criptografia nessa página
		//Carregamos os dados do banco de dados
		$this->load->database();
		
	}

public function index(){ }



function os($os){
//Recebemos o codigo da os e consultamos a mesma no banco de dados	
$where_os= array('CODOS' => $os);
$consulta_os = $this->Padrao->fc_where('os',$where_os);
foreach ($consulta_os as $row) { 
#Definimos o que já iremos enviar para a view
$data['n_os'] = $row->CODOS;
$data['data_os'] = $row->DATOS;
$status = $row->status;
if($status==1){$data['status']="Aberta";}
if($status==2){$data['status']="Fechada";}
$data['valor'] = $row->VLROS;
$data['defeito'] = $row->DEFEITO;
$data['solucao'] = $row->EFETUADO;
$data['obs'] = $row->OBSOS;
#Definimos o que vamos precisar para consultas abaixos
$n_os = $row->CODOS;
$codcli = $row->CODCLI;
$codfun = $row->CODFUN;
$codequip = $row->equipamento;
}
//Cliente
		$f_os_w_cli= array('CODCLI' => $codcli);
	 	$f_os_cliente = $this->Padrao->fc_where('cliente',$f_os_w_cli);
	 	#Definimos o que já iremos enviar para a view
	 	foreach ($f_os_cliente as $row_cli) {
	 	  
	 	  $data['tipo_cli'] = $row_cli->TIPCLI;
	 	  $data['nome_cli'] = $row_cli->NOMCLI;
	 	  $data['cpf_cli'] = $row_cli->CPFCLI;
	 	  $data['cnpj_cli'] = $row_cli->CNPCLI;
	 	  $data['telefone_cli'] = $row_cli->TELCLI;
	 	  $data['cep_cli'] = $row_cli->CEPCLI;
	 	  $data['end_n_cli'] = $row_cli->NUMCLI;
	 	  $data['end_cli'] = $row_cli->ENDCLI;
	 	  $data['bairro_cli'] = $row_cli->BAICLI;
	 	  $data['email_cli'] = $row_cli->EMACLI;	  
	 	  }
	 	//Funcionario
		$f_os_w_fun= array('CODFUN' => $codfun);
	 	$f_os_fun = $this->Padrao->fc_where('funcionario',$f_os_w_fun);
	 	foreach ($f_os_fun as $row_fun) { $data['nome_fun'] = $row_fun->NOMFUN;}
		//Equipamento
		$f_os_w_equip= array('id' => $codequip);
	 	$f_os_equip = $this->Padrao->fc_where('sysbt_equipamentos',$f_os_w_equip);
	 	foreach ($f_os_equip as $row_equip) { 
	 	
	 	$data['marca_eq'] = $row_equip->marca;
	 	$data['nome_eq'] = $row_equip->nome;
	 	$data['pm_eq'] = $row_equip->placa_mae;
	 	$data['tipo_eq'] = $row_equip->tipo;
	 	$data['hd_eq'] = $row_equip->hd;
	 	$data['memoria_eq'] = $row_equip->memoria;
	 	$data['processador_eq'] = $row_equip->processador;
	 	$data['pv_eq'] = $row_equip->placa_de_video;
	 	
	 	}
		
	   
        //Carregamos o view "index"
		$this->load->view('impresso_os_v', $data);
	}
function relatorio_com_filtro($os){

$data['Titulo']="teste";
$this->load->view('impresso_relatorio_os_v', $data);

}	





} // fecha a classe