<?php
//セッションを開始
session_start();

//セッションに保存された「お名前」を取得
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '名無し';
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
  <meta charset="utf-8">
  <title>M's PortFolio</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
  <link rel="stylesheet" href="css/contact.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&family=Sawarabi+Mincho&family=Shippori+Mincho+B1&display=swap" rel="stylesheet">
  </head>

  <body>
    <header class="header">
      <h1><a href="index.html">M's PortFlio</a></h1>
      <div class="nav">
        <a href="news.html">News</a>
        <a href="form.php">Contact</a>
      </div>
    </header>

    <div class="news">
      <div class="news-title">
         <h2>Contact</h2>
      </div>
      <div class="complete-text">
        <h3><?php echo $name; ?>様、お問い合わせを承りました。</h3>
        <p>ありがとうございました。今後の参考にさせていただきます。</p>
        <button id="back-btn" onclick="location.href='form.php';">戻る</button>
      </div>

      <?php
      //セッション変数を初期化
      $_SESSION = array();

      //セッションを終了
      session_destroy();
      ?>
    </div>
  </body>
</html>