
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src = "ajax.js"></script>
</head>
<body>
<h3>Лаба №3, Сокирко М.А., КІУКІ-19-3, Варіант 9</h3>
    <input placeholder="Processor:" type="text" name="processor" id="processor" >
    <input type="submit" value="Get" onclick="forText()"><br> 
<br>
    Soft: <select name = "software" id="software">
        <?php
        include ("db.php");
        $sqlSelect = "SELECT name FROM software";
        $sql = $db->query($sqlSelect);
        foreach ($sql as $cell) {
            echo "<option>";
            print($cell[0]);
            echo "</option>";
        }
        ?>
    </select>
    <input type="submit" value="Get" onclick="forXML()"><br>

<br>
    <input placeholder="expired warranty period" type="text" name="warranty" id="warranty"> 
    <input type="submit" value="Get" onclick="forJSON()"><br>
<div id="result"></div>
</body>
</html>