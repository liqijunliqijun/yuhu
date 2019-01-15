<?php
	header("Content-type:text/html;charset=utf-8");
	
	//一、接收数据
	$querystr = $_GET['querystr'];
	
	//二、从数据库中查询
	$conn = mysql_connect("localhost","root","root");
	if(!$conn){
		//die("连接失败".mysql_error());
		//三、响应
	}else{
		//2、选择数据库
		mysql_select_db("mysqle",$conn);
		
		//3、执行SQL语句

		$sqlstr="select * from  shop where shopname like '%$querystr%'";
		$result = mysql_query($sqlstr,$conn);		
		//4、关闭数据库
		mysql_close($conn);
		
		$str="[";
		$query_row = mysql_fetch_array($result);//游标下移,拿出结果集中的某一行，返回值是拿到的行；
		while($query_row){
			$str = $str.'{"id":"'.$query_row[0].'","shopname":"'.$query_row[1].'","address":"'.$query_row[2].'","phone":"'.$query_row[3].'","img":"'.$query_row[4].'"}';
			$query_row = mysql_fetch_array($result);//下移
			if($query_row){	
				$str = $str.",";
			}
		}
		$str = $str."]";
		echo $str;
	}
?>