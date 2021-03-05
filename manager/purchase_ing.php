<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchas Ingredient</title>
    <link rel="stylesheet" href="info.css">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0"> 
    <link rel="stylesheet" type="text/css" href="M_browse.css?version=&lt;?php echo time(); ?&gt;">
</head>
<body>
    
</body>
</html>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

    session_start();
    include("mysql_connection.php");

    $ing_name = $_POST['ing_name'];
    $purchase_num = $_POST['purchase_num'];
    $ing_num= $_POST['ing_num'];

    if($ing_name!= NULL){

        $sql = "update stock_ingredient set ingredient_num=$purchase_num+$ing_num where ingredient_ID='$ing_name';";
        if(mysqli_query($db_link, $sql)) //$db_link已經在mysql_connect.inc.php 裡面宣告過了
        {
            echo '<form name="form" method="post" class="login">';
            echo '更新成功!';
            $url=$_SERVER['HTTP_REFERER'];
            echo "<meta http-equiv=REFRESH CONTENT=1;url=$url>";
        }
        else
        {
            echo '<form name="form" method="post" class="login">';
            echo '更新失敗!';
            $url=$_SERVER['HTTP_REFERER'];
            echo "<meta http-equiv=REFRESH CONTENT=1;url=$url>";

        }
        // echo $sql;
    }
    else{
        echo "incorrect product number";
    }
    
?>
