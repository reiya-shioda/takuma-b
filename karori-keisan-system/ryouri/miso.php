<?php
session_start();

// ログイン状態チェック
if (!isset($_SESSION["NAME"])) {
    header("Location: Logout.php");
    exit;
}

$num1 = 646;
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
    <th scope="row"><img src="http://3.bp.blogspot.com/-AZ5s5IkpST0/UchCAFG7aYI/AAAAAAAAVHo/KnlKBNG3vXw/s800/food_gyudon.png" max-width="52.7" max-height="46.5" align="left" max-hspace="30"><br><br>みそラーメン</th>
       <td>1杯</td>
      <td>中華麺　230g<br>
          サラダ油　10g<br>
          豚もも肉　30g<br>
          赤みそ　25g<br>
          さとう　10g<br>
       ラード（スープ用）　3g<br>
もやし　100g<br>
キャベツ　45g<br>　
中華だし　300g<br>
ニンジン　15g<br>
長ネギ　10g<br>
しょうゆ　2g<br>
しお　1.5g
      
 

</td>
<td>343kcal<br>
    92kcal<br>
    55kcal<br>
    47kcal<br>
    38kcal<br>
    28kcal<br>
    14kcal<br>
    10kcal<br>
    9kcal<br>
    6kcal<br>
    3kcal<br>
    1kcal<br>
    0kcal
</td>
<td> 646kcal</td>
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