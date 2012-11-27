<? foreach ($cliente as $row) { 
$nomcli = $row->NOMCLI;
$razcli = $row->RAZCLI;
if($row->TELCLI !=""){ $telcli = $this->Padrao->mascara_string('(##)####-####',$row->TELCLI); } else { $telcli = ""; }
if($row->CELCLI !=""){ $celcli = $this->Padrao->mascara_string('(##)####-####',$row->CELCLI); } else { $celcli = ""; }
if($row->FAXCLI !=""){ $faxcli = $this->Padrao->mascara_string('(##)####-####',$row->FAXCLI); } else { $faxcli = ""; }
if($row->CPFCLI !=""){ $cpfcli = $this->Padrao->mascara_string('###.###.###-##',$row->CPFCLI); } else { $cpfcli = ""; }
if($row->CNPCLI !=""){ $cnpcli = $this->Padrao->mascara_string('##.###.###/####-##',$row->CNPCLI); } else { $cnpcli = ""; }
$tipcli = $row->TIPCLI;
$endcli = $row->ENDCLI;
$comcli = $row->COMCLI;
$numcli = $row->NUMCLI;
$baicli = $row->BAICLI;
$codcli = $row->CODCLI;
$natcli = $row->NATCLI;
if($row->CEPCLI !=""){ $cepcli = $this->Padrao->mascara_string('#####-###',$row->CEPCLI); } else { $cepcli = ""; }
$rgcli = $row->RGCLI;
$iefor = $row->IEFOR;
$emacli = $row->EMACLI;
$senha = $row->senha;

//Armazenamos o id do cliente em cookie, para a pagina de cadastrar OS consultar
$this->session->set_flashdata('idcliente',  $codcli);

//Definimos conteudo para a senha
if($senha==""){ $senha =" sem senha cadastrada";}else { $senha = " senha cadastrada!";}

} ?>
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
      <div class="box grid_12">
        <div class="box-head"><h2>Sobre o cliente</h2></div>
        <div class="box-content no-pad">
         <ul class="table-toolbar">
            <li><a href="<?=base_url() ?>cadastro/os/cad_os"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/nova_os.png" alt="" /> Abrir OS</a></li>
            <li><a href="<?=base_url() ?>cadastro/equipamento/<?= $codcli; ?>"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/editar-equip.png" alt="" /> Cadastrar Equipamento</a></li>
            <li><a href="<?=base_url() ?>editar/cliente/<?= $codcli; ?>"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/editar_cliente.png" alt="" /> Editar Cliente</a></li>
            <li><a href="<?=base_url().'excluir/cliente/'.$codcli; ?>"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/excluir_cliente.png" alt="" /> Excluir Cliente</a></li>
          </ul>
          <table class="display">
          <thead>
            <tr>
              <? if($nomcli!=""){ ?><th>Nome</th><? } ?>
              <? if($razcli!=""){ ?><th>Empresa</th><? } ?>
              <? if($tipcli!=""){ ?><th>Tipo</th><? } ?>
              <? if($telcli!=""){ ?><th>Telefone</th><? } ?>
              <? if($celcli!=""){ ?><th>Celular</th><? } ?>
              <? if($faxcli!=""){ ?><th>Fax</th><? } ?>
              <? if($emacli!=""){ ?><th>Email</th><? } ?>
              <? if($rgcli!=""){ ?><th>RG</th><? } ?>
              <? if($cpfcli!=""){ ?><th>CPF</th><? } ?>
              <? if($cnpcli!=""){ ?><th>CNPJ</th><? } ?>
              <? if($iefor!=""){ ?><th>IE</th><? } ?>
              <? if($natcli!=""){ ?><th>Naturalidade</th><? } ?>
              <? if($endcli!=""){ ?><th>Endereço</th><? } ?>
              <? if($numcli!=""){ ?><th>Nº</th><? } ?>
              <? if($baicli!=""){ ?><th>Bairro</th><? } ?>
              <? if($comcli!=""){ ?><th>Complemento</th><? } ?>
              <? if($cepcli!=""){ ?><th>CEP</th><? } ?>
            </tr>
          </thead>
          <tbody>
            <tr class="odd gradeX">
              <? if($nomcli!=""){ ?><td><?= $nomcli; ?></td><? } ?>
              <? if($razcli!=""){ ?><td><?= $razcli; ?></td><? } ?>
              <? if($tipcli!=""){ ?><td><?= $tipcli; ?></td><? } ?>
              <? if($telcli!=""){ ?><td><?= $telcli; ?></td><? } ?>
              <? if($celcli!=""){ ?><td><?= $celcli; ?></td><? } ?>
              <? if($faxcli!=""){ ?><td><?= $faxcli; ?></td><? } ?>
              <? if($emacli!=""){ ?><td><?= $emacli; ?></td><? } ?>
              <? if($rgcli!=""){ ?><td><?= $rgcli; ?></td><? } ?>
              <? if($cpfcli!=""){ ?><td><?= $cpfcli; ?></td><? } ?>
              <? if($cnpcli!=""){ ?><td><?= $cnpcli; ?></td><? } ?>
              <? if($iefor!=""){ ?><td><?= $iefor; ?></td><? } ?>
              <? if($natcli!=""){ ?><td><?= $natcli; ?></td><? } ?>
              <? if($endcli!=""){ ?><td><?= $endcli; ?></td><? } ?>
              <? if($numcli!=""){ ?><td><?= $numcli; ?></td><? } ?>
              <? if($baicli!=""){ ?><td><?= $baicli; ?></td><? } ?>
              <? if($comcli!=""){ ?><td><?= $comcli; ?></td><? } ?>
              <? if($cepcli!=""){ ?><td><?= $cepcli; ?></td><? } ?>
             </tr>
          </tbody>
         </table>
        </div>
      </div><!-- box-content -->
        	</div><!-- box-content container_12 -->	
<? 
#Consultamos as OS desse cliente
$where_os= array('CODCLI' => $codcli);
$con_os = $this->Padrao->fc_where('os',$where_os);
if($con_os!=false){
?>
<div class="content container_12">
      <div class="box grid_12">
        <div class="box-head"><h2>Últimas OS</h2></div>
        <div class="box-content no-pad">
          <table class="display">
          <thead>
            <tr>
              <th>OS</th>
              <th>Status</th>
              <th>Entrada</th>
              <th>Baixa</th>
              <th>Valor</th>
              <th>Opções</th>
            </tr>
          </thead>
          <tbody>
          <? foreach ($con_os as $row2) { ?>
            <tr class="odd gradeX">
              <td><?= $row2->CODOS; ?></td>
              <td><? if($row2->status==1){echo "Aberta";}else {echo "Fechada";} ?></td>
              <td><?= $row2->DATOS; ?></td>
              <td><?= $row2->dat_baixa_os; ?></td>
              <td>R$ <?= $row2->VLROS; ?></td>              
              <td> <a href="<?= base_url().'editar/eos/'.$row2->CODOS; ?>" class="tip-top" title="Clique aqui para editar"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/editar-space.png"/></a> <a href="<?= base_url().'imprimir/os/'.$row2->CODOS; ?>"  class="tip-top" title="Realmente deseja excluir esse item?"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/excluir-space.png" alt="" /></a></td> 
             </tr>
            <? } ?>
                     	 <!-- <div class="grid-3-12"><label><a href="<?= base_url().'editar/eos/'.$row2->CODOS; ?>" >Editar</a> | <a href="<?= base_url().'imprimir/os/'.$row2->CODOS; ?>" target="_blank"  >Imprimir</a></label></div> -->
          </tbody>
         </table>
        </div>
      </div><!-- box-content -->
        	</div><!-- box-content container_12 -->	
<? } //fechamos if verificador ?>


<? 
#Consultamos os Equipamentos desse cliente
$where_equip= array('clientes_id' => $codcli);
$con_equip = $this->Padrao->fc_where('sysbt_equipamentos',$where_equip);
if($con_equip!=false){
?>	

<div class="content container_12">
      <div class="box grid_12">
        <div class="box-head"><h2>Equipamentos Cadastrados</h2></div>
        <div class="box-content no-pad">
          <table class="display">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Marca</th>
              <th>Tipo</th>
              <th>Processador</th>
              <th>Opções</th>
            </tr>
          </thead>
          <tbody>
          <? foreach ($con_equip as $row3) { ?>
            <tr class="odd gradeX">
              <td><?= $row3->nome; ?></td>
              <td><?= $row3->marca; ?></td>
              <td><?= $row3->tipo; ?></td>
              <td><?= $row3->processador; ?></td>
              <td> <a href="#" class="tip-top" title="Clique aqui para editar"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/editar-space.png"/></a> <a href="#"  class="tip-top" title="Realmente deseja excluir esse item?"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/excluir-space.png" alt="" /></a></td> 
             </tr>
            <? } ?>
          </tbody>
         </table>
        </div> <!-- box-content no-pad -->
      </div> <!-- box grid_12 -->
    </div><!-- content container_12 -->  	
<? } //fechamos if verificador ?>	

	
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
</html>