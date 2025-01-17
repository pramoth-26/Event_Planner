<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="photo">
    <button type="submit">Upload</button>
</form>

</body>
</html><?php

if (!empty($_FILES) && isset($_FILES['photo'])) {
    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/'; // Ensure this directory exists
        $uploadFile = $uploadDir . basename($_FILES['photo']['name']);

        // Check if upload directory exists and is writable
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Create directory if it doesn't exist
        }

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
            echo '<img src="' . htmlspecialchars($uploadFile, ENT_QUOTES, 'UTF-8') . '">';
        } else {
            echo "Failed to move uploaded file.";
        }
    } else {
        echo "File upload error: " . $_FILES['photo']['error'];
    }
} else {
    echo "No file uploaded.";
}

?>