<?php
header('Content-Type: text/xml');
header('Cache-Control: no-cache, must-revalidate');
include ("db.php");
echo '<?xml version="1.0" encoding = "UTF-8"?>';
echo "<root>";
if (isset($_REQUEST["software"])) {
    $software = $_REQUEST["software"];
    $statement = $db->prepare(
        "SELECT * FROM software 
        inner join computer_software on ID_software = FID_software
        inner join computer on fid_computer = id_computer
        WHERE software.name=?"); 
    $statement->execute([$software]);
    while ($data = $statement->fetch()) {
        $id_computer = $data['ID_Computer'];
        $netname = $data['netname'];
        $guarantee = $data['guarantee'];
        echo "<row><id>$id_computer</id><netname>$netname</netname><guarantee>$guarantee</guarantee></row>";
    }
    echo "</root>";
}
?>