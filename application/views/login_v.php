<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login - SYSTECH</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="shortcut icon" href="<?=base_url() ?>/assets/tema/adminity/favicon.gif">
  <?	$this->load->view('head'); ?>
  <!---CSS Files-->
  <link rel="stylesheet" href="<?=base_url() ?>/assets/tema/adminity/css/login.css">
  <!---jQuery Files-->
  <script src="<?=base_url() ?>/assets/tema/adminity/js/jquery.spinner.js"></script>
  <script type="text/javascript" src="<?=base_url() ?>/assets/tema/adminity/js/forms/jquery.validate.min.js"></script>
  <!---Fonts-->

  <![endif]-->
    <!---FadeIn Effect, Validation and Spinner-->
  <script>
    $(document).ready(function () {
       $('div.wrapper').hide();
        $('div.wrapper').fadeIn(1200);
        $('#lg-form').validate();
        $('.submit').click(function() {
        var $this = $(this);
        $this.spinner();
        setTimeout(function() {
                $this.spinner('remove');
        }, 1000);
       });
    });
  </script>
</head>
<body>
	<div class="wrapper">
		<div class="logo">
	 	<h1>BEM VINDO!</h1>
	 </div>
   <div class="lg-body">
     <div class="inner">
       <div id="lg-head">
         <p><span class="font-bold">PAINEL ADMINISTRADOR</span></p>
         <div class="separator"></div>
       </div>
       <div class="login">
         <form id="lg-form" method="post" action="<?= base_url().'login/painel' ?>">
           <fieldset>
              <ul>
                 <li id="usr-field">
                  <input class="input required" name="email" type="text" size="26" minlength ="1" placeholder="Usuário…" />
                  <span id="usr-field-icon"></span>
                 </li>
                 <li id="psw-field">
                  <input class="input required" name="senha" type="password" size="26" minlength="1" placeholder="Senha…" />
                  <span id="psw-field-icon"></span>
                 </li>
                
                 <li>
                  <input class="submit button green" type="submit" value="ENTRAR"/> 
                 </li>
              </ul>
           </fieldset>
          </form>
          <span id="lost-psw">
           <a href="#">Esqueci minha senha</a>
          </span>
        </div>
     </div>
    </div>
	</div>
</body>
</html>