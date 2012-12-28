<?php 
  //1、获取要下载图片名加路径
	
	  $file = "./uploads/".$_GET["name"];
	
	//2、重设响应类型
	
	  $info = getimagesize($file);
	  header("Content-Type:".$info["mime"]);


	//3、执行下载的文件名
	  header("Content-Disposition:attachment;filename=".$_GET["name"]);

	//4、指定文件的大小
	
	  header("Content-Length".filesize($file));
	
	//5、响应内容
	  readfile($file);


?>
