<?php
include ("db.php");
if (isset($_REQUEST["processor"])) {
    $processor = $_REQUEST["processor"];
    $statement = $db->prepare(
        "SELECT * FROM computer 
        inner join processors on ID_Processor = FID_Processor 
        WHERE Processors.name=?"); 
    $statement->execute([$processor]);
    echo "<br>Computer with processor $processor:";
    echo "<ol>";
    while ($data = $statement->fetch()) {
        $id_computer = $data['ID_Computer'];
        $netname = $data['netname'];
        $guarantee = $data['guarantee'];
        echo "<li>ID_computer: $id_computer, netname: $netname, guarantee: $guarantee</li>";
    }
    echo "</ol>";
}