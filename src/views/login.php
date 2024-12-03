<?php
    use Src\Controllers\HomeController;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        formOnSubmit();
    }

    function formOnSubmit(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $homeController = new HomeController();
        $db = $homeController->connectToDB();
        $collection = $db->users;

        $query = ['username' => $username, 'password' => $password];
        $result = $collection->find();

        echo $result;
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
            <input type="username" name="username" id="username" placeholder="Username">
        </div>
        <div class="label-group">
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" placeholder="Password">
        </div>
        <input type="submit" value="Login">
    </form>
</div>
</div>