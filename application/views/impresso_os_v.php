<?
#Formatamos a data 
if($data_os!=""){
$data_prevista = new DateTime($data_os);
$data_os = date_format($data_prevista, 'd/m/Y H:i');  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Impressão Ordem de Serviço</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?=base_url() ?>assets/css/impresso.css" />
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
	<div class="info_os">
<div class="os"> ORDEM DE SERVIÇO</div>
<div class="n_os"><?= $n_os ?></div>
<div class="data"> Data: <?= $data_os ?></div>	
    </div><!--info_os-->
    </div><!--box_topo-->
    <div class="linha"> </div>
	<div id="box_info">
<div class="tecnico1">Técnico</div>
<div class="data1">Data</div>
<div class="situacao1">Situação</div>
<div class="valor1">Valor</div><br>
<div class="tecnico2"><?= $nome_fun ?></div>
<div class="data2"><?= $data_os ?></div>
<div class="situacao2"><?= $status ?></div>
<div class="valor2">R$ <?= $valor ?></div>
<div class="linha_pontilhada01"></div>
	</div><!--box_info-->

	<div id="box_cliente">
<div class="nome1">Nome</div>
<div class="cpf1"><? if(($tipo_cli=="Física")) { echo "CPF"; }else { echo "CNPJ";} ?></div>
<div class="telefone1">Telefone</div>
<div class="cep1">CEP</div>
<div class="nome2"><?= $nome_cli ?></div>
<div class="cpf2"><? if($tipo_cli=="Física") { echo $this->Padrao->mascara_string('###.###.###-##',$cpf_cli); }else { echo $this->Padrao->mascara_string('##.###.###/####-##',$cnpj_cli);} ?></div>
<div class="telefone2"><?= $this->Padrao->mascara_string('(##)####-####',$telefone_cli );  ?></div>
<div class="cep2"><?= $this->Padrao->mascara_string('#####-###',$cep_cli );  ?></div>
	</div><!--box_cliente-->
	<div id="box_cliente2">
<div class="endereco1">Endereço</div>
<div class="numero1">Número</div>
<div class="bairro1">Bairro</div><br>
<div class="endereco2"><?= $end_cli ?></div>
<div class="numero2"><?= $end_n_cli ?></div>
<div class="bairro2"><?= $bairro_cli ?></div>
	</div><!--box_cliente2-->
	<div id="box_cliente3">
<div class="cidade1">Cidade</div>
<div class="estado1">Estado</div>
<div class="email1">E-mail</div><br>
<div class="cidade2">Francisco Beltrão</div>
<div class="estado2">PR</div>
<div class="email2"><?= $email_cli ?></div>
	</div><!--box_cliente3-->	
<div class="linha_pontilhada"></div>
	<div id="box_equip1">
<div class="marca1">Marca</div>
<div class="name1">Nome</div>
<div class="mae1">Placa Mãe</div>
<div class="fonte1">Tipo</div><br>
<div class="marca2"><?= $marca_eq ?></div>
<div class="name2"><?= $nome_eq ?></div>
<div class="mae2"><?= $pm_eq ?></div>
<div class="fonte2"><?= $tipo_eq ?></div>
	</div><!--box_equip1-->
	<div id="box_equip2">
<div class="hd1">HD</div>
<div class="memoria1">Memória</div>
<div class="processador1">Processador</div>
<div class="drive1">Placa de Vídeo</div><br>
<div class="hd2"><?= $hd_eq ?></div>
<div class="memoria2"><?= $memoria_eq ?></div>
<div class="processador2"><?= $processador_eq ?></div>
<div class="drive2"><?= $pv_eq ?></div>
	</div><!--box_equip2-->
<div class="linha"> </div>
<div id="defeito_reclamado"> 
<div class="defeito">Defeito Reclamado</div>
<div id="texto_defeito">
<?= $defeito ?>
	</div></div>
	
	<div id="solucao"> 
<div class="solucao">Solução do Problema</div>
<div id="texto_solucao">
<?= $solucao ?>
	</div></div>
	
		<div class="linha_pontilhada01"></div>
	<div class="info_importante">
Só será entregue o equipamento mediante apresentação deste comprovante. No caso de perda do recibo, o cliente deverá comunicar a Bacelltech Informática<br> imediatamente,
e a retirada será efetuada ao mesmo pessoalmente, mediante comprovação de propriedade.

<p>A Bacelltech Informática não se responsabiliza por dados, agendas e afins adicionados aos aparelhos após
sua aquisição, orientamos o cliente a salvar e guardar<br> estas informações imprescindíveis.<p>

<strong>Não nos responsabilizamos por equipamentos deixados em nossa assistência por prazo superior a 90 dias.</strong>

</div>

	<div class="assinatura"> </div>
	<div class="assinatura2"> <?= $nome_cli ?> </div>
	
	<div id="box_destaque">
	<div class="destaque"><img src="<?=base_url() ?>assets/di/tesoura.png"width="25" height="25"><div class="destaque2"></div></div>
	</div>
		<div id="box_topo">
<div class="logo"><img src="<?=base_url() ?>assets/di/logo_os.png"></div>
		<div class="end"> 
<div class="end1"> Bacell Comércio de Produtos Eletrônico Ltda</div>
<div class="end2"> Av. Júlio Assis Cavalheiro, 559 - Centro - Fco. Beltrão PR</div>
<div class="end3"> Fone: (46) 3524-6658 - Site: www.bacelltech.com.br</div>
		</div><!--end-->
	<div class="info_os">
<div class="os"> ORDEM DE SERVIÇO</div>
<div class="n_os"><?= $n_os ?></div>
<div class="data"> Data: <?= $data_os ?></div>	
    </div><!--info_os-->
    </div><!--box_topo-->
    <div class="linha"> </div>
	<div id="box_info">
<div id="box_info2">
<div class="nome01">Nome</div>
<div class="tecnico01">Técnico</div>
<div class="valor01">Valor</div><br>
<div class="nome02"><?= $nome_cli ?></div>
<div class="tecnico02"><?= $nome_fun ?></div>
<div class="valor02">R$ <?= $valor ?></div>


	</div><!--box_info-->
	<div class="linha_pontilhada01"></div>
	<div class="info_importante">
Só será entregue o equipamento mediante apresentação deste comprovante. No caso de perda do recibo, o cliente deverá comunicar a Bacelltech Informática<br> imediatamente,
e a retirada será efetuada ao mesmo pessoalmente, mediante comprovação de propriedade.

<p>A Bacelltech Informática não se responsabiliza por dados, agendas e afins adicionados aos aparelhos após
sua aquisição, orientamos o cliente a salvar e guardar<br> estas informações imprescindíveis.<p>

<strong>Não nos responsabilizamos por equipamentos deixados em nossa assistência por prazo superior a 90 dias.</strong>

</div>
	
		</div><!--end-->
</div>
</div><!--box_geral-->
</body>
</html>