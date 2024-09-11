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
    $result = execute_sql($link,"product",$sql);
    echo "category=<主機板> 的紀錄有".mysqli_num_rows($result)."筆";
    echo "，包含".mysqli_num_fields($result)."個欄位。";
    
    mysqli_close($link);

    ?>
</body>
</html>