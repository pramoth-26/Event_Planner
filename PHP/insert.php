<html>
<body bgcolor=skyblue><center>
<h1 style="background-color:white;">INSERT YOUR DATA</h1>
<form name="form1" action="insert.php" method="POST">
<table>
<tr>
    <td>ROLL NO</td>
    <td><input type="number" name="rollno"></td>
</tr>
<tr>
    <td>NAME</td>
    <td><input type="text" name="name"></td>
</tr>
<tr>
    <td>PHP</td>
    <td><input type="text" name="php"></td>
</tr>
<tr>
    <td>JAVA</td>
    <td><input type="text" name="java"></td>
</tr>
<tr>
    <td>DBMS</td>
    <td><input type="text" name="dbms"></td>
</tr>
<td colspan="2" align="center">
   <br><br> <input type="submit" name="submit" value="insert"></td>
</tr>
</table>
</form>
</body>
</html>



<?php
if(isset($_POST["submit"]))
{
require("connection.php");
$sql="insert into reg values('$_POST[rollno]','$_POST[name]','$_POST[php]','$_POST[java]','$_POST[dbms]')";

if ($conn->query($sql) === TRUE) 
  {
    echo "New record created successfully";
  } 
else 
  {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();

}
echo "<a href='webpage.html'><img src=icon.png width=100 height=50> </a>";
?>