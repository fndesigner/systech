<?
foreach ($e_equipamento as $row) { 
$nome = $row->nome;
$ip = $row->ip;    
$tipo = $row->tipo; 
$marca = $row->marca; 
$monitor = $row->monitor; 
$memoria = $row->memoria;  
$hd = $row->hd; 
$processador = $row->processador;
$desc = $row->DESC; 
$obs = $row->obs;  
$pvideo = $row->placa_de_video; 
$pmae = $row->placa_mae; 
$id_equipamento = $row->id; 
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?= $titulo ?> - Cadastro de Equipamento</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- formee -->

<script type="text/javascript" src="<?=base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/formee.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/js.js"></script>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />
<?	$this->load->view('jqueryui'); ?>
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
 <form action="<?= base_url().'salvar/equipamento/editar' ?>" method="post" class="formee" id="formcargo" >
<div class="content container_12">   
	<? if($this->session->flashdata('msg_ok')==1) { ?> <div class="formee-msg-success"><h3>Equipamento Atualizado</h3></div><? } ?>
			<div class="box-head"><h2>Atualizar equipamento</h2></div>
        <div class="box-content box">
    			<div class="grid_6">
  				 	Nome do equipamento: <em class="formee-req">*</em>
  				 	<input type="text" value="<?= $nome ?>" name="nome" />
    			 </div><!--grid_6-->
    			 <div class="grid_6">
    			 Tipo:<em class="formee-req">*</em>
   				 <select name="equip" id="equip">
   			     	<option value="Computador" <? if($tipo=='Computador') { ?> selected="selected" <? } ?>>Computador</option>
   			     	<option value="Notebook" <? if($tipo=='Notebook') { ?> selected="selected" <? } ?>>Notebook</option>
   			     	<option value="Servidor" <? if($tipo=='Servidor') { ?> selected="selected" <? } ?>>Servidor</option>
   			     	<option value="Impressora" <? if($tipo=='Impressora') { ?> selected="selected" <? } ?>>Impressora</option>
   			     	<option value="PenDriver" <? if($tipo=='PenDriver') { ?> selected="selected" <? } ?>>Pen Driver</option>
   			     	<option value="Outros" <? if($tipo=='Outros') { ?> selected="selected" <? } ?>>Outros</option>
   				 </select>
   				 </div><!--grid_6-->
   		</div><!-- box-content box-->	
			<div class="box-head"><h2>Detalhes do Equipamento</h2></div>
        <div class="box-content box">
   				<div class="grid_3">
  					Marca: <em class="formee-req">*</em>
  					<input type="text" value="<?= $marca ?>" name="marca" />
    			</div><!--grid_3-->
    			<div class="grid_2">
  					IP:
  					<input type="text" value="<?= $ip ?>" name="ip" />
    			</div><!--grid_2-->
    			<div class="grid_2">
  					Monitor:
  					<input type="text" value="<?= $monitor ?>" name="monitor" />
    			</div><!--grid_2-->
    			<div class="grid_3">
  					Memória:
  					<input type="text" value="<?= $memoria ?>" name="memoria" />
    			</div><!--grid_3-->
    			<div class="grid_2">
  					HD:
  					<input type="text" value="<?= $hd ?>" name="hd" />
    			</div><!--grid_2-->
    			<div class="grid_4">
  					Processador:
  					<input type="text" value="<?= $processador ?>" name="processador" />
    			</div><!--grid_4-->
    			<div class="grid_4">
  					Placa de Video:
  					<input type="text" value="<?= $pvideo ?>" name="pvideo" />
    			</div><!--grid_4-->
    			<div class="grid_4">
  					>Placa Mãe:
  					<input type="text" value="<?= $pmae ?>" name="pmae" />
    			</div><!--grid_4-->
    			<div class="grid_6">
  					Descrição / Acessórios:
  					<textarea name="desc" rows="2" id="desc"><?= $desc ?></textarea>
    			</div><!--grid_6-->
    			<div class="grid_6">
  					Observação:
  					<textarea name="obs" rows="2" id="obs"><?= $obs ?></textarea>
    			</div><!--grid_6-->
    				<input type="hidden" value="<?= $id_equipamento ?>" name="id_equipamento" id="id_equipamento" />
    			<div class="grid_2"><input type="submit" value="Salvar" class="button black"></div>		
    	</div><!-- box-content box -->	
</div> <!--content container_12-->		 
</form>
 <?	$this->load->view('i_rodape_v'); ?>
</body>
</html>