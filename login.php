<?php
session_start();
require('Config.php');

  if(isset($_POST['username']) && isset($_POST['password'])){
      if( login($_POST['username'], $_POST['password']) ){
        $_SESSION['auth'] = true;
        $_SESSION['username'] = $_POST['username'];
        echo "snack('Logging you in...');setTimeout(function(){location.reload(true);},800);";
      }else{
        echo "snack('Incorrect credentials.');";
      }
  }else{
    echo "snack('Something went wrong...');'";
    var_dump($_POST);
  }

?>
