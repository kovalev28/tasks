<?php

include_once 'application/core/database.php';

class mainController extends controller {

    function __construct() {
        $this->model = new mainModel();
        $this->view = new view();
    }

    function actionindex() {

        $this->view->generate('index.php', 'template.php', 'main');
    }

    function actionadd() {

        $uploaddir = './images/download/temp/';
        $uploadfile = $uploaddir . basename($_FILES['uploadfile']['name']);
        copy($_FILES['uploadfile']['tmp_name'], $uploadfile);

        function images_size($tmp_name, $new_name, $resolution_width, $resolution_height, $max_size) {
            $image_size = filesize($tmp_name);
            $image_size = floor($image_size / '1048576');
            if ($image_size <= $max_size) {

                $params = getimagesize($tmp_name);
                if ($params['0'] > $resolution_width || $params['1'] > $resolution_height) {
                    switch ($params['2']) {
                        case 1: $old_img = imagecreatefromgif($tmp_name);
                            break;
                        case 2: $old_img = imagecreatefromjpeg($tmp_name);
                            break;
                        case 3: $old_img = imagecreatefrompng($tmp_name);
                            break;
                        case 6: $old_img = imagecreatefromwbmp($tmp_name);
                            break;
                    }

                    if ($params['0'] > $params['1']) {
                        $size = $params['0'];
                        $resolution = $resolution_width;
                    } else {
                        $size = $params['1'];
                        $resolution = $resolution_height;
                    }
                    $new_width = floor($params['0'] * $resolution / $size);
                    $new_height = floor($params['1'] * $resolution / $size);

                    $new_img = imagecreatetruecolor($new_width, $new_height);
                    imagecopyresampled($new_img, $old_img, 0, 0, 0, 0, $new_width, $new_height, $params['0'], $params['1']);

                    switch ($params['2']) {
                        case 1: $type = '.gif';
                            break;
                        case 2: $type = '.jpg';
                            break;
                        case 3: $type = '.png';
                            break;
                        case 6: $type = '.bmp';
                            break;
                    }
                    $new_name = "$new_name$type";
                    switch ($type) {
                        case '.gif': imagegif($new_img, $new_name);
                            break;
                        case '.jpg': imagejpeg($new_img, $new_name, 100);
                            break;
                        case '.bmp': imagejpeg($new_img, $new_name, 100);
                            break;
                        case '.png': imagepng($new_img, $new_name);
                            break;
                    }
                    $message = true;
                    imagedestroy($old_img);
                } else {

                    switch ($params['2']) {
                        case 1: $type = '.gif';
                            break;
                        case 2: $type = '.jpg';
                            break;
                        case 3: $type = '.png';
                            break;
                        case 6: $type = '.bmp';
                            break;
                    }
                    $new_name = "$new_name$type";
                    copy($tmp_name, $new_name);
                    $message = true;
                }
            } else
                $errors = false;
            return($message);
            return($errors);
        }
        
        $info = pathinfo($_FILES['uploadfile']['name']);
        $filen = basename($_FILES['uploadfile']['name'],'.'.$info['extension']);
        
        $tmp_name = './images/download/temp/' . $_FILES['uploadfile']['name'];
        $new_name = './images/download/' . $filen;
        $resolution_width = '240';
        $resolution_height = '320';
        $max_size = '10';
        $message = images_size($tmp_name, $new_name, $resolution_width, $resolution_height, $max_size);
        unlink($tmp_name);
        if ($message == true) {
            if ($this->model->add_task($_POST["username"], $_POST["mail"], $_POST["text"], $_FILES['uploadfile']['name']) == true) {

                echo "<script>alert('Запись добавлена успешно'); window.location = '../';</script>";
            } else {
                echo "<script>alert('Ошибка добавления записи'); window.location = '../';</script>";
            }
        } else {
            echo "<script>alert('Ошибка добавления записи'); window.location = '../';</script>";
        }
    }

}
