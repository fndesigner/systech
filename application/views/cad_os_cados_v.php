<?
# Se o cliente não foi selecionado, levamos ele novamente para a página anterior
if($cliente==""){redirect(base_url().'cadastro/os/buscar_cliente','refresh');}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title><?= $titulo ?> - Cadastro de Ordem de Serviço</title>
<!-- formee -->
<script type="text/javascript" src="<?=base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/formee.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/js.js"></script>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />
<?	$this->load->view('head'); ?>
<style type="text/css">
label.error { float: none; color: red; margin: 0 .5em 0 0; vertical-align: top; font-size: 13px }
</style>
<script>
	$(function() {
		$( "#data_prevista" ).datepicker({ dateFormat: 'dd-mm-yy' });
		$( "#data_prevista" ).datepicker();
		
	});
	</script>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/estilo.css" />
<!-- formee -->
<?php foreach ($cliente as $row) { $nomcli = $row->NOMCLI; $codcli = $row->CODCLI;   }?>
</head>
<body>
<?	$this->load->view('i_topo_v'); ?>
<?	$this->load->view('i_menu_v'); ?>
<form action="<?= base_url().'salvar_os/os/cadastro' ?>" method="post" class="formee" id="form_cad_os"   >
<div class="content container_12"> 	
<? if($equipamento==false) { ?><div class="ad-notif-error"><p>Não é possível cadastrar essa Ordem de Serviço. Cadastre um equipamento e tente novamente. </p></div> <? } ?>
<? if($this->session->flashdata('msg_ok')==1) { ?> <div class="formee-msg-success"><h3>Cadastro efetuado.</h3></div><? } ?>
	<div class="box-head"><h2>CADASTRO DE OS PARA <?= $nomcli ?> </h2></div>
	<ul class="table-toolbar">
        	<li><a href="<?=base_url() ?>cadastro/cliente/>"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/clientes.png" alt="" /> Novo Cliente</a></li>  
        	<li><a href="<?= base_url().'cadastro/equipamento/'.$codcli; ?>"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/editar-equip.png" alt="" /> Cadastrar Equipamento</a></li> 
            <li><a href="<?= base_url()?>cadastro/funcionario"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/funcionario.png" alt="" /> Cadastrar Técnico</a></li> 
     </ul>
     <div class="box-content box">
	     <div class="grid_2">
		     Entrega <em class="formee-req">*</em>
   			<input type="text" name="data_prevista" id="data_prevista" /> 	
   		 </div> <!--grid_2-->
   		 <div class="grid_2">
   			 Hora <em class="formee-req">*</em>
   		     <input type="text" name="data_prevista_hora" id="data_prevista_hora" value="17:00:00" /> 	
   		 </div><!--grid_2-->     
   		 <div class="grid_3">
   		     Técnico <em class="formee-req">*</em>
   		     <? 	if($this->input->cookie("sysbt_cargo")==4){ ?>
   		     <select name="tecnico" id="tecnico">
   			 <?php foreach ($tecnico as $row) { ?>
   			 <option value="<?= $row->CODFUN; ?> "><?= $row->NOMFUN; ?> </option>
   			 <? } ?>
   			 </select>
   			 <? }else { //fechamos if de permissão ?>
   			 <select name="tecnico" id="tecnico">
   			 <?php foreach ($tecnico as $row) { ?>
   			 	<? if($row->CODFUN==$this->input->cookie("sysbt_idfun")) { ?>
   			    <option value="<?= $row->CODFUN; ?> "><?= $row->NOMFUN; ?> </option>
   			    <? 
   			    } //fechamos o if
   			    } // fechamos o foreach ?>
   				</select>
   				<? } ?>
   		  </div><!-- grid_3 -->
   		  <div class="grid_2">
	   		  <? if($equipamento==false) { ?> <div class="ad-notif-warn small-mg"><p>Nenhum equipamento cadastrado </p></div> <? }else { ?>
			  Equipamento <em class="formee-req">*</em>
   			  <select name="equip" id="equip">
   			  <?php foreach ($equipamento as $row) { ?>
   			  <option value="<?= $row->id; ?> "><?= $row->nome; ?> - <?= $row->tipo; ?> </option>
   			  <? } ?>
   			  </select>
   			  <? } ?>	 
   		   </div><!-- grid_2 -->
   	   </div><!-- box-content box -->	
   	<div class="box-head"><h2>Informações detalhadas</h2></div>
    <div class="box-content box">
        	<div class="grid_6">
    			Defeito reclamado  <em class="formee-req">*</em>
    			<textarea name="defeito" rows="2" id="defeito"></textarea>
   			</div>	<!--grid_6-->
   			<div class="grid_6">
    			Solução <em class="formee-req">*</em>
    			<textarea name="solucao" rows="2" id="solucao"></textarea>
   			</div><!--grid_6-->
   			<div class="grid_12">
    			Observações
   				<textarea name="obs" rows="2" id="obs"></textarea>
   			</div><!--grid_12-->
   			<? if($equipamento!=false) { ?><div class="grid_2"><input type="submit" class="button black" value="Salvar" ></div> <? } ?>
   	</div> <!--box-content box-->	
</div>	 <!--content container_12-->
<input type="hidden" value="<?= $codcli; ?>" name="codcli" id="codcli" /> 	
</form>
<?	$this->load->view('i_rodape_v'); ?>
	</body>
</html>