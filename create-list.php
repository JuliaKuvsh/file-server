<?php
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/files';
    $arFiles = array_diff(scandir($uploadDir), array('..', '.'));

    if(is_array($arFiles)) {
        foreach ($arFiles as $file) {
            ?>
            <img src="files/<?=$file?>" alt=<?=$file?> width=155 height=155>
            <div class="links">
                <a class="link" href="download.php?get_file=<?=$file?>">Скачать</a>
                <a class="link" href="delete.php?delete_file=<?=$file?>">Удалить</a>
            </div>
            <?
        }
    }
?>