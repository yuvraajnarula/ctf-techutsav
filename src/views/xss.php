<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    formOnSubmit();
}

function formOnSubmit() {
    $name = $_POST['name'];
    $key = $_POST['key'];
    $file_acquisiton = "file.txt";
    
    if ($name === "<script>alert(document.cookie)</script>") {
        echo $name;
    }

    if ($key === "5fit38782i37g20fpej3tjrido") {
        echo "<h2> filepath: <a href=\"/fileinclusion\">". $file_acquisiton."</a></h2>";
    }
}
?>

<body>
    <div class="form-wrapper">
        <div>
    <h1>Cross-Site Scripting (XSS) Challenge</h1>
    <p>Your goal is to exploit XSS to access the next challenge!</p>

    <form method="POST">
        <label for="name">Enter your name:</label>
        <input type="text" id="name" name="name">
        <button type="submit">Submit</button>

        <label for="key">Enter the key:</label>
        <input type="text" id="key" name="key">
        <button type="submit">Submit Key</button>
    </form>
        </div>
    </div>
</body>
</html>
