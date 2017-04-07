<?php

include_once 'application/core/database.php';

class adminController extends controller {

    function __construct() {
        $this->model = new adminModel();
        $this->view = new view();
    }

    function actionindex() {

        if (isset($_SESSION['admin'])) {
            $data = $this->model->tasks_print();
            $this->view->generate('index.php', 'templateadmin.php', 'admin', $data);
        } else {

            $this->view->generate('login.php', 'templateadmin.php', 'admin');
        }
    }

    function actionlogin() {
        if (isset($_SESSION['admin'])) {
            header('Location: /admin/index/');
        } elseif (isset($_POST['login'], $_POST['password'])) {
            if ($this->model->auth($_POST['login'], $_POST['password']) == true) {
                header('Location: /admin/index/');
            } else {
                echo "<script>alert('Неверные данные'); window.location = '/admin';</script>";
            }
        }
    }

    function actionchangeview($actionId) {
        if (isset($actionId, $_SESSION['admin'])) {
            $data = $this->model->tasks_view($actionId);
            $this->view->generate('change.php', 'templateadmin.php', 'admin', $data);
        } else {
            echo 'Ошибка';
        }
    }

    function actionupdate($id) {
        if (isset($_SESSION['admin'], $id)) {
            $this->model->tasks_update($id, $_POST['username'], $_POST['text'], $_POST['mail']);
            header('Location: /admin/');
        } else {
            echo "Ошибка";
        }
    }

    function actionupdatestatus() {
        if ($this->model->tasks_updatestatus($_POST['id'], $_POST['status']) == true) {
            echo 'Обновлено';
        } else {
            echo 'Ошибка обновления';
        }
    }

    function actionlogout() {
        unset($_SESSION['admin']);
        header('Location: ../');
    }

}
