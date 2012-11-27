<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title><?= $titulo ?> - Cadastro de Unidade</title>
<!-- formee  -->
<script type="text/javascript" src="<?=base_url() ?>assets/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/formee.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/js.js"></script>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />
<style type="text/css">
label.error { float: none; color: red; margin: 0 .5em 0 0; vertical-align: top; font-size: 13px }
</style>
<?	$this->load->view('head'); ?>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/estilo.css" />
<!-- formee -->
</head>
<body>
<?	$this->load->view('i_topo_v'); ?>
<?	$this->load->view('i_menu_v'); ?>
<form action="<?= base_url().'cadastro/salvar/unidade' ?>" method="post" class="formee" id="form_cad_unidade"   >
<div class="content container_12">  
 		<div class="box-head"><h2>Cadastro de Cargo</h2></div>
        	<div class="box-content box">
<? if($this->session->flashdata('msg_ok')==1) { ?> <div class="formee-msg-success"><h3>Cadastro efetuado.</h3></div><? } ?>
        	<div class="grid_6">
    			Nome <em class="formee-req">*</em>
   				<input name="nome" type="text" />
   			</div>	<!--grid_6-->
   			<div class="grid_6">
    			Empresa
   				<input name="empresa" type="text" />
   			</div>	<!--grid_6-->
   			<div class="grid_10">
   			     Endereço <em class="formee-req">*</em>
   			     <input name="end" type="text" /> 
			</div><!--grid_10-->
			 <div class="grid_2">
   			     Número <em class="formee-req">*</em>
   				 <input name="end_n" type="text" />
			</div>	<!--grid_2-->
				 <div class="grid_8">
   			     Cidade <em class="formee-req">*</em>
   				 <input name="end_cidade" id="end_cidade" type="text" />
			</div>	<!--grid_8-->
				 <div class="grid_4">
   			     CEP
   				 <input name="end_cep" type="text" />
			</div>	<!--grid_4-->
			</div><!-- box-content -->			
		<div class="box-head"><h2>Informações de Contato</h2></div>
        	<div class="box-content">
        	<div class="grid_6">
    			Email <em class="formee-req">*</em>
   				<input name="email" type="text" />
   			</div><!--grid_6-->	
   			<div class="grid_6">
    			Telefone <em class="formee-req">*</em>
   				<input name="tel" type="text" />
   			</div><!--grid_6-->
   	        <div class="grid_2"><input type="submit" value="Salvar" class="button black" ></div>
   		</div> 	<!-- box-content box -->	 
	</div>	<!-- content container_12 -->	
</form>
<?	$this->load->view('i_rodape_v'); ?>
	</body>
</html>