<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?= $titulo ?> - Relatório</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- formee -->
<script type="text/javascript" src="<?=base_url() ?>assets/js/formee.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/js.js"></script>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />
<style type="text/css">
label.error { float: none; color: red; margin: 0 .5em 0 0; vertical-align: top; font-size: 13px }
</style>
<!-- formee -->
<?php echo link_tag(base_url().'assets/css/estilo.css'); ?>
<?	$this->load->view('jqueryui'); ?>
<script>
	$(function() {
		$( "#tabs" ).tabs({
			ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible. " +
						"If this wouldn't be a demo." );
				}
			}
		});
	});	

function carregar_pg(pagina){
$(function(){
			$("#topo_relatorio").load(pagina);
	});
}//fecha função	
	
	</script>
	
</head>
<body>
	<?	$this->load->view('i_topo_v'); ?>
    <?	$this->load->view('cliente_i_menu_v'); ?>
<form action="<?= base_url().'relatorios' ?>" method="post" class="formee" id="formrelatorio"  >
<div class="box_center">
<div class="grid-12-12" id="topo_relatorio" ></div>	
<div class="grid-12-12">	
  <div id="tabs">
	<ul>
		<li><a href="<?= $ajax_filtro ?>" id="resultado_link">Ordens de Serviços</a></li>
	</ul>
</div> 		
   		
	</div> <!-- div grid-12-12  --> 
</div><!-- div box_center --> 		 
</form>
 <?	$this->load->view('i_rodape_v'); ?>
</body>
</html>