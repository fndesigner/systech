<?
foreach ($e_clientes as $row) { 

$nomcli = $row->NOMCLI;
$razcli = $row->RAZCLI;
$telcli = $row->TELCLI;
$celcli = $row->CELCLI;
$faxcli = $row->FAXCLI;
$cpfcli = $row->CPFCLI;
$cnpcli = $row->CNPCLI;
$tipcli = $row->TIPCLI;
$endcli = $row->ENDCLI;
$comcli = $row->COMCLI;
$numcli = $row->NUMCLI;
$baicli = $row->BAICLI;
$codcli = $row->CODCLI;
$natcli = $row->NATCLI;
$cepcli = $row->CEPCLI;
$rgcli = $row->RGCLI;
$iefor = $row->IEFOR;
$emacli = $row->EMACLI;
$senha = $this->encrypt->decode($row->senha); 
$codfun = $row->codfun;
$codcli = $row->CODCLI;

} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title><?= $titulo ?> - Editar Cliente</title>
<!-- formee -->
<?	$this->load->view('jqueryui'); ?>
<?	$this->load->view('head'); ?>
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
   $("#mascara_cpf").mask("999.999.999-99");
   $("#mascara_cnpj").mask("99.999.999/9999-99");
});
</script>
</head>		
<body>
	<?	$this->load->view('i_topo_v'); ?>
    <?	$this->load->view('i_menu_v'); ?>
<form action="<?= base_url().'salvar/cliente/editar' ?>" method="post" class="formee" id="form_editar_cliente"   >
<div class="content container_12">   
 	<? if($this->session->flashdata('msg_ok')==1) { ?> <div class="formee-msg-success"><h3>Cliente Atualizado</h3></div><? } ?>
		 	<div class="box-head"><h2>Editar Cliente</h2></div>
        	<div class="box-content box">
        	<div class="grid_6">
    			Nome <em class="formee-req">*</em>
   				<input name="nome" type="text" value="<?= $nomcli ?>" />
   			</div>
			<div class="grid_6">
    			Empresa
   				<input name="empresa" type="text" value="<?= $razcli ?>" />
   			</div>	
   		     <div class="grid_4">
   			      Tipo <em class="formee-req">*</em>
   				  <select name="tipo_pessoa" id="tipo_pessoa">   				 
   			      <option value="Física" <? if($tipcli=="Física") { ?> selected="selected" <? } ?>>Pessoa Física</option>
   			      <option value="Jurídica" <? if($tipcli=="Jurídica") { ?> selected="selected" <? } ?>>Pessoa Jurídica</option>
   			      </select>
			</div>	
   			<div class="grid_4">
    			Telefone <em class="formee-req">*</em>
   				<input name="telefone" class="mascara_fone" type="text" value="<?= $telcli ?>" />
   				
   			</div>	
   			<div class="grid_4">
    			Celular
   				<input name="celular" class="mascara_fone" type="text" value="<?= $celcli ?>" />
   			</div>	
   			<div class="grid_6">
   			     Endereço<em class="formee-req">*</em>
   			     <input name="end" type="text" value="<?= $endcli ?>" />
   			</div>
			<div class="grid_2">
   			     Número <em class="formee-req">*</em>
   				 <input name="end_n" type="text" value="<?= $numcli ?>" />
			</div>
			<div class="grid_4">
   			     Complemento <em class="formee-req">*</em>
   				 <input name="end_comp" type="text" value="<?= $comcli ?>" />
			</div>
			<div class="grid_5">
   			     Bairro: <em class="formee-req">*</em>
   				 <input name="end_bairro" type="text" value="<?= $baicli ?>" />
			</div>	
			<div class="grid_4">
   			     CEP
   				 <input name="end_cep" type="text" value="<?= $cepcli ?>" />
			</div>		
		    <div class="grid_3">
   			      Cidade <em class="formee-req">*</em>
   				  <select name="end_cidade" id="end_cidade">   				 
   			      <option value="6094">Francisco Beltrão</option>
   			      </select>
			</div>		<!-- grid_3 -->
   		</div><!-- box-content box -->

   			<div class="box-head"><h2>Informações Fiscais</h2></div>
        	<div class="box-content box">
        	<div class="grid_3">
    			CPF
   				<input name="cpf" id="mascara_cpf" type="text" value="<?= $cpfcli ?>" />
   			</div>
   			<div class="grid_3">
    			CNPJ
   				<input name="cnpj" id="mascara_cnpj" type="text" value="<?= $cnpcli ?>" />
   			</div>		
   			<div class="grid_3">
    			RG
   				<input name="rg" type="text" value="<?= $rgcli ?>" />
   			</div>
   			<div class="grid_3">
    			IE
   				<input name="iefor" type="text" value="<?= $iefor ?>" />
   			</div>	<!-- grid_3 -->
   		</div><!-- box-content box -->

   			<div class="box-head"><h2>Informações de Acesso </h2></div>
        	<div class="box-content box">
        	<div class="grid_4">
    			Email <em class="formee-req">*</em>
   				<input name="email" type="text" value="<?= $emacli ?>" />
   			</div>	
   			<div class="grid_4">
    			Senha <em class="formee-req">*</em>
   				<input name="senha" type="password" value="<?= $senha ?>" />
   			</div>
   			 <div class="grid_4">
   			     Técnico Responsável <em class="formee-req">*</em>
   				 <select name="tecnico" id="tecnico">	 
   				 <?php foreach ($tecnico as $row) { ?>
   			     	<option value="<?= $row->CODFUN; ?>" <? if($codfun==$row->CODFUN){ ?> selected="selected"  <? } ?>  ><?= $row->NOMFUN; ?> </option>
   			     <? } ?>
   				 </select>
			</div>	<input name="codcli" type="hidden" value="<?= $codcli ?>" />
			<div class="grid_2"><input type="submit" value="Salvar" class="button black" ></div>	
	   		</div> 	<!-- grid_4 -->	
   		   		</div><!-- box-content --> 
	</div>	<!-- content container_12 -->	
</form>
<?	$this->load->view('i_rodape_v'); ?>
	</body>
</html>