<?php 
    include "tampungan/database.php";
    session_start();

    $login_info ="";
    if(isset($_SESSION["login"])) {
        header("location: dashboard.php");
    }

    if(isset($_POST["login"])){
        $username = $_POST ['username'];
        $password = $_POST ['password'];

    $sql = "SELECT * FROM student WHERE username= '$username' AND password= '$password'";
    $result = $db->query($sql);

    if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["username"];
            $_SESSION["login"] = true;
            header("location: dashboard.php");
        }else {
            $login_info = "try again with different username or password";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login NarrativeLab</title>
</head>
<?php include "layout/header.html" ?>
<body>
    <div class="nav-container"> 
        <ul class="navigation">
            <div class="highlight"></div>
            <li class="active"><a href="index.php">Home</a></li>
        </ul>
    </div>
    <i><?= $login_info ?></i>
    <form action="login.php" method="POST">
        <input type="text" placeholder="username" name="username"/>
        <input type="password" placeholder="password" name="password"/>
        <button type="submit" name="login">Login</button>
    </form>
</body>
<?php include "layout/footer.html" ?>
</html>