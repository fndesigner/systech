<?
#Formatamos a data 
if($e_os_pe!=""){
$data_prevista = new DateTime($e_os_pe);
$data_previstac = date_format($data_prevista, 'd-m-Y H:i:s');  
}else {
$data_previstac="Não cadastrada";
}
?>
<script>
$(function(){
    $('#btn_editar_os').click(function(){
        window.open(<?= base_url().'editar/os/'.$e_os_codos ?> );
        return false;
    });
});
</script>
		
<div class="grid-12-12"> 	   
 <div class="grid-12-12 css_link_padrao" >
 <a href="javascript:;" onclick="carregar_pg('<?= base_url()?>relatorios/view_filtro')" > << Ver filtro</a>
 </div>
 <div class="grid-12-12">
  <fieldset>
        	<legend>Detalhes </legend>
  <div class="texto_padrao">      	
 	<div class="grid-6-12">Cliente: <?= $e_os_cliente ?>  </div>
 	<? if($e_os_cliente_tel!="") { ?><div class="grid-4-12">Telefone: <?= $this->Padrao->mascara_string('(##)####-####',$e_os_cliente_tel);  ?>  </div> <? } ?>
    <div class="grid-4-12">Técnico: <?= $e_os_tecnico ?></div>
    <div class="grid-2-12">OS Nº <?= $e_os_codos ?> </div>
    <div class="grid-4-12">Previsão de entrega: <?= $data_previstac ?></div> 
    <div class="grid-4-12">Status da OS: <? if($e_os_status==1){echo "Aberta";}else { echo "Fechada"; } ?></div>
   
    <div class="grid-12-12">Defeito: <?= $e_os_defeito ?> </div>
    <? if($e_os_solucao!="") { ?><div class="grid-12-12">Solução: <?= $e_os_solucao ?> </div> <? } ?>
   <? if($e_os_solucao!="") { ?> <div class="grid-12-12">OBS: <?= $e_os_obs ?> </div><? } ?>
   </div>
   <div class="grid-8-12"></div> 
   <div class="grid-1-12 css_link_padrao"><a href="<?= base_url().'imprimir/os/'.$e_os_codos ?>">Imprimir</a>  </div>
   <div class="grid-3-12 css_link_padrao"><a href="<?= base_url().'editar/eos/'.$e_os_codos ?>">Editar Ordem de Serviço</a></div>
</fieldset>
    
  <fieldset>
        	<legend>Equipamento </legend>
     <?
     if($e_equipamento!=false){
     foreach ($e_equipamento as $row) { 
     ?>	
  <div class="texto_padrao">      	
 	<? if($row->nome!="") { ?><div class="grid-4-12">Equipamento: <?= $row->nome; ?></div> <? } ?>
 	<? if($row->tipo!="") { ?><div class="grid-2-12">Tipo: <?= $row->tipo; ?></div><? } ?>
    <? if($row->marca!="") { ?><div class="grid-3-12">Marca: <?= $row->marca; ?></div><? } ?>
     <? if($row->ip!="") { ?><div class="grid-3-12">IP: <?= $row->ip; ?></div><? } ?>
   	<? if($row->monitor!="") { ?> <div class="grid-3-12">Monitor: <?= $row->monitor; ?></div><? } ?>
   	<? if($row->memoria!="") { ?> <div class="grid-3-12">Memória: <?= $row->memoria; ?></div> <? } ?>
    <? if($row->hd!="") { ?><div class="grid-3-12">HD: <?= $row->hd; ?> </div><? } ?>
   	<? if($row->processador!="") { ?> <div class="grid-4-12">Processador: <?= $row->processador; ?> </div><? } ?>
    <? if($row->placa_de_video!="") { ?><div class="grid-4-12">Placa de Video: <?= $row->placa_de_video; ?> </div><? } ?>
   	<? if($row->placa_mae!="") { ?> <div class="grid-3-12">Placa Mãe: <?= $row->placa_mae; ?></div><? } ?>
   	<? if($row->DESC!="") { ?> <div class="grid-12-12">Descrição / Acessórios: <?= $row->DESC; ?></div><? } ?>
   	<? if($row->obs!="") { ?> <div class="grid-12-12">OBS: <?= $row->obs; ?></div><? } ?>
   	<div class="grid-3-12 css_link_padrao"><a href="<?= base_url().'editar/equipamento/'.$row->id; ?>">Editar Equipamento</a></div>
       </div>
   <?  }//fecha foreach 
   }else { echo " OS sem equipamento cadastrado."; } //fecha if ?>    

</fieldset>
   
</div>    

	</div> 
<div class="grid-12-12">	
<form  class="formee" id="formEditarOS" method="post" action="<?= base_url().'cadastro/salvar/statusp'; ?>"> 	
  		<fieldset>
        	<legend>Status Personalizado </legend>
  				<div class="grid-11-12"><label>Status Personalizado: <em class="formee-req">*</em></label></div>
    			<div class="grid-8-12"><input type="text" value="" name="statusp_os" id="statusp_os" /></div>
    			<div class="grid-3-12"><input type="hidden" value="<?= $e_os_codos ?>" name="id_os" id="id_os" />
                <input type="submit" value="Atualizar" id="btn_statusp"></div>			
   		</fieldset>
</form>	
</div>
<? if($e_statusp!="") { ?>
<div class="grid-12-12">
	    <fieldset>
        	<legend>Histórico  </legend>
        	<ul >
        	<? foreach ($e_statusp as $row9) { ?>
        	<li><?= $row9->status; ?> - <?= $row9->DATA; ?></li>   
        	<? } ?>
        	</ul>  	
        	</div>
        </fieldset>
</div> 
<? } ?>      	
</div>

