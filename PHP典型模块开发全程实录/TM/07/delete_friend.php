<?php session_start(); include("conn/conn.php");
$Submit=$_POST["Submit"];
if($Submit==" 删除好友 "){
    while(list($name,$value)=each($_POST)){    
       $array[]=$name;  
	   }                          //将获得的元素添加到数组中
		if(count($array)-1>0){                     //如果获得的总数-1大于0则说明有选中的删除元素 因为Submit也获得了所以需要-1            
		    for($i=1;$i<count($array);$i++){ 
			     $result=mysql_query("delete from tb_my_friend where tb_friend_id='".$array[$i]."'");    //循环删除选中的信息
			 }
			   echo "<script>alert('删除成功!'); history.back();</script>";    
		 }else{
		  echo "<script>alert('请先选择要删除的好友!');history.back();</script>";   //如果没有选择删除的文件则给出一个提示
		 }	
}
?>