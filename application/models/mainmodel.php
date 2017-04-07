<?php

include_once 'application/core/database.php';

class mainModel extends model {

    public function add_task($username, $mail, $text, $image) {
        $dbClass = new Database();
        $dbh = $dbClass->getDb();

        $statement = $dbh->prepare("INSERT INTO tasks(username, mail, text, image)
    VALUES(?,?,?,?)");
        if ($statement->execute(array($username, $mail, $text, $image)) == true) {
            return true;
        } else {
            return false;
        }
    }

}
