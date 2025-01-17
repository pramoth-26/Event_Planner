<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVENT</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="cname" placeholder="Collegename" required="required" >
					<input type="email" name="email" placeholder="Email" required="required">
          <input type="number" name="mobno" placeholder="Mobile No" required="required">
					<input type="password" name="pass" placeholder="Password" required="required">
					<button type="submit" name="submit" value="Sign up">Sign up </button>
				</form>
			</div>

			<div class="login">
				<form method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" for="loginuser" id="loginuser" name="loginuser" placeholder="College Name" required="required" id="dataInput">
					<input type="password" name="loginpass" placeholder="Password" required="required">
					<button type="submit" name="loginsubmit" value="login" >Login</button>
				</form>
			</div>
	</div>
	<script>
    function handleLogin() {
        window.location.href = "details.php";
    }
</script>
</body>
</html>


<?php
if (isset($_POST['submit'])) {
    require("connections.php");
	
    $cname = $conn->real_escape_string($_POST['cname']);
    $email = $conn->real_escape_string($_POST['email']);
    $mobno = $conn->real_escape_string($_POST['mobno']);
    $pass = $conn->real_escape_string($_POST['pass']);

    $sql = "INSERT INTO signup (cname, email, mobno, pass) VALUES ('$cname', '$email', '$mobno', '$pass')";

    if ($conn->query($sql) === TRUE) {
        // echo "<script>alert('Sign up successful!')</script>";
    } else {
        // echo "Error: " . $conn->error;
    }

    $conn->close();
}
if (isset($_POST['loginsubmit'])) {
    require("connections.php");

    $loginuser = $_POST['loginuser'];
    $loginpass = $_POST['loginpass'];

	
	$sql = "SELECT * from signup WHERE cname='$loginuser' AND pass='$loginpass' ";
	$result=mysqli_query($conn,$sql);
	$resultcheck=mysqli_num_rows($result);
	if($resultcheck>0)
	{
		// echo "<script>alert('Faggggiled!')</script>";
		$sql="create table if not exists $loginuser (name varchar(25),rollno varchar(20),class varchar(20),mobno int(12),event varchar(30),photo BLOB,idcard BLOB,tid varchar(30),tslip BLOB)";
		if ($conn->query($sql) === TRUE) 
		  {
		    // echo "<script>alert('Table Created')</script>";
		  } 
		else 
		  {
		    // echo "Error: " . $sql . "<br>" . $conn->error;
		  }

		  $sql="create table if not exists data (college varchar(100),name varchar(25),rollno varchar(20),class varchar(20),mobno int(12),event varchar(30),photo BLOB,idcard BLOB,tid varchar(30),tslip BLOB)";
		  if ($conn->query($sql) === TRUE) 
			{
			//   echo "<script>alert('Table Created')</script>";
			} 
		  else 
			{
			//   echo "Error: " . $sql . "<br>" . $conn->error;
			}
		  session_start();
				// Set a session variable
				$_SESSION['username'] = "$loginuser";
				// Redirect to the second page
				header("Location: details.php");
				exit();
	}
	else{
		echo "<script>alert('Failed!')</script>";
	}
	
    $conn->close();

	
}
?>

