<?php
    function create_connection(){    
        $link = mysqli_connect("localhost","root","sprt675m","product")
            or die("無法建立資料".mysqli_connect_error());

        mysqli_query($link,"SET NAMES 'utf8'");
        return $link;
    }  
    function execute_sql($link,$database,$sql){
        mysqli_select_db($link,$database)
            or die("開啟資料庫失敗".mysqli_error($link));
        $result=mysqli_query($link,$sql);
        return $result;
    }
    ?>