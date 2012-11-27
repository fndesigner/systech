
<div class="grid-12-12">
 <div class="grid-12-12">
  <fieldset>
        	<legend>Detalhes </legend>
  <div class="texto_padrao">      	
 	<div class="grid-6-12">CLIENTE: <?= $e_os_cliente ?></div>
    <div class="grid-6-12">EQUIPAMENTO: <?= $e_os_equip ?></div>
    <div class="grid-6-12">TÉCNICO: <?= $e_os_tecnico ?></div>
    <div class="grid-4-12">SITUÇÃO DA OS: <? if($e_os_status==1){echo "Aberta";}else { echo "Fechada"; } ?></div>
    <div class="grid-2-12">OS Nº <?= $e_os_codos ?> </div>
    <div class="grid-12-12">DEFEITO: <?= $e_os_defeito ?> </div>
    <div class="grid-12-12">SOLUÇÃO: <?= $e_os_solucao ?> </div>
    <div class="grid-12-12">OBS: <?= $e_os_obs ?> </div>
   </div>
   <div class="grid-9-12"></div> 
   <div class="grid-3-12 css_link_padrao"><a href="<?= base_url().'imprimir/os/'.$e_os_codos ?>"  target="_blank">Imprimir Ordem de Serviço</a>  </div>
</fieldset>
</div>    

	</div> <? if($e_statusp!="") { ?>
<div class="grid-11-12">
	    <fieldset>
        	<legend>Histórico  </legend>
        	<ul >
        	<? foreach ($e_statusp as $row) { ?>
        	<li><?= $row->status; ?> - <?= $row->DATA; ?></li>   
        	<? } ?>
        	</ul>  	
        	</div>
        </fieldset>
</div> 
<? } ?>      	

</div>	   
		 

