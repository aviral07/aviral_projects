<html>
<head> <title> Student's Registration </title>
</head> 
<body>
<form method="post" action="data_transfer.php">
<table width='500' border="3" align='center'>
<tr>
    <th bgcolor='cyan' colspan='5'>Student Registration</th>
</tr>
<tr>  
   <td align='right' bgcolor='yellow'>Students's Name:</td>
   <td><input type='text' name='user_name'></td>
</tr>  
<tr>  
   <td align='right'bgcolor='yellow'>Fathers's Name:</td>
   <td><input type='text' name='father_name'></td>
</tr>  
<tr>  
   <td align='right'bgcolor='yellow'>School's Name:</td>
   <td><input type='text' name='school_name'></td>
</tr>  
<tr>  
   <td align='right'bgcolor='yellow'>Roll No:</td>
   <td><input type='text' name='roll_no'></td>
</tr>   
<tr>
    <td align='right'bgcolor='yellow'>Class:</td>
	<td>
	<select name='student_class'>
	<option value='null'>Select class</option>
	<option value='10th'>10th</option>
	<option value='9th'>9th</option>
	</select>
	</td>
</tr>
<tr>
 <td  align='center' colspan='6'>
   <input bgcolor='cyan' type='submit' name='submit' value='submit'>
  </td>
</tr>  
</table>	
</form>
</body>
</html>