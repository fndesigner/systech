<?
#Formatamos a data 
if($e_os_previsao!=""){
$data_prevista = new DateTime($e_os_previsao);
$data_previstac = date_format($data_prevista, 'd-m-Y');  
$data_prevista_hora = date_format($data_prevista, 'H:i:s');
}else {
$data_previstac ="";
$data_prevista_hora ="";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?= $titulo ?> - Editar Ordem de Serviço</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="<?=base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/formee.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/js.js"></script>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />
<?	$this->load->view('jqueryui'); ?>
<?	$this->load->view('head'); ?>
<style type="text/css">
label.error { float: none; color: red; margin: 0 .5em 0 0; vertical-align: top; font-size: 13px }
</style>


<script type="text/javascript">
//script complementar para o autocomplete dessa página.
		$(document).ready(function(){
		
			function log( message ) { $( "#codprod").val(message); }
			function log_2( message ) { $( "#preco").val(message); }
			$('#peca').autocomplete({
				source:'<?php echo site_url('autocomplete/produto'); ?>',
			
				select: function( event, ui ) {
						log( ui.item ?
							 ui.item.CODPRO	:
							 + this.value );
						log_2( ui.item ?
							 ui.item.PREPRO	:
							 + this.value );
					}	
				
	
													
			});
		});
//Função que controla a data
$(document).ready(function(){
	$(function() {
		$( "#data_prevista" ).datepicker({ dateFormat: 'dd-mm-yy' });
		$( "#data_prevista" ).datepicker();
		
	});	});
	</script>
	
<?php echo link_tag(base_url().'assets/css/estilo.css'); ?>

</head>
<body>
<?	$this->load->view('i_topo_v'); ?>
<?	$this->load->view('i_menu_v'); ?>
<div class="content container_12"> 
<? if($e_os_status==2){ ?>
<div class="ad-notif-warn grid_12 small-mg"><p>ATENÇÃO: Essa ordem de serviço já está fechada.</p></div>
<? } ?>
<? if($this->session->flashdata('msg_ok')==1) { ?> <div class="ad-notif-success grid_12 small-mg" id="result"><p>SUCESSO: Ordem de Serviço Atualizada.</p></div><? } ?>  
 <div class="box grid_8">
  <form action="<?= base_url().'salvar_os/ad_os/editar' ?>" method="post" class="formee" id="formAtualizarOS" >
	  	<div class="box-head"><h2>EDITAR OS <?= $e_os_codos ?> | <?= $e_os_cliente ?></h2></div>
	  	  <ul class="table-toolbar">
            <li><a href="#"><img src="<?= base_url(); ?>/assets/tema/adminity/img/icons/basic/plus.png" alt="" /> Nova OS</a></li>
            <li><a href="#"><img src="<?= base_url(); ?>/assets/tema/adminity/img/icons/basic/delete.png" alt="" /> Excluir OS</a></li>
            <li><a href="#"><img src="<?= base_url(); ?>/assets/tema/adminity/img/icons/basic/clientes.png" alt="" /> Editar Cliente</a></li>     
  <li><a href="#"><img src="<?= base_url(); ?>/assets/tema/adminity/img/icons/basic/editar-equip.png" alt="" /> Editar Equipamento</a></li>
               <li><a href="<?=base_url() ?>imprimir/os/<?= $e_os_codos ?>" target="_blank" ><img src="<?= base_url(); ?>/assets/tema/adminity/img/icons/basic/print.png" alt="" /> Imprimir OS</a></li>
            
          </ul>
        	<div class="box-content"> 	
    <div class="grid_6 "><p>Equipamento: <?= $e_os_equip ?></p></div>
    <div class="grid_6 "><p>Técnico: <?= $e_os_tecnico ?></p></div>
  
    
    
    <div class="grid_6">
    Defeito<em class="formee-req">*</em>
    <textarea name="defeito" rows="1" id="defeito"><?= $e_os_defeito ?></textarea> 
    </div>
     <div class="grid_6">
   Solução<em class="formee-req">*</em>
    <textarea name="solucao" rows="1" id="solucao"><?= $e_os_solucao ?></textarea> 
    </div>
    <div class="grid_12">
    Obs:
    <textarea name="obs" rows="1" id="obs"><?= $e_os_obs ?></textarea> 
    </div>
    <div class="grid_4">
   			     Previsão de entrega para <em class="formee-req">*</em>
   				 <input type="text" name="data_prevista" id="data_prevista" value="<?= $data_previstac ?>" /> 	
   	</div> 
   	 <div class="grid_3">
   			    Hora <em class="formee-req">*</em>
   				 <input type="text" name="hora_prevista" id="hora_prevista" value="<?= $data_prevista_hora ?>" /> 	
   	</div>
   	
    <div class="grid_3">Situação da OS
    <? if($this->input->cookie("sysbt_cargo")==4){ ?>
     <select name="status_os" id="status_os">			      
   			       <option value="1" <? if($e_os_status==1){ ?>selected="selected" <? } ?>> Aberta</option>
   			     	<option value="2" <? if($e_os_status==2){ ?>selected="selected" <? } ?>> Fechada </option>  			   
   				 </select>
   	<? } else { ?>
   	<? if($e_os_status==1){ echo "ABERTA"; }else { echo "fechada"; } ?>
   	<input type="hidden" value="<?= $e_os_status ?>" name="status_os" />
   	<? } ?>			 <input type="hidden" value="<?= $e_os_codos ?>" name="codos" /> 
   				 </div>
   				 
   				<div class="grid_2"><input type="submit" value="Atualizar" class="button black"></div>
    
</div><!-- box-content -->
</form>
</div>  	
  <div class="box grid_4">
        <div class="box-head"><span class="box-icon-24 fugue-24 counter"></span><h2>Financeiro da OS</h2></div>
        <div class="box-content ad-stats">
          <ul>
             <li><h3><span class="text-tiny">R$ </span><?= $e_os_valros-$e_os_mobra ?></h3>Produtos</li>
            <li ><h3><span class="text-tiny">R$ </span> <?= $e_os_mobra ?></h3> Mão de Obra</li>
           <!-- <li class="stats-down"><h3><span class="text-tiny">R$ </span>0,00</h3> Descontos</li> -->
             <li class="stats-up"><h3><span class="text-tiny">R$ </span><? if($e_os_valros!=""){ ?><?= $e_os_valros ?><? }else { ?>0,00<? } ?></h3> Valor Total</li>
          </ul>
        </div>
      </div>
	<? //codigo que da permissão para fechamento da OS somente para o Administrador
 	if($this->input->cookie("sysbt_cargo")==4){ ?>
 	<div class="box grid_4">
   
	    	<div class="box-head"><h2>Fechar OS</h2></div>	
           <div class="box-content"> 
  <form action="<?= base_url().'editar/salvar/fechar_os' ?>" method="post" class="formee" id="formFecharOS" >
        		<div class="grid_5">Equipamento retirado por: <em class="formee-req">*</em></div>
        		<div class="grid_5"><input type="text" value="<?= $e_os_retirado ?>" name="retirado_por"  placeholder="Nome:" /></div>
        	
                <div class="grid_2">
         		<input type="hidden" value="<?= $e_os_codos ?>" name="codos" />
    			<input type="submit" value="Fechar" class="button black">
    			</div>			
 		</form>
 		 	</div><!-- box-content -->
 	</div>	
 <? } // fechamos if que verifica permissão somente para administrador ?>	
 <div class="box grid_4">
   
	    	<div class="box-head"><h2>Mão de Obra</h2></div>	
           <div class="box-content"> 
  <form action="<?= base_url().'editar/salvar/atualizar_mao_obra' ?>" method="post" class="formee" id="formAtualizarMaoObra" >
                <div class="grid_5">Valor mão de obra: <em class="formee-req">*</em></div>
        	    <div class="grid_4"><input type="text" value="<?= $e_os_mobra ?>" name="valor_mobra" placeholder="80.00" /></div>	
                <div class="grid_2">
         		<input type="hidden" value="<?= $e_os_codos ?>" name="codos" />
    			<input type="submit" value="Atualizar" class="button black">
    			</div>			
 		</form>
 		 	</div><!-- box-content -->
 	</div>	

	
 	<div class="box grid_12">
		<form action="<?= base_url().'editar/salvar/peca_os' ?>" method="post" class="formee" id="formFecharOS" >
				<div class="box-head"><h2>Adicionar Produtos</h2></div>
        	<div class="box-content">
        		<div class="grid_6">Produto: </div>
        		<div class="grid_2">Preço: </div>
        		<div class="grid_4">Qtd: </div>
    			<div class="grid_6"><input type="text" value="" name="peca" id="peca" placeholder="Digite o nome do produto, depois selecione o produto na lista" /></div>
    			<div class="grid_2"><input type="text" value="" name="preco" id="preco" /></div>
    			<div class="grid_1"><input type="text" value="1" name="qtd" id="qtd" /></div>
  			    <input name="codprod" id="codprod" type="hidden" />
  			    <input type="hidden" value="<?= $e_os_codos ?>" name="codos" />
    			<div class="grid_3"><input type="submit" value="Adicionar" class="button black"></div>			

 		</form>
 	</div><!-- box-content -->
 	</div>	
<? if($e_prod!=false){ ?> 	
 	<div class="box grid_12">
 	<div class="box-head"><h2>Produtos</h2></div>
 	      	<div class="box-content no-pad">
        <table class="display" id="dt2">
            <thead>  
             <tr>
              <th>Qtd</th>
              <th>Produto</th>
              <th>Valor</th>
              <th>Ações</th>
            </tr>
            </thead> 
            <tbody>   
 <?
 //evita erros
 if($e_prod!=false){
 //consulta de produtos anexados 
  foreach ($e_prod as $row2) { 
  			  $codo = $row2->CODO;// Necessário para excluir o produto, é o id da tabela 
        	  $codpro = $row2->CODPRO;
        	  $precopro =$row2->TOTPRO;
        	  $qtdpro=$row2->QTDPRO;
        	  
       #consultamos o nome do produto 
        $where_codpro= array('CODPRO' => $codpro);
		$nom_produto = $this->Padrao->fc_where('produto',$where_codpro );
		foreach ($nom_produto as $row3) { $nompro = $row3->DESPRO; }
		?>
	  
        
        
        <tr class="odd gradeX">
        <td><?= $qtdpro ?></td>
        <td><?= $nompro ?></td>
        <td>R$ <?= $precopro ?></td>
        <td><a href="<?= base_url().'excluir/venda_produto/'.$codo.'/'.$qtdpro.'/'.$codpro.'/'.$e_os_codos ?>"> <img src="<?= base_url() ?>assets/tema/adminity/img/icons/basic/excluir-space.png" border="0" title="Excluir este produto"> </a></td>
               </tr>
        	    
          <? 
          }//fecha foreach
        }//fecha if que evita erro  
           ?>	
    </tbody>
    </table>  
    </div> <!-- box-content no-pad -->  
    </div>  
<? } //fechamos if que oculta caso não tenha produto cadastrado ?> 	
 


	<div class="box grid_12">
		<form  class="formee" id="formEditarOS" method="post" action="<?= base_url().'cadastro/salvar/statusp'; ?>"> 	
<div class="box-head"><h2>Histórico Personalizado</h2></div>
        	<div class="box-content">
  				<div class="grid_12">Status Personalizado: <em class="formee-req">*</em></div>
    			<div class="grid_9"><input type="text" value="" name="statusp_os" id="statusp_os" placeholder="Indique o estado atual do serviço para este equipamento" /> </div>
    			<div class="grid_3"><input type="hidden" value="<?= $e_os_codos ?>" name="id_os" id="id_os" />
                <input type="submit" value="Salvar" class="button black" id="btn_statusp"></div>			
   	   </form>	
	</div><!-- box-content -->
	</div><!-- grid_6 -->

  <? if($e_statusp!="") { ?>
<div class="grid_12">
		<div class="box-head"><h2>Histórico</h2></div>
        	<div class="box-content">
         <ul class="circle">
        	<? foreach ($e_statusp as $row) { ?>
        	<li><?= $row->status; ?> <span class="text-small">- <?= $row->DATA; ?></span>
        	<? if($this->input->cookie("sysbt_cargo")==4){ ?><a href="<?= base_url().'excluir/historico/'.$row->id.'/'.$e_os_codos ?>"> <img src="<?= base_url() ?>assets/tema/adminity/img/icons/basic/excluir_historico.png" border="0" title="Excluir esse status"  > </a> <? } ?>
        	</li>
        	   
        	<? } ?>
        	</ul>  	    	

</div> 
<? } ?>      	
	</div><!-- box-content -->
 </div>
 </div>		
 <?	$this->load->view('i_rodape_v'); ?>
	</body>
</html>

<script> /* SCRIPTS */

    $('#dt2').dataTable( {
        "bJQueryUI": true     
    });

</script>

</body>
</html>