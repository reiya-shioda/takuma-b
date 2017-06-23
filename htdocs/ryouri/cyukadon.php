<?php
session_start();

// ログイン状態チェック
if (!isset($_SESSION["NAME"])) {
    header("Location: Logout.php");
    exit;
}

$num1 = 661;
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
    <th scope="row"><img src="http://4.bp.blogspot.com/-9Hc1u_NsbUA/Vwe_DFR2e-I/AAAAAAAA5nQ/5zfiW8H07EIt9ABlhf8Zit40ARh6FVOhg/s800/food_chuukadon.png" max-width="52.7" max-height="46.5" align="left" max-hspace="30"><p><br><br>中華丼</a></th>
      <td>1皿</td>
       <td>ごはん 210g<br>
           サラダ油 11.3g<br>
          豚ロース 30g<br>
かたくり粉 8g<br>
芝エビ 30g<br>
うずらの卵の水煮缶 9g<br>
いか 15g<br>
はくさい 70g<br>
たまねぎ 20g<br>
タケノコ 20g<br>
にんじん 15g<br>
さとう 1.5g<br>
醤油 7g<br>
中華だし 100g<br>
シイタケ 15g<br>
きくらげ 0.25g<br>
しお 1.2g
</td>
<td>353kcal<br>
104kcal<br>
79kcal<br>
26kcal<br>
25kcal<br>
16kcal<br>
13kcal<br>
9kcal<br>
7kcal<br>
6kcal<br>
6kcal<br>
6kcal<br>
5kcal<br>
3kcal<br>
3kcal<br>
0kcal<br>
0kcal<br>

      <td>661kcal</td>
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