<?php 
    include "tampungan/database.php";

    $register_info ="";
    
    if(isset($_POST["register"])){
        $username = $_POST ['username'];
        $password = $_POST ['password'];

        try {
            $sql = "INSERT INTO student (username, password) VALUES
            ('$username', '$password')";

            if($db->query($sql)) {
                $register_info = "please login your account is ready";
            }else {
                $register_info = "try again with different username or password";
            }
        }catch (mysqli_sql_exception) {
            $register_info = "try again with different username";
        }
        $db->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register NarrativeLab</title>
</head>
<?php include "layout/header.html" ?>
<body>
    <i><?= $register_info ?></i>
    <form action="register.php" method="POST">
        <input type="text" placeholder="username" name="username"/>
        <input type="password" placeholder="password" name="password"/>
        <button type="submit" name="register">Register</button>
    </form>
</body>
<?php include "layout/footer.html" ?>
</html>