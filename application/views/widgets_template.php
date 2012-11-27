<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Adminity - Widgets</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="shortcut icon" href="favicon.gif">
 <?	$this->load->view('head'); ?>   
</head>
<body>
<!--- HEADER -->
<div class="header">
   <a href="dashboard.html"><img src="img/logo.png" alt="Logo" /></a> 
   <div class="styler">
     <ul class="styler-show">
       <li><div id="colorSelector-top-bar"></div></li>
       <li><div id="colorSelector-box-head"></div></li>
     </ul>
   </div>
  </div>

  <div class="top-bar">
      <ul id="nav">
        <li id="user-panel">
          <img src="img/nav/usr-avatar.jpg" id="usr-avatar" alt="" />
          <div id="usr-info">
            <p id="usr-name">Welcome back, Michael.</p>
            <p id="usr-notif">You have 6 notifications. <a href="#">View</a></p>
            <p><a href="#">Preferences</a><a href="#">Profile</a><a href="index.html">Log out</a></p>
          </div>
        </li>
        <li>
        <ul id="top-nav">
         <li class="nav-item">
           <a href="dashboard.html"><img src="img/nav/dash.png" alt="" /><p>Dashboard</p></a>
         </li>
         <li class="nav-item">
           <a href="analytics.html"><img src="img/nav/anlt.png" alt="" /><p>Analytics</p></a>
         </li>
         <li class="nav-item">
           <a href="tables.html"><img src="img/nav/tb.png" alt="" /><p>Tables</p></a>
         </li>
         <li class="nav-item">
           <a href="calendar.html"><img src="img/nav/cal.png" alt="" /><p>Calendar</p></a>
         </li>
         <li class="nav-item">
           <a href="#"><img src="img/nav/widgets-active.png" alt="" /><p>Widgets</p></a>
         </li>
         <li class="nav-item">
           <a href="grid.html"><img src="img/nav/grid.png" alt="" /><p>Grid</p></a>
           <ul class="sub-nav">
            <li><a href="#">12 Columns</a></li>
            <li><a href="#">16 Columns</a></li>
          </ul>
         </li>
         <li class="nav-item">
           <a href="filemanager.html"><img src="img/nav/flm.png" alt="" /><p>File Manager</p></a>
         </li>
         <li class="nav-item">
           <a href="gallery.html"><img src="img/nav/gal.png" alt="" /><p>Gallery</p></a>
         </li>
         <li class="nav-item">
           <a href="icons.html"><img src="img/nav/icn.png" alt="" /><p>Icons</p></a>
         </li>
         <li class="nav-item">
           <a href="#"><img src="img/nav/err.png" alt="" /><p>Error Pages</p></a>
           <ul class="sub-nav">
            <li><a href="403.html">403 Page</a></li>
            <li><a href="404.html">404 Page</a></li>
            <li><a href="503.html">503 Page</a></li>
          </ul>
         </li>
         <li class="nav-item">
           <a href="typography.html"><img src="img/nav/typ.png" alt="" /><p>Typography</p></a>
         </li>
       </ul>
      </li>
     </ul>
  </div>

  <!--- CONTENT AREA -->

  <div class="content container_12">
    <div class="ad-notif-success grid_12 small-mg"><p>Success Notification</p></div>
    <div class="ad-notif-error grid_12 small-mg"><p>Error Notification</p></div>
    <div class="ad-notif-warn grid_12 small-mg"><p>Warning Notification</p></div>
    <div class="ad-notif-info grid_12"><p>Informative Notification</p></div>
     <div class="box grid_6">
       <div class="box-head"><h2>Sliders</h2></div>
       <div class="box-content sliders">
         <ul id="widget-list">
           <li class="grid_12"><div id="slider"></div></li>
           <li class="grid_12"><div id="range-slider"></div></li>
           <li id="eq" class="grid_12">
              <span>75</span>
              <span>50</span>
              <span>25</span>
              <span>0</span>
              <span>25</span>
              <span>50</span>
              <span>75</span>
           </li>
         </ul>
       </div>
     </div>

     <div class="box grid_6">
       <div id="accordion">
        <h3><a href="#1">Accordion</a></h3>
        <div>
          <p>
          Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
          ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
          amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
          odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
          </p>
        </div>
        <h3><a href="#2">Section 2</a></h3>
        <div>
          <p>
          Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
          purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
          velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
          suscipit faucibus urna.
          </p>
        </div>
        <h3><a href="#3">Section 3</a></h3>
        <div>
          <p>
          Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
          Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
          ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
          lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
          </p>
          <ul>
            <li>List item one</li>
            <li>List item two</li>
            <li>List item three</li>
          </ul>
        </div>
        <h3><a href="#4">Section 4</a></h3>
        <div>
          <p>
          Cras dictum. Pellentesque habitant morbi tristique senectus et netus
          et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
          faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
          mauris vel est.
          </p>
          <p>
          Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
          Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
          inceptos himenaeos.
          </p>
        </div>
       </div>
     </div>

     <div class="sm-box grid_12">
      <span><h2>Progress Bar</h2>
       <div id="progressbar"></div>
      </span>
     </div>  

     <div class="sm-box grid_12">
       <span>
         <h2>Small Buttons</h2>
         <input type="button" class="button small green" value="Green">
         <input type="button" class="button small red" value="Red">
         <input type="button" class="button small blue" value="Blue">
         <input type="button" class="button small orange" value="Orange">
         <input type="button" class="button small purple" value="Purple">
         <input type="button" class="button small yellow" value="Yellow">
         <input type="button" class="button small black" value="Black">
         <input type="button" class="button small grey" value="Grey">
         <input type="button" class="button small grey disabled" value="Disabled">
       </span>
     </div>

     <div class="sm-box grid_12">
       <span>
         <h2>Normal Buttons</h2>
          <input type="button" class="button green" value="Green">
          <input type="button" class="button red" value="Red">
          <input type="button" class="button blue" value="Blue">
          <input type="button" class="button orange" value="Orange">
          <input type="button" class="button purple" value="Purple">
          <input type="button" class="button yellow" value="Yellow">
          <input type="button" class="button black" value="Black">
          <input type="button" class="button grey" value="Grey">
          <input type="button" class="button grey disabled" value="Disabled">
       </span>
     </div>

     <div class="sm-box grid_12">
       <span>
         <h2>Big Buttons</h2>
          <input type="button" class="button big green" value="Green">
          <input type="button" class="button big red" value="Red">
          <input type="button" class="button big blue" value="Blue">
          <input type="button" class="button big orange" value="Orange">
          <input type="button" class="button big purple" value="Purple">
          <input type="button" class="button big yellow" value="Yellow">
          <input type="button" class="button big black" value="Black">
          <input type="button" class="button big grey" value="Grey">
          <input type="button" class="button big grey disabled" value="Disabled">
       </span>
     </div>

     <div class="sm-box grid_4">
      <span>
        <h2>Tooltips</h2>
         <input type="button" id="tip-left" class="button green" value="Left">
         <input type="button" id="tip-top" class="button red" value="Top">
         <input type="button" id="tip-right" class="button blue" value="Right">
         <input type="button" id="tip-bottom" class="button orange" value="Bottom">
       </span>
     </div>
     <div class="sm-box grid_4">
      <span>
       <h2>Dialogs</h2>
         <input type="button" id="open-dialog" class="button green" value="Open dialog">
         <input type="button" id="open-modal-dialog" class="button blue" value="Open modal dialog">
       </span>
     </div>
     <div class="sm-box grid_4">
      <span>
        <h2>Notifications</h2>
         <input type="button" id="open-notif" class="button green" value="Simple notification">
         <input type="button" id="open-comp-notif" class="button blue" value="Complex notification">
       </span>
     </div>

     <div id="dialog" title="Sample Dialog">
       <p>This is a sample dialog box.<br><br>
       Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
       quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
       consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
       cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
       proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
       </p>
     </div>
     <div id="modal-dialog" title="Sample Modal Dialog">
       <p>This is a sample modal dialog. The dark overlay for the rest of the page makes it stand out 
       more than a normal dialog.<br><br>
       Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
       quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
       consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
       cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
       proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
       </p>
     </div>

     <div class="box grid_6">
       <div id="tabs">
        <ul>
          <li><a href="#tabs-1">Lorem</a></li>
          <li><a href="#tabs-2">Ipsum</a></li>
          <li><a href="#tabs-3">Dolor sit amet</a></li>
        </ul>
        <div id="tabs-1">
          <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
        </div>
        <div id="tabs-2">
          <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
        </div>
        <div id="tabs-3">
          <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
          <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
        </div>
       </div>
     </div>  

     <div class="box grid_6">
       <div class="box-head"><h2>Syntax Highlighter</h2></div>
       <div class="box-content no-pad">
         <pre class="brush: xml">
           <div class="box grid_6">
             <div class="box-head"><h2>Syntax Highlighter</h2></div>
             <div class="box-content">
               This is the code for creating an Adminity box like this one.
               All box content goes in here
             </div>
           </div>
         </pre>
       </div>
     </div>

  </div>

<div class="footer container_12">
  <p class="grid_12">Powered by Adminity Administration Interface</p>
</div>

<script> /* SCRIPTS */

$(function() {

  $('#tip-left').tipTip({attribute: "value", delay: "100", defaultPosition: "left"});
  $('#tip-top').tipTip({attribute: "value", delay: "100", defaultPosition: "top"});
  $('#tip-right').tipTip({attribute: "value", delay: "100", defaultPosition: "right"});
  $('#tip-bottom').tipTip({attribute: "value", delay: "100", defaultPosition: "bottom"}); 

   $('#slider').slider({
      range: "min",
      value: 50
   });

   $('#range-slider').slider({ 
      range: true, 
      min: 0,
      max: 400,
      values: [ 100, 300 ] 
   });

   $( "#eq > span" ).each(function() {
      var value = parseInt( $( this ).text(), 10 );
      $( this ).empty().slider({
        value: value,
        range: "min",
        animate: true,
        orientation: "vertical"
      });
    });

   $( "#accordion" ).accordion({ fillSpace: true });

   $( "#tabs" ).tabs();

    $("#progressbar").progressbar({
      value: 50
    });
    $("#progressbar .ui-progressbar-value").addClass("ui-corner-right");

    $( "#dialog" ).dialog({
      autoOpen: false,
      resizable: false,
      buttons: {
        Close: function() {
          $( this ).dialog( "close" );
        }
      }
    });

    $( "#open-dialog" ).click(function() {
      $( "#dialog" ).dialog( "open" );
      return false;
    });

    $( "#modal-dialog" ).dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      buttons: {
        Close: function() {
          $( this ).dialog( "close" );
        }
      }
    });

    $( "#open-modal-dialog" ).click(function() {
      $( "#modal-dialog" ).dialog( "open" );
      return false;
    });

    $('#open-notif').click(function () {
        $.sticky('I am a simple notification.')
    });

    $('#open-comp-notif').click(function () {
        $.sticky('<b>I am a complex notification.</b><br><br><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>')
    });

    SyntaxHighlighter.all();

});

</script>

</body>

</html>