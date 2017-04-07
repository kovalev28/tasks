<?php

class view {
    /*
      $content_file - виды отображающие контент страниц;
      $template_file - общий для всех страниц шаблон;
      $data - массив, содержащий элементы контента страницы.
     */

    function generate($contentView, $templateView, $puth, $data = null) {

        if (is_array($data)) {

            // преобразуем элементы массива в переменные
            extract($data);
        }

        /*
          динамически подключаем общий шаблон (вид),
         */
        include 'application/views/layouts/' . $templateView;
    }

}
