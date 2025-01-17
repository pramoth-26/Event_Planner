<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
</head>
<body>
    <center>
     <form action="" method=post enctype="multipart/form-data"><br><br>
        <table border=1 width="50%" cellpadding="5" cellspacing="5">
            <thead>
            <tr >
                <th>photo</th>
                <th>name</th>
                <th>class</th>
                <th>event</th>
            </tr>
            </thead>
            <?php
                $connection = mysqli_connect("localhost","root","");
                $db=mysqli_select_db($connection,'event');
                
  session_start();

  // Check if the session variable exists
  if (isset($_SESSION['username'])) {
      $username = $_SESSION['username'];
    //   $sql = "INSERT INTO $username VALUES('$_POST[name]','$_POST[rollno]','$_POST[class]','$_POST[mobno]','$_POST[event]','$uploadFile','$_POST[idcard]','$_POST[tid]','$_POST[tslip]')";
    $query = "select name,class,event,photo from $username";
                $query_run = mysqli_query($connection,$query);

                while($row = mysqli_fetch_array($query_run))
                {
                    ?>
                    <tr>
                    <td >
                            <img src="<?php echo htmlspecialchars($row['photo'], ENT_QUOTES, 'UTF-8'); ?>" alt="Image" style="width:100px; height:100px;">
        </td>
                         
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['class']; ?></td>
                        <td><?php echo $row['event']; ?></td>
                    </tr>

                    <?php
                }
           
    // if ($conn->query($query) === TRUE) {
    //     echo "<script>alert('Sign up successful!')</script>";
    //     }
    // else 
    // {
    //     echo "Error: " . $conn->error;
    // }
  } else {
      echo "<h1>No session data found.</h1>";
  }
  
  ?>
        </table><br>
                            
        <button type="submit" name=print class="btn btn-default btn-primary" onclick="window.print()">Print</button>
        <button type="submit" name=home class="btn btn-default btn-primary" >Home</button>
     </form>
    </center>

    
</body>
</html>

<?php

if (isset($_POST['home'])) {
  require("connections.php");
  header("Location: details.php");
				
}
?>
