<!-- OLA BOA TARDE --> 
<?
foreach ($e_cargo as $row) { 
$cargo = $row->cargo;
$id = $row->id;

} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title><?= $titulo ?> - Editar Cliente</title>
<!-- formee -->
<?	$this->load->view('jqueryui'); ?>
<?	$this->load->view('head'); ?>
<script type="text/javascript" src="<?=base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/formee.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/js.js"></script>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />

<style type="text/css">
label.error { float: none; color: red; margin: 0 .5em 0 0; vertical-align: top; font-size: 13px }
</style>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/estilo.css" />
<!-- formee -->
<script>
//# Mascara
jQuery(function($){
   $(".mascara_fone").mask("(99)9999-9999");
   $("#mascara_cpf").mask("999.999.999-99");
   $("#mascara_cnpj").mask("99.999.999/9999-99");
});
</script>
</head>		
<body>
	<?	$this->load->view('i_topo_v'); ?>
    <?	$this->load->view('i_menu_v'); ?>
<form action="<?= base_url().'salvar/cargo/editar' ?>" method="post" class="formee" id="form_editar_cliente"   >
<div class="content container_12">   
 	<? if($this->session->flashdata('msg_ok')==1) { ?> <div class="formee-msg-success"><h3>Cargo Atualizado</h3></div><? } ?>
		 	<div class="box-head"><h2>Editar Cargo</h2></div>
        	<div class="box-content box">
        	<div class="grid_6">
    			Nome <em class="formee-req">*</em>
   				<input name="nome" type="text" value="<?= $cargo ?>" />
   			</div>
			<input name="codcli" type="hidden" value="<?= $id ?>" />
			<div class="grid_2"><input type="submit" value="Salvar" class="button black" ></div>	
	   		</div> 	<!-- grid_4 -->	
   		   		</div><!-- box-content --> 
	</div>	<!-- content container_12 -->	
</form>
<?	$this->load->view('i_rodape_v'); ?>
	</body>
</html>