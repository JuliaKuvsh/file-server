<!DOCTYPE html>
<html>
<head>
  <title>Заголовок</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Загрузите своё фото</h1>
    <form method="post" action="uploader.php" enctype="multipart/form-data">
      <input class="file-drop" type="file" name="upload_file" id="file-drop" required><br>
      <input class="button" type="submit" value="Отправить">
    </form>
    <div class='message-div message-div_hidden' id='message-div'></div>
    <div class="col-6">
      <h2>Список загруженных файлов</h2>
      <ul>
      <?php
        require('create-list.php');
      ?>
      </ul>
  </div>
</body>
</html>