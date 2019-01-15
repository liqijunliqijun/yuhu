
<?php
	//1、接收数据
//	$musicname = $_GET['musicname'];
	
	//1）、搭桥（连接数据库）
	$conn = mysql_connect("localhost","root","root");
	if(!$conn){
		die("数据库连接失败：".mysql_error());
	}else{
		//2）、选择目的地（选择操作的数据库）
		mysql_select_db("mysqle",$conn);
		//3）、运输数据（执行SQL语句，传输数据）
		$sqlstr="select sayer,sayContent,sayTime from chat ";
//		if($musicname!=null){
//			$sqlstr=$sqlstr." where musicname like '%".$musicname."%'";
//		}else{
//			$sqlstr=$sqlstr." where 1=0 ";
//		}
//		echo $sqlstr;
		$result = mysql_query($sqlstr,$conn);//$result是个类似于表格的对象。
	 	//4）、拆桥（关闭数据库）
		mysql_close($conn);
		
		//3、响应
		$str="[";	
	 	//拿出表格的第一
	 	$row = mysql_fetch_array($result);
	 	while($row){
	 		$str = $str.'{"sayer":"'.$row[0].'","sayContent":"'.$row[1].'","sayTime":"'.$row[2].'"}';
	 		$row = mysql_fetch_array($result);
	 		if($row){
	 			$str=$str.",";
	 		}
	 	}
	 	$str = $str."]";
	 	echo $str;		
	}
?>
