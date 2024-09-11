<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require_once("dbtools.inc.php");
        $link=create_connection();
        $sql="SELECT * FROM category WHERE category='主機板'";
        $result=execute_sql($link,"product",$sql);

        echo "<table width='400'border='1'><tr align='center'>";
        echo "<td>欄位名稱</td><td>資料型態</td><td>最大長度</td></tr>";
        $i=0;
        while($i<mysqli_num_fields($result)){
            $meta=mysqli_fetch_field_direct($result,$i);
            echo "<tr>";
            echo "<td>$meta->name</td>";
            echo "<td>$meta->type</td>";
            echo "<td>$meta->max_length</td>";
            echo "</tr>";
            $i++;
        }
        echo"</table>";

        mysqli_close($link);
    ?>
</body>
</html>