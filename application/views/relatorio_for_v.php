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
<form action="<?= base_url().'relatorios/fornecedores' ?>" method="post" class="formee" id="form_buscar_fornecedor"  >

<? if($this->session->flashdata('msg_ok_excluir')==1) { ?> <div class="formee-msg-success"><h3>Fornecedor deletado.</h3></div><? } ?>

        	<div class="box-head"><h2>Buscar Fornecedor</h2></div>
        <ul class="table-toolbar">
            <li><a href="<?=base_url() ?>cadastro/fornecedor/>"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/clientes.png" alt="" /> Cadastro de Fornecedor</a></li>  
        </ul>
        	<div class="box-content">
        	<div class="grid_12">Pesquise por nome, razão social, telefone ou email do cliente.</div>
  			<div class="grid_8">
    			<input type="text" value="<?= $this->input->post("filtro"); ?>" name="filtro" id="filtro" />
    		</div>
    		<div class="grid_2"><input type="submit" value="Buscar Cliente" class="button black" id="filtrar"></div>
    		</div><!-- box-content -->	

	
</form>
</div><!-- div content container_12  --> 	
<div class="content container_12">  
<?
#Necessario para não apresentar erros, quando não se encontra registros
if($fornecedores==false) {
echo "Não foi encontrado registros no Banco de Dados, para a busca realizada";
}else {
?>

  <div class="box-head"><h2>Resultado da consulta de fornecedores</h2></div>
  <div class="box-content no-pad">
    <table class="display" id="dt2">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Razão Social</th>
            <th>Telefone</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
         <?php foreach ($fornecedores as $row) { ?>
          <tr class="odd gradeX">
            <td><a href="<?= base_url().'relatorios/ver_fornecedor/'.$row->CODFOR; ?>"><?= $row->FANFOR; ?></a></td>
            <td><a href="<?= base_url().'relatorios/ver_fornecedor/'.$row->CODFOR; ?>"><?= $row->RAZFOR; ?></a></td>
            <td><? if($row->TELFOR!="") { echo $this->Padrao->mascara_string('(##)####-####',$row->TELFOR); }else {echo "-"; } ?></td>
            <td><?= $row->EMAFOR; ?></td>
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