<?php
require 'password.php'; 
// セッション開始
session_start();

      require_once 'database_conf.php';
      require_once 'h.php';
      try {
        $db = new PDO($dsn, $dbUser, $dbPass);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'データベースに接続しました';
      } catch (PDOException $e) {
        echo '接続できませんでした 理由: ' . h($e->getMessage());
      }
      
// エラーメッセージの初期化
$errorMessage = "";

// ログインボタンが押された場合
if (isset($_POST["login"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST["username"])) {
        $errorMessage = 'ユーザー名が未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    }

if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        // 入力したユーザIDを格納
        $username = $_POST["username"];

        // エラー処理
                
        try {
            $pdo = new PDO($dsn, $dbUser, $dbPass, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            
            $stmt = $pdo->prepare('SELECT * FROM userData WHERE id = ?');
            $stmt->execute(array($username));

            $password = $_POST["password"];

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if (password_verify($password, $row['password'])) {
                    session_regenerate_id(true);

                    // 入力したIDのユーザー名を取得
                    $id = $row['id'];
                    $sql = "SELECT * FROM userData WHERE id = $id";  //入力したIDからユーザー名を取得
                    $stmt = $pdo->query($sql);
                    foreach ($stmt as $row) {
                        $row['name'];  // ユーザー名
                    }
                    $_SESSION["NAME"] = $row['name'];
                    
                    
                    foreach ($stmt as $row) {
                        $row['weight'];  // 体重
                    }
                    $_SESSION["WEIGHT"] = $row['weight'];
                    
                    header("Location: main.php");  // メイン画面へ遷移
                    exit();  // 処理終了
                } else {
                    // 認証失敗
                    $errorMessage = 'ユーザー名あるいはパスワードに誤りがあります。';
                }
            } else {
                $errorMessage = 'ユーザー名あるいはパスワードに誤りがあります。';
            }
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';

        }
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
        <h1>ログイン画面</h1>
        <form id="loginForm" name="loginForm" action="" method="POST">
            <fieldset>
                <legend>ログインフォーム</legend>
                <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
                <label for="username">会員番号</label><input type="text" id="username" name="username" placeholder="会員番号を入力" value="<?php if (!empty($_POST["username"])) {echo htmlspecialchars($_POST["username"], ENT_QUOTES);} ?>">
                <br>
                <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
                <br>
                <input type="submit" id="login" name="login" value="ログイン">
            </fieldset>
        </form>
        <br>
        <form action="signup.php">
            <fieldset>          
                <legend>新規登録フォーム</legend>
                <input type="submit" value="新規登録">
            </fieldset>
        </form><br><br>
    </body>
</html>

<footer id="footer">
  <br><br>

</footer>
</html>