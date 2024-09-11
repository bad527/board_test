<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>分頁瀏覽</title>
</head>
<body>
    <?php
    require_once("dbtools.inc.php");

    //設定每頁顯示幾筆紀錄
    $records_per_page=5;

    //取得要顯示第幾頁的紀錄
    if(isset($_GET["page"])){
        $page=$_GET["page"];
    }else{
        $page=1;
    }

    //建立資料連結
    $link=create_connection();
    $sql= "SELECT category AS '零組件種類',brand AS '品牌'
    ,specification AS '規格',price AS '價格',
    date AS '報價日期' FROM category";
    $result=execute_sql($link,"product",$sql);
    
    //取得欄位數目
    $total_fields = mysqli_num_fields($result);

    //取得紀錄筆數
    $total_records = mysqli_num_rows($result);

    //計算總頁數
    $total_pages=ceil($total_records/$records_per_page);

    //計算本頁第一筆紀錄的序號
    $started_record=$records_per_page*($page-1);
    // echo $started_record;

    //將記錄指標移至本頁第一筆紀錄的序號
    mysqli_data_seek($result,$started_record);
    
    //顯示欄位名稱
    echo "<table border='1' align='center'width='800'>";
    echo "<tr align='center'>";
    for($i=0;$i<$total_fields;$i++){
        echo "<td>".mysqli_fetch_field_direct($result,$i)->name."</td>";
    }
    echo "</tr>";

    //顯示紀錄
    $j=1;
    while($row = mysqli_fetch_row($result) and $j < $records_per_page){
        echo "<tr>";
        for($i=0;$i<$total_fields;$i++){
            echo "<td>".$row[$i]."</td>";
        }
        $i++;
        echo "</tr>";
    }
    echo "</table>";

    //產生導覽列
    echo "<p align='center'>";
    if($page>1){
        echo "<a href='show_record.php?page='".($page-1).">上一頁</a>";
    }
    for($i=1;$i<=$total_pages;$i++){
        if($i==$page)
            echo "$i";
        else
            echo "<a href='show_record.php?page=$i'>$i</a>";
    }
    if($page < $total_pages){
        echo "<a href='show_record.php?page=".($page+1)."'>下一頁</a>";
    }
    echo "</p>";

    mysqli_free_result($result);
    mysqli_close($link);
    ?>
</body>
</html>