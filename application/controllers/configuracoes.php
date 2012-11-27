<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuracoes extends CI_Controller {

public function index(){
	      //Carregamos o view "index"
		$this->load->view('configuracoes_v');
	}
	

#Função utilizada na abertura de OS
function consulta_clientes() {

$data['clientes'] = $this->Padrao->fc_like('cliente','CODCLI','desc',50,$text,'NOMCLI','RAZCLI','TELCLI','EMACLI','n');


}	
	
} // fecha a classe