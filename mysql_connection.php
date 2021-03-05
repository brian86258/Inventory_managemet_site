<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//資料庫設定
//資料庫位置
$db_server = "localhost";
//資料庫名稱
$db_name = "project";
//資料庫管理者帳號
$db_user = "brian86258";
//資料庫管理者密碼
$db_passwd = "br86121517";

//對資料庫連線
//宣告一個連線變數，並執行連結資料庫函式 mysqli_connect()，連結結果會帶入$db_link
//mysqli_connect開頭的 @ 是為了抑制函式執行若有產生錯誤訊息，會去擋掉顯示訊息。
$db_link = @mysqli_connect($db_server, $db_user, $db_passwd);

if ($db_link) {
    //設定連線編碼為utf8
    //mysqli_query(資料庫連線, "utf8") 為執行sql語法的函式
    mysqli_query($db_link, "SET NAMES 'utf8'");
    // echo "123";
    //選擇資料庫
    if(!@mysqli_select_db($db_link, $db_name))
        die("無法使用資料庫"); 
    
}
else {
    //否則就代表連線失敗 mysqli_connect_error() 是顯示連線錯誤訊息
    echo '連結mysql資料庫失敗'.mysqli_connect_error();
}
?>  
