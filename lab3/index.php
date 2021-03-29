<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>Лабораторная №3</title>
</head>
<body>

  <?php require_once "connect.php" ?>

  <form action="insert.php" method="post">
    <input type="submit" value="Вставить">
  </form>

  <table cellspacing='0'>
    <tr>
      <th>Номер посещения</th>
      <th>Посетитель</th>
      <th>Любимый напиток</th>
      <th>Время посещения</th>
      <th></th>
      <th></th>
    </tr>
  
  <?php
    $query = "select visit_logger.id, visitor.name, drink.title, visit_logger.moment  from visit_logger join visitor on visitor.id = visitor_id join drink on drink_id = drink.id order by id";
    $res = $con->query($query);
    if ($res == false) {
      echo("FALSE");
      die;
    }
    

    
    while (($row = $res->fetch_assoc())) {
      echo("<tr>");
      
      echo("<td>$row[id]</td>");
      echo("<td><a href='find.php?name=$row[name]'>$row[name]</a></td>");
      echo("<td><a href='find.php?title=$row[title]'>$row[title]</a></td>");
      echo("<td>$row[moment]</td>");
      echo("<td><a href='modify.php?id=$row[id]&v=$row[name]&d=$row[title]'>Изменить</a></td>");
      echo("<td><a href='delete.php?id=$row[id]'>Удалить</a></td>");
      echo("</tr>");
    }
    

  ?>

  </table>

  <?php $con->close();?>
  
  <h3>Помощь</h3>
  <p>
    Для поиска по выбранному посетителю или напитку нажмите на нужное название в
    соответствующей колонке. Это приведет к поиску и отображению в табличном
    виде только выбранного значения.
  </p>

</body>
</html>
