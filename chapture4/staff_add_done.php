<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
	print 'ログインされていません。<br />';
	print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
	exit();
}
else
{
	print $_SESSION['staff_name'];
	print 'さんログイン中<br />';
	print '<br />';
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title> <?php require_once("pro_title.php"); ?> </title>
</head>
<body>

<?php

require_once "pro_db.php";

try {

    //$staff_name=$_POST['name'];
    $staff_name = filter_input( INPUT_POST, 'name' );

    //$staff_pass=$_POST['pass'];
    $staff_pass = filter_input( INPUT_POST, 'pass' );
    

    $staff_name = htmlspecialchars( $staff_name ,ENT_QUOTES,'UTF-8');
    $staff_pass = htmlspecialchars( $staff_pass ,ENT_QUOTES,'UTF-8');

    $dbh = new PDO($dsn,$user,$password);
    $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql='INSERT INTO mst_staff (name,password) VALUES (?,?)';
    $stmt=$dbh->prepare($sql);
    
    $data[]=$staff_name;
    $data[]=$staff_pass;
    
    $stmt->execute($data);

    $dbh=null;

print $staff_name;
print 'さんを追加しました。<br />';

}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<a href="staff_list.php"> 戻る</a>

</body>
</html>