<?php

    $pack = json_decode('["https:\/\/i.imgur.com\/iOSubga.jpg","https:\/\/i.imgur.com\/5o8NmFd.jpg","https:\/\/i.imgur.com\/V24AbGf.jpg","https:\/\/i.imgur.com\/wvHCAAy.jpg","https:\/\/i.imgur.com\/I61PVJR.jpg","https:\/\/i.imgur.com\/fRGbvQW.jpg","https:\/\/i.imgur.com\/DN7PB1a.jpg","https:\/\/i.imgur.com\/HfnbD5U.jpg","https:\/\/i.imgur.com\/wRoH9x8.jpg","https:\/\/i.imgur.com\/kE1t5W9.jpg","https:\/\/i.imgur.com\/Bd58zSX.jpg","https:\/\/i.imgur.com\/NCVzisD.jpg","https:\/\/i.imgur.com\/RgEjDGi.jpg","https:\/\/i.imgur.com\/eJUFLjj.jpg","https:\/\/i.imgur.com\/D2AlszA.jpg","https:\/\/i.imgur.com\/NDyjIeO.jpg","https:\/\/i.imgur.com\/fH6jXJz.jpg","https:\/\/i.imgur.com\/XKhm3Sy.jpg","https:\/\/i.imgur.com\/dlGBpWX.jpg","https:\/\/i.imgur.com\/s1TydeL.jpg","https:\/\/i.imgur.com\/CMky6Ot.jpg","https:\/\/i.imgur.com\/3cSBTq2.jpg","https:\/\/i.imgur.com\/bemXqik.jpg","https:\/\/i.imgur.com\/3js8sFn.jpg","https:\/\/i.imgur.com\/lFnWZ0Q.jpg","https:\/\/i.imgur.com\/9jEjwJE.jpg","https:\/\/i.imgur.com\/n5cDv7J.jpg","https:\/\/i.imgur.com\/s1E0sNK.jpg","https:\/\/i.imgur.com\/gV226Ze.jpg","https:\/\/i.imgur.com\/UuQBhrI.jpg","https:\/\/i.imgur.com\/dRmZQ4j.jpg","https:\/\/i.imgur.com\/JDo9vFg.jpg","https:\/\/i.imgur.com\/dxUoswo.jpg","https:\/\/i.imgur.com\/CyUgDAO.jpg"]');


    $users =
        [
            "martin" =>
                [
                    "key"=>"390023239",
                    "user"=>"martin_vega",
                    "pass"=>"isuzu98",
                    "picture"=>"https://clanbb4l.com/wp-content/themes/blackfyre/img/defaults/default-profile.jpg"
                ],
            "k3dev" =>
                [
                    "key"=>"3",
                    "user"=>"michelle",
                    "pass"=>"xssposed",
                    "picture"=>"http://graph.facebook.com/100001026874667/picture?width=500"
                ],
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
      $pic = "https://clanbb4l.com/wp-content/themes/blackfyre/img/defaults/default-profile.jpg";
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
