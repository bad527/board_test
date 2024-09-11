<!DOCTYPE html>
<html lang="zh-Tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $mysqli = new mysqli("localhost","root","sprt675m","product");
    if ($mysqli->connect_errno)
        die("無法建立資料:".$mysqli->connect_error);

    $mysqli->query("SET NAMES utf8");
    $result = $mysqli->query("SELECT * FROM category WHERE category = '主機板'");

    echo "<table border= '1' align='center'><tr align='center'>";
    //顯示欄位名稱
    while($field = $result->fetch_field())
        echo "<td>".$field->name."</td>";
    echo "</tr>";
    while($row = $result->fetch_row())
    {   
        
        echo "<tr>";
        for($i = 0; $i<$result->field_count; $i++)
            echo "<td>" .$row[$i]. "</td>";
        echo "</tr>";
    }
    echo "</table>";

    $result->free();
    $mysqli->close();
    ?>
    
</body>
</html>