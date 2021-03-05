<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
</body>
</html>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

    session_start();
    include("mysql_connection.php");

    $product_name = $_POST['product_name'];
    $series_ID = $_POST['series_ID'];
    $price = $_POST['price'];
    $img_url = $_POST['img_url'];



    if($product_name != NULL)
    {
        //新增資料進資料庫語法
        $old_product_name=$_POST['old_product_name'];
        $old_series_ID=$_POST['old_series_ID'];
        $sql = "DELETE from product WHERE product_name='$old_product_name' and series_ID='$old_series_ID' ";

        echo $sql;
        if(mysqli_query($db_link, $sql)) //$db_link已經在mysql_connect.inc.php 裡面宣告過了
        {
            echo '<form name="form" method="post" class="login">';
            echo '刪除成功!';
            $url=$_SERVER['HTTP_REFERER'];
            echo "<meta http-equiv=REFRESH CONTENT=1;url=$url>";        
        }
        else
        {
            echo '<form name="form" method="post" class="login">';
            echo '刪除失敗!';
            $url=$_SERVER['HTTP_REFERER'];
            echo "<meta http-equiv=REFRESH CONTENT=1;url=$url>";        
        }
    }
    else
    {
        echo '您輸入之資料有誤!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
    }
?>
