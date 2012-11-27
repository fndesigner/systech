<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Author: Ivan Sowa e Fernando Cobalchini
	 * Programação: Ivan Sowa
	 * Designer: Fernando Cobalchini	
	 * E-mail: ivan@intersowa.com - www.intersowa.com
	 * E-mail: fnd@hotmail.com - www.fndesigner.com
	 # Todos os direitos reservados - Proibida reprodução parcial e total e uso indevido.
	 */
	 	function __construct()
	{
		parent::__construct();
	
		$this->load->helper(array('email','captcha', 'string'));
		$this->load->model('Padrao');
		$this->load->library('encrypt'); //Estamos usando criptografia nessa página
	}	
	
public function index(){
		
	#Random secreta, para verificação de login !
	$capt_key = random_string('numeric', 4);
	$cap_valores = array(
    'word'	 => $capt_key,
    'img_path'	 => './public/captcha/',
    'img_url'	 => base_url().'public/captcha/',
    'font_path'	 => './path/to/fonts/texb.ttf',
    'img_width'	 => '260',
    'img_height' => '35',
    'expiration' => 200
    );
	// Criptografamos o capt key para guardar na input invisivel
	$data['cap_crip']= $this->encrypt->encode($capt_key);
    //Carregamos o view "index"
	$data['cap'] = create_captcha($cap_valores);
	#### Carregamos a View	
	$this->load->view('login_v',$data);
		
	}
#cliente
function cliente() {

#Random secreta, para verificação de login !
	$capt_key = random_string('numeric', 3);
	$cap_valores = array(
    'word'	 => $capt_key,
    'img_path'	 => './public/captcha/',
    'img_url'	 => base_url().'public/captcha/',
    'font_path'	 => './path/to/fonts/texb.ttf',
    'img_width'	 => '315',
    'img_height' => '35',
    'expiration' => 7200
    );
	// Criptografamos o capt key para guardar na input invisivel
	$data['cap_crip']= $this->encrypt->encode($capt_key);
    //Carregamos o view "index"
	$data['cap'] = create_captcha($cap_valores);
	#### Carregamos a View	
	$this->load->view('cliente_login_v',$data);

}
#Função responsável para logar o técnico
function painel() {
#Recebemos e verificamos os dados junto ao BD		
$email = $this->input->post("email");
$senha = $this->input->post("senha");
$captcha_digitado = $this->input->post("captcha");	
$captcha_real = $this->input->post("cap_key");
$captcha_real = $this->encrypt->decode($captcha_real);

if($captcha_real!="") {
	if($captcha_real != $captcha_digitado) { 
	#Armazena a falha
	$this->session->set_flashdata('autFC', '1');
	#redirecionamos novamente para o login
	redirect(base_url().'login/','refresh');
	}
}
$resultado_verifica = $this->Padrao->fc_login($email, $senha);
if($resultado_verifica == false) {
    #Caso falha a autenticação, mandamos o usuario para a pagina de login, informando o ocorrido
	#Armazena a falha
	$this->session->set_flashdata('autFL', '1');
	#Armazena o total de falhas nas ultimas 8 horas
	#$soma_autF = $this->input->cookie('sysbt_autF_qt') + 1;
	#$c_autF_qt = array('name'   => 'autF_qt','value'  => $soma_autF,'expire' => '32000','prefix' => 'sysbt_');
	#$this->input->set_cookie($c_autF_qt);
	#Enviamos o usuario para  a pagina de login
	redirect(base_url().'login/','refresh');
		
	} else {
	#Login Correto
	//Gravamos em cookie a autorização
	$c_aut = array('name'   => 'aut','value'  => '1','expire' => '25000','prefix' => 'sysbt_','secure' => FALSE);
	//Gravamos o email (para consultas no futuro)
	//$c_email = array('name'   => 'email','value'  => $resultado_verifica['email'],'expire' => '25000','prefix' => 'sysbt_','secure' => FALSE);
	//Gravamos o nome do funcionario (para consultas no futuro)
	$c_nome = array('name'   => 'nome','value'  => $resultado_verifica['nome'],'expire' => '12000','prefix' => 'sysbt_','secure' => FALSE);
	//Gravamos o id do logado (para consultas no futuro)
	$c_id = array('name'   => 'idfun','value'  => $resultado_verifica['id'],'expire' => '12000','prefix' => 'sysbt_','secure' => FALSE);
	//Gravamos o cargo do logado - para definir permissões
	$c_cargo = array('name'   => 'cargo','value'  => $resultado_verifica['cargo'],'expire' => '12000','prefix' => 'sysbt_','secure' => FALSE);
	#Gravações (sets)
	$this->input->set_cookie($c_nome);
	$this->input->set_cookie($c_aut);
	$this->input->set_cookie($c_id);
	$this->input->set_cookie($c_cargo);
	//$this->input->set_cookie($c_email);

//Redirecionamos para a pagina especial atualizar
redirect(base_url().'painel','refresh');		
		}
}//fecha funçao

#Função responsável para logar o técnico
function painel_cliente() {
#Recebemos e verificamos os dados junto ao BD		
$email = $this->input->post("email");
$senha = $this->input->post("senha");
$captcha_digitado = $this->input->post("captcha");	
$captcha_real = $this->input->post("cap_key");
$captcha_real = $this->encrypt->decode($captcha_real);

if($captcha_real!="") {
	if($captcha_real != $captcha_digitado) { 
	#Armazena a falha
	$this->session->set_flashdata('autFC', '1');
	#Enviamos o usuario para  a pagina de login
	redirect(base_url().'login/cliente','refresh');
	}
}
$resultado_verifica = $this->Padrao->fc_login_cliente($email, $senha);
if($resultado_verifica == false) {
    #Caso falha a autenticação, mandamos o usuario para a pagina de login, informando o ocorrido.
	//Cookies que leva informações da tentativa de login
	#Armazena a falha
	$this->session->set_flashdata('autFL', '1');
	
	#Enviamos o usuario para  a pagina de login
	redirect(base_url().'login/cliente','refresh');
		
	} else {
	#Login Correto
	//Gravamos em cookie a autorização
	$c_aut = array('name'   => 'autC','value'  => '1','expire' => '25000','prefix' => 'sysbt_','secure' => FALSE);
	//Gravamos o email (para consultas no futuro)
	//$c_email = array('name'   => 'email','value'  => $resultado_verifica['email'],'expire' => '25000','prefix' => 'sysbt_','secure' => FALSE);
	//Gravamos o nome do funcionario (para consultas no futuro)
	$c_nome = array('name'   => 'nome','value'  => $resultado_verifica['nome'],'expire' => '25000','prefix' => 'sysbt_','secure' => FALSE);
	//Gravamos o id do logado (para consultas no futuro)
	$c_id = array('name'   => 'idcli','value'  => $resultado_verifica['id'],'expire' => '25000','prefix' => 'sysbt_','secure' => FALSE);
	#Gravações (sets)
	$this->input->set_cookie($c_nome);
	$this->input->set_cookie($c_aut);
	$this->input->set_cookie($c_id);
	//$this->input->set_cookie($c_email);

//Redirecionamos para a pagina especial atualizar
redirect(base_url().'painel/cliente','refresh');		
		}
}//fecha função login	

		
function sair($tipo){		

if($tipo =="cliente"){
delete_cookie('sysbt_autC');
delete_cookie('sysbt_idcli');
delete_cookie('sysbt_nome');
delete_cookie('sysbt_email');
//Redirecionamos para a pagina especial atualizar
redirect(base_url().'login/cliente','refresh');
}
if($tipo =="adm"){
delete_cookie('sysbt_aut');
delete_cookie('sysbt_id');
delete_cookie('sysbt_nome');
delete_cookie('sysbt_email');
delete_cookie('sysbt_cargo');

//Redirecionamos para a pagina especial atualizar
redirect(base_url().'login','refresh');
}
#delete_cookie("name");
}//fechamos a funcão sair	

}//fechamos a classe geral

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */