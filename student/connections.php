<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";


$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) 
  {
    die("Connection failed: " . $conn->connect_error);
  }

$sql="create database if not exists event";
// if($conn->query($sql)==TRUE)
// {
//   echo '<script>alert("Database Created")</script>';
// }
// else
// {
//     echo "<script>alert('Database not created')</script>".$conn->connect_error;
// }

mysqli_select_db($conn,'event');
// if($conn->query($sql)==TRUE)
// {
//   echo "<script>alert('Database Selected')</script>";
// }
// else
// {
//     echo "<script>alert('Database not selected')</script>".$conn->connect_error;
// }

$sql="create table if not exists signup(cname varchar(100),email varchar(30),mobno int(12),pass varchar(15))";
// if ($conn->query($sql) === TRUE) 
//   {
//     echo "<script>alert('Table Created')</script>";
//   } 
// else 
//   {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }


  ?>