<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= $titulo ?> - Cadastro de Fornecedor</title>
<!-- formee -->
<!-- formee -->
<?	$this->load->view('head'); ?>
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
   if(varURL=='Física'){  
   $("#campo_cpf_cnp").mask("999.999.999-99");
  
    }   
   });
});

</script>

<script type="text/javascript">
//script complementar para o autocomplete dessa página.
		$(document).ready(function(){
		
			function log( message ) { $( "#codcid").val(message); }
						$('#nomcid').autocomplete({
				source:'<?php echo site_url('autocomplete/cidade'); ?>',
			
				select: function( event, ui ) {
						log( ui.item ?
							 ui.item.CODCID	:
							 + this.value );
						
					}														
			});
		});
</script>

</head>		
<body>
	<?	$this->load->view('i_topo_v'); ?>
    <?	$this->load->view('i_menu_v'); ?>    <? if($this->session->flashdata('msg_ok')==1) { ?> <div class="ad-notif-success grid_12" id="result"><p>Fornecedor Cadastrado!</p></div><? } ?> 
    <form action="<?= base_url().'cadastro/salvar/fornecedor' ?>" method="post" class="formee" id="form_cad_fornecedor">

<div class="content container_12"> 

 		<div class="box-head"><h2>Cadastro de Produto</h2></div>
        <div class="box-content box">
            <div class="grid_1">
    			Estoque inicial
   				<input name="qtdpro" type="text" placeholder="Quantidade" />
   			</div><!--grid_1-->	 
        	<div class="grid_5">
        		Nome do produto <em class="formee-req">*</em>
        		<input name="despro" type="text" placeholder="Digite o nome do produto" />
   			</div><!--grid_5-->
			<div class="grid_2">
    			Custo<em class="formee-req">*</em>
   				<input id="cuspro" name="cnpfor" type="text" placeholder="Digite o custo do produto" />
   			</div><!--grid_2-->	
   			<div class="grid_2">
    			Margem
   				<input name="lucpro" type="text" placeholder="Digite a margem do produto" />
   			</div><!--grid_2-->	
   			<div class="grid_2">
    			Preço <em class="formee-req">*</em>
   				<input name="prepro" type="text" placeholder="Digite o valor total do produto" />
   			</div><!--grid_2-->	
   			<div class="grid_6">
    			Informação <em class="formee-req">*</em>
   				<textarea name="informacao" rows="2" id="defeito" placeholder="Digite as especificações do produto" ></textarea>
   			</div><!--grid_6-->	
   			<div class="grid_3">
   			      Categoria <em class="formee-req">*</em>
   				  <select name="tipfor"  id="tipo_pessoa">   				 
   			      <option value="Física">Pessoa Física</option>
   			      <option value="Jurídica" selected="selected">Pessoa Jurídica</option>
   			      </select>
			</div><!--grid_3-->
   			<div class="grid_3">
   			      Marca <em class="formee-req">*</em>
   				  <select name="tipfor"  id="tipo_pessoa">   				 
   			      <option value="Física">Pessoa Física</option>
   			      <option value="Jurídica" selected="selected">Pessoa Jurídica</option>
   			      </select>
			</div><!--grid_3-->
			<div class="grid_3">
   			      Situação <em class="formee-req">*</em>
   				  <select name="tipfor"  id="tipo_pessoa">   				 
   			      <option value="Física"selected="selected">Ativo</option>
   			      <option value="Jurídica">Inativo</option>
   			      </select>
			</div><!--grid_3-->
   			        <div class="grid_2"><input type="submit" value="Cadastrar" class="button black" ></div>	
   			        <input name="admpro" id="codcid" type="hidden"  type="text" value="<?= date('Y-m-d') ?>" />
   				 	    
   		</div> <!-- box-content -->		 
</div>	<!-- content container_12 -->	
</form>
<?	$this->load->view('i_rodape_v'); ?>
	</body>
</html>