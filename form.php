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

  <main>
    <div class="news">
      <div class="news-title">
        <h2>Contact</h2>
      </div>

      <form action="confirm.php" method="post">
        <table>
          <tr class="name">
            <th>お名前</th>
            <td><input class="text" type="text" name="user_name"
                value="<?php echo isset($_COOKIE['name']) ? $_COOKIE['name'] : ''; ?>"></td>
          </tr>
          <tr class="email">
            <th>メールアドレス</th>
            <td><input class="text" type="text" name="user_email"
                value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>"></td>
          </tr>
          <tr class="phone">
            <th>電話番号</th>
            <td><input class="text" type="text" name="user_phone"
                value="<?php echo isset($_COOKIE['phone']) ? $_COOKIE['phone'] : ''; ?>"></td>
          </tr>
          <tr class="gender">
            <th>性別</th>
            <td>
              <label class="radio-btn">
                <input type="radio" name="user_gender" value="男性" checked>男性
              </label>
              <label class="radio-btn">
                <input type="radio" name="user_gender" value="女性">女性
              </label>
              <label class="radio-btn">
                <input type="radio" name="user_gender" value="その他">その他
              </label>
            </td>
          </tr>
          <tr class="ques-type">
            <th>お問い合わせ種別</th>
            <td>
              <select name="category">
                <option value="ご意見やご感想">ご意見やご感想</option>
                <option value="不具合について">不具合について</option>
                <option value="その他">その他</option>
              </select>
            </td>
          </tr>
          <tr class="ques-content">
            <th>お問い合わせ内容</th>
            <td>
              <!-- cols属性=入力欄の幅（文字数）、rows属性=入力欄の高さ（行数） -->
              <textarea name="message" cols="60" rows="10"></textarea>
            </td>
          </tr>
        </table>
        <div class="btn">
          <input type="submit" value="内容確認">
        </div>
      </form>
</body>

</html>