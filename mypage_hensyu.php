<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_POST['from_mypage'])){
    header('Location:login_error.php');
}
?>

<!DOCTYPE HTML>
<html lang = "ja">

<head>
    <meta charset = "UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="logout"><a href="log_out.php">ログアウト</a></div>
    </header>

    <main>
       <form action="mypage_update.php" method="post">
            <div class="form_contents">

                <h2>会員情報</h2>

                <div class="hello">
                    <?php echo "こんにちは！ ".$_SESSION['name']." さん"; ?>
                </div>

                <div class="picture">
                    <img src ="<?php echo $_SESSION['picture']; ?>">
                </div>

                <div class="right">

                    <div class="name">
                        <label>氏名 : </label>
                        <input type="text" class="formbox" name="name" size="40" value="<?php echo $_SESSION['name']; ?>" required>
                    </div>

                    <div class="mail">
                        <label>メールアドレス : </label>
                        <input type="text" class="formbox" name="mail" size="40" value="<?php echo $_SESSION['mail']; ?>" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                    </div>

                    <div class="password">
                        <label>パスワード : </label>
                        <input type="text" class="formbox" name="password" size="40" value="<?php echo $_SESSION['password']; ?>" pattern="^[a-zA-Z0-9]{6,}$" required>
                    </div>

                </div>

                <div class="comments">
                <textarea rows="5" cols="45" name="comments"><?php echo $_SESSION['comments']; ?></textarea> 
                </div>

                <div class="toroku">
                    <input type="submit" class="button" size="35" value="この内容に変更する">
                </form>
                </div>
            </div>
        </form>
    </main>

    <footer>
        © 2018 InterNous.inc. All rights reserved
    </footer>
</body>

</html>