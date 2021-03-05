<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0"> 
    <link rel="stylesheet" type="text/css" href="browse.css?version=&lt;?php echo time(); ?&gt;">
    <link rel="stylesheet" type="text/css" href="info.css?version=&lt;?php echo time(); ?&gt;">
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    <script src="action.js?version=1.0"></script>



    <title>Atlantic.Co</title>
    <?php 
    session_start();
    include("mysql_connection.php");
    ?>
</head>

<body>
    <div class="super_container">
        <header>
            <div class="logo"></div>
            <nav>
          <!--      <div class="search navitem">
                <input class="search_text" type="text" value="請輸入商品名稱"></input>
              <input class="search__button" type="button" name="" value="確定">
              </div> -->
              <div class="navitem">
                <div class="navitem_category">
                  <p>商品種類</p>
                  <ul>
                    <li><a href="./customer_browse.php">1201F-4116</a></li>
                    <li><a href="./customer_browse_1461.php">1461T-4116</a></li>
                    <li><a href="./customer_browse_8320.php">8320T-420</a></li>
                  </ul>
                </div>
              </div>
              
              <div class="navitem">
                <div class="naviten_icon"></div>
                <a href="./customer_order.php">訂單管理</a>
              </div>
                <div class="navitem">
                <div class="naviten_icon"></div>
                <a href="./customer_Info.php">帳戶管理</a>
              </div>
          
                <div class="navitem">
                <div class="naviten_icon"></div>
                <a href="./logout.php">登出</a>
              </div>
              
            </nav>
        </header>

        <hr>
        <?php
            // echo $_SESSION['username']."<br>".$_SESSION['company'];
            $company=$_SESSION['company'];
            $sql="SELECT * FROM order_rec where company_name ='$company'";
            $result = mysqli_query($db_link, $sql);
            // echo "<br>$row[0] $row[1]";
        ?>
        <div claas="user_table">
            <table id="cus_order">
                <tr>
                    <th>下訂日期</th>
                    <th>商品名稱</th>
                    <th>系列編號</th>
                    <th>公司名</th>
                    <th>購買數量</th>
                    <th>總金額</th>
                    <th>取消訂單</th>
                </tr>
                <?php  while($row=mysqli_fetch_row($result)){ ?>
                    <tr>
                        
                        <td><?php echo "$row[0]"?></td>
                        <td><?php echo "$row[1]"?></td>
                        <td><?php echo "$row[2]"?></td>
                        <td><?php echo "$row[3]"?></td>
                        <td><?php echo "$row[4]"?></td>
                        <td><?php echo "$row[5]"?></td>
                        <form name="form" method="post" action="delete_order.php" class="login" accept-charset="utf-8" οnsubmit="document.charset='utf-8';">
                        <td><input type="submit" value="取消"/> <br></td>
                        <input type="hidden" name="datetime" value="<?php echo "$row[0]"?>">
                        <input type="hidden" name="company" value="<?php echo "$row[3]"?>">
                        </form>
                    </tr>
                <?php } ?>

            </table>
        </div>

        

</body>
