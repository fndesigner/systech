<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title><?= $titulo ?> - Cadastro de Funcionário</title>
<!-- formee -->
<script type="text/javascript" src="<?=base_url() ?>assets/js/jquery-1.6.4.min.js"></script>
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
<?	$this->load->view('jqueryui'); ?>
<?	$this->load->view('head'); ?>
</head>
<body>
<?	$this->load->view('i_topo_v'); ?>
<?	$this->load->view('i_menu_v'); ?>
<form action="<?= base_url().'salvar/funcionario/cadastro' ?>" method="post" class="formee" id="form_cad_func"   >
<div class="content container_12">   	
<? if($this->session->flashdata('msg_ok')==1) { ?><div class="formee-msg-success"><h3>Cadastro efetuado.</h3></div><? } ?>
		
		<div class="box-head"><h2>Cadastro de Funcionário</h2></div>
        <div class="box-content box">
	        	<div class="grid_6">
		    	Nome <em class="formee-req">*</em>
		    	<input name="nome" type="text" />
		    </div><!--grid_6-->	
   			<div class="grid_6">
    			Celular <em class="formee-req">*</em>
   				<input name="celular" type="text" />
   			</div>	<!--grid_6-->	
   			<div class="grid_6">
   			     Cargo <em class="formee-req">*</em>
   				 <select name="cargo" id="cargo">
   				 <?php foreach ($cargos as $row) { ?>
   			     	<option value="<?= $row->id; ?> "><?= $row->nome; ?> </option>
   			     <? } ?>
   				 </select>
			</div><!--grid_6-->	
			<div class="grid_6">
   			    Unidade <em class="formee-req">*</em>
   				<select name="base" id="base">
   			    <?php foreach ($unidades as $row) { ?>
   			    <option value="<?= $row->id; ?> "><?= $row->nome; ?> </option>
   			    <? } ?>
   				</select>
		</div><!--grid_6-->	
		</div><!-- box-content box-->			
			
        <div class="box-head"><h2>Informações de Acesso</h2></div>
        <div class="box-content box">
        	<div class="grid_6">
    			Email <em class="formee-req">*</em>
   				<input name="email" type="text" />
   			</div><!--grid_6-->		
   			<div class="grid_6">
    			Senha <em class="formee-req">*</em>
   				<input name="senha" type="password" />
   			</div><!--grid_6-->	
   			<div class="grid_2"><input type="submit" value="Salvar" class="button black" ></div>
        </div><!-- box-content box-->		 
</div>	<!-- content container_12 -->
</form>
<?	$this->load->view('i_rodape_v'); ?>
	</body>
</html>