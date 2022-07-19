<?php
include ("db.php");
if (isset($_REQUEST["warranty"])) {
    $warranty = $_REQUEST["warranty"];
    $statement = $db->prepare(
        "SELECT * FROM computer
        where computer.guarantee <= ?");
    $statement->execute((array)$warranty);
    $data = $statement->fetchAll();
    echo json_encode($data);
}
?>