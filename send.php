<?php

  // ページに移動してきたらsession_start
  session_start();

  // sessionが正しくセットされているか
  if($_SESSION['name'] == ""){
    header('Location: http://www.example.com/');
  }

  // 送信者の情報（メールヘッダー）
  $add_header = "From:sample@gmail.com\n";

  // 送信者の情報（メールヘッダー）
  $add_header .= "Reply-to: sample@gmail.com\n";
  $add_header .= "X-Mailer: PHP/". phpversion();

  // 送信エラーの時にエラーメールを返す先
  $opt = '-f'.'sample@gmail.com';


  // ヒアドキュメント インデントしたりしているとうまく動かない
$message = <<< HTML
お問い合わせ内容の確認です。

お名前: {$_SESSION['name']}

E_mail: {$_SESSION['mail']}

内容
{$_SESSION['comment']}
HTML;


  // カレントの言語を日本語に設定
  mb_language('ja');
  mb_internal_encoding("UTF-8");


  //mb_send_mailは5つの設定項目がある
  //mb_send_mail(送信先メールアドレス,"メールのタイトル","メール本文","メールのヘッダーFromとかリプライとか","送信エラーになったらどこにメール返すんじゃいっ！");
  //5番目の情報は第5引数と呼ばれるものでして、これがないと迷惑メール扱いになることも。
  mb_send_mail($_SESSION['mail'], "[お問い合わせ]確認メール", $message, $add_header, $opt);
  mb_send_mail('sample@gmail.com', "お問い合わせがありました", $message, $add_header, $opt);

  // セッションを破棄
  session_destroy();
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
        <h2>Complete</h2>
        <p>送信しました</p>
      </div>
    </div>
  </div>
</div>
</body>
</html>