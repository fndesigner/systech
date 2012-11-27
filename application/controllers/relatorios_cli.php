<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relatorios_cli extends CI_Controller {
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
   public function index() {

#Consultamos os dados do técnico para formulario do filtro
$data['tecnico'] = $this->Padrao->fc_padrao('funcionario');   
#Recebemos os dados
$id_cliente= $this->input->cookie("sysbt_idcli");
$id_os= 'n';
$tecnico= 'n';
$id_status= 'n';

#Validamos as entradas   
$data['ajax_filtro']=base_url().'relatorios_cli/filtro/'.$id_cliente.'/'.$id_os.'/'.$tecnico.'/'.$id_status; 
	
$data['titulo'] = "SYSBT";
$this->load->view('cliente_relatorio_v',$data);
}
#Controle que carrega a view relatorio_filtro_v.php via url 
public function view_filtro() {
$this->load->view('relatorio_filtro_v');
}




#Pagina de relatorios padrao
function filtro($cliente,$os,$tecnico,$status) {

#Consultamos somente os dados que recebemos, por isso testamos todas as variaveis
if($cliente!='n'){$consulta['CODCLI']=$cliente;}
if($os!='n'){ $consulta['CODOS']=$os;} 
if($tecnico!='n'){ $consulta['CODFUN']=$tecnico;} 
if($status!='n'){ $consulta['status']=$status;} 
//carregamos a consulta padrão sem definições
  $data['f_os'] = $this->Padrao->fcp_ol_where('os','CODOS', 'desc','CODCLI',$cliente, 25); 


	
echo '<div class="grid-12-12">';
echo '<div class="grid-1-12">OS</div>';
echo '<div class="grid-2-12">Cliente</div>';
echo '<div class="grid-2-12">Técnico</div>';
echo '<div class="grid-2-12">Status</div>';
echo '<div class="grid-2-12">Entrada</div>';
echo '<div class="grid-2-12">Baixa</div>';
echo '<div class="grid-1-12">Valor</div>';

#Necessario para não apresentar erros, quando não se encontra registros
if($data['f_os']==false) {
echo "Não foi encontrado registros no Banco de Dados";
} else {	
	 foreach ($data['f_os'] as $row) { 
		#Decodificação
		//Cliente
	 	$CODCLI = $row->CODCLI;
		$f_os_w_cli= array('CODCLI' => $CODCLI);
	 	$f_os_cliente = $this->Padrao->fc_where('cliente',$f_os_w_cli);
	 	foreach ($f_os_cliente as $row_cli) { $nome_cliente = $row_cli->NOMCLI;}
	 	//Funcionario
	 	$CODFUN = $row->CODFUN;
		$f_os_w_fun= array('CODFUN' => $CODFUN);
	 	$f_os_fun = $this->Padrao->fc_where('funcionario',$f_os_w_fun);
	 	foreach ($f_os_fun as $row_fun) { $nome_fun = $row_fun->NOMFUN;}
		//Status
		if($row->status==1){$status_os = "Aberta";}
		if($row->status==2){$status_os = "Fechada";}
		//Definimos a saida
		if($row->dat_baixa_os==""){ $data_baixa=" - ";}else {$data_baixa=$row->dat_baixa_os;}
		//Validamos o valor
		if($row->VLROS==""){ $valor_total=" - ";}else {$valor_total=$row->VLROS;}
			  
//Mostramos o resultado
$url_1 ='<a href="javascript:;" onclick="carregar_pg(';	
$url_2="'".base_url()."editar/os_cli/".$row->CODOS."')";
$url_3='">';
$url_soma = $url_1.$url_2.$url_3;
 		  
echo '<div class="grid-1-12">'.$url_soma.$row->CODOS.'</a></div>';
	 		  echo '<div class="grid-2-12">'.$url_soma.$nome_cliente.'</a></div>';		
   			  echo '<div class="grid-2-12">'.$url_soma.$nome_fun.'</a></div>';
   			  echo '<div class="grid-2-12">'.$url_soma.$status_os.'</a></div>';	
   			  echo '<div class="grid-2-12">'.$url_soma.$row->DATOS.'</a></div>';
   			  echo '<div class="grid-2-12">'.$url_soma.$data_baixa.'</a></div>';	
   			  echo '<div class="grid-1-12">'.$url_soma.$valor_total.'</a></div>';		
   				  
   }//fechamos o foreach 
 }//fechamos if que evita erro   	
echo "</div>";

}//fechamos o filtro	
 	
} //fecha a classe geral
