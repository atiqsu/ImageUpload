<?php 
/*
 * 实现图片文件的上传浏览和下载功能
 * @author zhang
 * @time 2012-08-10
 */
?>


<html>
<head><title>图片上传和下载</title></head>

<body>
<!-- 上传表单中的发送方式必须为post 类型必须为enctype="multipart/form-data" -->
<h2>图片的上传和下载</h2>
<form enctype="multipart/form-data" action="doupload.php"  method="post">
上传图片：<input type="file" name="pic"/>
<input type="submit" value="上传"/>

</form>

<table width="500" border="1">

<tr>
<th>序号</th><th>图片</th><th>添加时间</th><th>操作</th>
</tr>

<?php 
  $dir = opendir("./uploads");
	
	while($f = readdir($dir)){
		if($f!="." && $f!=".."){
		$i++;
		echo "<tr>";
		
		echo "<td>{$i}</td>";
		echo "<td><img src='./uploads/{$f}' width='150' height='150'/></td>";
		echo "<td>".date("Y-m-d H:i:s",filectime("./uploads/".$f))."</td>";
		echo "<td><a href='./uploads/{$f}'>查看</a>&nbsp;<a href='download.php?name={$f}'>下载</a></td>";
		
		echo "</tr>";
	}
	}
	closedir($dir);
?>

</table>
</body>

</html>
