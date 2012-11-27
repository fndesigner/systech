<? foreach ($e_clientes as $row) { 
$telefone = $row->TELCLI;  
$celular = $row->CELCLI; 
$senha = $this->encrypt->decode($row->senha); 
$email = $row->EMACLI; 
 } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?= $titulo ?> - Atualizar dados</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- formee -->
<?	$this->load->view('jqueryui'); ?>
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
});
</script> 
	</head>
	<body>
	<?	$this->load->view('i_topo_v'); ?>
    <?	$this->load->view('cliente_i_menu_v'); ?>
 <form action="<?= base_url().'salvar/atualizar_cli/editar' ?>" method="post" class="formee" id="formcargo" >
<div class="box_center">
	<div class="grid-8-12">
	<? if($this->session->flashdata('msg_ok')==1) { ?> <div class="formee-msg-success"><h3>Atualização realizada!</h3></div><? } ?>
  		<fieldset>
        	<legend>Atualizar dados</legend>
  				<div class="grid-6-12">
  				<label>Telefone: </label>
  				<input type="text" value="<?= $telefone ?>" name="telefone" class="mascara_fone" />
  				</div>
  				<div class="grid-6-12">
  				<label>Celular: </label>
  				<input type="text" value="<?= $celular ?>" name="celular" class="mascara_fone" />
  				</div>
  				<div class="grid-6-12">
  				<label>Email: <em class="formee-req">*</em></label>
  				<input type="text" value="<?= $email ?>" name="email" />
  				</div>
  				<div class="grid-6-12">
  				<label>Senha: <em class="formee-req">*</em></label>		
    			<input type="password" value="<?= $senha ?>" name="senha" />
    			</div>
    			<div class="grid-3-12"><input type="submit" value="Atualizar"></div>			
    		</div>
   		</fieldset>
	</div>  
</div> 		 
</form>
 <?	$this->load->view('i_rodape_v'); ?>
</body>
</html>