<?php
function listDir($dir)
{
	if(is_dir($dir))
   	{
     	if ($dh = opendir($dir)) 
		{
        	while (($file = readdir($dh)) !== false)
			{
     			if((is_dir($dir."/".$file)) && $file!="." && $file!="..")
				{
     				echo "<br>",$file,"<br><hr>";
     				listDir($dir."/".$file."/");
     			}
				else
				{
         			if($file!="." && $file!=".." )
					{
						$mid = explode(".", $file);
						$res = end($mid);
						if ($res=="bak" || $res=="php")
						{
							echo $file."<br>";
						}
      				}
     			}
        	}
        	closedir($dh);
     	}
   	}
}
listDir("C:/phpStudy");
?>