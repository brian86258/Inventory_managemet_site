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
          
        <div class="series_pic">
        </div>
        <hr>

        <div class="info">
          <form name="form" method="post" action="modify_customer_info.php" class="cus_info">
              <div class="Data-Title">
                <div class="AlignRight">
                  修改帳號: <br>
                  修改密碼: <br>
                  請再次輸入密碼: <br>
                  修改電話: <br>
                  Email: <br>
                  公司名: <br>
                </div>
              </div>

              <div class="Data-Items">
                <input type="text" name="username" value="<?php echo $_SESSION['username']?>"/>  <br>
                <input type="password" name="pw" value="<?php echo $_SESSION['passwd']?>"/> <br>
                <input type="password" name="pw2" /> <br>
                <input type="text" name="tel" value="<?php echo $_SESSION['tel']?>"/> <br>
                <input type="text" name="email" value="<?php echo $_SESSION['email']?>"/> <br>
                <input type="text" name="company" value="<?php echo $_SESSION['company']?>"/> <br>
                <button type="submit">確定</button>

              </div>

          </form>
        </div>

          
    </div>
</body>
