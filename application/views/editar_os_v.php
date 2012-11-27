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
        window.open(<?= base_url().'editar/os/'.$e_os_codos ?>);
        return false;
    });
    
});

</script> 


 <div class="grid_12">
     <ul class="table-toolbar">
          <li><a href="javascript:;" onclick="carregar_pag('<?= base_url()?>relatorios/view_filtro');" > <img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/delete.png" alt="" /> Fechar</a></li>
        
          <li><a href="<?= base_url().'editar/eos/'.$e_os_codos ?>"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/editar-os.png" alt="" /> Editar OS</a></li>
          <?  #Pegamos o id do equipamento, para o botão editar equipamento
        if($e_equipamento!=false){
        foreach ($e_equipamento as $rowE) { ?>	 
          <li><a href="<?= base_url().'editar/equipamento/'.$rowE->id ?>"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/editar-equip.png" alt="" />Editar Equipamento</a></li>
          <? } } //fechamos id equipamento ?> 
            <li><a href="<?= base_url().'cadastro/os/buscar_cliente'?>"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/plus.png" alt="" /> Abrir OS</a></li>
          <li><a href="<?= base_url().'imprimir/os/'.$e_os_codos ?>"><img src="<?= base_url()?>assets/tema/adminity/img/icons/basic/print.png" alt="" /> Imprimir</a></li>
       
        </ul>
  <div class="box-head"><h2>DETALHES OS <?= $e_os_codos ?> </h2></div>
  <div class="box-content">
    <table class="display" id="dt2">
        <thead>
          <tr>
            <th>Cliente</th>
          <? if($e_os_cliente_tel!="") { ?>  <th>Telefone</th> <? } ?>
            <th>Técnico</th>
            <th>Status</th>
            <th>Previsão</th>
            <th>Defeito</th>
          </tr>
        </thead>
        <tbody>
          <tr class="odd gradeX">
            <td><?= $e_os_cliente ?></td>
              <? if($e_os_cliente_tel!="") { ?>   <td><?= $this->Padrao->mascara_string('(##)####-####',$e_os_cliente_tel);  ?></td><? } ?>
            <td><?= $e_os_tecnico ?></td>
            <td><? if($e_os_status==1){echo "Aberta";}else { echo "Fechada"; } ?></td>
            <td><?= $data_previstac ?></td>
             <td> <?= word_limiter($e_os_defeito,15); ?></td>
          </tr>
</tbody>
</table>   
</div><!-- Close box-content -->


  <div class="box-head"><h2>Equipamento</h2></div>
  <div class="box-content">
        <? if($e_equipamento!=false){
        foreach ($e_equipamento as $row) { 
         ?>
           <table class="display" id="dt2">
        <thead>
          <tr>
           <? if($row->nome!="") { ?> <th>Equipamento</th><? } ?>
           <? if($row->tipo!="") { ?> <th>Tipo</th>  <? } ?>
           <? if($row->marca!="") { ?> <th>Marca</th><? } ?>
           <? if($row->ip!="") { ?><th>IP</th><? } ?>
           <? if($row->monitor!="") { ?> <th>Monitor</th><? } ?>
           <? if($row->memoria!="") { ?> <th>Memória</th><? } ?>
           <? if($row->hd!="") { ?> <th>HD</th><? } ?>
           <? if($row->processador!="") { ?> <th>Processador</th><? } ?>
           <? if($row->placa_de_video!="") { ?> <th>Placa de Vídeo</th><? } ?>
           <? if($row->placa_mae!="") { ?> <th>Placa Mãe</th><? } ?>
          </tr>
        </thead>
        <tbody>	
        <tr class="odd gradeX">
         <? if($row->nome!="") { ?> <td><?= $row->nome; ?></td><? } ?>
         <? if($row->tipo!="") { ?> <td><?= $row->tipo; ?></td><? } ?>
         <? if($row->marca!="") { ?><td><?= $row->marca; ?></td><? } ?>
         <? if($row->ip!="") { ?><td><?= $row->ip; ?></td><? } ?>
         <? if($row->monitor!="") { ?> <td><?= $row->monitor; ?></td><? } ?>
         <? if($row->memoria!="") { ?><td><?= $row->memoria; ?></td><? } ?>
         <? if($row->hd!="") { ?><td><?= $row->hd; ?></td><? } ?>
         <? if($row->processador!="") { ?><td><?= $row->processador; ?></td><? } ?>
         <? if($row->placa_de_video!="") { ?><td><?= $row->placa_de_video; ?></td><? } ?>
         <? if($row->placa_mae!="") { ?><td><?= $row->placa_mae; ?></td><? } ?>
        </tr>   
               
   
    </div>
   <?  }//fecha foreach 
   }else { echo " OS sem equipamento cadastrado."; } //fecha if ?>    

   </tbody></table>
</div> <!-- close box-content --> 

	
<form  class="formee" id="formEditarOS" method="post" action="<?= base_url().'salvar_os/statusp/cadastro'; ?>"> 	
  		<div class="box-head"><h2>Atualizar Histórico</h2></div>
  <div class="box-content">
  				<div class="grid-12-12"><p>Status Personalizado:</p></div>
    			<div class="grid-9-12"><input type="text" value="" name="statusp_os" id="statusp_os" placeholder="Escreva aqui o estado atual da OS"  /></div>
    			<div class="grid-3-12"><input type="hidden" value="<?= $e_os_codos ?>" name="id_os" id="id_os" />
                <input type="submit" value="Atualizar" class="button green"></div>			
   		</div>
</form>	

<? if($e_statusp!="") { ?>

	  	<div class="box-head"><h2>Histórico da OS</h2></div>
  <div class="box-content">
        	<ul >
        	<? foreach ($e_statusp as $row9) { ?>
        	<li><p><?= $row9->status; ?> <span class="text-tiny">- <?= $row9->DATA; ?></span></p></li>   
        	<? } ?>
        	</ul>  	
   </div><!-- box-content -->
</div> <!-- grid_12 lá do inicio da pag editar_os_v.php
<? } ?>  
  	


