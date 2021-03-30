<table>
  <tr>
    <th>Номер посещения</th>
    <th>Посетитель</th>
    <th>Любимый напиток</th>
    <th>Время посещения</th>
  </tr>

<?php

require_once "connect.php";

if (isset($_GET['name'])) {
  $query = "select visit_logger.id, visitor.name, drink.title, visit_logger.moment from visit_logger join visitor on visitor.id = visitor_id join drink on drink_id = drink.id where visitor.name='$_GET[name]' order by id";
} else if (isset($_GET['title'])) {
  $query = "select visit_logger.id, visitor.name, drink.title, visit_logger.moment from visit_logger join visitor on visitor.id = visitor_id join drink on drink_id = drink.id where drink.title='$_GET[title]' order by id";
}

$res = $con->query($query);
if ($res == false) {
  echo("FALSE");
  die;
}

while (($row = $res->fetch_assoc())) {
  echo("<tr>");
  echo("<td>" . $row['id'] . "</td>");
  echo("<td>$row[name]</td>");
  echo("<td>$row[title]</td>");
  echo("<td>" . $row['moment'] . "</td>");
  echo("</tr>");
}

?>
</table>

<a href="./">Назад</a>