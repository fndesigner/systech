<?
if($e_fun==false) { echo "Funcionário não encontrado."; }else {
foreach ($e_fun as $row) { 

$nome = $row->NOMFUN;
$cargo_id = $row->rh_cargos_id;
$celular = $row->TELFUN;
$email = $row->EMAIL;
$senha = $this->encrypt->decode($row->senha); 
$codfun = $row->CODFUN;
} 
}//fechar else
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title><?= $titulo ?> - Cadastro de Cliente</title>
<!-- formee -->

<script type="text/javascript" src="<?=base_url() ?>assets/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/formee.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/js.js"></script>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />
<?	$this->load->view('head'); ?>
<style type="text/css">
label.error { float: none; color: red; margin: 0 .5em 0 0; vertical-align: top; font-size: 13px }
</style>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/estilo.css" />
<!-- formee -->
</head>		
<body>
	<?	$this->load->view('i_topo_v'); ?>
    <?	$this->load->view('i_menu_v'); ?>
    
<? if($e_fun!=false) { ?>    
<form action="<?= base_url().'salvar/funcionario/editar' ?>" method="post" class="formee" id="form_cad_cliente"   >
<div class="content container_12">   	
<? if($this->session->flashdata('msg_ok')==1) { ?> <div class="formee-msg-success"><h3>Dados Atualizado</h3></div><? } ?>
 			<div class="box-head"><h2>Editar Funcionário</h2></div>
        <div class="box-content box">
        	<div class="grid_6">
    			Nome <em class="formee-req">*</em>
   				<input name="nome" type="text" value="<?= $nome ?>" />
   			</div><!-- grid_6 -->	
   			<div class="grid_6">
    			Celular <em class="formee-req">*</em>
   				<input name="celular" type="text" value="<?= $celular ?>"   />
   			</div>	<!-- grid_6 -->
   			<div class="grid_6">
   			     Cargo <em class="formee-req">*</em>
   				 <select name="cargo" id="cargo">
   				 <?php foreach ($cargos as $row) { ?>
   			     <option value="<?= $row->id; ?>" <? if($cargo_id==$row->id) { ?> selected="selected" <? } ?> ><?= $row->nome; ?> </option>
   			     <? } ?>
   				 </select>
			</div><!-- grid_6 -->
			 <div class="grid_6">
   			     Unidade <em class="formee-req">*</em>
   				 <select name="base" id="base">
   			     <?php foreach ($unidades as $row) { ?>
   			     <option value="<?= $row->id; ?> "><?= $row->nome; ?> </option>
   			     <? } ?>
   				 </select>
   			 </div><!-- grid_6 -->
		</div>	<!-- box-content box -->		
 			<div class="box-head"><h2>Informações de Acesso</h2></div>
       <div class="box-content box">
        	<div class="grid_6">
    			Email <em class="formee-req">*</em>
   				<input name="email" type="text" value="<?= $email ?>"  />
   			</div>	<!-- grid_6 -->
   			<div class="grid_6">
    			Senha <em class="formee-req">*</em>
   				<input name="senha" type="password" value="<?= $senha ?>"  />
   			</div><!-- grid_6 -->
   				<input name="codfun" type="hidden" value="<?= $codfun ?>" />
   			<div class="grid_10"></div><div class="grid_2"><input type="submit" value="Salvar" class="button black" ></div>	
		   		</div><!-- box-content box -->		 
</div>	<!--content container_12 -->	

</form>
<?	} //fechar if
$this->load->view('i_rodape_v'); ?>
	</body>
</html>