<?php

include_once 'application/core/database.php';

class adminModel extends Model {

    public function auth($login, $password) {
        $dbClass = new database();
        $dbh = $dbClass->getDb();

        $statement = $dbh->query("SELECT * FROM users WHERE login = '$login' AND password = '$password'");
        $row = $statement->fetchAll();
        if (empty($row)) {
            return false;
        } else {
            $_SESSION['admin'] = $row[0]['login'];
            return true;
        }
    }

    public function tasks_print() {
        $dbClass = new database();
        $dbh = $dbClass->getdb();

        $stmt = $dbh->query("SELECT * FROM tasks");
        $data = $stmt->fetchAll();
        return $data;
    }

    public function tasks_view($id) {
        $dbClass = new database();
        $dbh = $dbClass->getDb();

        $stmt = $dbh->query("SELECT * FROM tasks WHERE id = '$id'");
        $data = $stmt->fetch();

        return $data;
    }

    public function tasks_update($id, $username, $text, $mail) {
        $dbClass = new database();
        $dbh = $dbClass->getdb();

        $dbh->query("UPDATE tasks SET username = '$username', text = '$text', mail = '$mail' WHERE id = '$id'");
    }

    public function tasks_updatestatus($id, $status) {
        $dbClass = new database();
        $dbh = $dbClass->getdb();

        if ($dbh->query("UPDATE tasks SET status = '$status' WHERE id = '$id'") == true) {
            return true;
        } else {
            return false;
        }
    }

}
