<?php

    session_start();
    
    $_SESSION = array();

    if( isset( $_COOKIE[session_name()] ) == true ) {
	setcookie( session_name() , '' , time() - 42000 , '/' );
    }
    
    session_destroy();
    
?>
<!DOCTYPE html>
<html lang="ja">
 <head>
  <meta charset="UTF-8">
  <title>ログアウト</title>
 </head>
<body>

ログアウトしました。<br />
<br />
<a href="staff_login.html">ログイン画面へ</a>

</body>
</html>