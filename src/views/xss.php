<?php

if (isset($_GET['name'])) {
    $name = $_GET['name']; 
    echo "<h1>Welcome, $name!</h1>";
} else {
    echo "<h1>Welcome to the College CTF Challenge!</h1>";
}
?>

<body>
    <div class="form-wrapper">
        <div>
            
    <h1>Cross-Site Scripting (XSS) Challenge</h1>
    <p>Your goal is to exploit XSS to access the next challenge!</p>

    <form method="GET">
        <label for="name">Enter your name:</label>
        <input type="text" id="name" name="name">
        <button type="submit">Submit</button>
    </form>

    <p>Hint: Try injecting JavaScript into the input field to manipulate the URL!</p>
        </div>
    </div>
</body>
</html>
