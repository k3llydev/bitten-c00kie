<?php

if(empty($_GET['id'])){
  echo "No id provided";
  exit;
}

$profile_url = $_GET["id"];
 function get_web_page( $url, $str )
    {
        $user_agent='Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';
        $options = array(
            CURLOPT_CUSTOMREQUEST  =>"POST",        //set request type post or get
            CURLOPT_POST           =>true,        //set to GET
            CURLOPT_USERAGENT      => $user_agent, //set user agent
            CURLOPT_COOKIEFILE     =>"cookie.txt", //set cookie file
            CURLOPT_COOKIEJAR      =>"cookie.txt", //set cookie jar
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
            CURLOPT_POSTFIELDS     => "url=".$str
        );
        $ch      = curl_init( $url );
        curl_setopt_array( $ch, $options );
        $content = curl_exec( $ch );
        $err     = curl_errno( $ch );
        $errmsg  = curl_error( $ch );
        $header  = curl_getinfo( $ch );
        curl_close( $ch );
        $header['errno']   = $err;
        $header['errmsg']  = $errmsg;
        $header['content'] = $content;
        return $header;
    }

/*Getting user id */
$url = 'https://findmyfbid.com/?__amp_source_origin=https%3A%2F%2Ffindmyfbid.com';

$result = get_web_page($url,$profile_url);


header("Content-Type: image/jpeg");
if( $result['content'] === "[]" ){
  $image = "http://nationalminimumwage.co.za/wp-content/uploads/2015/04/default-user-icon-profile.png";
}else{
  $image = "http://graph.facebook.com/".json_decode($result['content'])->id."/picture?width=300";
}

echo file_get_contents($image);





?>
