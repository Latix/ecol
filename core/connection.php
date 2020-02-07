<?php
    session_start();
    date_default_timezone_set("Africa/Lagos");
    class Db {
        private function __construct() {}
        private function __clone() {}
        public static function getInstance() {
            return mysqli_connect("localhost", "root", "T0p53cre7$","ecol");
        }
    }

    $conn = Db::getInstance();
?>
