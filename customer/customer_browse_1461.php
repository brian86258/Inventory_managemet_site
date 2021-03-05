<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0"> 
    <link rel="stylesheet" type="text/css" href="browse.css?version=&lt;?php echo time(); ?&gt;">
    <link rel="stylesheet" type="text/css" href="info.css?version=&lt;?php echo time(); ?&gt;">
    <!-- <script src="./action.js"></script> -->
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
                  <!-- <li><a href="./customer_browse.php">1201F-4116</a></li> -->

                    <li><a href="customer_browse.php">1201F-4116</a></li>
                    <li><a href="customer_browse_1461.php">1461T-4116</a></li>
                    <li><a href="customer_browse_8320.php">8320T-420</a></li>
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
          <!-- <hr> -->
          
          <div class="series_pic">
          </div>

          <div class="product_container">

          <?php
          // echo $_SESSION['username']."<br>";
          // echo $_SESSION['passwd'];
          $sql="SELECT * FROM product where series_ID like '%1461%'";
          $result = mysqli_query($db_link, $sql);
          // $row = @mysqli_fetch_row($result);
          // echo "<br>$row[0] $row[1]";
          while($row=mysqli_fetch_row($result)){
          ?>
          <div class="product">
                <div class="info">
                    <form name="form" method="post" action="confirm_purchase.php" class="box" accept-charset="utf-8" οnsubmit="document.charset='utf-8';" >
                        <img src="<?php echo $row[9]?>" alt="kinfe_pic">
                        <br>
                        <div class="Data-Title">
                            <div class="AlignRight">
                                品名：<br>
                                系列名：<br>
                                價錢：<br>
                            </div>
                        </div>


                        <div class="Data-Items">
                            <?php echo $row[0]?><br>
                            <?php echo $row[1]?><br>
                            <?php echo $row[8]?><br>
                            <input type="number" name="item_num" min="1" max="100000"/>
                            <input type="submit" value="purchase"/> 
                            <input type="hidden" name="item_name" value='<?php echo $row[0]?>'>
                            <input type="hidden" name="item_id" value="<?php echo $row[1]?>">
                            <input type="hidden" name="item_price" value="<?php echo $row[8]?>">
                        </div>

                    <!-- <input type="text"
        onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"
        onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'0')}else{this.value=this.value.replace(/\D/g,'')}" /> -->
                    </form>
                </div>
            </div>
            <?php } ?>

        

    </div>
</body>
</html>