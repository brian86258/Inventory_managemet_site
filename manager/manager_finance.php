<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0"> 
    <link rel="stylesheet" type="text/css" href="M_browse.css?version=&lt;?php echo time(); ?&gt;">
    <link rel="stylesheet" type="text/css" href="info.css?version=&lt;?php echo time(); ?&gt;">


    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    <script src="action.js"></script>
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
        <?php
            // echo $_SESSION['username']."<br>".$_SESSION['company'];
            $company=$_SESSION['company'];
            $sql="SELECT * FROM finance ";
            $result = mysqli_query($db_link, $sql);
            // echo "<br>$row[0] $row[1]";
        ?>
        <div claas="user_table">
            <table id="cus_order">
                <tr>
                    <th>訂單日期</th>
                    <th>下訂單公司</th>
                    <th>訂單金額</th>
 

                </tr>
                <?php  while($row=mysqli_fetch_row($result)){ ?>
                    <tr>
                        
                        <td><?php echo "$row[0]"?></td>
                        <td><?php echo "$row[2]"?></td>
                        <td><?php echo "$row[1]"?></td>
                    </tr>
                <?php } ?>


                <tr>
                    <?php 
                        $sql="select sum(total_amount) from finance;";
                        $result = mysqli_query($db_link, $sql);
                        $row=mysqli_fetch_row($result)
                    ?>
                    <th colspan="3">目前資金 = <?php echo $row[0]?></th>
                </tr>

            </table>
        </div>

        
        
    </div>
</body>
</html>