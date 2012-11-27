<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?= $titulo ?> - Relatório</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?	//$this->load->view('jqueryui'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<script type="text/javascript" src="<?=base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/formee.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/js.js"></script>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />
<?php echo link_tag(base_url().'assets/css/estilo.css'); ?>
<?	$this->load->view('head'); ?>
<script>
	$(function() {
		$( "#tabs" ).tabs({
			ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Erro ao tentar carregar a pesquisa " +
						"entre em contato com o analista de sistemas ." );
				}
			}
		});
	});	

function carregar_pag(pagina){
$(function(){
            
			$("#topo_relatorio").load(pagina);
			
			
	});
}//fecha função

//Função que controla a data
	$(function() {
		$( "#data_i" ).datepicker({ dateFormat: 'dd-mm-yy' });
		$( "#data_i" ).datepicker();
		$( "#data_f" ).datepicker({ dateFormat: 'dd-mm-yy' });
		$( "#data_f" ).datepicker();
		
	});		
	</script>
</head>
<body>
	<?	$this->load->view('i_topo_v'); ?>
    <?	$this->load->view('i_menu_v'); ?>
<div class="content container_12">   
<form action="<?= base_url().'relatorios/os' ?>" method="post" class="formee" id="form_buscar_os"  > 
<div id="topo_relatorio" > <? $this->load->view('relatorio_filtro_v'); ?></div>	
</form>
</div>

<div class="content container_12">  
<div id="tabs" class="box">
	<ul>
		<li><a href="<?= $ajax_filtro ?>" id="resultado_link">Ordens de Serviço</a></li>				
	</ul>
</div>
		
</div><!-- div content container 12 -->
  	
 <?	$this->load->view('i_rodape_v'); ?>

</body>
</html>