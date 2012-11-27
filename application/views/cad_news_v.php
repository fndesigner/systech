<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?= $titulo ?> - Cadastro de Newsletter</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
	</head>
	<body>
 <form action="http://bacell.campanhasdemkt.net/recebeForm.php" method="post" class="formee" id="form_newsletter" >
<div class="box_center">
	<div class="grid-8-12">
	<? if($msg==true) { ?> <div class="formee-msg-success"><h3>Cadastro realizado com sucesso!</h3></div><? } ?>
  		<fieldset>
        	<legend>Cadastro de Newsletter</legend>
        	<input type="hidden" name="uniqid" value="1125211267335120" />
			<input type="hidden" name="senha" value="62c28f221d0052c632f895c585e2ccee" />
			<input type="hidden" name="id_sender_email" value="6465" />
			<input type="hidden" name="urlredir" value="http://www.bacell.com.br/sysbt/news/obrigado" />
			<input type="hidden" name="subscribe[33772]" value="1" />
  				<div class="grid-4-12"><label>Nome:</label></div>
  				<div class="grid-6-12"><label>Email: <em class="formee-req">*</em></label></div>
    			<div class="grid-4-12"><input type="text" value="" name="nome" /></div>
    			<div class="grid-6-12"><input type="text" value="" name="email" /></div>
    			<div class="grid-2-12"><input type="submit" value="Salvar"></div>			
    		</div>
   		</fieldset>
   		</div> 
	</div>  
</div> 		 
</form>
 <?	$this->load->view('i_rodape_v'); ?>
</body>
</html>

