<!-- <div class="box-head"><h2>Buscar OS</h2></div>
<div class="box-content">
 <div class="grid_8">    	
	<div class="form-row"><p class="form-label">Cliente</p>
	<div class="form-item"><input type="text" value="<?= $this->input->post("cliente"); ?>" name="cliente" id="cliente" /></div>
	</div>
</div>     			  		
<div class="grid_4">    	
	<div class="form-row"><p class="form-label">Cliente</p>
	<div class="form-item"><input type="text" value="<?= $this->input->post("cliente"); ?>" name="cliente" id="cliente2" /></div>
	</div>
</div>


</div>  -->
<div class="box-head"><h2>Buscar OS</h2></div>
        	<div class="box-content">

        	
  			<div class="grid-9-12">Cliente
    			<input type="text" value="<?= $this->input->post("cliente"); ?>" name="cliente" id="cliente" />
    			<input type="hidden" value="" name="id" id="id"  />
    		</div>
    		<div class="grid-3-12">OS 
    			<input type="text" value="<?= $this->input->post("n_os"); ?>" name="n_os" id="n_os" />
    		</div>	
    		<div class="grid-4-12">
    		Técnico
    	 <select name="tecnico" id="tecnico">
    	 		<? $selecTecnico = $this->input->post("tecnico"); ?>
    	        <option value="" <? if($selecTecnico==""){ ?> selected="selected"<? } ?>>Selecione</option>
   				 <?php foreach ($tecnico as $row) { ?>
   	<option value="<?= $row->CODFUN; ?>" <? if($selecTecnico ==$row->CODFUN){ ?> selected="selected"<? } ?>  ><?= $row->NOMFUN; ?> </option>
   			     <? } ?>
   		 </select>
    		</div>	
    		<div class="grid-2-12">
    		Status
    		<select name="selectStatus" id="selectStatus">
    		<? $selecStatus = $this->input->post("selectStatus"); ?>
    		 <option value="" <? if($selecStatus==""){ ?> selected="selected"<? } ?>>Selecione</option>
    		   <option value="1" <? if($selecStatus==1){ ?> selected="selected"<? } ?>>Aberta</option>
    		   <option value="2" <? if($selecStatus==2){ ?> selected="selected"<? } ?>>Fechada</option>
    		</select>
    		</div>
    		
    		<div class="grid-2-12">
    		Data de
    		<select name="selectData" id="selectData">
    		 <? $selectData = $this->input->post("selectData"); ?>
    		   <option value="entrada" <? if($selectData=="entrada" or $selectData=="" ){ ?> selected="selected"<? } ?> >Entrada</option>
    		   <option value="fechamento" <? if($selectData=="fechamento"){ ?> selected="selected"<? } ?>>Fechamento</option>
    		</select>
    		</div>	
    		<div class="grid-2-12">
    		De 
    		<input type="text" value="<?= $this->input->post("data_i"); ?>" name="data_i" id="data_i" />
    		</div>
    		<div class="grid-2-12">
    		Até
    		<input type="text" value="<?= $this->input->post("data_f"); ?>" name="data_f" id="data_f" />
    		</div>	
    		<div class="grid-4-12"> <input type="submit" class="button black" value="Filtrar" id="filtrar"></div>
    		
	
	</div>
