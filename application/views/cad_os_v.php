<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?= $titulo ?> - Cadastro de Ordem de Serviço</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- formee -->
<?	$this->load->view('jqueryui'); ?>
<?	$this->load->view('head'); ?>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />
<style type="text/css">
label.error { float: none; color: red; margin: 0 .5em 0 0; vertical-align: top; font-size: 13px }
</style>
<!-- formee -->
<?php echo link_tag(base_url().'assets/css/estilo.css'); ?>


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
</head>
<body>
	<?	$this->load->view('i_topo_v'); ?>
    <?	$this->load->view('i_menu_v'); ?>
 <form action="<?= base_url().'cadastro/os/cad_os' ?>" method="post" class="formee" id="form_os_passo1" >
<div class="content container_12">  

	<? if($this->session->flashdata('msg_ok')==1) { ?> <div class="formee-msg-success"><h3>Cadastro efetuado.</h3></div><? } ?>
  		<div class="box-head"><h2>Cadastrar OS</h2></div>
  		
  		<ul class="table-toolbar">
          <li><a href="<?=base_url() ?>cadastro/cliente/>"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/clientes.png" alt="" /> Novo Cliente</a></li>  
       
        </ul>
        	<div class="box-content">
  				<div class="grid_12">Cliente: <em class="formee-req">*</em></div>
    			<div class="grid_6"><input type="text" value="" name="cliente" id="cliente" /></div>
    		<input type="hidden" value="" name="id" id="id"  />
    			 <div class="grid_3"><input type="submit" class="button black" value="Seguinte >>"></div>	
    			 <div class="grid_2">
    			 </div>	
    			 	
        	</div>
   		</div> 
	</div>  
</div> 		 
</form>
 <?	$this->load->view('i_rodape_v'); ?>
</body>
</html>