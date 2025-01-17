<html>
<body bgcolor=skyblue><center>
<h1 style="background-color:white;">UDPATE YOUR DATA</h1>
<form name="form1" action="update.php" method="POST">
<table>
<tr>
    <td>ROLL NO</td>
    <td><input type="number" name="rollno"></td>
</tr>
<tr>
    <td>NAME</td>
    <td><input type="text" name="name"></td>
</tr>
</table> 
<br><input type="submit" value="UPDATE" name="submit">

<?php
if(isset($_POST["submit"]))
{
require("connection.php");
$name=$_POST["name"];
$rollno=$_POST["rollno"];
$sql = "UPDATE reg SET name='$name' WHERE rollno='$rollno'";

if ($conn->query($sql) === TRUE) 
    {
        echo "Record updated successfully";
    } 
else 
    {
        echo "Error updating record: " . $conn->error;
    }
   
$conn->close();
}
echo "<br><br><a href='webpage.html'><img src=icon.png width=100 height=50></a>";
?>