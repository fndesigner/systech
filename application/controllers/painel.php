<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Painel extends CI_Controller {
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
		$this->load->library('form_validation','javascript'); //Estamos usando criptografia nessa página
		//Carregamos os dados do banco de dados
		$this->load->database();
		
	}

public function index(){

#id do funcionario
$id_fun = $this->input->cookie("sysbt_idfun");

#Consultamos avisos
$where_aviso= array('lido' => false,'idfun' => $id_fun);
$data['aviso'] = $this->Padrao->fc_where('sysbt_avisos',$where_aviso );
//Carregamos o view "index"
$this->load->view('painel_v',$data);

}
function cliente(){
        //Carregamos o view "index"
		$this->load->view('cliente_painel_v');
	}	
} // fecha a classe