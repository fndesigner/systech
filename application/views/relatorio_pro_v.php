<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?= $titulo ?> - Relatório</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?	$this->load->view('head'); ?>
<script type="text/javascript" src="<?=base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/formee.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/js.js"></script>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />
<style type="text/css">
label.error { float: none; color: red; margin: 0 .5em 0 0; vertical-align: top; font-size: 13px }
</style>

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
<div class="content container_12"> 
<form action="<?= base_url().'relatorios/produto' ?>" method="post" class="formee" id="form_buscar_produto"  >

<? if($this->session->flashdata('msg_ok_excluir')==1) { ?> <div class="formee-msg-success"><h3>Produto deletado.</h3></div><? } ?>

        	<div class="box-head"><h2>Buscar Produto</h2></div>
        <ul class="table-toolbar">
            <li><a href="<?=base_url() ?>cadastro/fornecedor/>"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/editar-equip.png" alt="" /> Cadastrar Produto</a></li>
            <li><a href="<?=base_url() ?>cadastro/marca/>"><img src="<?= base_url()?>" alt="" /> Cadastrar Marca</a></li>
            <li><a href="<?=base_url() ?>cadastro/categoria/>"><img src="<?= base_url()?>" alt="" /> Cadastrar Categoria</a></li>    
        </ul>
        	<div class="box-content">
        	<div class="grid_12">Pesquise por nome,  ou código do produto.</div>
  			<div class="grid_8">
    			<input type="text" value="<?= $this->input->post("filtro"); ?>" name="filtro" id="filtro" />
    		</div>
    		<div class="grid_2"><input type="submit" value="Buscar Produto" class="button black" id="filtrar"></div>
    		</div><!-- box-content -->	

	
</form>
</div><!-- div content container_12  --> 	
<div class="content container_12">  
<?
#Necessario para não apresentar erros, quando não se encontra registros
if($produto==false) {
echo "Não foi encontrado registros no Banco de Dados, para a busca realizada";
}else {
?>

  <div class="box-head"><h2>Resultado da consulta de produtos</h2></div>
  <div class="box-content no-pad">
    <table class="display" id="dt2">
        <thead>
          <tr>
            <th>Quantidade</th>
            <th>Produto</th>
            <th>Marca</th>
            <th>Preço</th>
          </tr>
        </thead>
        <tbody>
         <?php foreach ($produto as $row) { ?>
          <tr class="odd gradeX">
            <td><a href="<?= base_url().'relatorios/ver_produto/'.$row->CODPRO; ?>"><?= $row->QTDPRO; ?></a></td>
            <td><a href="<?= base_url().'relatorios/ver_produto/'.$row->CODPRO; ?>"><?= $row->DESPRO; ?></a></td>
            <td><a href="<?= base_url().'relatorios/ver_produto/'.$row->CODPRO; ?>"><?= $row->MARPRO; ?></a></td>
            <td><a href="<?= base_url().'relatorios/ver_produto/'.$row->CODPRO; ?>">R$ <?= $row->PREPRO; ?></a></td>
          </tr>
           <? }// fechamos o foreach
                 }//fechamos else, 
              ?>
        </tbody>
    </table>
  </div><!-- div box-content-->
  
</div><!-- div content container_12  --> 
	 
<script> /* SCRIPTS */
  $(function () {
      $('#dt2').dataTable( {
        "bJQueryUI": true     
    });
  
  });
</script>

 <?	$this->load->view('i_rodape_v'); ?>
</body>
</html>