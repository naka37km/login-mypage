<?php
mb_internal_encoding("utf8");
session_start();

if(empty($_SESSION['id'])){

    try{
        $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
    }catch(PDOException $e){
        die(
            "<p>申し訳ありません。現在サーバが混み合っており一時的にアクセスができません。<br>しばらくしてから再度ログインしてください</p>
            <a href = 'http://localhost/login_mypage/login.php'>ログイン画面へ</a>"
        );
    }

    $stmt = $pdo->prepare("select * from login_mypage where mail=? && password=?");

    $stmt->bindValue(1,$_POST['mail']);
    $stmt->bindValue(2,$_POST['password']);

    $stmt->execute();
    $pdo=NULL;

    while($row = $stmt->fetch()){
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['mail'] = $row['mail'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['picture'] = $row['picture'];
        $_SESSION['comments'] = $row['comments'];
    }

    if(empty($_SESSION['id'] )){
        header('Location:login_error.php');
    }

    if(!empty($_POST['login_keep'])){
        $_SESSION['login_keep'] = $_POST['login_keep'];
    }
}

if(!empty($_SESSION['id']) && !empty($_SESSION['login_keep'])){
    setcookie('mail', $_SESSION['mail'], time()+60*60*24*7);
    setcookie('password', $_SESSION['password'], time()+60*60*24*7);
    setcookie('login_keep', $_SESSION['login_keep'],time()+60*60*24*7);
}else if(empty($_SESSION['login_keep'])){
    setcookie('mail','', time()-1);
    setcookie('password','', time()-1);
    setcookie('login_keep','',time()-1);
}

?>

<!DOCTYPE HTML>
<html lang = "ja">

<head>
    <meta charset = "UTF-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="mypage.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="logout"><a href="log_out.php">ログアウト</a></div>
    </header>

    <main>
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
                    <?php echo $_SESSION['name']; ?>
                </div>

                <div class="mail">
                    <label>メールアドレス : </label>
                    <?php echo $_SESSION['mail']; ?>
                </div>

                <div class="password">
                    <label>パスワード : </label>
                    <?php echo $_SESSION['password']; ?>
                </div>

            </div>

            <div class="comments">
                <?php echo $_SESSION['comments']; ?>
            </div>

            <form action="mypage_hensyu.php" method="post" class="form_center">
            <div class="toroku">
                <input type="hidden" value="<?php echo rand(1,10); ?>" name="from_mypage">
                <input type="submit" class="button" size="35" value="編集する">
            </div>
            </form>
                
        </div>
    </main>

    <footer>
        © 2018 InterNous.inc. All rights reserved
    </footer>
</body>

</html>