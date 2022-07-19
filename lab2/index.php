<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function storage1() {
            let processor = document.getElementById("processor").value;
            let result = localStorage.getItem(processor);
            document.getElementById('res').innerHTML = result;
        }
        function storage2() {
            let software = document.getElementById("software").value;
            let result = localStorage.getItem(software);
            document.getElementById('res').innerHTML = result;
        }
        function storage3(){
            let expired = document.getElementById("expired").value;
            let result = localStorage.getItem(expired);
            document.getElementById('res').innerHTML = result;
        }
    </script>
</head>
<body>
<h3>Лаба №2, Сокирко М.А., КІУКІ-19-3, Варіант 9</h3>
<form action="" method="GET">
     <select name = "processor" id="processor" onchange="storage1()">
        <?php
        include ("mongoCon.php");
        $software = $collection->distinct("processor");
        foreach ($software as $document) {
            echo "<option>";
            print($document);
            echo "</option>";
        }
        ?>
    </select>
    <input type="submit" value="Get"><br>
</form>
<br>
<form action="" method="GET">
    <select name = "software" id="software" onchange="storage2()">
        <?php
        include ("mongoCon.php");
        $software = $collection->distinct("software");
        foreach ($software as $document) {
            echo "<option>";
            print($document);
            echo "</option>";
        }
        ?>
    </select>
    <input type="submit" value="Get"><br>
</form>

<br>
<form action="" method="GET">
<select name = "expired" id="expired" onchange="storage3()">
        <?php
        include ("mongoCon.php");
        $software = $collection->distinct("warrantyExpiredDate");
        foreach ($software as $document) {
            echo "<option>";
            print(gmdate("Y-m-d H:i:s", $document));
            echo "</option>";
        }
        ?>
    </select>
    <input type="submit" value="Get"><br>
</form>

<?php
if (isset($_REQUEST["processor"])) {
    $key = $_REQUEST["processor"];
    $processor = $_REQUEST["processor"];
    $statement = $collection->find(['processor'=>$processor]);
    $result = "<ol>";
    foreach ($statement as $document) {
        $number = $document['number'];
        $ram = $document['RAM'];
        $rom = $document['ROM'];
        $software = $document['software'];
        if (is_object($software)) {
            $software = (array)$software;
            $software = (implode(', ', $software));
        }
        $result = $result . "<li>Processor: $processor, number: $number, RAM: $ram, ROM: $rom, software: $software </li>";
    }
    $result = $result . "</ol>";
    echo $result;
}
    
if (isset($_REQUEST["software"])) {
    $key = $_REQUEST["software"];
    $software = $_REQUEST["software"];
    $statement = $collection->find(['software'=>$software]);
    $result = "<ol>";
    foreach ($statement as $document) {
        $processor = $document['processor'];
        $number = $document['number'];
        $ram = $document['RAM'];
        $rom = $document['ROM'];
        $software = $document['software'];
        if (is_object($software)) {
            $software = (array)$software;
            $software = (implode(', ', $software));
        }
        $result = $result . "<li>Processor: $processor, number: $number, RAM: $ram, ROM: $rom, software: $software </li>";
    }
    $result = $result . "</ol>";
    echo $result;
}

if (isset($_REQUEST["expired"])) {
    $key = $_REQUEST["expired"];
    $expired = $_REQUEST["expired"];
    $expired =strtotime($expired)+7200;
   $statement = $collection->find(['warrantyExpiredDate'=>$expired]);
    $result = "<ol>";
    foreach ($statement as $document) {
        $processor = $document['processor'];
        $number = $document['number'];
        $ram = $document['RAM'];
        $rom = $document['ROM'];
        $software = $document['software'];
        if (is_object($software)) {
            $software = (array)$software;
            $software = (implode(', ', $software));
        }
        $result = $result . "<li>Processor: $processor, number: $number, RAM: $ram, ROM: $rom, software: $software </li>";
    }
    $result = $result . "</ol>";
    echo $result; 
}
if(isset($_REQUEST["expired"])||isset($_REQUEST["software"])||isset($_REQUEST["processor"]))
echo "<script> localStorage.setItem('$key', '$result'); </script>";
?>
<h4>LocalStorage</h4>
<div id="res"></div>   
</body>
</html>