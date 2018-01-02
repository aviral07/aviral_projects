<?php
$user_name=$_POST["user_name"];
$father_name=$_POST["father_name"];
$school_name=$_POST["school_name"];
$roll_no=$_POST["roll_no"];
$student_class=$_POST["student_class"];

$conn=mysql_connect("localhost:3306","root","");
if($conn==0)
{
	die("Could Not Connect:".mysql_error());
}
echo"Connected Successfully";
mysql_select_db("student_db",$conn);
		$sql="INSERT INTO student(user_name,father_name,school_name,roll_no,student_class)values('$user_name','$father_name','$school_name','$roll_no','$student_class')";
		 if( !mysql_query($sql,$conn))
		 {
            die('Could not connect: ' . mysql_error());
         }
         echo"1 record added";
         mysql_close($conn);






?>