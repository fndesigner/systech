<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><html>
	<head>
		<title><?= $titulo ?> - Cadastro de Funcionário</title>
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
	<a href="<?= site_url("/cadastro/os/buscar_cliente");?>"><img src="<?=base_url() ?>assets/di/cadastro_os.png" border="0" /></a>
		<label>Ordem de Seviço</label>
	</div>
	<div class="grid-2-12">
		<a href="<?= site_url("/cadastro/cliente");?>"><img src="<?=base_url() ?>assets/di/cadastro_cliente.png" border="0" /></a>
		<label>Cliente</label>
	</div>	
	<div class="grid-2-12">
		<a href="<?= site_url("/cadastro/equipamento/0");?>"><img src="<?=base_url() ?>assets/di/cadastro_equipamento.png" border="0" /></a>
		<label>Equipamento</label>
	</div>
	<? if($this->input->cookie("sysbt_cargo")==4){ ?>
	<div class="grid-2-12">
		<a href="<?= site_url("/cadastro/unidade");?>"><img src="<?=base_url() ?>assets/di/cadastro_unidade.png" border="0" /></a>
		<label>Unidade</label>
	</div>	
		<div class="grid-3-12">
		<a href="<?= site_url("cadastro/funcionario");?>"><img src="<?=base_url() ?>assets/di/cadastro_funcionario.png" border="0" /></a>
		<label>Cadastrar Funcionário</label>
	</div>	
	<div class="grid-2-12">
		<a href="<?= site_url("/cadastro/cargo");?>"><img src="<?=base_url() ?>assets/di/cadastro_cargo.png" border="0" /></a>
		<label>Cargo</label>
	</div>	
	<? } ?>
	</div><!-- fechamos grid-12-12 -->
</div> <!-- fechamos box_center -->	

  <?	$this->load->view('i_rodape_v'); ?>
	</body>
</html>