<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
    <?php
    require_once "connect.php";

    /*************************************************
    * Обработка действий после нажатия кнопки ВОЙТИ *
    *************************************************/
    if (isset($_POST['auth'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo $username . "<br>" . $password . "<br>";

        $query = "select username,password from users where binary username = '$username' and binary password='$password'";

        $res = $con->query($query);
        if ($res == false)
            die("FALSE");
        
        if ($res->num_rows == 0) {
            echo "Неверно указаны имя пользователя или/и пароль";
        }
        else {
            session_start();
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit();
        }
    }

    ?>

    <form method="post">

        <table>
            <tr>
                <td><label for="username">Имя пользователя:</label></td>
                <td><input type="text" name="username" id="username" required></td>
            </tr>

            <tr>
                <td><label for="password">Пароль:</label></td>
                <td><input type="password" name="password" id="password" required></td>
            </tr>

            <tr>
                <td><button type="submit" name="auth">Войти</button></td>
            </tr>
        </table>
        
    </form>

    <?php $con->close();?>
</body>
</html>