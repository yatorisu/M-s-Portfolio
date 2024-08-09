<?php
//セッションを開始
session_start();

// POSTリクエストから入力データを取得
$name = $_POST['user_name'];
$email = $_POST['user_email'];
$phone = $_POST['user_phone'];
$gender = $_POST['user_gender'];
$category = $_POST['category'];
$message = $_POST['message'];

//エラーメッセージを格納する配列
$errors = []; //最初はエラーなし

/*
// メール送信設定
$to = "yaiyaito817@yahoo.co.jp"; // 受信先のメールアドレス
$subject = "お問い合わせフォームからのメッセージ";
$body = "名前: $name\nメールアドレス: $email\nメッセージ: $message";
$headers = "From: $email";

// メール送信処理
if (mail($to, $subject, $body, $headers)) {
    $_SESSION['name'] = $name; // 完了ページで名前を表示するためにセッションに保存
    header("Location: complete.php"); // 完了ページへリダイレクト
    exit();
} else {
    echo "メールの送信に失敗しました。";
}
*/

//お名前のバリデーション
if (empty($name)) {
  $errors[] = 'お名前を入力してください。';
}

//メールアドレスのバリデーション
if (empty($email)) {
  $errors[] = 'メールアドレスを入力してください。';
} elseif (!filter_var( $email, FILTER_VALIDATE_EMAIL)) {
  $errors[] = 'メールアドレスの入力形式が正しくありません。';
}

//電話番号のバリデーション
if (empty($phone)) {
  $errors[] = '電話番号を入力してください。';
} elseif ( !preg_match( '/^0[0-9]{9,10}\z/', $phone )) {
  $errors[] = '電話番号の入力形式が正しくありません。';
}

//お問い合わせ内容のバリデーション
if (empty($message)) {
  $errors[] = 'お問い合わせ内容を入力してください。';
} elseif (mb_strlen($message) > 100) {
  $errors[] = 'お問い合わせ内容が100文字を超えています。';
}

//入力項目に問題がなければセッション・クッキーを保存
if (empty($errors)) {
  //セッション変数を保存
  $_SESSION['name'] = $name;
  $_SESSION['email'] = $email;
  $_SESSION['phone'] = $phone;
  $_SESSION['gender'] = $gender;
  $_SESSION['category'] = $category;
  $_SESSION['message'] = $message;

  //クッキーを登録（有効期限は1時間）
  setcookie('name', $name, time() + 3600);
  setcookie('email', $email, time() + 3600);
  setcookie('phone', $phone, time() + 3600);
}
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
      <div class="confirm-top">
        <h3>入力内容をご確認ください。</h3>
        <p>問題なければ「確定」、修正する場合は「キャンセル」をクリックしてください。</p>
      </div>

      <table>
        <tr>
          <th>お名前</th>
          <td class="contact-result"><?php echo htmlspecialchars($name); ?></td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td class="contact-result"><?php echo htmlspecialchars($email); ?></td>
        </tr>
        <tr>
          <th>電話番号</th>
          <td class="contact-result"><?php echo htmlspecialchars($phone); ?></td>
        </tr>
        <tr>
          <th>性別</th>
          <td class="contact-result"><?php echo htmlspecialchars($gender); ?></td>
        </tr>
        <tr>
          <th>お問い合わせ種別</th>
          <td class="contact-result"><?php echo htmlspecialchars($category); ?></td>
        </tr>
        <tr>
          <th>お問い合わせ内容</th>
          <td class="contact-result contact-textbox"><?php echo htmlspecialchars($message); ?></td>
        </tr>
      </table>

      <p class="result-btn">
        <button id="confirm-btn" onclick="location.href='complete.php';">確定</button>
        <button id="cancel-btn" onclick="history.back();">キャンセル</button>
      </p>

      <?php
        //入力項目にエラーがある場合の処理
        if (!empty($errors)) {
          //配列内のエラーメッセージを順番に出力
          foreach ($errors as $error) {
            echo '<font color="red">' . $error . '</font>' . '<br>';
          }

          //確定ボタンを無効化するJavaScriptコードをブラウザ側に送信
          echo '<script> document.getElementById("confirm-btn").disabled = true; </script>';
        }
      ?>
    </div>
  </body>
</html>