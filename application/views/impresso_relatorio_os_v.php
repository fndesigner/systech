<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Impressão de Relatório</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/impresso.css" />
<style>
table#alter tr td { /* Toda a tabela com fundo creme */
	background: #fff;
	} 
table#alter tr.dif td {
	background: #eee; /* Linhas com fundo cinza */
	} 
</style>
</head>
<body>
<div id="box_geral">
	<div id="box_topo">
<div class="logo"><img src="<?=base_url() ?>assets/di/logo_os.png"></div>
		<div class="end"> 
<div class="end1"> Bacell Comércio de Produtos Eletrônico Ltda</div>
<div class="end2"> Av. Júlio Assis Cavalheiro, 559 - Centro - Fco. Beltrão PR</div>
<div class="end3"> Fone: (46) 3524-6658 - Site: www.bacelltech.com.br</div>
		</div><!--end-->
    </div><!--box_topo-->
    <div class="linha"> </div>
    <br /><br />
<table cellpadding="5px" cellspacing="3px" ID="alter" width="890px">
	<tr> 
		<td>OS </td>
		<td>Cliente</td>
		<td>Técnico</td>
		<td>Status</td>
		<td>Valor Mão de Obra</td>
		<td>Valor Produtos</td>
		<td>Total</td>
	</tr>
	<tr class="dif"> 
		<td>Célula 2-1 </td>
		<td>Célula 2-2</td>
		<td>Célula 2-3</td>
		<td>Célula 2-3</td>
		<td>Célula 2-3</td>
		<td>Célula 2-3</td>
		<td>Célula 2-3</td>
	</tr>
</table>
</div><!--box_geral-->
</body>
</html>