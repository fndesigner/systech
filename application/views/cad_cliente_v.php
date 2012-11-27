<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= $titulo ?> - Cadastro de Cliente</title>
<!-- formee -->
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
   $("#mascara_cep").mask("99999-999");
  $("#campo_cpf_cnp").mask("999.999.999-99");
});        
</script>
<script>
$(document).ready(function() {
$('#tipo_pessoa').change(function() {
   var varURL = $("option:selected", this).val();
   //$("#exibeValor").html('O valor selecionado é: ' + varURL);
   if(varURL=='Jurídica'){  $("#campo_cpf_cnp").mask("99.999.999/9999-99"); } 
   if(varURL=='Física'){  $("#campo_cpf_cnp").mask("999.999.999-99"); }   
   });
});
</script>
</head>		
<body>
	<?	$this->load->view('i_topo_v'); ?>
    <?	$this->load->view('i_menu_v'); ?>
    <form action="<?= base_url().'salvar/cliente/cadastro' ?>" method="post" class="formee" id="form_cad_cliente"   >
<div class="content container_12"> 
 		<div class="box-head"><h2>Cadastro de Cliente</h2></div>
        <div class="box-content box">
        	<div class="grid_6">
        		<div id="exibeValor"></div>
        		Nome <em class="formee-req">*</em>
        		<input name="nome" type="text" />
   			</div><!--grid_6-->
			<div class="grid_6">
    			Empresa
   				<input name="empresa" type="text" />
   			</div><!--grid_6-->	
   		     <div class="grid_4">
   			     Tipo <em class="formee-req">*</em>
   				  <select name="tipo_pessoa" id="tipo_pessoa">   				 
   			      <option value="Física">Pessoa Física</option>
   			      <option value="Jurídica">Pessoa Jurídica</option>
   			      </select>
			</div><!--grid_4-->	
   			<div class="grid_4">
    			Telefone <em class="formee-req">*</em>
   				<input name="telefone" class="mascara_fone" type="text" />
   			</div><!--grid_4-->	
   			<div class="grid_4">
    			Celular
   				<input name="celular" class="mascara_fone" type="text" />
   			</div><!--grid_3-->	
   			<div class="grid_10">
   			     Endereço <em class="formee-req">*</em>
   			     <input name="end" type="text" />
   			</div><!--grid_10-->
			<div class="grid_2">
   			     Número <em class="formee-req">*</em>
   				 <input name="end_n" type="text" />
			</div><!--grid_2-->
			<div class="grid_5">
   			     Bairro: <em class="formee-req">*</em>
   				 <input name="end_bairro" type="text" />
			</div><!--grid_5-->	
			<div class="grid_4">
   			     CEP
   				 <input name="end_cep" id="mascara_cep"  type="text" />
			</div><!--grid_4-->		
		    <div class="grid_3">
   			     Cidade <em class="formee-req">*</em>
   				  <select name="end_cidade" id="end_cidade">   				 
   			      <option value="6094">Francisco Beltrão</option>
   			      </select>
		    </div><!--grid_3-->      
			</div><!-- box-content -->
		<div class="box-head"><h2>Informações Fiscais</h2></div>
        	<div class="box-content box">
	        	<div class="grid_6">
    			CPF / CNPJ <em class="formee-req">*</em>
   				<input name="cpf" type="text" id="campo_cpf_cnp" />
   			</div><!--grid_6-->	
   			<div class="grid_6">
    			RG / IE <em class="formee-req">*</em>
   				<input name="rg" type="text" />
   			</div><!--grid_6-->
        	</div><!-- box-content -->
   		<div class="box-head"><h2>Informações de Acesso</h2></div>
        	<div class="box-content">
        	<div class="grid_4">
    			Email <em class="formee-req">*</em>
   				<input name="email" type="text" />
   			</div>	<!--grid_4-->
   			<div class="grid_4">
    			Senha <em class="formee-req">*</em>
   				<input name="senha" type="password" />
   			</div><!--grid_4-->
   			 <div class="grid_4">
   			     Técnico Responsável <em class="formee-req">*</em>
   				 <select name="tecnico" id="tecnico">	 
   				 <?php foreach ($tecnico as $row) { ?>
   			     <option value="<?= $row->CODFUN; ?> "><?= $row->NOMFUN; ?> </option>
   			     <? } ?>
   				 </select>
			</div><!--grid_4-->
   		<div class="grid_2"><input type="submit" value="Salvar" class="button black" ></div>	
   		</div> <!-- box-content -->		 
</div>	<!-- content container_12 -->	
</form>
<?	$this->load->view('i_rodape_v'); ?>
	</body>
</html>