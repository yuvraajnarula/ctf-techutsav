<?php
// Capture user input
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userInput = $_POST['userInput'];
} else {
    $userInput = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .message {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="form-wrapper">
        <div class="login-form">
            <h1>Input Text Example</h1>
            <form id="xssForm" method="POST">
                <label for="userInput">Enter some text:</label>
                <input type="text" id="userInput" name="userInput" value="<?php echo $userInput; ?>">
                <input type="submit" value="Submit">
            </form>

            <div id="output">
                <!-- Display the output as raw HTML -->
                <?php if (!empty($userInput)) : ?>
                    <div class="message">
                        <?php echo $userInput; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('xssForm').addEventListener('submit', function(event) {
            event.preventDefault();  // Prevent form from submitting to prevent page refresh
            const userInput = document.getElementById('userInput').value;

            // Insert user input into the page (no escaping or sanitizing here)
            document.getElementById('output').innerHTML = `<div class="message">${userInput}</div>`;
        });
    </script>
</body>
</html>
