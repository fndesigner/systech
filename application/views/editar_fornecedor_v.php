<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title><?= $titulo ?> - Cadastro de Fornecedor</title>
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
<?	$this->load->view('i_menu_v'); ?>
    
<?
if($e_for!=false) {  
foreach ($e_for as $row) {   
?> 
<form action="<?= base_url().'salvar/fornecedor/editar' ?>" method="post" class="formee" id="form_cad_cliente"   >
<div class="content container_12">   	
<? if($this->session->flashdata('msg_ok')==1) { ?> <div class="formee-msg-success"><h3>Dados Atualizado</h3></div><? } ?>
 			<div class="box-head"><h2>Editar Fornecedor</h2></div>
        <div class="box-content box">
        	<div class="grid_4">
        		Nome <em class="formee-req">*</em>
        		<input name="fanfor" type="text" value="<?= $row->FANFOR ?>" />
   			</div><!--grid_4-->
			<div class="grid_4">
    			Razão Social
   				<input name="razfor" type="text" value="<?= $row->RAZFOR ?>" />
   			</div><!--grid_4-->	
   			<div class="grid_4">
        		Email
        		<input name="emafor" type="text" value="<?= $row->EMAFOR ?>" />
   			</div><!--grid_4-->
   		     <div class="grid_3">
   			     Tipo <em class="formee-req">*</em>
   				  <select name="tipfor"  id="tipo_pessoa">   				 
   			      <option value="Física" <? if($row->TIPFOR=="Física") { ?>selected="selected" <? } ?>>Pessoa Física</option>
   			      <option value="Jurídica" <? if($row->TIPFOR=="Jurírica") { ?>selected="selected" <? } ?>>Pessoa Jurídica</option>
   			      </select>
			</div><!--grid_3-->	
			<div class="grid_3">
    			CNPJ / CPF<em class="formee-req">*</em>
    			
   				   			
   				<input id="campo_cpf_cnp" name="cnpfor" type="text" value="<? if($row->TIPFOR=="Física") { echo $row->CPFFOR; }else { echo $row->CNPFOR; } ?>" />
   				
   				</div><!--grid_3-->	
   			<div class="grid_3">
    			Telefone <em class="formee-req">*</em>
   				<input name="telfor" class="mascara_fone" type="text" placeholder="Digite o telefone" value="<? if($row->TELFOR!="") { echo $this->Padrao->mascara_string('(##)####-####',$row->TELFOR); } ?>" />
   			</div><!--grid_3-->	
   			<div class="grid_3">
    			Celular
   				<input name="celfor" class="mascara_fone" type="text" placeholder="Digite o celular" value="<? if($row->CELFOR!="") { echo $this->Padrao->mascara_string('(##)####-####',$row->CELFOR); } ?>" />
   			</div><!--grid_3-->	
   			<div class="grid_10">
   			     Endereço <em class="formee-req">*</em>
   			     <input name="endfor" type="text" placeholder="Digite o endereço do fornecedor" value="<?= $row->ENDFOR ?>" />
   			</div><!--grid_10-->
			<div class="grid_2">
   			     Número <em class="formee-req">*</em>
   				 <input name="numfor" type="text" />
			</div><!--grid_2-->
		    <div class="grid_4">
   			     Complemento <em class="formee-req">*</em>
   				 <input name="comfor" type="text" placeholder="Complemento" value="<?= $row->ENDFOR ?>" />
			</div><!--grid_2-->

			<div class="grid_4">
   			     Bairro: <em class="formee-req">*</em>
   				 <input name="baifor" type="text" placeholder="Digite o bairro"  />
			</div><!--grid_5-->	
			<div class="grid_4">
   			     CEP
   				 <input name="cepfor" id="mascara_cep"  type="text" placeholder="Digite o cep" />
			</div><!--grid_4-->		
		    <div class="grid_6">
		       <? $where= array('CODCID' => $row->CIDFOR);
		             $a_cidade = $this->Padrao->fc_where('cidade',$where);
		             foreach ($a_cidade as $rowC) { $cidade = $rowC->NOMCID; }
		           ?>
   			     Cidade <em class="formee-req">*</em>
   			     
   			      <input  id="nomcid"  type="text" placeholder="Digite o nome da cidade e depois selecione a cidade na lista" value="<?= $cidade ?>"  />
   			       <input name="cidfor" id="codcid" type="hidden"  type="text" value="<?= $row->CIDFOR ?>" />
   			       <input name="codfor"  type="hidden"  type="text" value="<?= $row->CODFOR ?>" />
   			       
   			     
   				 		    </div><!--grid_3-->  
   				 		    	<div class="grid_2"><input type="submit" value="Cadastrar" class="button black" ></div>	    
		
	   		
   	
   		</div> <!-- box-content -->			 
</div>	<!--content container_12 -->	

</form>
<?	
}//fechamos foreach
} //fechar if
$this->load->view('i_rodape_v'); ?>
	</body>
</html>