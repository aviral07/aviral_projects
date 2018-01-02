<html>
<head>
<title>Viewing Records in Php</title>
</head>
<body>
<table align='center' width='1000' border='5'>
<tr>
<td colspan='20' align='center' bgcolor="lime" >
<h1>Viewing All the Records</h1>
</td>
</tr>
<tr align='center'>
<th>Serial No.</th>
<th>Student's name</th>
<th>Father's Name</th>
<th>School Name</th>
<th>Roll No</th>
<th>Class</th>
<th>Delete</th>
<th>Edit</th>
<th>Details</th>
</tr>
<tr >
<?php
$con=mysql_connect("localhost:3306","root","");
mysql_select_db("student_db",$con);
$que="select * from student";
$run=mysql_query($que);
while($row=mysql_fetch_array($run))
{
	$u_id=$row[0];
	$u_name=$row[1];
	$u_father=$row[2];
	$u_school=$row[3];
	$u_roll=$row[4];
	$u_class=$row[5];
	?>
	<td ><?php echo $u_id ?></td>
	<td> <?php echo $u_name ?></td>
	<td><?php echo $u_father ?></td>
	<td><?php echo $u_school ?></td>
	<td><?php echo $u_roll ?></td>
	<td><?php echo $u_class ?></td>
	<td><a href= "delete.php?del=<?php echo $u_id; ?>">Delete</td>
	<td>Edit</td>
	<td>Details</td>
	</tr>
	<?php } ?>



</table>
</body>

</html>