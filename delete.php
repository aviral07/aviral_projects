<?php
$conn=mysql_connect("localhost:3306","root","");
        mysql_select_db("student",$conn);
$delete_record=$_GET['del'];
$query="delete from student where u_id=$delete_record";
if(mysql_query($query,$conn))
{
	header("Location:view.php?deleted=Record has been deleted successfully");
}

?>
