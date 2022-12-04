<?php

namespace TestTask\Models;


class ConnectSql
{
    public function __construct($server, $username, $password, $data)
    {
        $this->server = $server;
        $this->password = $password;
        $this->username = $username;
        $this->data = $data;
    }

    public function getDb()
    {
        $conn = mysqli_connect($this->server, $this->username, $this->password, $this->data);
        if($conn->connect_error){
            die("Error: " . $conn->connect_error);
        } else {
            mysqli_set_charset($conn, "utf8");
            return $conn;
        }
    }

}