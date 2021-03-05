<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Success</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
</body>
</html>

<?php session_start(); ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connection.php");
$id = $_POST['id'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$company=$_POST['company'];
//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($id != null && $pw != null && $pw2 != null && $pw == $pw2 && $email != null && $tel != null && $company != null)
{
    //新增資料進資料庫語法
    $sql = "insert into company (username, passwd, tel, email, company_name) values ('$id', '$pw', '$tel','$email','$company')";
    echo $sql;
    if(mysqli_query($db_link, $sql)) //$db_link已經在mysql_connect.inc.php 裡面宣告過了
    {
        echo '<form name="form" method="post" class="login">';
        echo '新增成功!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
    }
    else
    {
        echo '<form name="form" method="post" class="login">';
        echo '新增失敗!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
    }
}
else
{
    echo '您輸入之資料有誤!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
}
?>