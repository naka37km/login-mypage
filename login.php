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

                <div class="mail">
                    <label>メールアドレス</label><br>
                    <input type="text" class="formbox" name="mail" size="40" value="<?php if(!empty($_COOKIE['mail'])){
                         echo $_COOKIE['mail'];
                        }?>" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                </div>

                <div class="password">
                    <label>パスワード(半角英数字6文字以上)</label><br>
                    <input type="password" class="formbox" name="password" size="40" value="<?php if(!empty($_COOKIE['password'])){
                        echo $_COOKIE['password']; 
                        }?>" pattern="^[a-zA-Z0-9]{6,}$" required>
                </div>

                <div class="login_check">
                    <label><input type="checkbox" class="formbox" name="login_keep" size="40" value="login_keep"
                    <?php
                    if(isset($_COOKIE['login_keep'])){
                        echo "checked = 'checked'";
                    }
                    ?>>ログイン状態を保持する</label>
                </div>

                <div class="toroku">
                    <input type = "submit" class = "button" size="40" value = "ログイン" />
                </div>
            </div>
        </form>
    </main>

    <footer>
        © 2018 InterNous.inc. All rights reserved
    </footer>
</body>

</html>