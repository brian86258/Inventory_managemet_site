<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Order</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
</body>
</html>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

    session_start();
    include("mysql_connection.php");

    $datetime = $_POST['datetime'];
    $company = $_POST['company'];

    if($company!= NULL){

        $sql = "delete from order_rec where ord_date='$datetime' and company_name='$company'";
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
        // echo $sql;
    }
    else{
        echo "incorrect product number";
    }
    
?>
