<? #Se não tem autorização mandamos para a pagina de login
if($this->input->cookie("sysbt_autC")!=1) {
redirect(base_url().'login/cliente','refresh');
} 
?>
<div id="box_menu">
<div id="menu_texto">
<div id="bg_menu">
<ul>
<li><a href="<?= site_url("painel/cliente");?>" >Início</a></li>
<li><a href="<?= site_url("cadastro/os/cliente_cad_os");?>" >Abrir Chamado</a></li>
<li><a href="<?= site_url("relatorios_cli");?>" >Ordens de Serviço</a></li>
<li><a href="<?= site_url("editar/cliente/atualizar");?>" >Atualizar cadastro</a></li>
<li><a href="<?= site_url("login/sair/cliente");?>" >Sair</a></li>
<li><a href="#" >Logado como: <?= $this->input->cookie("sysbt_nome") ?></a></li>
</ul>
</div>
</div>
</div>