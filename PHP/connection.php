<?php
$servername = "localhost";
$username = "root";
$password = "";
#$dbname = "fmca";


$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) 
  {
    die("Connection failed: " . $conn->connect_error);
  }

$sql="create database if not exists fmca";
/*if($conn->query($sql)==TRUE)
{
  echo "Database Created";
}
else
{
    echo "Database not created".$conn->connect_error;
}*/

mysqli_select_db($conn,'fmca');
/*if($conn->query($sql)==TRUE)
{
  echo "Database Selected";
}
else
{
    echo "Database not selected".$conn->connect_error;
}*/

$sql="create table if not exists reg(rollno int(10),name varchar(10),php int(10),java int(10),dbms int(10))";
/*if ($conn->query($sql) === TRUE) 
  {
    echo "<br>Table Created";
  } 
else 
  {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }*/
  ?>