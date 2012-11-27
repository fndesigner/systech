<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Salvar_os extends CI_Controller {
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
function os_cliente($tipo){
if($tipo =="cadastrar"){
#Calculamos a data
//definimos a string (personalizado, do jeito que eu colocar fica.exemplo: http://codeigniter.com/user_guide/helpers/date_helper.html)
$datestring = "%Y-%m-%d  %h:%i";
$time = time();
$data_cadastro = mdate($datestring, $time);
$status_os =1; #status os aberta
//Recebemos os dados
//parei aqui
		$codcli= $this->input->post("codcli");	
        $tecnico = $this->input->post("tecnico");
        $defeito = $this->input->post("defeito");
        $solucao= $this->input->post("solucao");	
        $equip = $this->input->post("equip");
        $obs = $this->input->post("obs");
		//declaramos o array que enviaremos para a função
		$data = array('CODCLI' => $codcli,'CODFUN' => $tecnico,'DEFEITO' => $defeito,'EFETUADO' => $solucao,'OBSOS' => $obs,'equipamento' => $equip,'DATOS' => $data_cadastro,'status' => $status_os);  
		//modulo que realiza o cadastro
		$this->Padrao->fadd_geral('os',$data);
		
		####################################################
		//Atualizamos o historico
		$ac_codos = $this->Padrao->fcp_ol('os','CODOS', 'desc', 1);
		foreach ($ac_codos as $row4) {$id_os = $row4->CODOS; }
		$statusp_os = "Chamado aberto pelo cliente";
		$data = array('os_id' => $id_os,'status' => $statusp_os,'data' => $data_cadastro ); 
		//modulo que realiza o cadastro
		$this->Padrao->fadd_geral('sysbt_statusp_os',$data);
		//Emitimos um aviso
		 $msg_aviso ="Chamado aberto pelo cliente, OS Nº <a href='".base_url()."editar/eos/".$id_os."'> ".$id_os." </a> deve ser imediatamente editada - ".$data_cadastro;
		  #Consultamos os admins
	        $where_admin= array('rh_cargos_id' => 4 );
			$consulta_admin = $this->Padrao->fc_where('funcionario',$where_admin );
   			foreach ($consulta_admin as $row5) {   
   			 //id do admin
   			 $id_admin = $row5->CODFUN;
   			 
   			 #cadastramos a mensagem
   			 $data = array('data' => $data_cadastro,'idfun' => $id_admin,'aviso' => $msg_aviso,'lido' => false);  
		//modulo que realiza o cadastro
		$this->Padrao->fadd_geral('sysbt_avisos',$data);
   			 
			} //fecha foreach
			 #cadastramos a mensagem para o técnico
   			 $data = array('data' => $data_cadastro,'idfun' => $tecnico,'aviso' => $msg_aviso,'lido' => false);  
		//modulo que realiza o cadastro
		$this->Padrao->fadd_geral('sysbt_avisos',$data);
#####################################################################		
		####################################################
		
		#//Registramos Cookie
		$this->session->set_flashdata('msg_ok', '1');
		#Enviamos o usuario para  a pagina painel/cliente
		redirect(base_url().'painel/cliente','refresh');				
		}//Fechamos if($tipo == os		
}
function os($tipo) {		
if($tipo =="cadastro"){
#Calculamos a data
//definimos a string (personalizado, do jeito que eu colocar fica.exemplo: http://codeigniter.com/user_guide/helpers/date_helper.html)
$datestring = "%Y-%m-%d  %h:%i";
$time = time();
$data_cadastro = mdate($datestring, $time);
$status_os =1; #status os aberta
//Recebemos os dados
//parei aqui
		$codcli= $this->input->post("codcli");	
        $tecnico = $this->input->post("tecnico");
        $data_p = $this->input->post("data_prevista");
        $hora_p = $this->input->post("data_prevista_hora");
        $defeito = $this->input->post("defeito");
        $solucao= $this->input->post("solucao");	
        $equip = $this->input->post("equip");
        $obs = $this->input->post("obs");
if($data_p!="") {         
#Formatamos a data 
$data_prevista = new DateTime($data_p.' '.$hora_p);
$data_previstac = date_format($data_prevista, 'Y-m-d H:i:s');   
} else {$data_previstac="";}       
		//declaramos o array que enviaremos para a função
		$data = array('CODCLI' => $codcli,'dat_prevista_os' => $data_previstac,'CODFUN' => $tecnico,'DEFEITO' => $defeito,'EFETUADO' => $solucao,'OBSOS' => $obs,'equipamento' => $equip,'DATOS' => $data_cadastro,'status' => $status_os);  
		//modulo que realiza o cadastro
		$this->Padrao->fadd_geral('os',$data);
		
		#//Registramos Cookie
		# mensagem
		$this->session->set_flashdata('msg_ok', '1');
		# ID da OS para imprimir.
		$codos_array = $this->Padrao->fcp_ol('os','CODOS','desc',1);
		foreach ($codos_array as $row7){ 
		$this->session->set_flashdata('imprimir_os', $row7->CODOS);
		}
		#Enviamos o usuario para  a pagina de cadastro/funcionario
		redirect(base_url().'painel','refresh');				
		}//Fechamos if($tipo == os
}
function ad_os($tipo) {		
if($tipo =="editar"){
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
}
function statusp($tipo) {	
if($tipo =="cadastro"){
#Calculamos a data
//definimos a string (personalizado, do jeito que eu colocar fica.exemplo: http://codeigniter.com/user_guide/helpers/date_helper.html)
$datestring = "%Y-%m-%d - %h:%i";
$time = time();
$data_cadastro = mdate($datestring, $time);
		//Recebemos os dados
     	$id_os= $this->input->post("id_os");	
      	$statusp_os = $this->input->post("statusp_os");
		//declaramos o array que enviaremos para a função
		$data = array('os_id' => $id_os,'status' => $statusp_os,'data' => $data_cadastro );  
		//modulo que realiza o cadastro
		$this->Padrao->fadd_geral('sysbt_statusp_os',$data);
		#//Registramos Cookie
		$this->session->set_flashdata('msg_ok', '1');
		
		#Enviamos o usuario para  a pagina de cadastro/funcionario
		redirect(base_url().'editar/eos/'.$id_os,'refresh');				
		}//Fechamos if($tipo == os
}
function fechar_os($tipo) {	
if($tipo =="editar"){
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
}



function atualizar_mao_obra($tipo) {			
if($tipo =="editar"){

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
}
function peca_os($tipo) {			
if($tipo =="os"){

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
		
}//		

function aviso_lido($id) {   
    	
		$dados = array('lido' => true);  
		$this->Padrao->fupdate_geral('sysbt_avisos','id',$id,$dados);
					
		}//Fechamos if($tipo == os	

}
		


