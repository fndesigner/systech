<?
# Se o cliente não foi selecionado, levamos ele novamente para a página anterior
if($cliente==""){redirect(base_url().'cadastro/os/buscar_cliente','refresh');}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title><?= $titulo ?> - Cadastro de Ordem de Serviço</title>
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

<?	$this->load->view('i_topo_v'); ?>
<?	$this->load->view('cliente_i_menu_v'); ?>
<form action="<?= base_url().'salvar/os_cliente/cadastro' ?>" method="post" class="formee" id="form_cad_func"   >
 <div class="box_center">	
 	<div class="grid-12-12">
		<fieldset>
        	<legend>Abrir Chamado</legend>
        	<div class="grid-12-12"><label>CLIENTE: <?php foreach ($cliente as $row) { echo $row->NOMCLI; $codfun = $row->codfun; ?>
        	<input type="hidden" value="<?= $row->CODCLI; ?>" name="codcli" id="codcli" /> <? } ?> </label></div>
   			<div class="grid-6-12">
   			     <label>Técnico<em class="formee-req">*</em></label>
   				 <select name="tecnico" id="tecnico">
   				 <?php foreach ($tecnico as $row) { ?>
   			     <? if($codfun==$row->CODFUN) { ?>	<option value="<?= $row->CODFUN; ?> "><?= $row->NOMFUN; ?> </option> <? } ?>
   			     <? } ?>
   				 </select>
			</div>
			 <div class="grid-4-12">
   			     <label>Equipamento<em class="formee-req">*</em></label>
   				 <select name="equip" id="equip">
   			     	 <?php foreach ($equipamento as $row) { ?>
   			     	<option value="<?= $row->id; ?> "><?= $row->nome; ?> - <?= $row->tipo; ?> </option>
   			        <? } ?>
   				 </select>
			</div>
   		</fieldset>
 		<fieldset>
        	<legend>Informações detalhadas</legend>
        	<div class="grid-6-12">
    			<label>Defeito reclamado  <em class="formee-req">*</em></label>
   				<textarea name="defeito" rows="2" id="defeito"></textarea>
   			</div>	
   			<div class="grid-6-12">
    			<label>Observações</label>
   				<textarea name="obs" rows="2" id="obs"></textarea>
   			</div>
   		<div class="grid-10-12"></div><div class="grid-2-12"><input type="submit" value="Salvar" ></div>
   		</fieldset>  		
   		</div> 		 
	</div>	<!-- Fim div grid-8-12 -->	
</div>
</form>
<?	$this->load->view('i_rodape_v'); ?>
	</body>
</html>