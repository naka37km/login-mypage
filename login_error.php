<?php
session_start();
if(isset($_SESSION['id'])){
    header('Location:mypage.php');
}
?>

<!DOCTYPE HTML>
<html lang = "ja">

<head>
    <meta charset = "UTF-8">
    <title>ログイン画面</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="login"><a href="login.php">ログイン</a></div>
    </header>

    <main>
        <form action="mypage.php" method="post">
            <div class="form_contents">

                <div class="error_mess">メールアドレスまたはパスワードが間違っています。</div>

                <div class="mail">
                    <label>メールアドレス</label><br>
                    <input type="text" class="formbox" name="mail" size="40" value="" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                </div>

                <div class="password">
                    <label>パスワード(半角英数字6文字以上)</label><br>
                    <input type="password" class="formbox" name="password" size="40" value="" pattern="^[a-zA-Z0-9]{6,}$" required>
                </div>

                <div class="toroku">
                <input type = "submit" class = "button" value = "ログイン" />
                </div>

            </div>
        </form>
    </main>

    <footer>
        © 2018 InterNous.inc. All rights reserved
    </footer>
</body>

</html>