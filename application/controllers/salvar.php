<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salvar extends CI_Controller {
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
echo "Permissão Negada!";
}

function cargo($tipo) {
if($tipo =="cadastro"){
		//Recebemos os dados
		$cargo= $this->input->post("cargo");	
		//declaramos o array que enviaremos para a função
		 $data = array('nome' => $cargo);  
		//modulo que realiza o cadastro
		$this->Padrao->fadd_geral('sysbt_rh_cargos',$data);
		#//Registramos Cookie
		$this->session->set_flashdata('msg_ok', '1');
		#Enviamos o usuario para a pagina de cadastro/funcionario
		redirect(base_url().'cadastro/cargo','refresh');				
		}//Fechamos if($tipo == funcionario...
		
if($tipo =="editar"){
        #recebemos os dados
		$array = $this->input->post();	
		#cadastramos	
		$this->Padrao->fupdate_geral('sysbt_rh_cargos','id',$array['id'],$array);
		#//Registramos Cookie
		$this->session->set_flashdata('msg_ok', '1');
		#redirecionamos
		redirect(base_url().'editar/cargo/'.$array['id'],'refresh');		
	
}
		}

function fornecedor($tipo) {

if($tipo =="cadastro"){
		
		#recebemos os dados
		$array = $this->input->post();
		#Tratamos
		 //tiramos a mascara do CPF ou CNPJ
		 $array['cnpfor'] = $this->Padrao->delete_mascara_string($array['cnpfor']);
		 //tiramos a mascara do telefone e celular
		 $array['telfor'] = $this->Padrao->delete_mascara_string($array['telfor']);
		 $array['celfor'] = $this->Padrao->delete_mascara_string($array['celfor']);
		 //Verificamos se é PF ou PJ se acordo com essa info, cadastramos no BD no campo correto
			if($this->input->post("tipfor")=="Física"){
			    //Se for PF, cadastramos o conteudo que veio como PJ para PF
				$array['cpffor'] = $array['cnpfor'];
				// Depois excluimos o cadastro como PJ
				unset($array["cnpfor"]);
				}
		$this->Padrao->fadd_geral('fornecedor',$array);
		#//Registramos Cookie
		$this->session->set_flashdata('msg_ok', '1');
		#Enviamos o usuario para  a pagina de cadastro/equipamento
		redirect(base_url().'cadastro/fornecedor/','refresh');				
		}//Fechamos if($tipo == equipamento...	

if($tipo =="editar"){
#recebemos os dados
		$array = $this->input->post();
		#Tratamos
		//tiramos a mascara do CPF ou CNPJ
		$array['cnpfor'] = $this->Padrao->delete_mascara_string($array['cnpfor']);
		//tiramos a mascara do telefone e celular
		$array['telfor'] = $this->Padrao->delete_mascara_string($array['telfor']);
		$array['celfor'] = $this->Padrao->delete_mascara_string($array['celfor']);
		//Verificamos se é PF ou PJ se acordo com essa info, cadastramos no BD no campo correto
			if($this->input->post("tipfor")=="Física"){
			    //Se for PF, cadastramos o conteudo que veio como PJ para PF
				$array['cpffor'] = $array['cnpfor'];
				// Depois excluimos o cadastro como PJ
				unset($array["cnpfor"]);
				}
			
		$this->Padrao->fupdate_geral('fornecedor','CODFOR',$array['codfor'],$array);
		#//Registramos Cookie
		$this->session->set_flashdata('msg_ok', '1');
		#redirecionamos
		redirect(base_url().'editar/fornecedor/'.$array['codfor'],'refresh');		
	
}
}		
function cliente($tipo) {

if($tipo =="cadastro"){
//Recebemos os dados
		$nome= $this->input->post("nome");
		$empresa= $this->input->post("empresa");		
        $email = $this->input->post("email");
        $telefone = $this->input->post("telefone");
        $telefone =$this->Padrao->delete_mascara_string($telefone); 
        $celular = $this->input->post("celular");
        $celular =$this->Padrao->delete_mascara_string($celular); 
        $senha_post = $this->input->post("senha");
        //recebemos e já criptografamos a senha
        $senha = $this->encrypt->encode($senha_post);
		$end = $this->input->post("end");
		$end_n = $this->input->post("end_n");
		$end_cep = $this->input->post("end_cep");
		$end_cep =$this->Padrao->delete_mascara_string($end_cep); 
		$end_cidade = $this->input->post("end_cidade");
		$end_bairro = $this->input->post("end_bairro");
		$rg = $this->input->post("rg");
		$tipo_pessoa = $this->input->post("tipo_pessoa");
		if($tipo_pessoa=="Física") { 
		$cpf = $this->input->post("cpf");
		$cpf =$this->Padrao->delete_mascara_string($cpf); 
		$cnpj ="";
		}else {
		$cnpj = $this->input->post("cpf");
		$cnpj =$this->Padrao->delete_mascara_string($cnpj); 
		$cpf ="";
		}

		$tecnico = $this->input->post("tecnico");
		//declaramos o array que enviaremos para a função
		 $data = array('NOMCLI' => $nome,'RAZCLI' => $empresa,'ENDCLI' => $end,'NUMCLI' => $end_n,'BAICLI' => $end_bairro,'CEPCLI' => $end_cep,'TELCLI' => $telefone,'CELCLI' => $celular,'RGCLI' => $rg,'CNPCLI' => $cnpj,'CPFCLI' => $cpf,'EMACLI' => $email,'senha' => $senha,'TIPCLI' => $tipo_pessoa,'codfun' => $tecnico);  
		//modulo que realiza o cadastro
		$this->Padrao->fadd_geral('cliente',$data);
		#//Registramos Cookie
		$this->session->set_flashdata('msg_cli_ok', '1');
		#Enviamos o usuario para  a pagina de cadastro/equipamento
		$where_cliente= array('EMACLI' => $email);
		$e_clientes = $this->Padrao->fc_where('cliente',$where_cliente );
	foreach ($e_clientes as $row2) { $codcliente= $row2->CODCLI; }
		
		redirect(base_url().'cadastro/equipamento/'.$codcliente,'refresh');				
		}//Fechamos if($tipo == cliente..
if($tipo =="editar"){
//Recebemos os dados
		$nome= $this->input->post("nome");
		$empresa= $this->input->post("empresa");		
        $email = $this->input->post("email");
        $telefone = $this->input->post("telefone");
        $celular = $this->input->post("celular");
        $telefone =$this->Padrao->delete_mascara_string($telefone); 
        $celular =$this->Padrao->delete_mascara_string($celular); 
        $senha_post = $this->input->post("senha");
        //recebemos e já criptografamos a senha
        $senha = $this->encrypt->encode($senha_post);
		$end = $this->input->post("end");
		$end_n = $this->input->post("end_n");
		$end_comp = $this->input->post("end_comp");
		$end_cep = $this->input->post("end_cep");
		$end_cep =$this->Padrao->delete_mascara_string($end_cep); 
		$end_cidade = $this->input->post("end_cidade");
		$end_bairro = $this->input->post("end_bairro");
		$rg = $this->input->post("rg");
		$iefor = $this->input->post("iefor");
		$cpf = $this->input->post("cpf");
		$cnpj = $this->input->post("cnpj");
		$cpf =$this->Padrao->delete_mascara_string($cpf); 
		$cnpj =$this->Padrao->delete_mascara_string($cnpj); 
		$tipo_pessoa = $this->input->post("tipo_pessoa");
		$tecnico = $this->input->post("tecnico");
		$codcli = $this->input->post("codcli");
		//declaramos o array que enviaremos para a função
		 $data = array('NOMCLI' => $nome,'RAZCLI' => $empresa,'ENDCLI' => $end,'NUMCLI' => $end_n,'COMCLI' => $end_comp,'BAICLI' => $end_bairro,'CEPCLI' => $end_cep,'TELCLI' => $telefone,'CELCLI' => $celular,'RGCLI' => $rg,'CPFCLI' => $cpf,'CNPCLI' => $cnpj,'IEFOR' => $iefor,'EMACLI' => $email,'senha' => $senha,'TIPCLI' => $tipo_pessoa,'codfun' => $tecnico);  
		//modulo que atualiza o cadastro
		$this->Padrao->fupdate_geral('cliente','CODCLI',$codcli,$data);
		#//Registramos Cookie
		$this->session->set_flashdata('msg_ok', '1');
		#Enviamos o usuario para  a pagina de cadastro/equipamento
		$where_cliente= array('EMACLI' => $email);
		$e_clientes = $this->Padrao->fc_where('cliente',$where_cliente );
	foreach ($e_clientes as $row2) { $codcliente= $row2->CODCLI; }
		
		redirect(base_url().'editar/cliente/'.$codcliente,'refresh');				
		}//Fechamos if($tipo == cliente..


if($tipo =="atualizar_cli"){
#Calculamos a data
//Recebemos os dados 
		$codcli = $this->input->cookie("sysbt_idcli"); //Cookie com id do cliente
        $telefone= $this->input->post("telefone");	
        $celular = $this->input->post("celular");
        $telefone =$this->Padrao->delete_mascara_string($telefone); 
        $celular =$this->Padrao->delete_mascara_string($celular); 
        $senha = $this->input->post("senha");
        $senha = $this->encrypt->encode($senha);
        $email = $this->input->post("email");
        //declaramos o array que enviaremos para a função		
		$dados = array('TELCLI' => $telefone,'CELCLI' => $celular,'EMACLI' => $email, 'senha'=>$senha);  
		//Atualizamos os dados do cliente
		$this->Padrao->fupdate_geral('cliente','CODCLI',$codcli,$dados);
		#//Registramos Cookie
	    $this->session->set_flashdata('msg_ok', '1');
		#Enviamos o usuario para  a pagina de atualizar cliente 
		redirect(base_url().'editar/cliente/atualizar','refresh');				
		}//Fechamos if($tipo == 
}
function equipamento($tipo) {
if($tipo =="cadastro"){

		//Recebemos os dados
		$nome= $this->input->post("nome");
		$ip= $this->input->post("ip");
		$equip= $this->input->post("equip");		
        $marca = $this->input->post("marca");
        $memoria = $this->input->post("memoria");
		$hd = $this->input->post("hd");
		$processador = $this->input->post("processador");
		$pvideo = $this->input->post("pvideo");
		$pmae= $this->input->post("pmae");
		$obs = $this->input->post("obs");
		$desc = $this->input->post("desc");
		$monitor = $this->input->post("monitor");
		$id_cliente = $this->input->post("id");
		
		//declaramos o array que enviaremos para a função
		 $data = array('nome' => $nome,'ip' => $ip,'tipo' => $equip,'placa_mae' => $pmae,'marca' => $marca,'memoria' => $memoria,'hd' => $hd,'processador' => $processador,'placa_de_video' => $pvideo,'desc' => $desc,'obs' => $obs,'monitor' => $monitor,'clientes_id' => $id_cliente);  
		//modulo que realiza o cadastro
		$this->Padrao->fadd_geral('sysbt_equipamentos',$data);
		#//Registramos Cookie
		$this->session->set_flashdata('msg_ok', '1');
		#Enviamos o usuario para  a pagina de cadastro/equipamento
		redirect(base_url().'cadastro/equipamento/'.$id_cliente,'refresh');	
		
		}//Fechamos if($tipo == equipamento...
if($tipo =="editar"){

//Recebemos os dados fupdate_geral $tabela, $campo_id, $id, $dados
        $id= $this->input->post("id_equipamento");	
        $nome = $this->input->post("nome");
        $ip = $this->input->post("ip");
        $marca = $this->input->post("marca");
        $obs = $this->input->post("obs");
        $desc = $this->input->post("desc");
        $processador= $this->input->post("processador");	
        $hd = $this->input->post("hd");
        $monitor = $this->input->post("monitor");
        $memoria = $this->input->post("memoria");
        $pvideo = $this->input->post("pvideo");
        $pmae= $this->input->post("pmae");	
        $equip = $this->input->post("tipo");
        
        //declaramos o array que enviaremos para a função		
		$dados = array('nome' => $nome,'ip' => $ip,'marca' => $marca,'obs' => $obs,'desc' => $desc,'processador' => $processador,'hd' => $hd,'monitor' => $monitor,'memoria' => $memoria,'placa_de_video' => $pvideo,'placa_mae' => $pmae,'tipo' => $tipo);  
		//Atualizamos o status personalizado
		$this->Padrao->fupdate_geral('sysbt_equipamentos','id',$id,$dados);
		#//Registramos Cookie
		$this->session->set_flashdata('msg_ok', '1');
		#Enviamos o usuario para  a pagina de cadastro/funcionario
		redirect(base_url().'editar/equipamento/'.$id,'refresh');				
		}//Fechamos if($tipo == os	
}
function funcionario($tipo) {
if($tipo =="cadastro"){
//Recebemos os dados
		$nome= $this->input->post("nome");	
        $email = $this->input->post("email");
        $telefone = $this->input->post("celular");
        $senha_post = $this->input->post("senha");
        //recebemos e já criptografamos a senha
        $senha = $this->encrypt->encode($senha_post);
		$rh_cargos_id = $this->input->post("cargo");
		$unidades_id = $this->input->post("unidade");
		//declaramos o array que enviaremos para a função
		 $data = array('NOMFUN' => $nome,'EMAIL' => $email,'TELFUN' => $telefone,'senha' => $senha,'rh_cargos_id' => $rh_cargos_id,'unidades_id' => $unidades_id);  
		//modulo que realiza o cadastro
		$this->Padrao->fadd_geral('funcionario',$data);
		#//Registramos Cookie
		$this->session->set_flashdata('msg_ok', '1');
		#Enviamos o usuario para  a pagina de cadastro/funcionario
		redirect(base_url().'cadastro/funcionario','refresh');				
		}//Fechamos if($tipo == funcionario...		
if($tipo =="editar"){

//Recebemos os dados fupdate_geral $tabela, $campo_id, $id, $dados
        $id= $this->input->post("codfun");	
        $nome = $this->input->post("nome");
        $celular = $this->input->post("celular");
        $cargo = $this->input->post("cargo");
        $email = $this->input->post("email");
        $senha = $this->input->post("senha");
        $senha = $this->encrypt->encode($senha);
             
        //declaramos o array que enviaremos para a função		
		$dados = array('NOMFUN' => $nome,'TELFUN' => $celular,'rh_cargos_id' => $cargo,'EMAIL' => $email,'senha' => $senha);  
		//Atualizamos o status personalizado
		$this->Padrao->fupdate_geral('funcionario','CODFUN',$id,$dados);
		#//Registramos Cookie
		$this->session->set_flashdata('msg_ok', '1');
		#Enviamos o usuario para  a pagina de cadastro/funcionario
		redirect(base_url().'editar/funcionario/'.$id,'refresh');				
		}//Fechamos if($tipo == os	
}					

}//fecha geral