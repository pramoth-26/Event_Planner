<html>
<body bgcolor=skyblue><center>
<h1 style="background-color:white;">DELETE COLUMN</h1>
<form name="form1" action="delete.php" method="POST">
<table>
<tr>
    <td>ROLL NO</td>
    <td><input type="number" name="rollno"></td>
</tr>

</table>
<br><input type="submit" value="DELETE" name="submit">

<?php
if(isset($_POST["submit"]))
{
require("connection.php");

@$rollno=$_POST["rollno"];




$sql = "DELETE FROM reg WHERE rollno='$rollno' ";

if ($conn->query($sql) === TRUE) 
    {
        echo "Record deleted successfully";
    } 
else 
    {
        echo "Error deleting record: " . $conn->error;
    }
    
$conn->close();
}
echo "<br><br><a href='webpage.html'><img src=icon.png width=100 height=50></a>";
?>
