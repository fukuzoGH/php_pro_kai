<!DOCTYPE html>
<html lang="ja">
 <head>
  <meta charset="UTF-8">
  <title><?php require_once("pro_title.php"); ?></title>
 </head>
<body>

<?php

    //db接続文字列
    require_once "pro_db.php";

try {

$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT code,name,price FROM mst_product WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

print '商品一覧<br /><br />';

print '<form method="post" action="pro_branch.php">';
while(true) {
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)
	{
		break;
	}
	print '<input type="radio" name="procode" value="'.$rec['code']. '">';
	print $rec['name'].'---';
	print $rec['price'].'円';
	print '<br />';
}
print '<input type="submit" name="disp" value="参照">';
print '<input type="submit" name="add" value="追加">';
print '<input type="submit" name="edit" value="修正">';
print '<input type="submit" name="delete" value="削除">';
print '</form>';

}
catch (Exception $e) {
	 print 'ただいま障害により大変ご迷惑をお掛けしております。';
	 exit();
}

?>
<br>
<br>
<a href="../staff_login/staff_top.php">スタッフ ログイン トップ へ</a><br>
<br>
<a href="../">(単体で開いている場合)戻る</a><br>

</body>
</html>