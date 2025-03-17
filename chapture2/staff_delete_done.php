<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php require_once("staff_title.php"); ?></title>
</head>
<body>

<?php

    try {

        require_once "staff_db.php";

        $staff_code = $_POST['code'];

        $dbh = new PDO($dsn,$user,$password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql = 'DELETE FROM mst_staff WHERE code=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $staff_code;
        $stmt -> execute($data);

        $dbh = null;

    } catch (Exception $e) {
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
    }

?>

削除しました。<br />
<br />
<a href="staff_list.php"> 戻る</a>

</body>
</html>