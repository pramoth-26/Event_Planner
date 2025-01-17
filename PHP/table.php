<html>
<body bgcolor=skyblue>
  <center><h1 style="background-color:white;">TABLE DATAS</h1>
<?php
require("connection.php");

$sql = "SELECT * FROM reg";

echo "<br><table border=2 cellspacing=5 cellpadding=10>";
      echo "<br><tr align=center><th rowspan=2>Rollno<th rowspan=2>NAME<th colspan=3>MARK</tr>";
      echo "<br><tr align=center><th>PHP<th>JAVA<th>DBMS</tr>";

if ($result = $conn->query($sql)) 
{
  // output data of each row
  while($row = $result->fetch_assoc()) 
  {
      $f1=$row["rollno"];
      $f2=$row["name"];
      $f3=$row["php"];
      $f4=$row["java"];
      $f5=$row["dbms"];

      
      echo "<tr align=center><th>$f1<td>$f2<td>$f3<td>$f4<td>$f5</tr>";
      
      /*echo "<br>ROLLNO:".$f1;
      echo "<br>NAME:".$f2;
      echo "<br>PHP:".$f3;
      echo "<br>JAVA:".$f4;
      echo "<br>DBMS:".$f5;*/
      
        }
} 
else 
{
  echo "0 results";
}
echo "</table>";
echo "<br><br><a href='webpage.html'><img src=icon.png width=100 height=50></a>";

$conn->close();
?>