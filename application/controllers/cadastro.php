<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadastro extends CI_Controller {
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
	
		$this->load->helper(array('email','captcha', 'string','form','date'));
		$this->load->model('Padrao');
		$this->load->library('form_validation','javascript'); 
		$this->load->library('encrypt');//Estamos usando criptografia nessa página
		//Carregamos os dados do banco de dados
		$this->load->database();
}
  public function index() {		
$data['titulo'] = "SYSTECH";
$this->load->view('cad_v',$data);
}
#Mostramos a página de funcionario
function funcionario() {
	#Consultamos cargos
	$data['cargos'] = $this->Padrao->fc_padrao('sysbt_rh_cargos');
	#Consultamos as Unidades
	$data['unidades'] = $this->Padrao->fc_padrao('sysbt_unidades');
	#Titulo
	$data['titulo'] = "SYSTECH";
	#Carregamos a view
	$this->load->view('cad_funcionario_v',$data);
	}
#Mostramos a página de unidade
function unidade() {
	$data['titulo'] = "SYSTECH";
	$this->load->view('cad_unidade_v',$data);
	}
#Mostramos a página de marca
function marca() {
	$data['titulo'] = "SYSTECH";
	$this->load->view('cad_marca_v',$data);
	}
#Mostramos a página de categoria
function categoria() {
	$data['titulo'] = "SYSTECH";
	$this->load->view('cad_categoria_v',$data);
	}
#Mostramos a página de cadastro de produto
function produto() {
	$data['titulo'] = "SYSTECH";
	$this->load->view('cad_produto_v',$data);
	}	
#Mostramos a página de cliente
function cliente() {
	#Consultamos os dados do técnico
	$data['tecnico'] = $this->Padrao->fc_padrao('funcionario');
	
	$data['titulo'] = "SYSTECH";
	$this->load->view('cad_cliente_v',$data);
	}	
#Mostramos a página de fornecedor
function fornecedor() {
	#Consultamos os dados do técnico
	$data['cidade'] = $this->Padrao->get_padrao('cidade');
	
	$data['titulo'] = "SYSTECH";
	$this->load->view('cad_fornecedor_v',$data);
	}	
#Mostramos a página de cargo
function cargo() {
		#Titulo
		$data['titulo'] = "SYSTECH";
		//abrir o formulario novamente caso necessario
		$this->load->view('cad_cargo_v',$data);	
}
#Mostramos a página de equipamento
function equipamento($cliente) {
		#ID do cliente
		$data['id_cliente']=$cliente;
		#Titulo
		$data['titulo'] = "SYSTECH";
		//abrir o formulario novamente caso necessario
		$this->load->view('cad_equip_v',$data);	
}
#Mostramos a página de OS
function os($tipo) {
		if($tipo =="buscar_cliente"){
		#Titulo
		$data['titulo'] = "SYSTECH";
		//abrir o formulario novamente caso necessario
		$this->load->view('cad_os_v',$data);	
		}	
		if($tipo =="cad_os"){
		#Recebemos o ID do cliente
		$id = $this->input->post("id");
		if($id ==""){
		$id = $this->session->flashdata('idcliente');
		}
		
		#Consultamos os dados do cliente de acordo com o id
		$where_cliente= array('CODCLI' => $id);
		$data['cliente'] = $this->Padrao->fc_where('cliente',$where_cliente);
		#Consultamos os dados do equipamento de acordo com o id do cliente.
		$where_equipamentos= array('clientes_id' => $id);
		$data['equipamento'] = $this->Padrao->fc_where('sysbt_equipamentos',$where_equipamentos );
		#Consultamos os dados do técnico
		$data['tecnico'] = $this->Padrao->fc_padrao('funcionario');
		#Titulo
		$data['titulo'] = "SYSTECH";
		#ID do cliente
		$data['codcli'] = $id;
		//abrir o formulario novamente caso necessario
		$this->load->view('cad_os_cados_v',$data);
		}
		if($tipo =="cliente_cad_os"){
		#Recebemos o ID do cliente
		$id = $this->input->cookie("sysbt_idcli");
		
		#Consultamos os dados do cliente de acordo com o id
		$where_cliente= array('CODCLI' => $id);
		$data['cliente'] = $this->Padrao->fc_where('cliente',$where_cliente);
		#Consultamos os dados do equipamento de acordo com o id do cliente.
		$where_equipamentos= array('clientes_id' => $id);
		$data['equipamento'] = $this->Padrao->fc_where('sysbt_equipamentos',$where_equipamentos );
		#Consultamos os dados do técnico
		$data['tecnico'] = $this->Padrao->fc_padrao('funcionario');
		#Titulo
		$data['titulo'] = "SYSTECH";
		//abrir o formulario novamente caso necessario
		$this->load->view('cliente_cad_os_cados_v',$data);
		}		
}			

} //fecha a classe geral
