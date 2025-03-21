<?php

//
session_start();
session_regenerate_id(true);


if(isset($_SESSION['login'])==false)
{
	print 'ログインされていません。<br />';
	print '<a href="staff_login.html">ログイン画面へ</a>';
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
<title>  <?php require_once("pro_title.php"); ?>  </title>
</head>
<body>

<?php

 require_once "pro_db.php";

try {

//$pro_code=$_POST['code'];
$pro_code = filter_input( INPUT_POST, 'code' );

//$pro_name=$_POST['name'];
$pro_name = filter_input( INPUT_POST, 'name' );

//$pro_price=$_POST['price'];
$pro_price = filter_input( INPUT_POST, 'price' );

//$pro_gazou_name_old=$_POST['gazou_name_old'];
$pro_gazou_name_old = filter_input( INPUT_POST, 'gazou_name_old' );

//$pro_gazou_name=$_POST['gazou_name'];
$pro_gazou_name = filter_input( INPUT_POST, 'gazou_name' );

$pro_code  = htmlspecialchars($pro_code,ENT_QUOTES,'UTF-8');
$pro_name  = htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_price = htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');


$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='UPDATE mst_product SET name=?,price=?,gazou=? WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$pro_name;
$data[]=$pro_price;
$data[]=$pro_gazou_name;
$data[]=$pro_code;
$stmt->execute($data);

$dbh=null;

if($pro_gazou_name_old!=$pro_gazou_name)
{
	if($pro_gazou_name_old!='')
	{
		unlink('./gazou/'.$pro_gazou_name_old);
	}
}

print '修正しました。<br />';

}
catch(Exception$e)
{
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<a href="pro_list.php">戻る</a>

</body>
</html>