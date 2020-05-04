<?php



function createHash($leng)
{
    $symbols = 'abdefhiknrstyzABDEFGHKNQRSTYZ1023456789';
    $numSymbol = strlen($symbols);
    $hash = '';
    for ($i = 0; $i < $leng; $i++) {
        $hash .= substr($symbols, rand(1, $numSymbol) - 1, 1);
    }
    return md5($hash);
}

function generate($what,$leng){
    $symbols = 'abdefhiknrstyz1023456789';
    $numSymbol = strlen($symbols);
    $string = '';
    for ($i = 0; $i < $leng; $i++) {
        $string .= substr($symbols, rand(1, $numSymbol) - 1, 1);
    }
    $string=$what.$string;
    return $string;
}


function debug()
{
    echo "<pre>";
    foreach (func_get_args() as $value)
        var_dump($value);
    echo "</pre>";
}

function cleaner($mass, $db)
{

    foreach ($mass as $key => $value) {
        $value[$key] = $db->real_escape_string($value[$key]);
    }

    return $mass;
}

function photo_save($img)
{
    $vvod['big']=0;
    $vvod['small']=0;
    $error = 0;
    $way = '/pic/big/';
    if ($img['error'] != 4) {
        $pict = $img['tmp_name'];
        $pict_error = $img['error'];
// Проверим на ошибки
        if ($pict_error !== UPLOAD_ERR_OK || !is_uploaded_file($pict)) {
            // Массив с названиями ошибок
            $errorMessages = [
                UPLOAD_ERR_INI_SIZE => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
                UPLOAD_ERR_FORM_SIZE => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
                UPLOAD_ERR_PARTIAL => 'Загружаемый файл был получен только частично.',
                UPLOAD_ERR_NO_FILE => 'Файл не был загружен.',
                UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
                UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
                UPLOAD_ERR_EXTENSION => 'PHP-расширение остановило загрузку файла.',
            ];
            // Зададим неизвестную ошибку
            $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';
            // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
            $error = $errorMessages[$pict_error] ?: $unknownMessage;
            goto end;
        }

        $place = getimagesize($pict);
        $limit = array();
        $limit['size'] = 1024 * 1024 * 10;
        $limit['width'] = 1500;
        $limit['height'] = 1500;
        if (filesize($pict) > $limit['size']) {
            $error = 'Файл слишком много весит. Его размер не должен превышать 10Мб.';
            goto end;
        }
        if ($place[0] > $limit['width']) {
            $error = 'Файл должен быть не больше 1500х1500 пикселей.';
            goto end;
        }
        if ($place[1] > $limit['height']) {
            $error = 'Файл должен быть не больше 1500х1500 пикселей.';
            goto end;
        }

        $type = $place[2];

        switch ($type) {
            case 1:
                $img = imageCreateFromGif($pict);
                break;
            case 2:
                $img = imageCreateFromJpeg($pict);
                break;
            case 3:
                $img = imageCreateFromPng($pict);
                break;
            case 6:
                $img = imageCreateFromBmp($pict);
                break;
            default:
                $error = "Неподдерживаемый формат изображения.";
                goto end;
                break;
        }

        $size = 1000;
        if ($place[0] > $place[1]) {
            $prop = $place[1] / $place[0];
            $npict = imagecreatetruecolor($size, $size * $prop);
            imagecopyresampled($npict, $img, 0, 0, 0, 0, $size, $size * $prop, $place[0], $place[1]);
        } else {
            $prop = $place[0] / $place[1];
            $npict = imagecreatetruecolor($size * $prop, $size);
            imagecopyresampled($npict, $img, 0, 0, 0, 0, $size * $prop, $size, $place[0], $place[1]);
        }

        $name = md5_file($pict);
        if (!imagepng($npict, '.'.$way . $name . '.png')) {
            $error = 'При записи файла на диск произошла ошибка.';
            goto end;
        }
        $vvod['big'] = $way . $name . '.png';

        $prop = $place[0] / $place[1];
        $size = 100;
        if ($place[0] > $place[1]) {
            $npict = imagecreatetruecolor($size, $size * $prop);
            imagecopyresampled($npict, $img, 0, 0, 0, 0, $size, $size * $prop, $place[0], $place[1]);
        } else {
            $npict = imagecreatetruecolor($size * $prop, $size);
            imagecopyresampled($npict, $img, 0, 0, 0, 0, $size * $prop, $size, $place[0], $place[1]);
        }

    }

    end:
    $photos = array($vvod['big'], $error);
    return $photos;
}