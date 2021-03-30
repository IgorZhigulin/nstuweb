<?php
require_once "connect.php";

if (isset($_POST['visitor']) && isset($_POST['drink']) && isset($_POST['id'])) {
  $visitor = $_POST['visitor'];
  $drink = $_POST['drink'];
  $id = $_POST['id'];
  echo ("$visitor == $drink == $id");

  $query = "update visit_logger set visitor_id=$visitor, drink_id=$drink where id=$id";
  $res = $con->query($query);
  if (res == false) {
    echo("Ошибка модификации");
    exit;
  }
  header("location:./");
}

?>


<form action="modify.php" method="post">
  <select name="visitor">
    <?php
    $q1 = "select * from visitor";
    $r1 = $con->query($q1);

    while (($row = $r1->fetch_assoc())) {
      
      if (!strcmp($_GET['v'], $row['name']))
        echo("<option value='$row[id]' selected>");
      else
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
      if (!strcmp($_GET['d'], $row['title']))
        echo("<option value='$row[id]' selected>");
      else
        echo("<option value='$row[id]'>");
      echo($row['title']);
      echo("</option>");
    }
    ?>
    </select>
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <input type="submit" value="Изменить">
</form>