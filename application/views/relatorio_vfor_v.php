<? 
/*
foreach ($cliente as $row) { 
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


} 

*/
?>
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
<? foreach ($fornecedor as $row) { ?>
      <div class="box grid_12">
        <div class="box-head"><h2>Sobre o Fornecedor</h2></div>
        <div class="box-content no-pad">
         <ul class="table-toolbar">
            <li><a href="<?=base_url() ?>cadastro/fornecedor"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/nova_os.png" alt="" /> Novo Fornecedor</a></li>
                <li><a href="<?=base_url() ?>editar/fornecedor/<?= $row->CODFOR ?>"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/editar_cliente.png" alt="" /> Editar Fornecedor</a></li>
            <li><a href="<?=base_url().'excluir/fornecedor/'.$row->CODFOR; ?>"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/excluir_cliente.png" alt="" /> Excluir Fornecedor</a></li>
          </ul>
          <table class="display">
          <thead>
            <tr>
              <? if($row->FANFOR!=""){ ?><th>Nome</th><? } ?>
              <? if($row->RAZFOR!=""){ ?><th>Razão Social</th><? } ?>
              <? if($row->TELFOR!=""){ ?><th>Telefone</th><? } ?>
              <? if($row->CELFOR!=""){ ?><th>Celular</th><? } ?>
              <? if($row->FAXFOR!=""){ ?><th>Fax</th><? } ?>
              <? if($row->EMAFOR!=""){ ?><th>Email</th><? } ?>
              <? if($row->CPFFOR!=""){ ?><th>CPF</th><? } ?>
              <? if($row->CNPFOR!=""){ ?><th>CNPJ</th><? } ?>
              <? if($row->IEFOR!=""){ ?><th>IE</th><? } ?>
              <? if($row->ENDFOR!=""){ ?><th>Endereço</th><? } ?>
              <? if($row->BAIFOR!=""){ ?><th>Bairro</th><? } ?>
              <? if($row->COMFOR!=""){ ?><th>Complemento</th><? } ?>
              <? if($row->CEPFOR!=""){ ?><th>CEP</th><? } ?>
              <? if($row->CIDFOR!=""){ ?><th>Cidade</th><? } ?>
            </tr>
          </thead>
          <tbody>
            <tr class="odd gradeX">
              <? if($row->FANFOR!=""){ ?><td><?= $row->FANFOR; ?></td><? } ?>
              <? if($row->RAZFOR!=""){ ?><td><?= $row->RAZFOR; ?></td><? } ?>
              <? if($row->TELFOR!=""){ ?><td><?= $this->Padrao->mascara_string('(##)####-####',$row->TELFOR); ?></td><? } ?>
              <? if($row->CELFOR!=""){ ?><td><?= $this->Padrao->mascara_string('(##)####-####',$row->CELFOR);  ?></td><? } ?>
              <? if($row->FAXFOR!=""){ ?><td><?= $this->Padrao->mascara_string('(##)####-####',$row->FAXFOR);   ?></td><? } ?>
              <? if($row->EMAFOR!=""){ ?><td><?= $row->EMAFOR;  ?></td><? } ?>
              <? if($row->CPFFOR!=""){ ?><td><?= $this->Padrao->mascara_string('###.###.###-##',$row->CPFFOR); ?></td><? } ?>
              <? if($row->CNPFOR!=""){ ?><td><?= $this->Padrao->mascara_string('##.###.###/####-##',$row->CNPFOR);   ?></td><? } ?>
              <? if($row->IEFOR!=""){ ?><td><?= $row->IEFOR;  ?></td><? } ?>
              <? if($row->ENDFOR!=""){ ?><td><?= $row->ENDFOR;  ?></td><? } ?>
              <? if($row->BAIFOR!=""){ ?><td><?= $row->BAIFOR;  ?></td><? } ?>
              <? if($row->COMFOR!=""){ ?><td><?= $row->COMFOR;  ?></td><? } ?>
              <? if($row->CEPFOR!=""){ ?><td><?= $row->CEPFOR;  ?></td><? } ?>
              <? if($row->CIDFOR!=""){ ?><td>
              <?
    //consultamos a cidade
	$a_cidade = $this->Padrao->fc_where('cidade',array('CODCID' => $row->CIDFOR));	
 	foreach ($a_cidade as $rowC) { $cidade = $rowC->NOMCID;}   
 	
 	?>
              <?= $cidade;  ?></td><? } ?>
             </tr>
          </tbody>
         </table>
        </div>
      </div><!-- box-content -->
        	</div><!-- box-content container_12 -->	

   	<? } //fechamos foreach ?>		      
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
</html>