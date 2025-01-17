<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="details.css">
    
</head>
<body>
  
    <div class="form-box">
    <form role="form" id="contact-form" method=post enctype="multipart/form-data">
    <div align=right>
    <input type="submit" name="logout" value="logout" class="btn btn-default btn-danger">
  </div>
      <h1>Student Registration Form</h1>
      <h1 id="data" ></h1>
          <br>
          <table align=center>
                <tr>
                <td><h4>Name</h4></td>
                <td><input type="text" class="form-control" id="form-name-field" value="" placeholder="Name" name=name><br></td>
              </tr>
              <tr>
                <td><h4>Roll No</h4></td>
                <td><input type="text" class="form-control" id="form-name-field" value="" placeholder="Roll No" name=rollno><br></td>
              </tr>
              <tr>
                <td><h4>Class</h4></td>
                <td><input type="text" class="form-control" id="form-name-field" value="" placeholder="Class" name=class><br></td>
              </tr>
              <tr>
                <td><h4>Mobile No</h4></td>
                <td><input type="number" class="form-control" id="form-name-field" value="" placeholder="Mobile No" name=mobno><br></td>
              </tr>
              <tr>
                <td><h4>Event</h4></td>
                <td><select class="form-control" id="form-name-field" name=event>
                    <option value="Event1">Event 1</option>
                    <option value="Event2">Event 2</option>
                    <option value="Event3">Event 3</option>
                    <option value="Event4">Event 4</option>
                    <option value="Event5">Event 5</option>
                </select><br></td>
              </tr>
              <tr>
                <td><h4>Upload Photo</h4></td>
                
                  <!-- <td><input type="file" name="photo"></td> -->
                  <td><input type="file" class="form-control" id="form-name-field" value="" placeholder="" name=photo ><br></td> 
               

             

                
              </tr>
              <tr>
                <td><h4>Upload ID Card</h4></td>
                <td><input type="file" class="form-control" id="form-name-field" value="" placeholder="" name=idcard><br></td>
              </tr>
              <tr>
                <td><h4>Transaction ID</h4></td>
                <td><input type="text" class="form-control" id="form-name-field" value="" placeholder="Transaction ID" name=tid><br></td>
              </tr>
              <tr>
                <td><h4>Transaction Slip  &nbsp &nbsp</h4></td>
                <td><input type="file" class="form-control" id="form-name-field" value="" placeholder="" name=tslip><br></td>
              </tr>
              <tr>
                <td>
                <button type="submit" class="btn btn-default btn-danger">Cancel</button>
                </td>
                <td>
                  <button type="submit" name=submit class="btn btn-default btn-success">Submit</button>
                </td>
                <td>
                  <button type="submit" name=print class="btn btn-default btn-primary">Print</button>
                </td>
              </tr>
              <tr><td>&nbsp</td></tr>
          </table>
        </form>
    </div>
    <script>

</script>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
  require("connections.php");
  // $file=addslashes(file_get_contents($_FILES["photo"]["tmp_name"]));
  // echo '<img src="$file">';

  // if(!empty($_FILES) && isset($_FILES['photo'])){
  //   $file= $_FILES['photo']['tmp_name'];
  //   echo '<img src="$file">';
  //     }

  if (!empty($_FILES) && isset($_FILES['photo'])) {
    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir1 = 'uploads/'; // Ensure this directory exists
        $uploadFile = $uploadDir1 . basename($_FILES['photo']['name']);
        if (!is_dir($uploadDir1)) {
            mkdir($uploadDir1, 0777, true); // Create directory if it doesn't exist
        }
      } else {
          echo "File upload error: " . $_FILES['photo']['error'];
      }
    } else {
      echo "No file uploaded.";
    }
    
    if (!empty($_FILES) && isset($_FILES['idcard'])) {
    if ($_FILES['idcard']['error'] === UPLOAD_ERR_OK) {
        $uploadDir2 = 'uploads/'; // Ensure this directory exists
        $uploadid = $uploadDir2 . basename($_FILES['idcard']['name']);
        if (!is_dir($uploadDir2)) {
            mkdir($uploadDir2, 0777, true); // Create directory if it doesn't exist
        }
      } else {
          echo "File upload error: " . $_FILES['idcard']['error'];
      }
    } else {
      echo "No file uploaded.";
    }
    
    if (!empty($_FILES) && isset($_FILES['tslip'])) {
    if ($_FILES['tslip']['error'] === UPLOAD_ERR_OK) {
        $uploadDir3 = 'uploads/'; // Ensure this directory exists
        $uploadslip = $uploadDir3 . basename($_FILES['tslip']['name']);
        if (!is_dir($uploadDir3)) {
            mkdir($uploadDir3, 0777, true); // Create directory if it doesn't exist
        }
      } else {
          echo "File upload error: " . $_FILES['tslip']['error'];
      }
    } else {
      echo "No file uploaded.";
    }

  session_start();

// Check if the session variable exists
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "INSERT INTO $username VALUES('$_POST[name]','$_POST[rollno]','$_POST[class]','$_POST[mobno]','$_POST[event]','$uploadFile','$uploadid','$_POST[tid]','$uploadslip')";
  if ($conn->query($sql) === TRUE) {
      // echo "<script>alert('Sign up successful!')</script>";
      }
  else 
  {
      // echo "Error: " . $conn->error;
  }

  $sql = "INSERT INTO data VALUES('$username','$_POST[name]','$_POST[rollno]','$_POST[class]','$_POST[mobno]','$_POST[event]','$uploadFile','$uploadid','$_POST[tid]','$uploadslip')";
  if ($conn->query($sql) === TRUE) {
      // echo "<script>alert('Sign up successful!')</script>";
      }
  else 
  {
      // echo "Error: " . $conn->error;
  }


} else {
    echo "<h1>No session data found.</h1>";
}

  // echo "<script>alert('$_POST[loginUser]')</script>";
  
  
  $conn->close();
  
}

if (isset($_POST['print'])) {
  require("connections.php");
  header("Location: pass.php");
				
}
if (isset($_POST['logout'])) {
  session_destroy();
  header("Location: index.php");
  exit;
}
?>