<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><html>
	<head>
		<title>Login</title>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/estilo.css" />
<script type="text/javascript" src="<?=base_url() ?>assets/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/formee.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/js.js"></script>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />
	</head>
	<body>
	<?	$this->load->view('i_topo_v'); ?>
<div class="box_center">
<div class="grid-12-12">
	<div class="grid-5-12">
	<? if($this->session->flashdata('autFL')==1) { ?> <div class="formee-msg-error">usuário ou senha incorreto</div><? } ?>
	<? if($this->session->flashdata('autFC')==1) { ?> <div class="formee-msg-error">Código de verificação incorreto</div><? } ?>  
	<form name="frm_login_func" id="frm_login_func" action="<?= base_url().'login/painel' ?>" method="post" class="formee" >

	 <fieldset>
        	<legend>Área Restrita</legend>
      <div class="grid-12-12"><label>Usuário: </label></div>  	
      <div class="grid-12-12"><input name="email" id="email" type="text" value="<?= $this->input->post("email"); ?>" /></div>
      <div class="grid-12-12"><label>Senha:</label></div>  	
      <div class="grid-12-12"><input name="senha" id="senha" type="password"  /></div>
      <div class="grid-12-12"><label>Código de verificação: </label></div>  
 	  <div class="grid-12-12"><?= $cap['image'] ?></div>
	  <div class="grid-8-12"><input type="text" name="captcha" id="captcha" value="" /></div>
	  <input name="cap_key" id="cap_key" type="hidden" value="<?= $cap_crip ?>" />
	  <div class="grid-4-12"><input type="submit" value="Entrar"></div>
	  </fieldset>
    </form>
   </div>
</div>
</div>
  
	<?	$this->load->view('i_rodape_v'); ?>
	</body>
</html>
<?
//Excluimos os cookies
delete_cookie('sysbt_autFL');
delete_cookie('sysbt_autFC');
?>