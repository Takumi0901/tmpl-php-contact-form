<?php

  // リダイレクト
  if(!$_POST) {
    header('Location: ./mail.php');
  }

  //Sessionを開始するときの決まり文句、これがないとSessionが開始できない
  session_start();

  //Postされた情報を$_SESSIONに代入します
  $_SESSION = $_POST;
?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./node_modules/nimbus-jquery/assets/css/app.min.css">
  <script src="./node_modules/nimbus-jquery/assets/js/jquery-3.2.0.min.js"></script>
  <script src="./node_modules/nimbus-jquery/assets/js/common.js"></script>
  <title>Document</title>
</head>
<body>
<div class="l-wrapper">
  <div class="c-grid c-grid--query c-grid--center">
    <div class="c-grid__col c-grid__col--8of12">
      <div class="c-container">
        <h1>PHP Contact Form Template</h1>
        <h2>Check</h2>
      </div>
      <form class="c-form" action="./send.php" method="post">
        <div class="c-container">
          <table class="c-table c-table--basic">
            <tr>
              <th>Name</th>
              <td><?php echo htmlspecialchars($_POST['name'])?></td>
            </tr>
            <tr>
              <th>Mail</th>
              <td><?php echo htmlspecialchars($_POST['mail'])?></td>
            </tr>

            <tr>
              <th>Comment</th>
              <td><?php echo htmlspecialchars($_POST['comment'])?></td>
            </tr>
          </table>
        </div>
        <div class="c-container">
          <div class="c-grid c-grid--gutters">
            <div class="c-grid__col c-grid__col--6of12">
              <a class="c-btn c-btn--large c-btn--block" href="javascript:history.back();">Back</a>
            </div>
            <div class="c-grid__col c-grid__col--6of12">
              <button class="c-btn c-btn--primary c-btn--large c-btn--block" type="submit">Submit!</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>