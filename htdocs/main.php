<?php
session_start();

// ログイン状態チェック
if (!isset($_SESSION["NAME"])) {
    header("Location: logout.php");
    exit;
}
if( empty($_POST['x']) ){
$x = 0;
}else{
$x = $_POST['x'];
}

$num1 = $x;
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
        <p>ようこそ<u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>さん</p>  <!-- ユーザー名をechoで表示 -->
        
        <br>
  <div id="content">
  
  
  <a name="top"></a>
  
  このホームページでは外食でよく目にする料理のカロリーと<br>
  そのカロリーを消費するために必要な運動量を表示します。

  <h2>料理一覧</h2>
  <table class="type01">
    <thead>
    <tr>
      <th scope="cols">ジャンル</th>
　　　
      <th scope="cols" colspan="4">料理名</th>
      
    </tr>
    </thead>
  
      <tbody>
      
    <tr>
      <th scope="row">丼物</a></th>
      <td><a href="ryouri/gyudon.php">牛丼</a></td>
      <td><a href="ryouri/kaisendon.php">海鮮丼</a></td>
      <td><a href="ryouri/cyukadon.php">中華丼</a></td>
      <td><a href="ryouri/tendon.php">天丼</a></td>
    </tr>
  
    <tr>
      <th scope="row">麺類</a></th>
      <td><a href="ryouri/soba.php">そば</a></td>
      <td><a href="ryouri/udon.php">うどん</a></td>
      <td><a href="ryouri/ramen.php">ラーメン</a></td>
      <td><a href="ryouri/meatsource.php">スパゲティ</a></td>
    </tr>
  
  
    <tr>
      <th scope="row">ファストフード</a></th>
      <td><a href="ryouri/hamburger.php">ハンバーガー</a></td>
      <td><a href="ryouri/potato.php">フライドポテト</a></td>
      <td><a href="ryouri/chickennaget.php">チキンナゲット</a></td>
      <td><a href="ryouri/hotcake.php">ホットケーキ</a></td>
    </tr>  
   
    
    <tr>
      <th scope="row">寿司</a></th>
      <td><a href="ryouri/simesaba.php">〆鯖</a></td>
      <td><a href="ryouri/corn.php">コーン</a></td>
      <td><a href="ryouri/tunasarada.php">ツナサラダ</a></td>
      <td><a href="ryouri/maguro.php">マグロ</a></td>
    </tr>
    
    <tr>
      <th scope="row">パン</a></th>
      <td><a href="ryouri/anpan.php">アンパン</a></td>
      <td><a href="ryouri/syokupan.php">食パン</a></td>
      <td><a href="ryouri/kare-pan.php">カレーパン</a></td>
      <td><a href="ryouri/kurimu.php">クリームパン</a></td>
    </tr>
    
    </tbody>
    
  </table>

    <br><br><br>
 <h2>消費したいカロリーを入力してください。</h2>


  <table class="type01">
    <thead>
    <tr>
     <th scope="cols">運動量</th>
    </tr>
    </thead>
  
      <tbody>
<head>
</head>
         <body>
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

<form method="POST">
<font size="6"><input type="text" name="x" value="<?=$x?>" size=1 style="font-size:50px;">kcal</font>
<input type="submit" value="入力"><br><br>
</form>
 </table>
 
 <h2>カロリー消費量ランキング</h2>
 
 <table class="type01">
    <thead>
    <tr>
<th scope="cols">順位</th>
     <th scope="cols">運動</th>
     <th scope="cols">消費カロリー(kcal/h）</th>
    </tr>
    </thead>
  
      <tbody>
<head>
</head>
         <body>
          <tr>
<td>1位</td>
          <td><Div Align="left">水泳・ランニング</Div></td>
          <td><Div Align="left">
          <?php
         $ans3 = sprintf('%.1f',($num2*$num5*$_SESSION["WEIGHT"]));
          echo ($ans3)
          ?>
          (kcal/h）
          </Div>
          </td>
          </tr>
          
          <tr>
<td>2位</td>
          <td><Div Align="left">ジョギング</Div></td>
          <td><Div Align="right">
          <?php
          $ans2 = sprintf('%.1f',($num2*$num4*$_SESSION["WEIGHT"]));
          echo ($ans2)
          ?>
          (kcal/h）
          </Div>
          </td>
          </tr>
          
          <tr>
<td>3位</td>
          <td><Div Align="left">徒歩・サイクリング</Div></td>
          <td><Div Align="right">
           <?php
 $ans1 = sprintf('%.1f',($num2*$num3*$_SESSION["WEIGHT"]));
          echo ($ans1)
          
          ?>
          (kcal/h）
          </Div>
          </td>
          </tr>
</table>

 <h2>高カロリーランキング</h2>
 
 <table class="type01">
    <thead>
    <tr>
<th scope="cols">順位</th>
     <th scope="cols">料理名</th>
     <th scope="cols">カロリー(kcal)</th>
    </tr>
    </thead>
  
      <tbody>
<head>
</head>
         <body>
          <tr>
<td>1位</td>
          <td>ミートソーススパゲティ</td>
          <td>
          768kcal
          </td>
          </tr>
          
          <tr>
<td>2位</td>          
<td>海鮮丼</td>
          <td>
         717kcal
          </td>
          </tr>
          
          <tr>
<td>3位</td>          
<td>牛丼</td>
          <td>
           708kcal
          </td>
          </tr>
</table>

  <!--/.content--></div>
   
<br><br>
        
    </body>

<footer id="footer">
  <br>
<a href="logout.php">ログアウト</a><br><br>
</footer>
</html>
