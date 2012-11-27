<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><html>
	<head>
		<title>SYSBT - Gerência de Assistência Técnica</title>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/estilo.css" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />
	</head>
	<body>
	<?	$this->load->view('i_topo_v'); ?>
    <?	$this->load->view('i_menu_v'); ?>
    
<div class="box_center">	
	<div class="formee grid-12-12">
	
	<div class="grid-2-12">
	<a href="<?=base_url() ?>relatorios/clientes"><img src="<?=base_url() ?>assets/di/atualizar_cliente.png" border="0" /></a>
	<label>Consultar Clientes</label>
	</div>
	<div class="grid-2-12">
	<a href="<?=base_url() ?>relatorios/os"><img src="<?=base_url() ?>assets/di/consultar_os.png" border="0"  /></a>
	<label>Consultar OS</label>
	</div>
	<? if($this->input->cookie("sysbt_cargo")==4){ ?>
	<div class="grid-3-12">
		<a href="<?= site_url("relatorios/funcionarios");?>"><img src="<?=base_url() ?>assets/di/consultar_funcionario.png" border="0" /></a>
		<label>Consultar Funcionários</label>
	</div>	
	<? } ?>
		
	<div class="grid-3-12">
		<a href="<?=base_url() ?>relatorios/avisos"><img src="<?=base_url() ?>assets/di/avisos_64px.png"  border="0" /></a>
		<label>Avisos de OS</label>
	</div>
	</div><!-- fechamos grid-12-12 -->
</div> <!-- fechamos box_center -->			
	<?	$this->load->view('i_rodape_v'); ?>
	</body>
</html>