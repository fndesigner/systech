<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><html>
	<head>
		<title>Painel de configurações</title>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/estilo.css" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />
	</head>
	<body>
	<?	$this->load->view('i_topo_v'); ?>
    <?	$this->load->view('i_menu_v'); ?>

	<div id="box_icone"> 
	<div class="icone"><a href="<?=base_url() ?>xml/xml_cliente"><img src="<?=base_url() ?>assets/di/atualizar_xml.png" /></a><div class="icone_texto">Atualizar XML de Clientes</div></div>
	
	</div>
	
	<?	$this->load->view('i_rodape_v'); ?>
	</body>
</html>