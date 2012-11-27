<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title><?= $titulo ?> - Relatório</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- formee -->
<script type="text/javascript" src="<?=base_url() ?>assets/js/formee.js"></script>
<script type="text/javascript" src="<?=base_url() ?>assets/js/js.js"></script>
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/formee-style.css" type="text/css" media="screen" />
<?	$this->load->view('jqueryui'); ?>
<?	$this->load->view('head'); ?>

<!-- formee -->
<?php echo link_tag(base_url().'assets/css/estilo.css'); ?>
	
</head>
<body>
	<?	$this->load->view('i_topo_v'); ?>
    <?	$this->load->view('i_menu_v'); ?>


	<div class="content container_12">

	 <div class="box grid_12">
        <div class="box-head"><h2>Avisos</h2></div>
        <div class="box-content no-pad">

        <table class="display" id="dt2">
        <thead>
          <tr>
            <th>Aviso</th>
            <th>Data</th>
          </tr>
        </thead>
        <tbody>
                	<?
#Necessario para não apresentar erros, quando não se encontra registros
if($aviso==false) {
echo "Não foi encontrado registros no Banco de Dados";
}else {
foreach ($aviso as $row) { ?>
<?
$dataf = new DateTime($row->DATA);
$dataf = date_format($dataf, 'd/m/Y H:i'); 
?>
          <tr class="odd gradeX">
            <td><?= $row->aviso; ?> <span class="text-tiny"></td>
            <td><?= $dataf; ?></td>
          </tr>
                	 <?
 	}// fechamos o foreach
 }//fechamos else, 
 ?>	
        </tbody>
      </table>

        </div>
      </div>
	
	 
</div><!-- div box_center --> 
		 
 <?	$this->load->view('i_rodape_v'); ?>
 <script> /* SCRIPTS */
  $(function () {
    $('#dt2').dataTable( {
        "bJQueryUI": true     
    });
  });
</script>
</body>
</html>