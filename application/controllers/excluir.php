<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excluir extends CI_Controller {
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
		$this->load->library('form_validation','javascript'); //Estamos usando criptografia nessa página
		$this->load->library('encrypt');//Estamos usando criptografia nessa página
		//Carregamos os dados do banco de dados
		$this->load->database();
		
	}
public function index() {	

echo "Você não tem permissão para entrar nesse ambiente";

}
function cliente($id) {
		#Verificamos se o usuário esta logado.
		if($this->input->cookie("sysbt_aut")!=1) {
			redirect(base_url().'login','refresh');
		}else { 
		#excluimos fdelete_geral($tabela, $campo_id, $id) 
		$this->Padrao->fdelete_geral('cliente','CODCLI',$id);
		#Registramos a ocorrencia
		$this->session->set_flashdata('msg_ok_excluir', '1');
		#Enviamos o usuario para  a pagina de atualizar cliente 
		redirect(base_url().'relatorios/clientes','refresh');	
		
		}//fechamos else
}
function equipamento($id) {
		#Verificamos se o usuário esta logado.
		if($this->input->cookie("sysbt_aut")!=1) {
			redirect(base_url().'login','refresh');
		}else { 
		#id do cliente, para redirecionar o mesmo
		$idcli = $this->session->flashdata('idcliente');
		
				
		#excluimos fdelete_geral($tabela, $campo_id, $id) 
		$this->Padrao->fdelete_geral('sysbt_equipamentos','id',$id);
		#Registramos a ocorrencia
		$this->session->set_flashdata('msg_ok_excluir_equipamento', '1');
		#Enviamos o usuario para  a pagina de atualizar cliente 
		redirect(base_url().'relatorios/ver_cliente/'.$idcli,'refresh');	
		
		
		}//fechamos else
}
		
function venda_produto($codo,$qtd,$codpro,$codos) {
		#Verificamos se o usuário esta logado.
		if($this->input->cookie("sysbt_aut")!=1) {
			redirect(base_url().'login','refresh');
		}else { 
	
		#excluimoso produto fdelete_geral($tabela, $campo_id, $id) 
		$this->Padrao->fdelete_geral('osprod','CODO',$codo);
		
		##atualizamos o estoque
		//consultamos a quantidade do produto 
        $where_codpro= array('CODPRO' => $codpro);
		$e_produto = $this->Padrao->fc_where('produto',$where_codpro );
        foreach ($e_produto as $row) { $qtd_prod= $row->QTDPRO;  }
		//Calculamos o novo valor do estoque do produto
        $nova_qtd = $qtd_prod+$qtd;
        //Atualizamosno BD
		$data = array('QTDPRO' => $nova_qtd);  
		$this->Padrao->fupdate_geral('produto','CODPRO',$codpro,$data);	
		
		##Calculo o novo valor total da OS 
		#Consultamos osprod
		$where_comum= array('CODOS' => $codos);
		$e_prod_os = $this->Padrao->fc_where('osprod',$where_comum);
		$soma_total=0;
        foreach ($e_prod_os as $row) {  $soma_total += $row->TOTPRO; }
        #Consultamos a mão de obra
        $where_comum2= array('CODOS' => $codos);
		$ex_prod_os = $this->Padrao->fc_where('os',$where_comum2);
		foreach ($ex_prod_os as $row2) { $valor_mobra = $row2->vlrobra; }
        #Somamos o total dos produtos + valor da mão de obra
        $valor_total = $soma_total + $valor_mobra;
        #Atualizamos o estoque	
		$dados = array('VLROS' => $valor_total);
		$this->Padrao->fupdate_geral('os','CODOS',$codos,$dados);
	
		#Registramos a ocorrencia
		$this->session->set_flashdata('msg_ok', '1');
		#Enviamos o usuario para  a pagina de atualizar cliente 
		redirect(base_url().'editar/eos/'.$codos,'refresh');	
			
		}//fechamos else			
}//fechamos a função venda_produto


function historico($id, $codos) {
		#Verificamos se o usuário esta logado.
		if($this->input->cookie("sysbt_aut")!=1) {
			redirect(base_url().'login','refresh');
		}else { 
				
		#excluimos fdelete_geral($tabela, $campo_id, $id) 
		$this->Padrao->fdelete_geral('sysbt_statusp_os','id',$id);
		#Registramos a ocorrencia
		$this->session->set_flashdata('msg_ok', '1');
		#Enviamos o usuario para  a pagina de atualizar cliente 
		redirect(base_url().'editar/eos/'.$codos,'refresh');	
		
		
		}//fechamos else
}//fecha função

function funcionario($id) {
		#Verificamos se o usuário esta logado.
		if($this->input->cookie("sysbt_aut")!=1) {
			redirect(base_url().'login','refresh');
		}else { 
				
		#excluimos fdelete_geral($tabela, $campo_id, $id) 
		$this->Padrao->fdelete_geral('funcionario','CODFUN',$id);
		#Registramos a ocorrencia
		$this->session->set_flashdata('msg_ok', '1');
		#Enviamos o usuario para  a pagina de atualizar cliente 
		redirect(base_url().'relatorios/funcionarios/'.$id,'refresh');	
		
		
		}//fechamos else
}//fecha função


} //fecha a classe geral