<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаба 4</title>
</head>
<body>



<?php
require_once "connect.php";
session_start();
if (!$username)
    $username = "Гость";
?>

<p>
    Добро пожаловать, <?php echo $username; ?>
</p>


<?php
    if ($username == 'Гость') {
        echo '<p>Вы не Гость?<br>Тогда войдите в свой аккаунт тут:</p>';
        echo "<form action='auth.php'><button type='submit'>ВОЙТИ</button></form>";
    }
    else {
        echo '<p>Это не вы?<br>Тогда покиньте этот аккаунт:</p>';
        echo "<form action='deauth.php'><button type='submit'>ВЫЙТИ</button></form>";
    }
?>

<?php if ($username == 'Admin'): ?>
    <form action="ins.php" method="post">
        <label for="country_name">Название страны:</label>
        <input type="text" name="country_name" id='country_name' required>
        <button type="submit">Вставить</button>
    </form>
<?php endif; ?>

<table>

    <tr>
        <th>ID страны</th>
        <th>Название страны</th>
    </tr>

    <?php
    $query = "select * from country order by id";

    $res = $con->query($query);
    if ($res == false)
        die("FALSE");
    
    while (($row = $res->fetch_assoc())) {
        echo("<tr>");
      
        echo("<td>$row[id]</td>");
        echo("<td>$row[name]</td>");

        if ($username == 'Admin' || $username == "Overlord"):
            echo "<td><a href='del.php?id=$row[id]'>Удалить</a></td>";
        endif;

        echo("</tr>");
    }

    ?>

</table>
<?php $con->close();?>
</body>
</html>

