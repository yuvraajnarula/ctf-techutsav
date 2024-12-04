<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    formOnSubmit();
}

function formOnSubmit() {
    $name = $_POST['name'];
    $file_acquisiton = 'file.txt';
    if (!empty($name)) {
        echo "<h2> filepath: <a href=\"/fileinclusion\">". $file_acquisiton."</a></h2>";
    } else {
        echo "<h2>Please enter your name.</h2>";
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
    </form>

    <p>Hint: Try injecting JavaScript into the input field to manipulate the URL!</p>
        </div>
    </div>
</body>
</html>
