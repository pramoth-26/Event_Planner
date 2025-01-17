
<?php
// Database credentials
$host = 'localhost'; // Database host
$username = 'root';  // Database username
$password = '';      // Database password
$database = 'event'; // Replace with your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to count the number of tables
$sql1 = "SELECT COUNT(*) AS table_count 
        FROM information_schema.tables 
        WHERE table_schema = '$database'";

$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // Fetch the result
    $row = $result->fetch_assoc();
    // echo "Number of tables in the database '$database': " . $row['table_count'];
    // echo $row['table_count'];
    $res=$row['table_count'];
    $clg=$res-2;
} else {
    echo "No tables found in the database.";
}

$sql2 = "SELECT COUNT(*) AS row_count FROM data"; // Replace 'your_table_name' with the table name
$resul = $conn->query($sql2);

if ($resul) {
    // Fetch the count
    $row = $resul->fetch_assoc();
    // echo "Number of rows in the table: " . $row['row_count'];
    $stud=$row['row_count'];
    $amt=$stud * 200;
} else {
    echo "Error: " . $conn->error;
}

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sales Card</title>
  <link rel="stylesheet" href="dash.css">
</head>
<body>
     <!-- Total College -->
  <div class="sales-card">
    <div class="card-header">
      <h3 >Total College</h3>
      <div class="icon">
        <img src="icons/icon8.png" alt="icon">
      </div>
    </div>
    <div class="card-content">
      <h1 name="college"><?php echo $clg; ?></h1>
      <p class="growth"><span>No of College register</span></p>
    </div>
  </div>&nbsp&nbsp&nbsp&nbsp
   <!-- Total Students -->
  <div class="sales-card">
    <div class="card-header">
      <h3>Total Students</h3>
      <div class="icon">
        <img src="icons/icon5.png" alt="icon">
      </div>
    </div>
    <div class="card-content">
      <h1 name="student"><?php echo $stud; ?></h1>
      <p class="growth">15 <span>Student per Team</span></p>
    </div>
  </div>&nbsp&nbsp&nbsp&nbsp
  <!-- Total Amount -->
  <div class="sales-card">
    <div class="card-header">
      <h3>Total Amount</h3>
      <div class="icon">
        <img src="icons/icon7.png" alt="icon">
      </div>
    </div>
    <div class="card-content">
      <h1 name="amount"><?php echo $amt; ?></h1>
      <p class="growth">200 <span>per Student</span></p>
    </div>
  </div>
</body>
</html>