<style>
  table {
    border-collapse: collapse;
  }
  td, th {
    padding: 10px;
    border-top: 1px solid #aaa;
    border-bottom: 1px solid #aaa;
  }
</style>

<?php
  // var_dump($_POST);
  // print_r($_POST, false);
  // echo "<pre>" . print_r($_POST, true) . "</pre>";

  echo "<table>";
  foreach ($_POST as $k => $v) {
    echo "<tr><th>$k</th><td>$v</td></tr>";
  }
  echo "</table>";
?>