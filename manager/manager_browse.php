<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="M_browse.css"> -->
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0"> 
    <link rel="stylesheet" type="text/css" href="M_browse.css?version=&lt;?php echo time(); ?&gt;">
    <link rel="stylesheet" type="text/css" href="info.css?version=&lt;?php echo time(); ?&gt;">

    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css"> -->
    <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

    <script src="M_action.js?version=1.1"></script>

    <title>Atlantic.Co</title>
    <?php 
    session_start();
    include("mysql_connection.php");
    ?>
</head>

<body>
    <div class="super_container">
        <header>
            <!-- <img src="logo.png"></img> -->
            <div class="logo"></div>
            <nav>
          <!--      <div class="search navitem">
                <input class="search_text" type="text" value="請輸入商品名稱"></input>
              <input class="search__button" type="button" name="" value="確定">
              </div> -->
     
            <div class="navitem">
                <div class="naviten_icon"></div>
                <a href="./manager_browse.php">訂單管理</a>
            </div>

            <div class="navitem">
                <div class="naviten_icon"></div>
                <a href="./manager_stock.php">庫存管理</a>
            </div>

            
            <div class="navitem">
                <div class="naviten_icon"></div>
                <a href="./manager_product.php">產品管理</a>
            </div>

            <div class="navitem">
                <div class="naviten_icon"></div>
                <a href="./manager_finance.php">資金管理</a>
            </div>
        
            <div class="navitem">
                <div class="naviten_icon"></div>
                <a href="./logout.php">登出</a>
            </div>
              
            </nav>
        </header>
        
        <hr>

        <div class="user_table">
            <h3> 生成下料單
            <table id="cus_order">
                <tr>
                    <form action="generate.php" method="post">
                        <th>日期:  <input type="datetime-local" id="birthdaytime" name="datetime"></th>
                        <th>產品名稱 :  <input id="auto_autocomplete" type="text" name="term"/></th>
                        <th>數量 : <input id="auto_autocomplete" type="number" name="num" /></th>
                        <th><input type="submit" value="生成"/></th>
                    </form>

                </tr>
            </table>
        </div>

        <?php
            // echo $_SESSION['username']."<br>".$_SESSION['company'];
            $company=$_SESSION['company'];
            $sql="SELECT * FROM order_rec where finish=false";
            $result = mysqli_query($db_link, $sql);
            // echo "<br>$row[0] $row[1]";
        ?>
        <div claas="user_table">
            <h3> 尚未完成訂單 
            <table id="cus_order">
                <tr>
                    <th>下訂日期</th>
                    <th>商品名稱</th>
                    <th>系列編號</th>
                    <th>公司名</th>
                    <th>購買數量</th>
                    <th>總金額</th>
                    <th>完成訂單</th>
                    <th>生成下料單</th>

                </tr>
                <?php  while($row=mysqli_fetch_row($result)){ ?>
                    <tr>
                        
                        <td><?php echo "$row[0]"?></td>
                        <td><?php echo "$row[1]"?></td>
                        <td><?php echo "$row[2]"?></td>
                        <td><?php echo "$row[3]"?></td>
                        <td><?php echo "$row[4]"?></td>
                        <td><?php echo "$row[5]"?></td>
                        <form name="form" method="post" action="complete_order.php" class="login" accept-charset="utf-8" οnsubmit="document.charset='utf-8';">
                            <td><input type="submit" value="完成"/> <br></td>
                            <input type="hidden" name="datetime" value="<?php echo "$row[0]"?>">
                            <input type="hidden" name="product_name" value='<?php echo $row[1]?>'>
                            <input type="hidden" name="series" value="<?php echo "$row[2]"?>">
                            <input type="hidden" name="company" value="<?php echo "$row[3]"?>">
                            <input type="hidden" name="product_num" value="<?php echo "$row[4]"?>">
                            <input type="hidden" name="total_amount" value="<?php echo "$row[5]"?>">


                        </form>
                        <form name="form" method="post" action="generate.php" class="login" accept-charset="utf-8" οnsubmit="document.charset='utf-8';">
                            <td><input type="submit" value="生成"/> <br></td>
                            <input type="hidden" name="datetime" value="<?php echo "$row[0]"?>">
                            <input type="hidden" name="company" value="<?php echo "$row[3]"?>">
                        </form>
                    </tr>
                <?php } ?>

            </table>


            <?php
            // echo $_SESSION['username']."<br>".$_SESSION['company'];
            $company=$_SESSION['company'];
            $sql="SELECT * FROM order_rec where finish=true";
            $result = mysqli_query($db_link, $sql);
            // echo "<br>$row[0] $row[1]";
            ?>
            <h3> 歷史訂單
            <table id="cus_order">
                <tr>
                    <th>下訂日期</th>
                    <th>商品名稱</th>
                    <th>系列編號</th>
                    <th>公司名</th>
                    <th>購買數量</th>
                    <th>總金額</th>
                    <th>生成下料單</th>

                </tr>
                <?php  while($row=mysqli_fetch_row($result)){ ?>
                    <tr>
                        
                        <td><?php echo "$row[0]"?></td>
                        <td><?php echo "$row[1]"?></td>
                        <td><?php echo "$row[2]"?></td>
                        <td><?php echo "$row[3]"?></td>
                        <td><?php echo "$row[4]"?></td>
                        <td><?php echo "$row[5]"?></td>

                        <form name="form" method="post" action="generate.php" class="login" accept-charset="utf-8" οnsubmit="document.charset='utf-8';">
                            <td><input type="submit" value="生成"/> <br></td>
                            <input type="hidden" name="datetime" value="<?php echo "$row[0]"?>">
                            <input type="hidden" name="company" value="<?php echo "$row[3]"?>">
                        </form>
                    </tr>
                <?php } ?>

            </table>


        </div>

        
        
    </div>
</body>
</html>