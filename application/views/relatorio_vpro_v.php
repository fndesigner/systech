<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>SYSBT - Gerência de Assistência Técnica</title>
	<link rel="stylesheet" href="<?=base_url() ?>assets/css/estilo.css" />
	<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />
	</head>
<body>
	<?	$this->load->view('head'); ?>
	<?	$this->load->view('i_topo_v'); ?>
    <?	$this->load->view('i_menu_v'); ?>
   	
<div class="content container_12">
<? foreach ($produto as $row) { ?>
      <div class="box grid_12">
        <div class="box-head"><h2>Sobre o Produto</h2></div>
        <div class="box-content no-pad">
         <ul class="table-toolbar">
            <li><a href="<?=base_url() ?>cadastro/produto"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/editar-equip.png" alt="" /> Cadastrar Produto</a></li>
                <li><a href="<?=base_url() ?>editar/produto/<?= $row->CODPRO ?>"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/editar-equip.png" alt="" /> Editar Produto</a></li>
            <li><a href="<?=base_url().'excluir/produto/'.$row->CODPRO; ?>"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/editar-equip.png" alt="" /> Excluir Produto</a></li>
            <li><a href="<?=base_url() ?>cadastro/marca/>"><img src="<?= base_url()?>" alt="" /> Cadastrar Marca</a></li>
            <li><a href="<?=base_url() ?>cadastro/categoria/>"><img src="<?= base_url()?>" alt="" /> Cadastrar Categoria</a></li>
          </ul>
          <table class="display">
          <thead>
            <tr>
              <? if($row->QTDPRO!=""){ ?><th>Quantidade</th><? } ?>
              <? if($row->DESPRO!=""){ ?><th>Produto</th><? } ?>
              <? if($row->MARPRO!=""){ ?><th>Marca</th><? } ?>
              <? if($row->CUSPRO!=""){ ?><th>Custo</th><? } ?>
              <? if($row->LUCPRO!=""){ ?><th>Margem</th><? } ?>
              <? if($row->PREPRO!=""){ ?><th>Preço</th><? } ?>
              <!-- <? // if($row->CATPRO!=""){ ?><th>Categoria</th><? // } ?> -->
              <!-- <? // if($row->SITPRO!=""){ ?><th>Situação</th><? // } ?> -->
            </tr>
          </thead>
          <tbody>
            <tr class="odd gradeX">
              <? if($row->QTDPRO!=""){ ?><td><?= $row->QTDPRO; ?></td><? } ?>
              <? if($row->DESPRO!=""){ ?><td><?= $row->DESPRO; ?></td><? } ?>
              <? if($row->MARPRO!=""){ ?><td><?= $row->MARPRO; ?></td><? } ?>
              <? if($row->CUSPRO!=""){ ?><td>R$ <?= $row->CUSPRO; ?></td><? } ?>
              <? if($row->LUCPRO!=""){ ?><td><?= $row->LUCPRO; ?>%</td><? } ?>
              <? if($row->PREPRO!=""){ ?><td>R$ <?= $row->PREPRO; ?></td><? } ?>
              <!-- <? if($row->CATPRO!=""){ ?><td><?= $row->CATPRO;  ?></td><? } ?> -->
              <!-- <? if($row->SITPRO!=""){ ?><td><?= $row->SITPRO;  ?></td><? } ?> -->
             

              </td>
             </tr>
          </tbody>
         </table>
        </div>
      </div><!-- box-content -->
        	</div><!-- box-content container_12 -->	

   	<? } //fechamos if verificador ?>		      
    </div><!-- content container_12 -->  	


	
	<?	$this->load->view('i_rodape_v'); ?>
	
	
	<script> /* SCRIPTS */

$(function() {
  $('.tip-top').tipTip({attribute: "title", delay: "100", defaultPosition: "top"});
});

  $(function () {
    $('#dt1').dataTable( {
        "bJQueryUI": true   
    });
  });

</script>
	</body>
</html>!