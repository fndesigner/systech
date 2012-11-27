<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends CI_Controller {
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
	
		$this->load->helper(array('email','captcha', 'string','form','date','array','text','mpdf'));
		$this->load->model('Padrao');
		$this->load->library('encrypt','form_validation','javascript'); //Estamos usando criptografia nessa página
		//Carregamos os dados do banco de dados
		$this->load->database();

		
	}
public function index() {

$html = "<html>";
$html .= "<head></head>";
$html .= "<body>SYSBT - SISTEMA DE CONSULTA EM PDF</body>";
$html .= "</html>";
 
// Opcional: Também é possivel carregar uma view inteira...
#$html = $this->load->view('uma_view_qualquer', null, true);
 
pdf($html);

}

#Pagina de relatorios pdf
function lista_equipamentos($cliente) {

//Cliente
		$f_os_w_cli= array('CODCLI' => $cliente);
	 	$f_os_cliente = $this->Padrao->fc_where('cliente',$f_os_w_cli);
	 	foreach ($f_os_cliente as $row_cli) { $nome_cliente = $row_cli->NOMCLI;}


$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
$html .="<html><head><title>Relatório de Equipamentos</title>";
$html .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$html .= '<style>table#alter tr td { background: #e5e5e5;}'; 
$html .= 'table#alter tr.dif td {background: #b3b3b3; }';
$html .= 'body {font-size: 10px; font-family: tahoma;}';
$html .= '</style>';
$html .= '</head><body>';
$html .= '<img src="'.base_url().'/assets/di/logo_os.png">';

$html .= '<div id="titulo"> Lista de Equipamentos | Cliente: '.$nome_cliente.'</div>';
$html .= '<table cellpadding="3px" cellspacing="2px" ID="alter" width="890px">
	<tr class="dif"> 
		<td>NOME </td>
		<td>PROCESSADOR</td>
		<td>MEMÓRIA</td>
		<td>HD</td>
		<td>PLACA MÃE</td>
	</tr>';
//Consultamos os equipamentos
		$f_os_w_equip= array('clientes_id' => $cliente);
	 	$f_os_equip = $this->Padrao->fc_where('sysbt_equipamentos',$f_os_w_equip);
	 	foreach ($f_os_equip as $row_equip) { 
	
	$html .='<tr> 
		<td>'.word_limiter($row_equip->nome,15).'</td>
		<td>'.word_limiter($row_equip->processador,15).'</td>
		<td>'.word_limiter($row_equip->memoria,15).'</td>
		<td>'.word_limiter($row_equip->hd,15).'</td>
		<td>'.word_limiter($row_equip->placa_mae,15).'</td>
	</tr>';
	
	 	}

$html .='</table></body></html>';

pdf($html);

}
#Pagina de relatorios pdf
function cliente_lista_equipamentos($cliente) {

//Cliente
		$f_os_w_cli= array('CODCLI' => $cliente);
	 	$f_os_cliente = $this->Padrao->fc_where('cliente',$f_os_w_cli);
	 	foreach ($f_os_cliente as $row_cli) { $nome_cliente = $row_cli->NOMCLI;}


$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
$html .="<html><head><title>Relatório de Equipamentos</title>";
$html .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$html .= '<style>table#alter tr td { background: #e5e5e5;}'; 
$html .= 'table#alter tr.dif td {background: #b3b3b3; }';
$html .= 'body {font-size: 10px; font-family: tahoma;}';
$html .= '</style>';
$html .= '</head><body>';
$html .= '<img src="'.base_url().'/assets/di/logo_os.png">';

$html .= '<div id="titulo"> Lista de Equipamentos | Cliente: '.$nome_cliente.'</div>';
$html .= '<table cellpadding="3px" cellspacing="2px" ID="alter" width="890px">
	<tr class="dif"> 
		<td>NOME </td>
		<td>MARCA</td>
		<td>MONITOR</td>
		<td>PROCESSADOR</td>
		<td>MEMÓRIA</td>
		<td>HD</td>
		<td>PLACA MÃE</td>
	</tr>';
//Consultamos os equipamentos
		$f_os_w_equip= array('clientes_id' => $cliente);
	 	$f_os_equip = $this->Padrao->fc_where('sysbt_equipamentos',$f_os_w_equip);
	 	foreach ($f_os_equip as $row_equip) { 
	
	$html .='<tr> 
		<td>'.word_limiter($row_equip->nome,3).'</td>
		<td>'.word_limiter($row_equip->marca,3).'</td>
		<td>'.word_limiter($row_equip->monitor,3).'</td>
		<td>'.word_limiter($row_equip->processador,4).'</td>
		<td>'.word_limiter($row_equip->memoria,3).'</td>
		<td>'.word_limiter($row_equip->hd,3).'</td>
		<td>'.word_limiter($row_equip->placa_mae,3).'</td>
	</tr>';
	
	 	}

$html .='</table></body></html>';

pdf($html);

}


#Pagina de relatorios pdf
function lista_os($cliente,$os,$tecnico,$status,$selData,$data_i,$data_f) {

#Consultamos somente os dados que recebemos, por isso testamos todas as variaveis
if($cliente!='n'){$consulta['CODCLI']=$cliente;}
if($os!='n'){ $consulta['CODOS']=$os;} 
if($tecnico!='n'){ $consulta['CODFUN']=$tecnico;} 
if($status!='n'){ $consulta['status']=$status;} 

if($selData !='n'){
if($selData =="entrada"){$campo_seldat = 'DATOS'; }
if($selData =="fechamento"){$campo_seldat = 'dat_baixa_os'; }
#preparamos o formato da data, para mostrar na consulta
#Formatamos a data 
$data_i = new DateTime($data_i.' 00:00:00');
$data_i = date_format($data_i, 'Y-m-d H:i:s');   
$data_f = new DateTime($data_f.' 00:00:00');
$data_f = date_format($data_f, 'Y-m-d H:i:s');   

$consulta[$campo_seldat.' >=']=$data_i;
$consulta[$campo_seldat.' <=']=$data_f; 
}

//carregamos a consulta padrão sem definições
 if($cliente=='n' and $os=='n' and $tecnico=='n' and $status=='n' and $selData=='n' and $data_i=='n' and $data_f=='n'){
  //$data['f_os'] = $this->Padrao->fc_padrao('os');
  $data['f_os'] = $this->Padrao->fcp_ol('os', 'CODOS','desc',30);	
 }else{
$data['f_os'] = $this->Padrao->fc_where('os',$consulta);	 
 }  	

$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
$html .="<html><head><title>Relatório</title>";
$html .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$html .= '<style>table#alter tr td { background: #fff;}'; 
$html .= 'table#alter tr.dif td {background: #eee; }';
$html .= 'body {font-size: 10px; font-family: tahoma;}';
$html .= '</style>';
$html .= '</head><body>';
$html .= '<img src="'.base_url().'/assets/di/logo_os.png">';


$html .= '<table cellpadding="5px" cellspacing="3px" ID="alter" width="890px">
	<tr> 
		<td>OS </td>
		<td>Cliente</td>
		<td>Técnico</td>
		<td>Status</td>
		<td>Entrada</td>
		<td>V.Produtos</td>
		<td>M.Obra</td>
		<td>Total</td>
	</tr>';

#Declaração para evitar erro.
$valor_somado = 0;

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
		//Validamos o valor
		if($row->VLROS==""){ $valor_total=0;}else {$valor_total=$row->VLROS;}

#Formatamos as datas
//data da os
if($row->DATOS!=""){
$data_os = new DateTime($row->DATOS);
$data_os = date_format($data_os, 'd-m-Y');  
}else { $data_os=" - "; }

 		 //Limitamos o nome do cliente
 		$nome_cliente = word_limiter($nome_cliente, 4);
 		$nome_fun = word_limiter($nome_fun, 2);
 		
 		$calc = $row->CODOS % 2;
 		$val_prod = $valor_total - $row->vlrobra; 
 		if($calc==0){$dif ='class="dif"'; }else {$dif ='class=""';}	

$html .= '<tr '.$dif.'> <td>'.$row->CODOS.'</td><td>'.$nome_cliente.'</td><td>'.$nome_fun.'</td><td>'.$status_os.'</td><td>'.$data_os.'</td><td>'.'R$ '.$val_prod.'</td><td>'.'R$ '.$row->vlrobra.'</td><td>'.'R$ '.$valor_total.'</td></tr>'; 		
 				
 			  //soma produtos
   			  $soma_produtos += $val_prod;
 			  //soma mao de obra
   			  $soma_mobra += $row->vlrobra;
   			  //soma total
   			  $soma_total += $valor_total;
   				  
   }//fechamos o foreach 	

   
 }// Fechamos o if que evita erros  
$html .= '<tr ><td colspan="5" bgcolor="#CCCCCC">Totais:</td><td bgcolor="#CCCCCC"> R$ '.$soma_produtos.'</td><td bgcolor="#CCCCCC"> R$'.$soma_mobra.'</td><td bgcolor="#CCCCCC"> R$'.$soma_total.'</td></tr>';
$html .='</table></body></html>';

pdf($html);

}//fechamos o filtro




} //fecha a classe geral