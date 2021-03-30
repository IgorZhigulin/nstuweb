<?php
require_once "connect.php";

if (isset($_POST['visitor']) && isset($_POST['drink'])) {
  $visitor = $_POST['visitor'];
  $drink = $_POST['drink'];
  $date = date("Y-m-d H:i:s");

  $query = "insert into visit_logger (visitor_id, drink_id, moment) values ($visitor, $drink, '$date')";
  $res = $con->query($query);
  if (res == false) {
    echo("Ошибка вставки");
    die;
  }
  header("location:./");
}

?>

<form action="insert.php" method="POST">
  
  <select name="visitor">
    <?php
    $q1 = "select * from visitor";
    $r1 = $con->query($q1);

    while (($row = $r1->fetch_assoc())) {
      echo("<option value='$row[id]'>");
      echo($row['name']);
      echo("</option>");
    }
    ?>
  </select>
  
  <select name="drink">
  <?php
    $q1 = "select * from drink";
    $r1 = $con->query($q1);

    while (($row = $r1->fetch_assoc())) {
      echo("<option value='$row[id]'>");
      echo($row['title']);
      echo("</option>");
    }
    ?>
    </select>

  <input type="submit" value="Вставить">
</form>

<?php $con->close(); ?>