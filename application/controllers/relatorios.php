<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relatorios extends CI_Controller {
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


#Carregamos icones de relatorios
$this->load->view('relatorio_v');

}

function clientes() { 

$filtro= $this->input->post("filtro");
if($filtro!=""){
#Consulta de cliente com filtro
$data['clientes'] = $this->Padrao->fc_like('cliente','CODCLI','desc',50,$filtro,'NOMCLI','RAZCLI','TELCLI','EMACLI','n');	
}else {
#Lista de Clientes sem filtro
$data['clientes'] = $this->Padrao->fcp_ol('cliente', 'CODCLI','desc',20);	

}
$data['titulo'] = "SYSTECH";
$this->load->view('relatorio_cli_v',$data);
}

function fornecedores() { 

$filtro= $this->input->post("filtro");
if($filtro!=""){
#Consulta de cliente com filtro
$data['fornecedores'] = $this->Padrao->fc_like('fornecedor','CODFOR','desc',50,$filtro,'FANFOR','RAZFOR','TELFOR','EMAFOR','CODFOR');	
}else {
#Lista de Clientes sem filtro
$data['fornecedores'] = $this->Padrao->fcp_ol('fornecedor', 'CODFOR','desc',50);	
}
$data['titulo'] = "SYSTECH";
$this->load->view('relatorio_for_v',$data);

}

function produto() { 

$filtro= $this->input->post("filtro");
if($filtro!=""){
#Consulta de produto com filtro
$data['produto'] = $this->Padrao->fc_like('produto','CODPRO','desc',50,$filtro,'NOMPRO','CODPRO','n','n','n');	
}else {
#Lista de produto sem filtro
$data['produto'] = $this->Padrao->fcp_ol('produto', 'CODFOR','desc',100);	
}
$data['titulo'] = "SYSTECH";
$this->load->view('relatorio_pro_v',$data);
}


function ver_cliente($codcli) { 

#consultamos informações do cliente
$w_codcli= array('CODCLI' => $codcli);
$data['cliente'] = $this->Padrao->fc_where('cliente',$w_codcli);	

$data['titulo'] = "SYSTECH";
$this->load->view('relatorio_vcli_v',$data);

}
function ver_fornecedor($codfor) { 

#consultamos informações do  fornecedor
$w_codfor= array('CODFOR' => $codfor);
$data['fornecedor'] = $this->Padrao->fc_where('fornecedor',$w_codfor);	

$data['titulo'] = "SYSTECH";
$this->load->view('relatorio_vfor_v',$data);

}
function ver_produto($codpro) { 

#consultamos informações do  fornecedor
$w_codpro= array('CODPRO' => $codpro);
$data['produto'] = $this->Padrao->fc_where('produto',$w_codpro);	

$data['titulo'] = "SYSTECH";
$this->load->view('relatorio_vpro_v',$data);

}



#Carrega a "index" de relatorios de os
function os() {

#Consultamos os dados do técnico para formulario do filtro
$data['tecnico'] = $this->Padrao->fc_padrao('funcionario');   
#Recebemos os dados
$cliente= $this->input->post("cliente");
$id_cliente= $this->input->post("id");
$id_os= $this->input->post("n_os");
$tecnico= $this->input->post("tecnico");
$id_status= $this->input->post("selectStatus");
#dados para filtrar por data
$selectData= $this->input->post("selectData");
$data_i= $this->input->post("data_i");
$data_f= $this->input->post("data_f");

#preparamos a url validando
if($id_cliente=="") {$id_cliente="n"; }
if($id_os=="") {$id_os="n"; }
if($tecnico=="") {$tecnico="n"; }
if($id_status=="") {$id_status="n"; }
if($data_i=="" or $data_f==""){$selectData="n";$data_i="n"; $data_f="n";}

#Validamos as entradas   

$data['ajax_filtro']=base_url().'relatorios/filtro/'.$id_cliente.'/'.$id_os.'/'.$tecnico.'/'.$id_status.'/'.$selectData.'/'.$data_i.'/'.$data_f; 
	
$data['titulo'] = "SYSBT";
$this->load->view('relatorio_os_v',$data);


}


#Controle que carrega a view relatorio_filtro_v.php via url
function view_filtro() {
$this->load->view('relatorio_filtro_v');
}




#Pagina de relatorios padrao
function filtro($cliente,$os,$tecnico,$status,$selData,$data_i,$data_f) {

$link_imprimir=base_url().'pdf/lista_os/'.$cliente.'/'.$os.'/'.$tecnico.'/'.$status.'/'.$selData.'/'.$data_i.'/'.$data_f;

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

echo '<div class="box-content no-pad">';
echo '<table class="display" id="dt3">';
echo '    <ul class="table-toolbar">
            <li><a href="'.base_url().'cadastro/os/buscar_cliente"><img src="'.base_url().'assets/tema/adminity/img/icons/basic/nova_os.png" alt="" /> Abrir OS</a></li>
            <li><a href="'.$link_imprimir.'" target="_blank"><img src="'.base_url().'assets/tema/adminity/img/icons/basic/print.png" alt="" /> Imprimir</a></li>
          </ul>';
          
echo '<thead>
          <tr>
            <th>OS</th>
            <th>Cliente</th>
            <th>Técnico</th>
            <th>Status</th>
            <th>Entrada</th>
            <th>Previsão de entrega</th>
            <th>Valor</th>
          </tr>
        </thead>
       <tbody> ';


#Declaração para evitar erro.
$valor_somado = 0;
$classe_alt_n = 0;

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
//Mostramos o resultado
$url_1 ='<a href="javascript:;" onclick="carregar_pag(';	
$url_2="'".base_url()."editar/os/".$row->CODOS."');";
$url_3='">';
$url_soma = $url_1.$url_2.$url_3;


#Formatamos as datas
//data da os
if($row->DATOS!=""){
$data_os = new DateTime($row->DATOS);
$data_os = date_format($data_os, 'd-m-Y H:i');  
}else { $data_os=" - "; }
//data prevista
if($row->dat_prevista_os!=""){
$data_pos = new DateTime($row->dat_prevista_os);
$data_pos = date_format($data_pos, 'd-m-Y H:i');  
}else { $data_pos=" - "; }
 		 
 		 //Limitamos o nome do cliente
 		$nome_cliente = word_limiter($nome_cliente, 3);
 		$nome_fun = word_limiter($nome_fun, 1);
//Solução para alterar a classe 		
if($classe_alt_n==0){
$classe_alt = "even";
$classe_alt_n=1;
}else {
$classe_alt = "odd"; 	 		
$classe_alt_n=0;
} 		
echo  '<tr class="'.$classe_alt.' gradX" onclick="carregar_pag(';
echo  "'".base_url()."editar/os/".$row->CODOS."');";
echo '" >';
echo '
            <td>'.$row->CODOS.'</td>
             <td>'.$nome_cliente.'</td>
            <td>'.$nome_fun.'</td>
            <td>'.$status_os.'</td>
            <td class="center">'.$data_os.'</td>
            <td class="center">'.$data_pos.'</td>
            <td class="center">'.$valor_total.'</td>
          </tr> ';
          
/*          		
echo '<div class="grid-1-12">'.$url_soma.$row->CODOS.'</a></div>';
	 		  echo '<div class="grid-4-12">'.$url_soma.$nome_cliente.'</a></div>';		
   			  echo '<div class="grid-1-12">'.$url_soma.$nome_fun.'</a></div>';
   			  echo '<div class="grid-1-12">'.$url_soma.$status_os.'</a></div>';	
   			  echo '<div class="grid-2-12">'.$url_soma.$data_os.'</a></div>';
   			  echo '<div class="grid-2-12">'.$url_soma.$data_pos.'</a></div>';	
  			  echo '<div class="grid-1-12">'.$valor_total.'</div>';		
 */   				  
   }//fechamos o foreach 
   
 /*    	
 echo '<div class="grid-10-12 texto_alinha_direita">';
 echo "<a target='_blank' href='".$link_imprimir."' ";
 echo ">||  Imprimir Relatório || </a>";
 echo '</div>';
  */   
 }// Fechamos o if que evita erros  
echo " </tbody>
      </table>
        </div>
      ";

}//fechamos o filtro

function avisos() { 

$id_fun = $this->input->cookie("sysbt_idfun");
#Lista de Clientes sem filtro
$where_aviso= array('idfun' => $id_fun);
$data['aviso'] = $this->Padrao->fcp_ol_where('sysbt_avisos', 'id','desc','idfun',$id_fun,50);	


$data['titulo'] = "SYSBT";
$this->load->view('relatorio_avisos_v',$data);
}

function funcionarios() { 

$filtro= $this->input->post("filtro");
if($filtro!=""){
#Consulta de cliente com filtro
$data['funcionarios'] = $this->Padrao->fc_like('funcionario','CODFUN','desc',25,$filtro,'NOMFUN','TELFUN','n','n','n');	
}else {
#Lista de Clientes sem filtro
$data['funcionarios'] = $this->Padrao->fcp_ol('funcionario', 'CODFUN','desc',25);	

}
$data['titulo'] = "SYSBT";
$this->load->view('relatorio_fun_v',$data);
}

	
 	
} //fecha a classe geral
