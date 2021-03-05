<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0"> 
    <link rel="stylesheet" type="text/css" href="M_browse.css?version=&lt;?php echo time(); ?&gt;">
    <link rel="stylesheet" type="text/css" href="info.css?version=&lt;?php echo time(); ?&gt;">
    <link rel="stylesheet" href="bower_components/css-ripple-effect/dist/ripple.min.css">
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    <script src="M_action.js?version=1.0"></script>

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
        
          <!-- <hr> -->
          
        <div class="series_pic"></div>

        <div class="new_product">
            <a class="ripple"><button class="new_product_button"> 新增產品 </button></a>

            <div class="info">
                <form name="new_product_form" method="post" action="insert_product.php " class="new_product_info">
                    <div class="Data-Title">
                        <div class="AlignRight">
                        產品名: <br>
                        系列名: <br>
                        原料名: <br>
                        長度(mm): <br>
                        寬度(mm): <br>
                        厚度(mm): <br>
                        重量(g): <br>
                        所需原料(片數):<br> 
                        價錢: <br>
                        照片網址: <br>
                        </div>
                    </div>

                    <div class="Data-Items">
                        <input type="text" name="product_name"><br>
                        <!-- <input type="text" name="series_ID"><br> -->
                        <select name="series_ID">
                            <option value="1201F-4116">1201F-4116</option>
                            <option value="1461T-4116">1461T-4116</option>
                            <option value="8320T-420">8320T-420</option>
                        </select><br>
                        <select name="ingredient_ID">
                            <option value="420J2">420J2</option>
                            <option value="AISI420">AISI420</option>
                            <option value="DIN4116">DIN4116</option>
                        </select><br>
                        <input type="text" name="length" min="1" max="1000"><br>
                        <input type="text" name="width" min="1" max="1000"><br>
                        <input type="text" name="thickness" min="1" max="1000"><br>
                        <input type="text" name="weight" min="1" max="1000"><br>
                        <input type="text" name="num_per_ingredient" min="1" max="1000"><br>
                        <input type="text" name="price" min="1" max="1000"><br>
                        <input type="text" name="img_url"><br>
                        <input type="submit" value="儲存"/>
                    </div>

                </form>
            </div>
        </div>


        <div class="product_container">
        <br>
        <?php
        $sql="SELECT * FROM product ORDER BY series_ID";
        $result = mysqli_query($db_link, $sql);
        // $row = @mysqli_fetch_row($result);
        // echo "<br>$row[0] $row[1]";
        while($row=mysqli_fetch_row($result)){
        ?>
        
            <div class="product">
                <div class="info">
                    <form name="form" method="post" action="modify_product.php" class="box" accept-charset="utf-8" οnsubmit="document.charset='utf-8';" >
                        <img src="<?php echo $row[9]?>" alt="kinfe_pic">
                        <br>
                        <div class="Data-Title">
                            <div class="AlignRight">
                                品名：<br>
                                系列名：<br>
                                價錢：<br>
                                刀具照片：<br>
                            </div>
                        </div>


                        <div class="Data-Items">
                            <input type="text" name="product_name" value='<?php echo $row[0]?>'/>  <br>
                            <input type="text" name="series_ID" value="<?php echo $row[1]?>"/>  <br>
                            <input type="text" name="price" value="<?php echo $row[8]?>"/>  <br>
                            <input type="text" name="img_url" value="<?php echo $row[9]?>"/>  <br>
                            <input type="submit" value="儲存"/>
                            <input type="submit" value="刪除" formaction="delete_product.php"/> 

                        </div>
                        <input type="hidden" name="old_product_name" value='<?php echo $row[0]?>'>
                        <input type="hidden" name="old_series_ID" value="<?php echo $row[1]?>">
                        <input type="hidden" name="item_price" value="<?php echo $row[8]?>">

             
                    <!-- <input type="text"
        onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"
        onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'0')}else{this.value=this.value.replace(/\D/g,'')}" /> -->
                    </form>
                </div>

            </div>

            <?php } ?>
        


        </div>

        
    </div>
</body>
</html>