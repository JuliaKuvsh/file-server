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
    <form method="post" action="file.php" enctype="multipart/form-data">
      <p></p>
      <input class="file-drop" type="file" name="upload_file" id="file-drop" title="Файл не выбран" required><br>
      <input class="button" type="submit" value="Отправить">
    </form>
    <div class='message-div message-div_hidden' id='message-div'></div>
    
    <div class="col-6">
      <h2>Список файлов</h2>
      <ul>
          <?
          $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/files';
          $arFiles = array_diff(scandir($uploadDir), array('..', '.'));
          if(is_array($arFiles)) {
              foreach ($arFiles as $file)
              {
                  ?>
                  <li><a href="?get_file=<?=$file?>" download target="_blank"><?=$file?></a></li>
                  <input class="button-download" type="submit" value="Скачать">
                  <input class="button-download" type="submit" value="Удалить">
                  <?
              }
          }
          ?>
      </ul>
  </div>
</body>
</html>