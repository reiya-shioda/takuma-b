<?php
session_start();

// ログイン状態チェック
if (!isset($_SESSION["NAME"])) {
    header("Location: Logout.php");
    exit;
}

$num1 = 332;
$num2 = 1.05;
$num3 = 4;
$num4 = 6;
$num5 = 8;

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="田隈Gr　B班">
    <meta name="keywords" content="実験用">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="デザイン.css">
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

  <br>
  <div id="content">
  
  
  <a name="top"></a>
  
  このホームページでは外食でよく目にする料理のカロリーと<br>
  そのカロリーを消費するために必要な運動量を表示します。
  
  <h1>料理一覧</h1>
  <table class="type01">
    <thead>
     <tr>
        <th scope="cols">料理名</th>
       <th scope="cols">量</th>
      <th scope="cols">食材</th>
      <th scope="cols">カロリー内訳</th>
　　　<th scope="cols">総カロリー</th>
      <th scope="cols">運動量</th>
    </tr>
    </thead>
  
      <tbody>
      
    <tr>
    <th scope="row"><img src="http://01.gatag.net/img/201506/21l/gatag-00007923.jpg" max-width="52.7" max-height="46.5" align="left" max-hspace="30"><br><br>そば</th>
      <td>1皿</td>
     <td>そば 220g<br> 
みりん 8g<br> 
醤油 17g<br> 
わさび 2g<br> 
長ネギ 8g<br> 
かつおだし 60g<br> 
焼きのり 0.9g
</td>
<td>290kcal<br>
18kcal<br>
12kcal<br>
5kcal<br>
2kcal<br>
2kcal<br>
2kcal<br>

<td>332kcal</td>
      <td>徒歩・サイクリング<br>
          <?php
          $num7 = sprintf('%.2f',($num1/($num2*$num3*$_SESSION["WEIGHT"])));
          echo ($num7)
          ?>
          時間<br>
          
          ジョギング<br>
           <?php
          $num8 = sprintf('%.2f',($num1/($num2*$num4*$_SESSION["WEIGHT"])));
          echo ($num8)
          ?>
          時間<br>
          水泳・ランニング<br>
           <?php
          $num9 = sprintf('%.2f',($num1/($num2*$num5*$_SESSION["WEIGHT"])));
          echo ($num9)
          ?>
          時間<br>
          </td>
    </tr>
  
    </tbody>
    
  </table>

    <br><br><br>


  <!--/.content--></div>
 
 
</body>

<footer id="footer">
  <br>
<a href="../Main.php">ホームへ</a><br><br>
<a href="../Logout.php">ログアウト</a><br>
  <p><small></small></p>
</footer>
<!--/.container--></div>
</html>