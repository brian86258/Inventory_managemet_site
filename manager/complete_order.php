<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Order</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
</body>
</html>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
    // I --> 處理stock
    // 算出需要幾片ingredient,看generate, 在stock 減掉,將finish設為true
    session_start();
    include("mysql_connection.php");

    $datetime = $_POST['datetime'];
    $company = $_POST['company'];
    $name= $_POST['product_name'];
    $product_num= $_POST['product_num'];    
    $series= $_POST['series'];
    $total= $_POST['total_amount'];
    // echo $name;
    $sql= "select * from product where product_name='$name' and series_ID='$series'";
    $result = mysqli_query($db_link, $sql);
    $row=mysqli_fetch_row($result);
    // echo $row[0]."   ".$row[1]."   ".$row[2]."   ".$row[5];
    $ingredient=$row[2];
    $length=$row[3];
    $width=$row[4];
    $thickness=$row[5];
    $weight=$row[6];
    $num_per_ing=$row[7];

    // ***
    $Defective_rate=0.122;  
    // ***
    $should_oreder=round($product_num*(1+$Defective_rate));
    $need_ingredient=ceil($should_oreder/$num_per_ing);
    echo $need_ingredient;


    if($need_ingredient!= NULL){

        $sql = "update stock_ingredient set ingredient_num=(select ingredient_num where ingredient_ID='$ingredient')-$need_ingredient where ingredient_ID='$ingredient';";
        if(mysqli_query($db_link, $sql)) //$db_link已經在mysql_connect.inc.php 裡面宣告過了
        {
            echo '<form name="form" method="post" class="login">';
            echo '原料更新成功!';

            $sql = "update order_rec set finish=true where ord_date='$datetime' and company_name='$company'";
            if(mysqli_query($db_link, $sql)) {
                echo '訂單更新成功';
            }

            
            // II --> 處理finance
            // 在finance 更新公司,時間,金錢
            if($total != NULL){
                $sql= "insert into finance values('$datetime','$total','$company')";
                if(mysqli_query($db_link,$sql)){
                    echo '訂單更新成功';
                    
                }
            }

            $url=$_SERVER['HTTP_REFERER'];
            echo "<meta http-equiv=REFRESH CONTENT=1;url=$url>";
        }
        else
        {
            echo '<form name="form" method="post" class="login">';
            echo '原料更新!';
            $url=$_SERVER['HTTP_REFERER'];
            echo "<meta http-equiv=REFRESH CONTENT=1;url=$url>";

        }
        // echo $sql;
    }
    else{
        echo "incorrect product number";
    }



    
?>
