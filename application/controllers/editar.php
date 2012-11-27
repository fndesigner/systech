<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editar extends CI_Controller {
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
$data['titulo'] = "SYSBT";
$this->load->view('cad_v',$data);
	#Consultamos os dados do cliente de acordo com o id
		#$where_cliente= array('CODCLI' => $id);
		#$data['cliente'] = $this->Padrao->fc_where('cliente',$where_cliente);
	
		#Consultamos os dados do equipamento de acordo com o id do cliente.
		#$where_equipamentos= array('clientes_id' => $id);
		#$data['equipamento'] = $this->Padrao->fc_where('sysbt_equipamentos',$where_equipamentos );
}
function os($id_os) {
		#Consultamos os dados da OS de acordo com o id (que é o numero da OS)
		$where_os= array('CODOS' => $id_os);
		$data['e_os'] = $this->Padrao->fc_where('os',$where_os);
		//print_r($data['e_os']);
		#Abrimos a array da OS
		foreach ($data['e_os'] as $row) {
		$cod_cliente = $row->CODCLI;
		$cod_fun = $row->CODFUN;
		$cod_equipamento = $row->equipamento;
		$data['e_os_codos']= $row->CODOS;// Numero de OS
		$data['e_os_status']= $row->status;
		$data['e_os_obs']= $row->OBSOS;
		$data['e_os_defeito']= $row->DEFEITO;
		$data['e_os_solucao']= $row->EFETUADO;
		$data['e_os_retirado']= $row->retirado;
		$data['e_os_valros']= $row->VLROS;
		$data['e_os_pe']= $row->dat_prevista_os;
		
		#Consultamos dados do cliente
	    $where_cliente= array('CODCLI' => $cod_cliente);
		$data['e_clientes'] = $this->Padrao->fc_where('cliente',$where_cliente );
	foreach ($data['e_clientes'] as $row2) { $data['e_os_cliente']= $row2->NOMCLI; $data['e_os_cliente_tel']= $row2->TELCLI; }
		#Consultamos Dados do equipamento
		$where_equipamentos= array('id' => $cod_equipamento);
		$data['e_equipamento'] = $this->Padrao->fc_where('sysbt_equipamentos',$where_equipamentos );
		#Consultamos dados do Técnico Responsavel
		$where_tecnico= array('CODFUN' => $cod_fun);
		$data['e_tecnico'] = $this->Padrao->fc_where('funcionario',$where_tecnico);
		foreach ($data['e_tecnico'] as $row4) { $data['e_os_tecnico']= $row4->NOMFUN; }
		#Consultamos Status da OS - Personalizado
		$data['e_statusp'] = $this->Padrao->fcp_ol_where('sysbt_statusp_os','id','desc','os_id',$id_os,25);
			
	}//fechamos foreach	

$this->load->view('editar_os_v',$data);

}
function cliente($tipo) {
		
		#carrega a página que atualiza dados lá no painel do cliente
		if($tipo=="atualizar"){
		
		#Consultamos dados do cliente
		$cod_cliente = $this->input->cookie("sysbt_idcli"); //Cookie com id do cliente
	    $where_cliente= array('CODCLI' => $cod_cliente);
		$data['e_clientes'] = $this->Padrao->fc_where('cliente',$where_cliente );
		
								
		$data['titulo'] = "SYSBT";
		$this->load->view('cliente_editar_cli_v',$data);
		
		}
		#Carrega a página que atualiza os dados cadastrais do cliente pelo administrador
		if($tipo!="atualizar"){
		
		#Consultamos os dados do técnico
	    $data['tecnico'] = $this->Padrao->fc_padrao('funcionario');
		#Consultamos os dados do cliente
		$where_cli= array('CODCLI' => $tipo);
		$data['e_clientes'] = $this->Padrao->fc_where('cliente',$where_cli);
						
			$data['titulo'] = "SYSBT";
			$this->load->view('editar_cliente_v',$data);		
		}
}

function equipamento($id_equipamento) {
		
		#Consultamos os dados do equipamento
		$where_equipamento= array('id' => $id_equipamento);
		$data['e_equipamento'] = $this->Padrao->fc_where('sysbt_equipamentos',$where_equipamento);
		
		#view
		$data['titulo'] = "SYSBT";
		$this->load->view('editar_equip_v',$data);

}


#Mostramos a página de funcionario
function salvar($tipo) {

if($tipo =="fornecedor"){
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

if($tipo =="cliente"){
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
if($tipo =="ad_os"){
//Recebemos os dados fupdate_geral $tabela, $campo_id, $id, $dados
        $codos= $this->input->post("codos");	
        $defeito = $this->input->post("defeito");
        $solucao = $this->input->post("solucao");
        $obs = $this->input->post("obs");
        $status = $this->input->post("status_os");
        $data = $this->input->post("data_prevista");
        $hora = $this->input->post("hora_prevista");
#Formatamos a data
if($data!="") { 
$data_prevista = new DateTime($data.' '.$hora);
$data_previstac = date_format($data_prevista, 'Y-m-d H:i:s'); 
}else {$data_previstac="";}
        
  		//declaramos o array que enviaremos para a função		
		$dados = array('DEFEITO' => $defeito,'EFETUADO' => $solucao,'OBSOS' => $obs,'status' => $status,'dat_prevista_os' => $data_previstac);  
		//Atualizamos o status personalizado
		$this->Padrao->fupdate_geral('os','CODOS',$codos,$dados);
		#//Registramos Cookie
		$this->session->set_flashdata('msg_ok', '1');
		#Enviamos o usuario para  a pagina de cadastro/funcionario
		redirect(base_url().'editar/eos/'.$codos,'refresh');				
		}//Fechamos if($tipo == os

if($tipo =="equipamento"){

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
if($tipo =="funcionario"){

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

if($tipo =="fechar_os"){
#Calculamos a data
//definimos a string (personalizado, do jeito que eu colocar fica.exemplo: http://codeigniter.com/user_guide/helpers/date_helper.html)
$datestring = "%Y-%m-%d %h:%i";
$time = time();
$data_cadastro = mdate($datestring, $time);
//Recebemos os dados fupdate_geral $tabela, $campo_id, $id, $dados
        $codos= $this->input->post("codos");	
        $retirado = $this->input->post("retirado_por");
        $valor_mobra = $this->input->post("valor_mobra");
        
        #Calculo do valor total
        $where_codos= array('CODOS' => $codos);
		$e_prod_os = $this->Padrao->fc_where('osprod',$where_codos );
		$soma_total=0;
        foreach ($e_prod_os as $row) { 
         $soma_total += $row->TOTPRO;  
         }
        #Somamos o total dos produtos + valor da mão de obra
        $valor_total = $soma_total + $valor_mobra;
        
        
        #fechamento da OS
        $status = 2;// fechamos a OS
        $statusp_os="ordem de serviço fechada, equipamento retirado por ".$retirado;
  		//declaramos o array que enviaremos para a função		
		$dados = array('retirado' => $retirado,'VLROS' => $valor_total,'vlrobra' => $valor_mobra,'status' => $status, 'dat_baixa_os'=>$data_cadastro);  
		//Atualizamos o status personalizado
		$this->Padrao->fupdate_geral('os','CODOS',$codos,$dados);
		##Ao fechar a OS, atualizamos o histórico também
		//declaramos o array que enviaremos para a função
		$data = array('os_id' => $codos,'status' => $statusp_os,'data' => $data_cadastro);  
		//modulo que realiza o cadastro
		$this->Padrao->fadd_geral('sysbt_statusp_os',$data);	
		#//Registramos Cookie
		$this->session->set_flashdata('msg_ok', '1');
		#Enviamos o usuario para  a pagina de cadastro/funcionario
		redirect(base_url().'editar/eos/'.$codos,'refresh');				
		}//Fechamos if($tipo == os
if($tipo =="atualizar_mao_obra"){

//Recebemos os dados fupdate_geral $tabela, $campo_id, $id, $dados
        $codos= $this->input->post("codos");	
        $valor_mobra = $this->input->post("valor_mobra");
        
        #Calculo do valor total
        $where_codos= array('CODOS' => $codos);
		$e_prod_os = $this->Padrao->fc_where('osprod',$where_codos );
		$soma_total=0;
        foreach ($e_prod_os as $row) { 
         $soma_total += $row->TOTPRO;  
         }
        #Somamos o total dos produtos + valor da mão de obra
        $valor_total = $soma_total + $valor_mobra;
        
     
  		//declaramos o array que enviaremos para a função		
		$dados = array('VLROS' => $valor_total,'vlrobra' => $valor_mobra);  
		//Atualizamos o status personalizado
		$this->Padrao->fupdate_geral('os','CODOS',$codos,$dados);
		#//Registramos Cookie
		$this->session->set_flashdata('msg_ok', '1');
		#Enviamos o usuario para  a pagina de cadastro/funcionario
		redirect(base_url().'editar/eos/'.$codos,'refresh');				
		}//Fechamos if($tipo == os		
if($tipo =="peca_os"){

//Recebemos os dados fupdate_geral $tabela, $campo_id, $id, $dados
        $codos= $this->input->post("codos");	
        $preco_prod= $this->input->post("preco");
        $qtd = $this->input->post("qtd");
        $codpro = $this->input->post("codprod");
       
       //Evitamos erros
        if($codpro!=""){
        
        #consultamos o valor do produto 
        $where_codpro= array('CODPRO' => $codpro);
		$e_produto = $this->Padrao->fc_where('produto',$where_codpro );
        foreach ($e_produto as $row) { $qtd_prod= $row->QTDPRO;  }
        #consultamos dados da OS
        $where_codos= array('CODOS' => $codos);
		$e_os = $this->Padrao->fc_where('os',$where_codos );
        foreach ($e_os as $row) { $vlr_os= $row->VLROS;  }
        # Calculamos o valor total dos produtos
        $total_prod = $preco_prod * $qtd;
        #Calculamos o novo valor do estoque do produto
        $nova_qtd = $qtd_prod-$qtd;
        #Calculamos o novo valor total da OS
        $novo_vlr_os = $vlr_os +$total_prod;  
        #Adicionamos o produto
		$dados = array('CODPRO' => $codpro,'CODOS' => $codos,'QTDPRO' => $qtd,'PREPRO' => $preco_prod, 'TOTPRO'=>$total_prod);  
		$this->Padrao->fadd_geral('osprod',$dados);
		//Damos baixa no estoque
		$data = array('QTDPRO' => $nova_qtd);  
		$this->Padrao->fupdate_geral('produto','CODPRO',$codpro,$data);	
		//Atualizamos o valor total da OS
		$data2 = array('VLROS' => $novo_vlr_os);  
		$this->Padrao->fupdate_geral('os','CODOS',$codos,$data2);	
		#//Registramos Cookie
		$this->session->set_flashdata('msg_ok', '1');
		
		}//fechamos if que evita erro
		
		#Enviamos o usuario para  a pagina de cadastro/funcionario
		redirect(base_url().'editar/eos/'.$codos,'refresh');				
		}//Fechamos if($tipo == os		
		
}//Fechamos Salvar		

function eos($id_os) {
		#Consultamos os dados da OS de acordo com o id (que é o numero da OS)
		$where_os= array('CODOS' => $id_os);
		$data['e_os'] = $this->Padrao->fc_where('os',$where_os);
		//print_r($data['e_os']);
		#Abrimos a array da OS
		foreach ($data['e_os'] as $row) {
		$cod_cliente = $row->CODCLI;
		$cod_fun = $row->CODFUN;
		$data['e_os_codos']= $row->CODOS;// Numero de OS
		$data['e_os_status']= $row->status;
		$data['e_os_obs']= $row->OBSOS;
		$data['e_os_defeito']= $row->DEFEITO;
		$data['e_os_solucao']= $row->EFETUADO;
		$data['e_os_retirado']= $row->retirado;
		$data['e_os_valros']= $row->VLROS;
		$data['e_os_mobra']= $row->vlrobra;
		$data['e_os_previsao']= $row->dat_prevista_os;
		
		
		#Consultamos dados de produtos
	    $where_cliprod= array('CODOS' => $id_os);
		$data['e_prod'] = $this->Padrao->fc_where('osprod',$where_cliprod );
	
		#Consultamos dados do cliente
	    $where_cliente= array('CODCLI' => $cod_cliente);
		$data['e_clientes'] = $this->Padrao->fc_where('cliente',$where_cliente );
	foreach ($data['e_clientes'] as $row2) { $data['e_os_cliente']= $row2->NOMCLI; }
		#Consultamos Dados do equipamento
		$where_equipamentos= array('clientes_id' => $cod_cliente);
		$data['e_equipamento'] = $this->Padrao->fc_where('sysbt_equipamentos',$where_equipamentos );
	    foreach ($data['e_equipamento'] as $row3) { $data['e_os_equip']= $row3->nome; }
		#Consultamos dados do Técnico Responsavel
		$where_tecnico= array('CODFUN' => $cod_fun);
		$data['e_tecnico'] = $this->Padrao->fc_where('funcionario',$where_tecnico);
		foreach ($data['e_tecnico'] as $row4) { $data['e_os_tecnico']= $row4->NOMFUN; }
		#Consultamos Status da OS - Personalizado
		$data['e_statusp'] = $this->Padrao->fcp_ol_where('sysbt_statusp_os','id','desc','os_id',$id_os,25);
	
	}//fechamos foreach	
		
		#Consultamos os dados do equipamento de acordo com o id do cliente.
		#$where_equipamentos= array('clientes_id' => $id);
		#$data['equipamento'] = $this->Padrao->fc_where('sysbt_equipamentos',$where_equipamentos );
		
$data['titulo'] = "SYSBT";
$this->load->view('e_os_statusp_v',$data);

}
function os_cli($id_os) {
		#Consultamos os dados da OS de acordo com o id (que é o numero da OS)
		$where_os= array('CODOS' => $id_os);
		$data['e_os'] = $this->Padrao->fc_where('os',$where_os);
		//print_r($data['e_os']);
		#Abrimos a array da OS
		foreach ($data['e_os'] as $row) {
		$cod_cliente = $row->CODCLI;
		$cod_fun = $row->CODFUN;
		$data['e_os_codos']= $row->CODOS;// Numero de OS
		$data['e_os_status']= $row->status;
		$data['e_os_obs']= $row->OBSOS;
		$data['e_os_defeito']= $row->DEFEITO;
		$data['e_os_solucao']= $row->EFETUADO;
		$data['e_os_retirado']= $row->retirado;
		$data['e_os_valros']= $row->VLROS;
		
		#Consultamos dados do cliente
	    $where_cliente= array('CODCLI' => $cod_cliente);
		$data['e_clientes'] = $this->Padrao->fc_where('cliente',$where_cliente );
	foreach ($data['e_clientes'] as $row2) { $data['e_os_cliente']= $row2->NOMCLI; }
		#Consultamos Dados do equipamento
		$where_equipamentos= array('clientes_id' => $cod_cliente);
		$data['e_equipamento'] = $this->Padrao->fc_where('sysbt_equipamentos',$where_equipamentos );
		foreach ($data['e_equipamento'] as $row3) { $data['e_os_equip']= $row3->nome; }
		#Consultamos dados do Técnico Responsavel
		$where_tecnico= array('CODFUN' => $cod_fun);
		$data['e_tecnico'] = $this->Padrao->fc_where('funcionario',$where_tecnico);
		foreach ($data['e_tecnico'] as $row4) { $data['e_os_tecnico']= $row4->NOMFUN; }
		#Consultamos Status da OS - Personalizado
		$data['e_statusp'] = $this->Padrao->fcp_ol_where('sysbt_statusp_os','id','desc','os_id',$id_os,25);
			
	}//fechamos foreach	
		
$data['titulo'] = "SYSBT";
$this->load->view('cliente_editar_os_v',$data);

}


function aviso_lido($id) {   
    	
		$dados = array('lido' => true);  
		$this->Padrao->fupdate_geral('sysbt_avisos','id',$id,$dados);
					
		}//Fechamos if($tipo == os	

function funcionario($id) {
		#Consultamos cargos
		$data['cargos'] = $this->Padrao->fc_padrao('sysbt_rh_cargos');
		#Consultamos as Unidades
		$data['unidades'] = $this->Padrao->fc_padrao('sysbt_unidades');
		
		#Consultamos dados do cliente
	    $where_fun= array('CODFUN' => $id);
		$data['e_fun'] = $this->Padrao->fc_where('funcionario',$where_fun);
								
		
		$this->load->view('editar_funcionario_v',$data);
	
}
function fornecedor($id) {

		#Consultamos as Unidades
		#$data['unidades'] = $this->Padrao->fc_padrao('sysbt_unidades');
		
		#Consultamos dados do fornecedor
	    $where= array('CODFOR' => $id);
		$data['e_for'] = $this->Padrao->fc_where('fornecedor',$where);
		$data['titulo'] = "SYSTECH";						
		$this->load->view('editar_fornecedor_v',$data);
	
}			

} //fecha a classe geral
