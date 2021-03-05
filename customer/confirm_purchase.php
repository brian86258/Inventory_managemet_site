<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
</body>
</html>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

    session_start();
    include("mysql_connection.php");

    $name = $_POST['item_name'];
    $num = $_POST['item_num'];
    $id = $_POST['item_id'];
    $price = $_POST['item_price'];
    $company=$_SESSION['company'];
    // $date= date("Y-m-d H:i:s");
    $date = date("Y-m-d H:i:s", strtotime('+8 hours'));
    echo $date."<br>";
    $amount=$num*$price;
    if($num>0 && $num<100000){
        $sql = "insert into order_rec (ord_date, product_name, series_ID, company_name, product_num,total_amount) values ('$date', '$name', '$id','$company','$num','$amount')";
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
