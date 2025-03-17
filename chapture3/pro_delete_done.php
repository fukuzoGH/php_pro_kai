<!DOCTYPE html>
<html lang="ja">
 <head>
  <meta charset="UTF-8">
  <title><?php require_once("pro_title.php"); ?></title>
 </head>
<body>

<?php

require_once "pro_db.php";

try {

    //$pro_code=$_POST['code'];
    $pro_code = filter_input( INPUT_POST, 'code' );

    //$pro_gazou_name=$_POST['gazou_name'];
    $pro_gazou_name = filter_input( INPUT_POST, 'gazou_name' );

    $dbh = new PDO($dsn,$user,$password);
    $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql='DELETE FROM mst_product WHERE code=?';
    $stmt=$dbh->prepare($sql);
    
    $data[]=$pro_code;
    $stmt->execute($data);

    $dbh=null;

    if($pro_gazou_name!=''){
        unlink('./gazou/'.$pro_gazou_name);
    }

} catch (Exception $e) {
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
}

?>

削除しました。<br />
<br />
<a href="pro_list.php"> 戻る</a>

</body>
</html>