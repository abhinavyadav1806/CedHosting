<?php
    class Dbcon
    {
        public $servername;
        public $username;
        public $password;
        public $Dbname;

        public $connect;

        function __construct()
        {
            $this->connect = new mysqli('localhost', 'root', '', 'CedHosting');
            if($this->connect->connect_error)
            {
                die("Connection failed: " . $this->$connect->connect_error);
            }
        }
    }
?>