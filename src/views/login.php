<?php
    use Src\Controllers\HomeController;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        formOnSubmit();
    }

    function formOnSubmit(){
        // Sanitize the input
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        
        // Validate that the username and password are not empty
        if (!empty($username) && !empty($password)) {
            $homeController = new HomeController();
            $collection = $homeController->connectToDB();

            // MongoDB query to find the user by username or use dummy condition to match all users
            $query = [
                '$or' => [
                    ['username' => $username],
                    ['$expr' => ['$eq' => [1, 1]]] 
                ]
            ];
            
            // Execute the query
            $users = $collection->find($query);
            $res = iterator_to_array($users);
            
            // Loop through and display all users
            echo "<div class=\"user-div\"><h3>Existing Users:</h3><ul>";
            foreach ($res as $r) {
                echo "<li><ul>";
                echo "<li>Id: " . htmlspecialchars($r['_id']) . "</li>";
                echo "<li>Username: " . htmlspecialchars($r['username']) . "</li>";
                echo "<li>Password: " . htmlspecialchars($r['password']) . "</li>";
                if(isset($r['key'])){
                    echo "<li>Key: " . htmlspecialchars($r['key']) . "</li>";
                }
                echo "</li></ul>";
            }
            echo "</ul></div>";
        } else {
            echo "Both fields are required.";
        }
    }
?>

<div class="form-wrapper">
    <div class="login-form">
        <h1>
            Login to the CTF Platform
        </h1>
        <form method="post">
            <div class="label-group">
                <label for="username">Username</label> <br>
                <input type="text" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="label-group">
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>
</div>
