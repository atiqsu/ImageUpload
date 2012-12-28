<?php 
//执行图片上传
//接收文件上传用_FILES;每个上传文件有5个信息组成

    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";

//1、获取文件上传信息
    $uploadfile = $_FILES["pic"];
	  $typelist = array("image/jpeg","image/gif");//文件类型限定
	  $path = "./uploads/";//定语一个上传后存放目录

//2、过滤上传文件错误号
	  if($uploadfile["error"]>0){
		  switch($uploadfile["error"]){
			  case 1:
				    $info = "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。 ";
				    break;
			  case 2:
				    $info = "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值";
				    break;
			  case 3:
				    $info = "文件只有部分被上传";
				    break;
			  case 4:
				    $info = "没有文件被上传";
				    break;
			  case 6:
				    $info = "找不到临时文件夹";
				    break;
			  case 7:
				    $info = "文件写入失败";
				    break;
		  }
		  die("上传文件错误，原因：".$info);
	  }

//3、本次上传文件大小的过滤
	    if($uploadfile["size"]>100000){
		    die("上传文件大小超出限制！");
	    }

//4、上传文件类型的过滤
	
	    if(!in_array($uploadfile["type"],$typelist)){
		    die("上传文件类型不正确".$uploadfile["type"]);
	    }

//5、上传后的文件名定义

	    $fileinfo = pathinfo($uploadfile["name"]);//解析上传文件名
	    do{
		    $newfile = date("YmdHis").rand(1000,9999).".".$fileinfo["extension"];
	    }while(file_exists($path.$newfile));
	
//6、执行文件上传

	    if(is_uploaded_file($uploadfile["tmp_name"])){
		    //执行文件上传（移动上传文件）
		    if(move_uploaded_file($uploadfile["tmp_name"],$path.$newfile)){
			      echo "文件上传成功";
			      echo "<a href='index.php'>返回浏览</a>";
		    }else{
			      die("上传文件失败");
		    }	
	    }else{
		    die("不是一个上传文件");
	    }


?>
