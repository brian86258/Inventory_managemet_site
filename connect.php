<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
include("mysql_connection.php");
$username = $_POST['username'];
$passwd = $_POST['passwd'];

if($username == "manager" && $passwd == "862236"){
    $_SESSION['username'] = $username;
    $_SESSION['passwd'] = "862236";

    echo '登入成功!';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=./manager/manager_browse.php>';
}
else{
    //搜尋資料庫資料
    $sql = "SELECT * FROM company where username = '$username'";
    echo $sql;
    $result = mysqli_query($db_link, $sql);
    $row = @mysqli_fetch_row($result);
    echo "<br>$row[0] $row[1] $row[2] $row[3] $row[4] $row[5]";

    //判斷帳號與密碼是否為空白
    //以及MySQL資料庫裡是否有這個會員
    if($username != null && $passwd != null && $row[0] == $username && $row[1] == $passwd)
    {
        //將帳號寫入session，方便驗證使用者身份
        $_SESSION['username'] = $username;
        $_SESSION['passwd'] = $passwd;
        $_SESSION['tel']= $row[2];
        $_SESSION['email']= $row[3];
        $_SESSION['company']= $row[4];
        


        echo '登入成功!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=./customer/customer_browse.php>';
    }
    else
    {
        echo '登入失敗!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.html>';
    }
}
?>
