<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF-TECH UTSAV</title>
</head>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Properly redirecting using the 'Location' header
        header('Location: /xss/game');
        exit();
    }
?>
<body>
    <div class="home-wrapper">
        <h1>
            Welcome to CTF Tech Utsav Round 3
        </h1>
        <span class="home-span">
            <h2>
            XSS Challenge - Level 1
            </h2>
            <p>
            Click the button below to go to the next page
            </p>
        </span>

        <!-- Form with POST method for redirection -->
        <form method="POST">
            <button type="submit">Proceed</button>
        </form>
    </div>
</body>
</html>
