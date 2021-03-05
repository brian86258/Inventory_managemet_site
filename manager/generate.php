<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>generate</title>
    <link rel="stylesheet" href="material_table.css">
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="./M_action.js"></script>
    

</head>

<?php session_start();?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<body>
    <?php
        include("mysql_connection.php");

        $datetime = $_POST['datetime'];
        $company = $_POST['company'];

        // if 有 company 才要去record找紀錄
        if($company){
            $sql = "select * from order_rec where ord_date='$datetime' and company_name='$company'";
            $result = mysqli_query($db_link, $sql);
            $row=mysqli_fetch_row($result);
            // echo $row[0]."   ".$row[1]."   ".$row[2]."   ".$row[4];
            $datetime=$row[0];
            $product_num=$row[4];
            $name=$row[1];
            $series=$row[2];
        }
        //  echo $product_num."<br>";
        else{
            $term=$_POST['term'];
            $product_num=$_POST['num'];
            $pos=strpos($term,'(');
            $series=substr($term,$pos+1, -1);
            $name=substr($term,0, $pos);


        }

        // echo $name."<br>".$series."<br>";
        $pos=strpos($series,"-");
        $sql= "select * from product where product_name like '%$name%' and series_ID='$series'";
        $result = mysqli_query($db_link, $sql);
        $row=mysqli_fetch_row($result);
        // echo $row[0]."   ".$row[1]."   ".$row[2]."   ".$row[5];
        $ingredient=$row[2];
        $length=$row[3];
        $width=$row[4];
        $thickness=$row[5];
        $weight=$row[6];
        $num_per_ing=$row[7];

        // echo $sql."<br>".$ingredient."<br>".$num_per_ing."<br>";


        // ***
        $Defective_rate=0.122;
        // ***

    ?>

    <div  >
        <table class="material_table">
            <tr>
                <th colspan="3">製造批號 19/2017</th>
                <th colspan="3">日期 <?php echo $datetime?></th>
            </tr>
            <tr>
                <td>貨號</td>
                <td>
                    <?php
                        echo substr($series,0, $pos);
                    ?>
                </td>
                <td>最小下料數</td>
                <td>
                    <?php
                        $min_order=$num_per_ing*ceil($product_num/$num_per_ing);
                        echo $min_order;
                    ?>
                </td>
                <td>原料號碼</td>
                <td>
                    <?php
                        echo $ingredient;
                    ?>
                </td>
            </tr>
            <tr>
                <td>品名</td>
                <td>
                    <?php
                        echo $name;
                    ?>
                </td>
                <td>多餘支數</td>
                <td>
                    <?php
                        echo $min_order-$product_num;
                    ?>
                </td>
                <td>厚度</td>
                <td>
                    <?php
                        echo $thickness;
                    ?>
                </td>
            </tr>
            <tr>
                <td>需要支數</td>
                <td>
                    <?php
                        echo $product_num;
                    ?>
                </td>
                <td>預計多下片數</td>
                <td><?php 
                    $should_oreder=round($product_num*(1+$Defective_rate));
                    echo ceil($should_oreder/$num_per_ing)-ceil($product_num/$num_per_ing) 
                ?></td>
                <td>需要片數</td>
                <td><?php echo ceil($should_oreder/$num_per_ing)?></td>
            </tr>
            <tr>
                <td colspan="2">剪版尺寸</td>
                <td>應下料數</td>
                <!-- 應下料數要改變 -->
                <td>
                    <?php 
                        echo $should_oreder;
                    ?> 
                </td>
                <td>每片重量(g)</td>
                <td><?php echo $weight*$num_per_ing?></td>
            </tr>
            <tr>
                <td>長度</td>
                <td>寬度</td>
                <td>下料多餘數</td>
                <td><?php echo $should_oreder-$product_num?></td>
                <td>預估重量(kg)</td>
                <td>
                    <?php
                        echo round($weight*$should_oreder/1000,2);
                    ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $length?></td>
                <td><?php echo $width?></td>
                <td>預估損耗率%</td>
                <td><?php echo $Defective_rate*100?>%</td>
                <td>麥克</td>
                <td>無</td>
            </tr>
            <tr>
                <td>每片支數</td>
                <td><?php echo $num_per_ing?></td>
                <td rowspan="3" colspan="4">備註</td>
            </tr>
            <tr>
                <td>製表</td>
                <td>xxx</td>
            </tr>
            <tr>
                <td>主管</td>
                <td>xxx</td>
            </tr>



        </table>

        <div class="print_div">
            <!-- <p>。</p>; -->
            <input type="submit" value="立即列印" class="print_button" >
        </div>
        
    </div>
</body>
</html>
