<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends CI_Controller {
	/**
	 * Author: Ivan Sowa
	 * Programação: Ivan Sowa	
	 * E-mail: ivan@intersowa.com - www.intersowa.com
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
 
echo "Você não tem permissão para ver esta página";
}
#Mostramos a página de funcionario
function av_atraso() {

$datestring = "%Y-%m-%d  %H:%i";
$time = time();
$data_agora = mdate($datestring, $time);  
//Preparamos a data atual para utilizar a função de diferença que é em outro formato
$data_atual_nf = new DateTime($data_agora);
$data_atual_nf = date_format($data_atual_nf, 'd/m/Y H:i');  

#Verificamos se tem OS em atraso
$where_atraso= array('status' => 1 );
$atraso = $this->Padrao->fc_where('os',$where_atraso );
   foreach ($atraso as $row) {     
       
       #Consulta dados do BD
         $data_prevista = $row->dat_prevista_os;
         $data_cadastro = $row->DATOS;
         $codos = $row->CODOS;
         $tecnico =$row->CODFUN;
         
		#Efetuamos calculo das data para descobrir o 50% e o 90% 
		//Mudamos o formato da data, para utilizar a função de diferença
		$data_prevista_nf = new DateTime($data_prevista);
		$data_prevista_nf = date_format($data_prevista_nf, 'd/m/Y H:i');
		$data_cadastro_nf = new DateTime($data_cadastro);
		$data_cadastro_nf = date_format($data_cadastro_nf, 'd/m/Y H:i');    
	
	    # Descrobrimos a diferença em horas da data de cadastro e a data prevista
	    $dif_cad_prev = $this->Padrao->entre($data_cadastro_nf,$data_prevista_nf,"h");
	    # Descobrimos a diferença em horas da data atual com a data prevista
	    $dif_atual_prev = $this->Padrao->entre($data_atual_nf,$data_prevista_nf,"h");
	    # Calculamos a porcentagem de 7% e 50%
	    $dif_cad_prev_int7 = intval($dif_cad_prev*0.07);
	    $dif_cad_prev_int50 = intval($dif_cad_prev*0.50);
	  
	   
	    
	    //Mostramos aviso quando chegar a 50%
	    if($dif_cad_prev_int50==$dif_atual_prev ){
	    
	    #Consultamos último status personalizado
		$statusp = $this->Padrao->fcp_ol_where('sysbt_statusp_os','id', 'desc','os_id',$codos, 1);
  		
  		if($statusp==false){$status_per= "O status não foi atualizado"; }else {
  		foreach ($statusp as $row2) { $status_per = $row2 ->status; }
  		}
	    //Mensagem que iremos cadastrar para os Admins	
	    $msg_aviso ="Atenção: <a href='".base_url()."editar/eos/".$codos."'>  OS Nº ".$codos." </a> se encontra em 50%. Último status: ".$status_per;
	       #Consultamos os admins
	        $where_admin= array('rh_cargos_id' => 4 );
			$consulta_admin = $this->Padrao->fc_where('funcionario',$where_admin );
   			foreach ($consulta_admin as $row3) {   
   			 //id do admin
   			 $id_admin = $row3->CODFUN;
   			 
   			 #cadastramos a mensagem
   			 $data = array('data' => $data_agora,'idfun' => $id_admin,'aviso' => $msg_aviso,'lido' => false);  
		//modulo que realiza o cadastro
		$this->Padrao->fadd_geral('sysbt_avisos',$data);
   			 
			} //fecha foreach
	 
	    
	    }//fecha if dif..
	   
  //Mostramos aviso quando chegar a 93%
	    if($dif_cad_prev_int7==$dif_atual_prev ){
	    
	    #Consultamos último status personalizado
		$statusp = $this->Padrao->fcp_ol_where('sysbt_statusp_os','id', 'desc','os_id',$codos, 1);
  		
  		if($statusp==false){$status_per= "O status não foi atualizado"; }else {
  		foreach ($statusp as $row2) { $status_per = $row2 ->status; }
  		}
	    //Mensagem que iremos cadastrar para os Admins	
	    $msg_aviso ="Atenção: <a href='".base_url()."editar/eos/".$codos."'>  OS Nº ".$codos." </a> se encontra em 93%. Último status: ".$status_per;
	    #Consultamos os admins
	        $where_admin= array('rh_cargos_id' => 4 );
			$consulta_admin = $this->Padrao->fc_where('funcionario',$where_admin );
   			foreach ($consulta_admin as $row3) {   
   			 //id do admin
   			 $id_admin = $row3->CODFUN;
   			 
   			 #cadastramos a mensagem
   			 $data = array('data' => $data_agora,'idfun' => $id_admin,'aviso' => $msg_aviso,'lido' => false);  
		//modulo que realiza o cadastro
		$this->Padrao->fadd_geral('sysbt_avisos',$data);
   			 
			} //fecha foreach
	 
	    
	    }//fecha if dif..	 
	    

  //Mostramos aviso quando a OS atrasar 2 horas
	    if($dif_atual_prev== -2 ){
	    
	    #Consultamos último status personalizado
		$statusp = $this->Padrao->fcp_ol_where('sysbt_statusp_os','id', 'desc','os_id',$codos, 1);
  		
  		if($statusp==false){$status_per= "O status não foi atualizado"; }else {
  		foreach ($statusp as $row2) { $status_per = $row2 ->status; }
  		}
	    //Mensagem que iremos cadastrar para os Admins	
	    $msg_aviso ="Urgente: <a href='".base_url()."editar/eos/".$codos."'> OS Nº ".$codos." </a> se encontra atrasada em mais de 2 horas. Último status: ".$status_per;
	    #Consultamos os admins
	        $where_admin= array('rh_cargos_id' => 4 );
			$consulta_admin = $this->Padrao->fc_where('funcionario',$where_admin );
   			foreach ($consulta_admin as $row3) {   
   			 //id do admin
   			 $id_admin = $row3->CODFUN;
   			 
   			 #cadastramos a mensagem
   			 $data = array('data' => $data_agora,'idfun' => $id_admin,'aviso' => $msg_aviso,'lido' => false);  
		//modulo que realiza o cadastro
		$this->Padrao->fadd_geral('sysbt_avisos',$data);
   			 
			} //fecha foreach
	 
	    
	    }//fecha if dif..	
	    
 //Mostramos aviso quando a OS atrasar 2 dias
	    if($dif_atual_prev== -48 ){
	    
	    #Consultamos último status personalizado
		$statusp = $this->Padrao->fcp_ol_where('sysbt_statusp_os','id', 'desc','os_id',$codos, 1);
  		
  		if($statusp==false){$status_per= "O status não foi atualizado"; }else {
  		foreach ($statusp as $row2) { $status_per = $row2 ->status; }
  		}
	    //Mensagem que iremos cadastrar para os Admins	
	    $msg_aviso ="Aviso: OS Nº <a href='".base_url()."editar/eos/".$codos."'> ".$codos." </a> esta atrasada (aberta) à mais de 2 dias. Último status: ".$status_per;
	    #Consultamos os admins
	        $where_admin= array('rh_cargos_id' => 4 );
			$consulta_admin = $this->Padrao->fc_where('funcionario',$where_admin );
   			foreach ($consulta_admin as $row3) {   
   			 //id do admin
   			 $id_admin = $row3->CODFUN;
   			 
   			 #cadastramos a mensagem
   			 $data = array('data' => $data_agora,'idfun' => $id_admin,'aviso' => $msg_aviso,'lido' => false);  
		//modulo que realiza o cadastro
		$this->Padrao->fadd_geral('sysbt_avisos',$data);
   			 
			} //fecha foreach
	 
	    
	    }//fecha if dif..		     	    
	      
	   
	   
	    
} 

	

	}




	

} //fecha a classe geral
