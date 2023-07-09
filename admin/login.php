<?php
    include '../classes/adminlogin.php';
?>

<?php
    $class = new Adminlogin();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $adminUser = $_POST['admin_username'];
        $adminPass = md5($_POST['admin_pass']);

        $loginCheck = $class->login_admin($adminUser, $adminPass);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Admin | Login</title>
</head>

<body>
    <style>
        body {
            height: 100vh;
            background: rgb(0, 254, 230);
            background: linear-gradient(90deg, rgba(0, 254, 230, 1) 0%, rgba(83, 99, 163, 1) 30%, rgba(105, 41, 177, 1) 45%, rgba(105, 41, 177, 1) 56%, rgba(83, 99, 163, 1) 70%, rgba(0, 254, 230, 1) 100%);
            overflow-y: hidden;
        }
        span {
            font-size: 1.5rem;
            font-weight: 300;
            color: #fab1a0;
        }
    </style>
    <div class="login-wrap dp-flex">
        <img src="https://amiri.com/cdn/shop/files/logo_be4041d5-a81e-4d1e-a43d-29b0b0d52cbe.png?v=1678302533&width=400" alt="" style="width: 50%;">
        <span>
            <?php 
            if (isset($loginCheck))
                echo $loginCheck;
            ?>
        </span>
        <form action="login.php" method="post" class="dp-flex">
            <input type="text" name="admin_username" id="" placeholder="Username">
            <input type="password" name="admin_pass" id="" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>