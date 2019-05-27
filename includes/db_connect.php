<?php
    class Database
    {
        private $server_name;
        private $username;
        private $password;
        private $db_name;

        public $conn;

        function __construct()
        {
            $this->connect();
        }

        public function connect()
        {
            $this->server_name = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->db_name = "internet_shop";

            $this->conn = new mysqli($this->server_name, $this->username, $this->password, $this->db_name);

            $this->conn->query("set names utf8");

            if($this->conn->connect_error)
            {
                die("Connection failed: " . $conn->connect_error);
            }

            return $this->conn;
        }

        public function query($sql)
        {
            $result = $this->conn->query($sql);

            $this->confirm_query($result);
            return $result;
        }

        private function confirm_query($result)
        {
            if(!$result)
            {
                die("Query failed". $this->conn->error);
            }
        }

        public function escape_string($string)
        {
            $escaped_string = $this->conn->real_escape_string($string);
            return $escaped_string;
        }
    }

    $database = new Database();
?>