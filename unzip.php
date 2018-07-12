<?php

header("Content-type:text/html;charset=utf-8");

function get_zip_originalsize($filename, $path) {

 if(!file_exists($filename)){

  die("non exists.");

 } 

 $starttime = explode(' ',microtime()); 

 $filename = iconv("utf-8","gb2312",$filename);

 $path = iconv("utf-8","gb2312",$path);


 $resource = zip_open($filename);

 $i = 1;


 while ($dir_resource = zip_read($resource)) {


  if (zip_entry_open($resource,$dir_resource)) {


   $file_name = $path.zip_entry_name($dir_resource);


   $file_path = substr($file_name,0,strrpos($file_name, "/"));


   if(!is_dir($file_path)){

    mkdir($file_path,0777,true);

   }


   if(!is_dir($file_name)){


    $file_size = zip_entry_filesize($dir_resource);


    if($file_size<(1024*1024*6)){

     $file_content = zip_entry_read($dir_resource,$file_size);

     file_put_contents($file_name,$file_content);

    }else{

     echo "<p> ".$i++." toobig -> ".iconv("gb2312","utf-8",$file_name)." </p>";

    }

   }


   zip_entry_close($dir_resource);

  }

 }


 zip_close($resource); 

 $endtime = explode(' ',microtime()); 

 $thistime = $endtime[0]+$endtime[1]-($starttime[0]+$starttime[1]);

 $thistime = round($thistime,3); 


}

$size = get_zip_originalsize('./master.zip','');

?>
