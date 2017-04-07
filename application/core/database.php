<?php

class database {

    protected $hostname = "localhost";
    protected $password = "31333lakr";
    protected $user = "cp771921_root";
    protected $name = "cp771921_mysql";
    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=' . $this->hostname . '; dbname=' . $this->name, $this->user, $this->password, $this->options);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getdb() {
        if ($this->db instanceof PDO) {
            return $this->db;
        }
    }

}
