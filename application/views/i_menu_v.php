<? #Se não tem autorização mandamos para a pagina de login
if($this->input->cookie("sysbt_aut")!=1) {
redirect(base_url().'login','refresh');
} 
?>

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
                  <li class="nav-item" >
           <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/operacoes.png" alt="" /><p>Operações</p></a>
           <ul class="sub-nav">
	  <li class="nav-item"> <a href="<?= base_url(); ?>relatorios/os"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/os.png " alt="" /><p>OS</p></a> </li>
	  <li class="nav-item"> <a href="<?= base_url(); ?>relatorios/clientes"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/clientes.png " alt="" /><p>Clientes</p></a> </li>
   	  <li class="nav-item"> <a href="<?= base_url(); ?>relatorios/produto"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/produtos.png " alt="" /><p>Produtos</p></a> </li>
      <li class="nav-item"> <a href="<?= base_url(); ?>relatorios/fornecedores"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/fornecedores.png " alt="" /><p>Fornecedores</p></a> </li>
   	  <li class="nav-item"> <a href="<?= base_url(); ?>relatorios/funcionarios"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/usuarios.png " alt="" /><p>Usuários</p></a> </li>
   	  <li class="nav-item"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/marcas.png " alt="" /><p>Marcas</p></a> </li>
      		</ul>
         </li>
          <li class="nav-item"  >
           <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/caixa.png" alt="" /><p>Caixa</p></a>
           <ul class="sub-nav">
	  <li class="nav-item"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/vendas.png " alt="" /><p>Vendas</p></a> </li>
	  <li class="nav-item"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/lancamentos.png " alt="" /><p>Lançamentos</p></a> </li>
	  <li class="nav-item"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/abrir.png " alt="" /><p>Abrir Caixa</p></a> </li>
   	  <li class="nav-item"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/fechar.png " alt="" /><p>Fechar Caixa</p></a> </li>
      		</ul>
         </li>
               <li class="nav-item"  >
           <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/financeiro.png" alt="" /><p>Financeiro</p></a>
           <ul class="sub-nav">
	  <li class="nav-item1"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/pagar.png " alt="" /><p>Contas a Pagar</p></a> </li>
   	  <li class="nav-item1"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/receber.png " alt="" /><p>Contas a Receber</p></a> </li>
  	  <li class="nav-item1"> <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/pagamento.png " alt="" /><p>Condições de Pagamento</p></a> </li>
      		</ul>
         </li>
         <li class="nav-item" >
           <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/mensagens.png" alt="" /><p>Mensagens</p></a>
         </li>
         <li class="nav-item" >
           <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/agenda.png" alt="" /><p>Agenda</p></a>
         </li>
         <li class="nav-item" >
           <a href="<?= base_url(); ?>relatorios/avisos"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/avisos.png" alt="" /><p>Avisos</p></a>
         </li>
         <li class="nav-item">
           <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/relatorios.png" alt="" /><p>Relatórios</p></a>
         </li>
         <li class="nav-item" >
           <a href="#"><img src="<?= base_url(); ?>assets/tema/adminity/img/nav/config.png" alt="" /><p>Configurações</p></a>
         </li>
       </ul>
      </li>
     </ul>
  </div>
