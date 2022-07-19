<?php
$db = new PDO("mysql:host=127.0.0.1;dbname=computer", "root", "");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Лаба №1, Сокирко М.А., КІУКІ-19-3, Варіант 9</h3>
<form action="" method="GET">
    <input placeholder="Processor:" type="text" name="processor" id="processor" >
    <input type="submit" value="Get"><br> 
</form>
<br>
<form action="" method="GET">
    Soft: <select name = "software" id="software">
        <?php
        $sqlSelect = "SELECT name FROM software";
        $sql = $db->query($sqlSelect);
        foreach ($sql as $cell) {
            echo "<option>";
            print($cell[0]);
            echo "</option>";
        }
        ?>
    </select>
    <input type="submit" value="Get"><br>
</form>

<br>
<form action="" method="GET">
    <input placeholder="expired warranty period" type="text" name="warranty" id="warranty"> 
    <input type="submit" value="Get"><br>
</form>

<?php
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

if (isset($_REQUEST["software"])) {
    $software = $_REQUEST["software"];
    $statement = $db->prepare(
        "SELECT * FROM software 
        inner join computer_software on ID_software = FID_software
        inner join computer on fid_computer = id_computer
        WHERE software.name=?"); 
    $statement->execute([$software]);
    echo "<br>Computer with software $software:";
    echo "<ol>";
    while ($data = $statement->fetch()) {
        $id_computer = $data['ID_Computer'];
        $netname = $data['netname'];
        $guarantee = $data['guarantee'];
        echo "<li>ID_computer: $id_computer, netname: $netname, guarantee: $guarantee</li>";
    }
    echo "</ol>";
}

if (isset($_REQUEST["warranty"])) {
    $warranty = $_REQUEST["warranty"];
     
    $statement = $db->prepare(
        "SELECT * FROM computer
        where computer.guarantee <= ?");
    $statement->execute((array)$warranty);
    echo "<br>Computer with expired warranty for date $warranty: ";
    echo "<ol>";
    while ($data = $statement->fetch()) {
        $id_computer = $data['ID_Computer'];
        $netname = $data['netname'];
        $guarantee = $data['guarantee'];
        echo "<li>ID_computer: $id_computer, netname: $netname, guarantee: $guarantee</li>";
    }
    echo "</ol>";
}
?>   
</body>
</html>