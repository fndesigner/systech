<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><html>
	<head>
		<title>SYSBT - Gerência de Assistência Técnica</title>
<?	$this->load->view('head'); ?>
	</head>
	<body>
	<?	$this->load->view('i_topo_v'); ?>
    <?	$this->load->view('i_menu_v'); ?>
 
<!--- CONTENT AREA -->
<div class="content container_12">
<?
if($aviso!=false){
foreach ($aviso as $row) {  
$id_av = $row->id;
?>
<script>
	$(function() { $( "#av_<?= $id_av ?>" ).click(function() { 
	$.post('<?=base_url() ?>editar/aviso_lido/<?= $id_av ?>');	
	$('#avD_<?= $id_av ?>').slideUp();
		 });
	});
	</script>

<div class="ad-notif-info grid_12" id="avD_<?= $id_av ?>"><p><?=  $row->aviso; ?><img class="alinha_btn_fechar" src="<?=base_url() ?>assets/di/Close-32.png" border="0" id="av_<?= $id_av ?>" /></p></div>

<? } //fecha foreach
} //fecha if ?>  
            <div class="ad-notif-info grid_12"><p> NOVIDADE: AGORA O SISTEMA POSSUI NOTA FISCAL ELETRÔNICA</p></div>
      
    
      <div class="box grid_3">
        <div class="box-head"><h2>Bem vindo ao SYSTECH</h2></div>
        <div class="box-content">
          <p>Sistema de controle de vendas e serviços, e o melhor, 100% online, facilitando seu dia-a-dia, podendo acessar o sistema em qualquer lugar, que possui internet.
          <br><br>
          Para oferecer cada vez mais comodidade e facilidade, o nosso sistema é constantemente melhorado. Atualmente efetuamos uma série de melhorias e inclusão de funcionalidades, para satisfazer nossos clientes.<br><br>
          </p><br>
        </div>
      </div>
      <div class="box grid_3">
        <div class="box-head"><span class="box-icon-24 fugue-24 counter"></span><h2>Stats</h2></div>
        <div class="box-content ad-stats">
          <ul>
            <li><h3>21594</h3> Unique Visitors</li>
            <li class="stats-up"><h3>52100</h3> Page Views</li>
            <li class="stats-up"><h3>$2652</h3> Ad Revenue</li>
            <li class="stats-down"><h3>$125</h3> Maintenance Costs</li>
            <li class="stats-up"><h3>+2</h3> Moved up Google</li>
          </ul>
        </div>
      </div>
      <div class="box grid_6">
        <div class="box-head"><span class="box-icon-24 fugue-24 system-monitor"></span><h2>Chart</h2></div>
        <div class="box-content">
          <div id="flot-demo"></div>
        </div>
      </div>
      <div class="box grid_12">
        <div class="box-head"><h2>Data Table</h2></div>
        <div class="box-content no-pad">
        <table class="display" id="example">
        <thead>
          <tr>
            <th>Rendering engine</th>
            <th>Browser</th>
            <th>Platform(s)</th>
            <th>Engine version</th>
            <th>CSS grade</th>
          </tr>
        </thead>
        <tbody>
          <tr class="odd gradeX">
            <td>Trident</td>
            <td>Internet Explorer 4.0</td>
            <td>Win 95+</td>
            <td class="center"> 4</td>
            <td class="center">X</td>
          </tr>
          <tr class="even gradeC">
            <td>Trident</td>
            <td>Internet Explorer 5.0</td>
            <td>Win 95+</td>
            <td class="center">5</td>
            <td class="center">C</td>
          </tr>
          <tr class="odd gradeA">
            <td>Trident</td>
            <td>Internet Explorer 5.5</td>
            <td>Win 95+</td>
            <td class="center">5.5</td>
            <td class="center">A</td>
          </tr>
          <tr class="even gradeA">
            <td>Trident</td>
            <td>Internet Explorer 6</td>
            <td>Win 98+</td>
            <td class="center">6</td>
            <td class="center">A</td>
          </tr>
          <tr class="odd gradeA">
            <td>Trident</td>
            <td>Internet Explorer 7</td>
            <td>Win XP SP2+</td>
            <td class="center">7</td>
            <td class="center">A</td>
          </tr>
          <tr class="even gradeA">
            <td>Trident</td>
            <td>AOL browser (AOL desktop)</td>
            <td>Win XP</td>
            <td class="center">6</td>
            <td class="center">A</td>
          </tr>
          <tr class="gradeA">
            <td>Gecko</td>
            <td>Firefox 1.0</td>
            <td>Win 98+ / OSX.2+</td>
            <td class="center">1.7</td>
            <td class="center">A</td>
          </tr>
          <tr class="gradeA">
            <td>Gecko</td>
            <td>Firefox 1.5</td>
            <td>Win 98+ / OSX.2+</td>
            <td class="center">1.8</td>
            <td class="center">A</td>
          </tr>
          <tr class="gradeA">
            <td>Gecko</td>
            <td>Firefox 2.0</td>
            <td>Win 98+ / OSX.2+</td>
            <td class="center">1.8</td>
            <td class="center">A</td>
          </tr>
          <tr class="gradeA">
            <td>Gecko</td>
            <td>Firefox 3.0</td>
            <td>Win 2k+ / OSX.3+</td>
            <td class="center">1.9</td>
            <td class="center">A</td>
          </tr>
        </tbody>
      </table>
        </div>
      </div>

      <div class="box grid_6">
        <div class="box-head"><h2>Simple Inputs</h2></div>
        <div class="box-content">
           <div class="form-row">
            <p class="form-label">Text input</p>
            <div class="form-item"><input type="text" /></div>
           </div>
           <div class="form-row">
            <p class="form-label">Password input</p>
            <div class="form-item"><input type="password" /></div>
           </div>
           <div class="form-row">
            <p class="form-label">Input with Placeholder</p>
            <div class="form-item"><input type="text" placeholder="Placeholder Text" /></div>
           </div>
           <div class="form-row">
            <p class="form-label">Read-only field</p>
            <div class="form-item"><input type="text" value="This field cannot be changed" readonly="readonly" /></div>
           </div>
           <div class="form-row">
            <p class="form-label">Disabled field</p>
            <div class="form-item"><input type="text" disabled="disabled" /></div>
           </div>
           <div class="form-row">
            <p class="form-label">Iphone style checkbox</p>
            <input checked type="checkbox" id="iphone-check" />
           </div>
          <div class="clear"></div>
        </div>
      </div>

      <div class="box grid_6">
        <div class="box-head"><h2>Select Inputs</h2></div>
        <div class="box-content">
           <div class="form-row">
             <label class="form-label">Select Dropdown</label>
             <div class="form-item">
               <select>
                 <option value='option1'>Option 1</option>
                 <option value='option2'>Option 2</option>
                 <option value='option3'>Option 3</option>
                 <option value='option4'>Waldo was here</option>
               </select>
             </div>
           </div>
           <div class="form-row">
             <label class="form-label">Datepicker</label>
             <div class="form-item">
               <input type="text" id="datepicker" />
               <span class="form-icon fugue-2 calendar-day"></span>
             </div>
           </div>
           <div class="form-row">
             <label class="form-label">Color Picker</label>
             <div class="form-item">
               <input type="text" id="colorpicker" />
               <span class="form-icon fugue-2 color"></span>
             </div>
           </div>
           <div class="form-row">
             <label class="form-label">File Upload</label>
             <div class="form-item file-upload">
               <input />
               <input class="filebase" type="file" />
               <span class="form-icon fugue-2 control-eject"></span>
             </div>
           </div>
           <div class="form-row">
             <label class="form-label">Radio Buttons</label>
             <input name='rgroup' type='radio' value='radio1' />
             <input checked='checked' name='rgroup' type='radio' value='radio2' />
             <input disabled='disabled' name='rgroup' type='radio' value='radio3' />
           </div>
           <div class="form-row">
             <label class="form-label">Checkboxes</label>
             <input type='checkbox' value='check1' />
             <input checked='checked' type='checkbox' value='check2' />
             <input disabled='disabled' type='checkbox' value='check3' />
           </div>
         </div>
        <div class="clear"></div>
      </div>
  </div>

<script> /* SCRIPTS */
  $(function () {
      var sin = [], cos = [];
      for (var i = 0; i < 14; i += 0.5) {
          sin.push([i, Math.sin(i)]);
          cos.push([i, Math.cos(i)]);
      }
      var plot = $.plot($("#flot-demo"),
             [ { data: sin, label: "Green", color: "#71a100"}, { data: cos, label: "Blue", color: "#308eef" } ], {
                 series: {
                     lines: { show: true },
                     points: { show: true }
                 },
                 grid: { hoverable: true },
                 yaxis: { min: -1.2, max: 1.2 }
               });
      var previousPoint = null;
      $("#flot-demo").bind("plothover", function (event, pos, item) {
          if ($("#enablePosition:checked").length > 0) {
              var str = "(" + pos.x.toFixed(2) + ", " + pos.y.toFixed(2) + ")";
              $("#hoverdata").text(str);
          }
      });
  });/* for the flot chart demo */

  $('#example').dataTable( {
      "bJQueryUI": true
  }); /* For the data tables */

  $('#iphone-check').iphoneStyle();
  $("#datepicker").datepicker();
  $("#colorpicker").ColorPicker();
  /* for the iPhone style checkbox, colorpicker and datepicker */

</script>
	

</div> <!-- fechamos geral -->		

	
	<?	$this->load->view('i_rodape_v'); ?> 
	</body>
</html>