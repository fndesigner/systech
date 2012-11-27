<? #Se não tem autorização mandamos para a pagina de login
if($this->input->cookie("sysbt_aut")!=1) {
redirect(base_url().'login','refresh');
} 
?>
<script>
$(document).ready(function () {
      
      /* GLOBAL SCRIPTS SUBMENU */
      /*abri operações */
      $('#asub_ope').hover(function () { $('.submenu').slideUp(200); }, function () { $('#sub_ope').slideDown(200); }); 
      $('#asub_ope').hover( function () { $('#sub_ope').slideDown(200); }); 
       /*abri caixa */
      $('#asub_cai').hover(function () { $('.submenu').slideUp(200);}, function () { $('#sub_cai').slideDown(200); }); 
      $('#asub_cai').hover( function () { $('#sub_cai').slideDown(200); });   
         /*abri financeiro */
      $('#asub_fin').hover(function () { $('.submenu').slideUp(200);}, function () { $('#sub_fin').slideDown(200); }); 
      $('#asub_fin').hover( function () { $('#sub_fin').slideDown(200); });   

      /*Fecha submenus abertod */
      $('#asub_hom,#asub_men,#asub_age,#asub_avi,#asub_rel').hover( function () { $('.submenu').slideUp(200);}); 

   
});
</script>

<!--  menu -->
 <div class="top-bar">
      <ul id="nav">
        <li id="user-panel">
          <img src="<?= base_url(); ?>assets/tema/adminity/img/nav/usr-avatar.jpg" id="usr-avatar" alt="" />
          <div id="usr-info">
            <p id="usr-name">Bem vindo, <?= $this->input->cookie("sysbt_nome") ?>.</p>
            <p id="usr-notif">Você tem 6 notificações. <a href="#">Ver</a></p>
            <p><a href="#">Preferências</a><a href="<?= site_url("login/sair/adm");?>">Sair do sistema</a></p>
          </div>
        </li>
        <li>
        <ul id="top-nav">
         <li class="nav-item" id="asub_hom">
           <a href="<?= base_url(); ?>painel"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/inicio-active.png " alt="" /><p>Página Inicial</p></a>
         </li>
          <li class="nav-item"  id="asub_ope">
           <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/operacoes.png" alt="" /><p>Operações</p></a>
         </li>
         <li class="nav-item" id="asub_cai" >
           <a href="#"  ><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/caixa.png" alt="" /><p>Caixa</p></a>
         </li>
         <li class="nav-item" id="asub_fin">
           <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/financeiro.png" alt="" /><p>Financeiro</p></a>
         </li>
         <li class="nav-item" id="asub_men">
           <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/mensagens.png" alt="" /><p>Mensagens</p></a>
         </li>
         <li class="nav-item" id="asub_age">
           <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/agenda.png" alt="" /><p>Agenda</p></a>
         </li>
         <li class="nav-item" id="asub_avi">
           <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/avisos.png" alt="" /><p>Avisos</p></a>
         </li>
         <li class="nav-item" id="asub_rel">
           <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/relatorios.png" alt="" /><p>Relatórios</p></a>
         </li>
           <ul class="sub-nav">
            <li><a href="#">12 Columns</a></li>
            <li><a href="#">16 Columns</a></li>
          </ul>
         <li class="nav-item" id="asub_con">
           <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/config.png" alt="" /><p>Configurações</p></a>
         </li>
       </ul>
      </li>
     </ul>
  </div>
  
<div class="container_12">
     <div class="grid_12">
     <!-- SubMenu Caixa --> 
      <div class="submenu" id="sub_cai" >
      <ul>
	  <li class="nav-item1"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/vendas.png " alt="" /><p>Vendas</p></a> </li>
	  <li class="nav-item1"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/lancamentos.png " alt="" /><p>Lançamentos</p></a> </li>
	  <li class="nav-item1"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/abrir.png " alt="" /><p>Abrir Caixa</p></a> </li>
   		<li class="nav-item1"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/fechar.png " alt="" /><p>Fechar Caixa</p></a> </li>
      		</ul>
   
   </div><!-- submenu -->
   <!-- SubMenu operações --> 
      <div class="submenu" id="sub_ope">
      <ul>
	  <li class="nav-item1"> <a href="<?= base_url(); ?>relatorios/os"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/os.png " alt="" /><p>OS</p></a> </li>
	  <li class="nav-item1"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/clientes.png " alt="" /><p>Clientes</p></a> </li>
   	   <li class="nav-item1"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/produtos.png " alt="" /><p>Produtos</p></a> </li>
   		<li class="nav-item1"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/fornecedores.png " alt="" /><p>Fornecedores</p></a> </li>
   			<li class="nav-item1"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/usuarios.png " alt="" /><p>Usuários</p></a> </li>
   			<li class="nav-item1"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/marcas.png " alt="" /><p>Marcas</p></a> </li>

   		</ul>
      </div><!-- submenu -->  
   		
   		<!-- SubMenu Financeiro --> 
      <div class="submenu" id="sub_fin">
      <ul>
   			<li class="nav-item1"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/pagar.png " alt="" /><p>Contas a Pagar</p></a> </li>
   			<li class="nav-item1"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/receber.png " alt="" /><p>Contas a Receber</p></a> </li>
  			<li class="nav-item1"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/pagamento.png " alt="" /><p>Condições de Pagamento</p></a> </li>
   		</ul>
   
   </div><!-- submenu -->    
    
</div><!-- grid_12 -->
 </div><!-- container 12 -->
<!--  submenu -->
<!--
<div id="box_menu">
<div id="menu_texto">
<div id="bg_menu">
<ul>
<li><a href="<?= site_url("painel");?>" >Início</a></li>
<li><a href="<?= site_url("cadastro/os/buscar_cliente");?>" >Nova OS</a></li>
<li><a href="<?= site_url("cadastro");?>" >Cadastros</a></li>
<li><a href="<?= site_url("relatorios");?>" >Relatórios</a></li>
<li><a href="<?= site_url("relatorios/avisos");?>" >Avisos</a></li>
<li><a href="<?= site_url("configuracoes");?>" >Configurações</a></li>
<li><a href="<?= site_url("login/sair/adm");?>" >Sair - <?= $this->input->cookie("sysbt_nome") ?></a></li>
</ul>
</div>
</div>
</div>
-->