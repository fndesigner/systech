<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?= $titulo ?> - Cadastro de Categoria</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- formee -->
<script type="text/javascript" src="<?=base_url() ?>assets/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/formee.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/js.js"></script>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />
<?	$this->load->view('head'); ?>
<style type="text/css">
label.error { float: none; color: red; margin: 0 .5em 0 0; vertical-align: top; font-size: 13px }
</style>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/estilo.css" />
<!-- formee -->
</head>
<body>
	<?	$this->load->view('i_topo_v'); ?>
    <?	$this->load->view('i_menu_v'); ?>
    <form action="<?= base_url().'salvar/categoria/cadastro' ?>" method="post" class="formee" id="formcategoria" >
	    <div class="content container_12">
			<div class="box-head"><h2>Cadastro de Categoria</h2></div>
			<div class="box-content box">
			<? if($this->session->flashdata('msg_ok')==1) { ?> <div class="formee-msg-success"><h3>Cadastro efetuado.</h3></div><? } ?>
			<div class="grid_12">Categoria: <em class="formee-req">*</em></div>
    		<div class="grid_6"><input type="text" value="" name="categoria" /></div>
   			<div class="grid_2"><input type="submit" value="Salvar" class="button black"></div>
   			</div><!-- box-content -->
   		</div><!-- content container_12 -->
   	</form>
   	<?	$this->load->view('i_rodape_v'); ?>
</body>
</html>