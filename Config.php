<?php

    $pack = []; // Array of images randomly used to show in the trick


    $users = // Add users here, this stays private tho
        [
            "username" =>
                [
                    "key"=>"0123456789",
                    "user"=>"example_user",
                    "pass"=>"example_user_password",
                    "picture"=>"picture_of_user"
                ]
        ];

    function keyExists($key){
        global $users;
        $e = false;
        foreach($users as $u){
            if($u["key"]===$key){
                $e = true;
            }
        }
        return $e;
    }

    function login($u,$p){
      global $users;
      $login = false;
      foreach($users as $l){
        if( $l["user"] === $u && $l["pass"] === $p ){
          return true;
        }
      }
      return $login;
    }

    function getUserPicture($user){
      global $users;
      $pic = "default picture url";
      foreach($users as $ux){
        if($ux['user'] === $user){
          $pic = $ux['picture'];
        }
      }
      return $pic;
    }

    function getUserKey($user){
      global $users;
      $key = "";
      foreach($users as $ux){
        if($ux['user'] === $user){
          $key = $ux['key'];
        }
      }
      return $key;
    }

?>
