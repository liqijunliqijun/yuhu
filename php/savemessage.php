
<?php
	date_default_timezone_set("Asia/Shanghai");
	//1、接收数据
	$sayer = $_POST['sayer'];
	$sayContent = $_POST['sayContent'];
	//1）、搭桥（连接数据库）
	$conn = mysql_connect("localhost","root","root");
	if(!$conn){
		die("数据库连接失败：".mysql_error());
	}else{
		//2）、选择目的地（选择操作的数据库）
		mysql_select_db("mysqle",$conn);
		//3）、运输数据（执行SQL语句，传输数据）
		$date=date_create(null);
		$str = date_format($date,"Y-m-d");
		$sqlstr="insert into chat(sayer,sayContent,sayTime) values('".$sayer."','".$sayContent."','".$str."')";
		echo $sqlstr;
		mysql_query($sqlstr,$conn);
	 	//4）、拆桥（关闭数据库）
		mysql_close($conn);
		
		//3、响应
	}
?>
