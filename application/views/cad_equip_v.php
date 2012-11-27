<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?= $titulo ?> - Cadastro de Equipamento</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- formee -->
<?	$this->load->view('head'); ?>
<script type="text/javascript" src="<?=base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/formee.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/js.js"></script>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />
<style type="text/css">
label.error { float: none; color: red; margin: 0 .5em 0 0; vertical-align: top; font-size: 13px }
.ui-autocomplete-loading { background: white url('../di/ui-anim_basic_16x16.gif') right center no-repeat; }
</style>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/estilo.css" />
<script type="text/javascript">
//script complementar para o autocomplete dessa página.
		$(document).ready(function(){
		
			function log( message ) {
		
			$( "#id").val(message);
			
		}
			$('#cliente').autocomplete({
				source:'<?php echo site_url('autocomplete/ajax'); ?>',
			
				select: function( event, ui ) {
						log( ui.item ?
							 ui.item.CODCLI	:
							 + this.value );
					}								
			});
		});
</script>
<!-- formee -->
	</head>
	<body>
	<?	$this->load->view('i_topo_v'); ?>
    <?	$this->load->view('i_menu_v'); ?>
<form action="<?= base_url().'salvar/equipamento/cadastro' ?>" method="post" class="formee" id="form_cad_equipamento" >
<div class="content container_12">   
<? if($this->session->flashdata('msg_cli_ok')==1) { ?> <div class="formee-msg-success"><h3>Cliente Cadastrado. Agora cadastre o equipamento do cliente</h3></div><? } ?>
<? if($this->session->flashdata('msg_ok')==1) { ?> <div class="formee-msg-success"><h3>Equipamento cadastrado. Se desejar cadastre um novo equipamento para este cliente</h3></div><? } ?>
  		<div class="box-head"><h2>Cadastro de Equipamento</h2></div>
        	<div class="box-content box">
        		<?php if($id_cliente==0) { ?>
        		<div class="grid_12">Cliente: <em class="formee-req">*</em></div>
        		<div class="grid_12"><input type="text" value="" name="cliente" id="cliente" /></div>
        		<input type="hidden" value="" name="id" id="id"  />
        		<? } else {?>
        		<input type="hidden" value="<?= $id_cliente ?>" name="id" id="id"  />
        		<? } ?>
  				<div class="grid_6">
  					Nome do equipamento: <em class="formee-req">*</em>
  					<input type="text" value="" name="nome" />
    			</div><!--grid_6-->
    			<div class="grid_6">
    			 	Tipo: <em class="formee-req">*</em>
    			 	<select name="equip" id="equip">
   			     	<option value="Computador" selected="selected">Computador</option>
   			     	<option value="Notebook">Notebook</option>
   			     	<option value="Servidor">Servidor</option>
   			     	<option value="Impressora">Impressora</option>
   			     	<option value="PenDriver">Pen Driver</option>
   			     	<option value="Outros">Outros</option>
   				 </select>
   				 </div><!--grid_6-->
        	</div><!--box-content box-->
   				 <div class="box-head"><h2>Detalhes do Equipamento</h2></div>
   			<div class="box-content box">
   				 <div class="grid_3">
  					Marca: <em class="formee-req">*</em>
  					<input type="text" value="" name="marca" />
    			</div><!--grid_3-->
    			<div class="grid_3">
  				 	IP:
  				 	<input type="text" value="" name="ip" />
    			</div><!--grid_3-->
    			<div class="grid_3">
  					Monitor:
  					<input type="text" value="" name="monitor" />
    			</div><!--grid_3-->
    			<div class="grid_3">
  					Memória:
  					<input type="text" value="" name="memoria" />
    			</div><!--grid_3-->
    			<div class="grid_2">
  					HD:
  					<input type="text" value="" name="hd" />
    			</div><!--grid_2-->
    			<div class="grid_3">
  					Processador:
  					<input type="text" value="" name="processador" />
    			</div><!--grid_3-->
    			<div class="grid_3">
  					Placa de Video:
  					<input type="text" value="" name="pvideo" />
    			</div><!--grid_3-->
    				<div class="grid_4">
	  				Placa Mãe:
	  				<input type="text" value="" name="pmae" />
    			</div><!--grid_4-->
    			<div class="grid_6">
  					Descrição / Acessórios:
  					<textarea name="desc" rows="2" id="desc"></textarea>
    			</div><!--grid_6-->
    			<div class="grid_6">
  					Observação:
  					<textarea name="obs" rows="2" id="obs"></textarea>
    			</div><!--grid_6-->
    			<div class="grid_2"><input type="submit" value="Salvar" class="button black"></div>			
    		</div><!--box-content box-->
</div><!--content container_12--> 		 
</form>
 <?	$this->load->view('i_rodape_v'); ?>
</body>
</html>