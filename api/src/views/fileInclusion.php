<?php
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    include($file);
} else {
    echo "<h1>Welcome to the File Inclusion Level!</h1>";
    echo "<p>Find the hidden flag to proceed!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF - File Inclusion Vulnerability</title>
</head>
<body>
    <h1>File Inclusion Challenge</h1>
    <p>Use the file parameter to find the key for the next level!</p>
    <p>Hint: Some paths lead to treasures; one holds what you seek. Can you find it?</p>
</body>
</html>