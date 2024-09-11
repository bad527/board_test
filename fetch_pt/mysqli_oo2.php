<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $mysqli = new mysqli("localhost","root","sprt675m","product");
    if($mysqli->connect_errno)
        die("無法建立資料".mysqli_connect_errno()."".mysqli_connect_error());  
    
    $mysqli->query("SET NAMES 'utf8'");
    $result = $mysqli->query("SELECT * FROM category WHERE category = '主機板'");

    echo "<table border='1' align='center'><tr align='center'>";

    while($field =$result->fetch_field()){
        echo "<td>".$field->name."</td>";
    }
    echo "</tr>";
    
    while($row=$result->fetch_row()){
        echo "<tr>";
        for($i=0; $i<$result->field_count;$i++){
            echo "<td>".$row[$i]."</td>";
            
        }
        echo "</tr>";
    }
    echo "</table>";
    echo mysqli_get_client_info();
    echo "<br>";
    echo mysqli_get_host_info($mysqli);
    echo "<br>";
    echo '$mysqli 資源變數協定為:'.mysqli_get_proto_info($mysqli);
    echo "<br>";
    echo '取得$mysqli資料庫伺服器的版本'.mysqli_get_server_info($mysqli);
    echo "<br>";

    $result->free();
    $mysqli->close();
    ?>
</body>
</html>