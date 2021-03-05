<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
</body>
</html>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

    session_start();
    include("mysql_connection.php");

    $username = $_POST['username'];
    $pw = $_POST['pw'];
    $pw2 = $_POST['pw2'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $company=$_POST['company'];

    if($username != null && $pw != null && $pw2 != null && $pw == $pw2 && $email != null && $tel != null && $company != null)
    {
        //新增資料進資料庫語法
        $old_username=$_SESSION['username'];
        $old_company=$_SESSION['company'];
        $sql = "UPDATE company SET username='$username', passwd='$pw', tel='$tel', email='$email', company_name='$company' WHERE username='$old_username' and company_name='$old_company' ";

        echo $sql;
        if(mysqli_query($db_link, $sql)) //$db_link已經在mysql_connect.inc.php 裡面宣告過了
        {
            echo '<form name="form" method="post" class="login">';
            echo '新增成功!';
            $url=$_SERVER['HTTP_REFERER'];
            $_SESSION['username']=$username;
            $_SESSION['company']=$company;
            echo "<meta http-equiv=REFRESH CONTENT=1;url=$url>";        
        }
        else
        {
            echo '<form name="form" method="post" class="login">';
            echo '新增失敗!';
            $url=$_SERVER['HTTP_REFERER'];
            echo "<meta http-equiv=REFRESH CONTENT=1;url=$url>";        
        }
    }
    else
    {
        echo '您輸入之資料有誤!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
    }
?>
