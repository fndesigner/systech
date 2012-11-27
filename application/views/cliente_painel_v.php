<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><html>
	<head>
		<title>Login</title>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/estilo.css" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />
	</head>
	<body>
	<?	$this->load->view('i_topo_v'); ?>
    <?	$this->load->view('cliente_i_menu_v'); ?>

     <? if($this->session->flashdata('msg_ok')==1) { ?><div class="grid-12-12"><div class="grid-3-12"></div><div class="grid-6-12"><div class="formee-msg-success"><h3>Ordem de Serviço Cadastrada.</h3></div></div></div><? } ?>   

	<div id="box_icone"> 
	<div class="icone"><a href="<?=base_url() ?>cadastro/os/cliente_cad_os"><img src="<?=base_url() ?>assets/di/cadastro_os.png" /></a><div class="icone_texto">Abrir Chamado</div></div>
	<div class="icone"><a href="<?=base_url() ?>relatorios_cli/"><img src="<?=base_url() ?>assets/di/relatorios.png" /></a><div class="icone_texto">Visualizar OS</div></div>
	<div class="icone"><a href="<?=base_url() ?>editar/cliente/atualizar"><img src="<?=base_url() ?>assets/di/atualizar_cliente.png" /></a><div class="icone_texto">Atualizar Dados </div></div>
    <div class="icone"><a href="<?=base_url() ?>login/sair/cliente"><img src="<?=base_url() ?>assets/di/sair.png" /></a><div class="icone_texto">Sair</div></div>
	</div>
	
	<?	$this->load->view('i_rodape_v'); ?>
	</body>
</html>