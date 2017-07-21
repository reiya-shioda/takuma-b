﻿<?php
require 'password.php';   
// セッション開始
session_start();

require_once 'database_conf.php';
require_once 'h.php';

// エラーメッセージ、登録完了メッセージの初期化
$errorMessage = "";
$signUpMessage = "";

// ログインボタンが押された場合
if (isset($_POST["signUp"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST["username"])) {  // 値が空のとき
        $errorMessage = 'ユーザーIDが未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    } else if (empty($_POST["password2"])) {
        $errorMessage = 'パスワードが未入力です。';
    }

    if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["password2"]) && $_POST["password"] === $_POST["password2"]) {
        // 入力したユーザIDとパスワードを格納
        $username = $_POST["username"];
        $password = $_POST["password"];
        $gender = $_POST["gender"];
        $height = $_POST["height"];
        $weight = $_POST["weight"];
        

        // 3. エラー処理
        try {
            $pdo = new PDO($dsn, $dbUser, $dbPass, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

            $stmt = $pdo->prepare("INSERT INTO userdata(name, password,gender,height,weight) VALUES (?, ?, ?, ?, ?)");

            $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT),$gender,$height,$weight));  // パスワードのハッシュ化を行う（今回は文字列のみなのでbindValue(変数の内容が変わらない)を使用せず、直接excuteに渡しても問題ない）
            $userid =$pdo->lastinsertid();

            $signUpMessage = '登録が完了しました。あなたの会員番号は '. $userid. ' 番です。<FONT COLOR="RED">会員番号はログインに必要です。</FONT>'; 
             // ログイン時に使用するIDとパスワード
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            // $e->getMessage() でエラー内容を参照可能（デバック時のみ表示）
            // echo $e->getMessage();
        }
    } else if($_POST["password"] != $_POST["password2"]) {
        $errorMessage = 'パスワードに誤りがあります。';
    }
}
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="田隈Gr　B班">
    <meta name="keywords" content="実験用">
    <meta name="viewport" content="width=device-width,user-scalable=no,maximum-scale=1" />
    <link rel="stylesheet" media="all" type="text/css" href="デザイン.css" />
    <link rel="stylesheet" media="all" type="text/css" href="デザインs.css" />
    <title>PM演習</title>
  </script>
  </head>
   
<div id="container">
  <header id="header">
  <h1>カロリー計算</h1>
 
  <script type="text/javascript"><!--
    myWeek=new Array("日","月","火","水","木","金","土");
  function myFunc(){
     myDate=new Date();
     myMsg = myDate.getFullYear() + "年";
     myMsg += ( myDate.getMonth() + 1 ) + "月";
     myMsg += myDate.getDate() + "日";
     myMsg += "(" + myWeek[myDate.getDay()] +  "曜日)";
     myMsg += myDate.getHours() + "時";
     myMsg += myDate.getMinutes() + "分";
     myMsg += myDate.getSeconds() + "秒";
     document.getElementById("myIDdate").innerHTML = myMsg;
  }
  
 // --></script>
 
  <DIV id="myIDdate">現在の時刻は</DIV>
  <script type="text/javascript"><!--
     setInterval( "myFunc()", 1000 );
  // --></script>
  </header>
  
    <body>
        <h1>新規登録画面</h1>
        <form id="loginForm" name="loginForm" action="" method="POST">
            <fieldset>
                <legend>新規登録フォーム</legend>
                <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
                <div><font color="#0000ff"><?php echo htmlspecialchars($signUpMessage, ENT_QUOTES); ?></font></div>
                <label for="username">*ユーザー名</label><input type="text" id="username" name="username" placeholder="ユーザー名を入力" value="<?php if (!empty($_POST["username"])) {echo htmlspecialchars($_POST["username"], ENT_QUOTES);} ?>">
                <br>
                <label for="password">*パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
                <br>
                <label for="password2">*パスワード(確認用)</label><input type="password" id="password2" name="password2" value="" placeholder="再度パスワードを入力">
                <br>
                <label for="gender">性別</label><input type="radio" id="gender" name="gender" value="1">男性
                <input type="radio" id="gender" name="gender" value="2">女性
                <br>
                <label for="height">身長(cm)</label><input type="text" id="height" name="height" value="<?php if (!empty($_POST["height"])) {echo htmlspecialchars($_POST["height"], ENT_QUOTES);} ?>" placeholder="整数で入力">
                <br>
                <label for="weight">体重(kg)</label><input type="text" id="weight" name="weight" value="<?php if (!empty($_POST["weight"])) {echo htmlspecialchars($_POST["weight"], ENT_QUOTES);} ?>" placeholder="整数で入力">
                <br>
                *入力必須
                <br>
                <input type="submit" id="signUp" name="signUp" value="新規登録">
            </fieldset>
        </form>
        <br>
        <form action="login.php">
            <input type="submit" value="戻る">
        </form>
    </body>
</html>

<footer id="footer">
  <br><br>
<a href="login.php">ホームへ</a><br>
  <p><small></small></p>
</footer>

</html>