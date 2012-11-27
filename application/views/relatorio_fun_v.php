<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?= $titulo ?> - Relatório</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?	$this->load->view('jqueryui'); ?>
<script type="text/javascript" src="<?=base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/formee.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/js.js"></script>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />
<?	$this->load->view('head'); ?>
<style type="text/css">
label.error { float: none; color: red; margin: 0 .5em 0 0; vertical-align: top; font-size: 13px }
</style>
<?php echo link_tag(base_url().'assets/css/estilo.css'); ?>

<script>
	$(function() {
		$( "#tabs" ).tabs({
			ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible. " +
						"If this wouldn't be a demo." );
				}
			}
		});
	});	
function carregar_pg(pagina){
$(function(){
			$("#topo_relatorio").load(pagina);
	});
}//fecha função	
	</script>
	
</head>
<body>
	<?	$this->load->view('i_topo_v'); ?>
    <?	$this->load->view('i_menu_v'); ?>
<form action="<?= base_url().'relatorios/funcionarios' ?>" method="post" class="formee" id="form_buscar_cliente"  >
<div class="content container_12">
<div class="grid_12" id="topo_relatorio" >
<? if($this->session->flashdata('msg_ok')==1) { ?> <div class="formee-msg-success"><h3>Funcionário deletado.</h3></div><? } ?>
			<div class="box-head"><h2>Buscar Funcionários</h2></div>
			<ul class="table-toolbar">
            	<li><a href="<?=base_url() ?>cadastro/funcionario/"><img src="<?=base_url() ?>assets/tema/adminity/img/icons/basic/funcionario.png"> Cadastrar Funcionário</a></li>
            	<li><a href="<?=base_url() ?>cadastro/cargo/"><img src="<?=base_url() ?>assets/tema/adminity/img/icons/basic/funcionario.png"> Cadastrar Cargo</a></li>
            </ul>
		<div class="box-content box">
        		<div class="grid_10">Pesquise por nome, telefone</div>
  			<div class="grid_8">
    			<input type="text" value="<?= $this->input->post("filtro"); ?>" name="filtro" id="filtro" />
    		</div><!--grid_8-->
    		<div class="grid_2">
    			<input type="submit" value="Encontrar" class="button black" id="filtrar"></div>
    		<div class="grid_2">
    		</div><!--table-toolbar-->
    	</div>	<!--box-content box-->
    	
    	

      <?
#Necessario para não apresentar erros, quando não se encontra registros
if($funcionarios==false) {
echo "Não foi encontrado registros no Banco de Dados, para a busca realizada";
}else {
?>
        <div class="box-head"><h2>Funcionários</h2></div>
        <div class="box-content no-pad">
          <table class="display">
          <thead>
	        <tr>
              <th>Nome</th>
              <th>Telefone</th>
              <th>Cargo</th>
              <th>Opções</th>
            </tr>
          </thead>
          <tbody>
           <?php foreach ($funcionarios as $row) { 
 	$id_cargo = $row->rh_cargos_id;
	$w_cargo= array('id' => $id_cargo);
	$cargos = $this->Padrao->fc_where('sysbt_rh_cargos',$w_cargo);	
 	foreach ($cargos as $rowC) { $cargo_nome = $rowC->nome;}   
 ?>
            <tr class="odd gradeX">
              <td><?= $row->NOMFUN; ?></td>
              <td><?= $row->TELFUN; ?></td>
              <td> <?= $cargo_nome ?></td>
              <td><a href=" <?=base_url() ?>editar/funcionario/<?= $row->CODFUN; ?>" class="tip-top" title="Clique aqui para editar"> <img src="<?=base_url() ?>assets/tema/adminity/img/icons/basic/editar-space.png"></a> <a href="<?=base_url() ?>excluir/funcionario/<?= $row->CODFUN; ?>"  class="tip-top" title="Realmente deseja excluir esse item?"><img src="<?=base_url() ?>assets/tema/adminity/img/icons/basic/excluir-space.png"></a></td>
            </tr>
          </tbody>
           <?
 	}// fechamos o foreach
 }//fechamos else, 
 ?>
         </table>
        </div><!-- box-content no-pad-->
      </div><!--box-content no-pad -->


    	
    	
	
   		
	</div> <!-- div grid-12-12  --> 
</div><!-- content container_12 --> 		 
</form>
 <?	$this->load->view('i_rodape_v'); ?>
 	<script> /* SCRIPTS */

$(function() {
  $('.tip-top').tipTip({attribute: "title", delay: "100", defaultPosition: "top"});
});
</script>
 
</body>
</html>