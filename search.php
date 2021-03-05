<?php

    $db_type = 'mysql';//使用那一種資料庫
    $db_host = 'localhost';//主機位置
    $db_name = 'project';//資料庫名稱(已給定)
    $db_user = 'brian86258';//使用者
    $db_password= 'br86121517';//密碼

        
    try {
        $db = new PDO($db_type . ':host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_password);
        $db->query('SET NAMES UTF8'); // 資料庫使用 UTF8 編碼
        // print("Connection Success<br/>");
    } catch (PDOException $e) {
        echo 'Error!: ' . $e->getMessage() . '<br />';
        // php.phpinfo(); 會call這個檔案

    }

    
    $sql = "SELECT * FROM PRODUCT where product_name like ('%" . $_GET['term'] . "%') ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $product = $stmt->fetchall(\PDO::FETCH_ASSOC);

    if(!empty($product)){
        foreach($product as $row){
            $name[]=$row['product_name'].'('.$row['series_ID'].')';
            // $seried_ID[]=$row['series_ID'];
            // echo $row['product_name'];
        }
    };

    // foreach($seried_ID as $ID){
    //     echo $ID;
    // }
    // echo json_encode($seried_ID);
    echo json_encode($name);

?>