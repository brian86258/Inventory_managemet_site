<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert product</title>
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
    $ingredient_ID = $_POST['ingredient_ID'];
    $length = $_POST['length'];
    $width = $_POST['width'];
    $thickness = $_POST['thickness'];
    $weight = $_POST['weight'];
    $num_per_ingredient = $_POST['num_per_ingredient'];
    $price = $_POST['price'];
    $img_url = $_POST['img_url'];




    echo $product_name;
    echo $series_ID;

    if($product_name!= NULL && $price!=num ){

        $sql = "insert into product value('$product_name','$series_ID','$ingredient_ID',$length,$width,$thickness,$weight,$num_per_ingredient,$price,'$img_url')";
        if(mysqli_query($db_link, $sql)) //$db_link已經在mysql_connect.inc.php 裡面宣告過了
        {
            echo '<form name="form" method="post" class="login">';
            echo '新增成功!';
            $url=$_SERVER['HTTP_REFERER'];
            echo "<meta http-equiv=REFRESH CONTENT=1;url=$url>";
        }
        else
        {
            echo '<form name="form" method="post" class="login">';
            echo '新增失敗!';
            $url=$_SERVER['HTTP_REFERER'];
            echo "<meta http-equiv=REFRESH CONTENT=1;url=$url>";

        }
        // echo $sql;
    }
    else{
        echo "incorrect product number";
    }
    
?>
