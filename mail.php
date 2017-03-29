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
        </div>
        <form class="js-form c-form" action="./check.php" method="post">
          <div class="c-container">
            <table class="c-table c-table--basic">
              <tr>
                <th>Name</th>
                <td>
                  <div class="c-form__input-box">
                    <input class="js-validate" type="text" name="name" value="" data-required="true">
                    <div class="c-form__input-box__alert"></div>
                  </div>
                </td>
              </tr>
              <tr>
                <th>Mail</th>
                <td>
                  <div class="c-form__input-box">
                    <input class="js-validate" type="email" name="mail" value="" data-required="true" data-mail="true">
                    <div class="c-form__input-box__alert"></div>
                  </div>
                </td>
              </tr>

              <tr>
                <th>Comment</th>
                <td>
                  <div class="c-form__input-box">
                    <textarea class="js-validate" name="comment" id="" cols="30" rows="10" data-required="true"></textarea>
                    <div class="c-form__input-box__alert"></div>
                  </div>
                </td>
              </tr>
            </table>
          </div>
          <p class="c-container u-ta-c"><button class="js-submit c-btn c-btn--primary c-btn--large c-btn--block" type="button">Confirm!</button></p>
        </form>
      </div>
    </div>
  </div>
  <script src="js/jquery-3.2.0.min.js"></script>
  <script src="js/validate.js"></script>
</body>
</html>