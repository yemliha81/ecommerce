<?php

class Db
{
    public $host = '127.0.0.1';
    public $user = 'root';
    public $password = '123456';
    public $database = 'php_oop';
    public $connection;


    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die('Connection failed: ' . $this->connection->connect_error);
        }
    }

    public function create($table, $data)
    {
        $sql = "INSERT INTO $table (";
        $sql .= implode(',', array_keys($data)) . ') VALUES (';
        $sql .= "'" . implode("','", array_values($data)) . "')";
        $result = $this->connection->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function read($table, $where = null)
    {
        $sql = "SELECT * FROM $table";
        if ($where) {
            $sql .= " WHERE ";
            $i = 0;
            foreach ($where as $key => $value) {
                $sql .= $key . " = '" . $value . "'";
                $sql .= count($where) > $i + 1 ? ' AND ' : '';
                $i++;
            }
        }
        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    public function update($table, $data, $where)
    {
        $sql = "UPDATE $table SET ";
        $i = 0;
        foreach ($data as $key => $value) {
            $sql .= $key . " = '" . $value . "'";
            $sql .= count($data) > $i + 1 ? ', ' : '';
            $i++;
        }
        $sql .= " WHERE ";
        $i = 0;
        foreach ($where as $key => $value) {
            $sql .= $key . " = '" . $value . "'";
            $sql .= count($where) > $i + 1 ? ' AND ' : '';
            $i++;
        }
        $result = $this->connection->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($table, $where)
    {
        $sql = "DELETE FROM $table WHERE ";
        $i = 0;
        foreach ($where as $key => $value) {
            $sql .= $key . " = '" . $value . "'";
            $sql .= count($where) > $i + 1 ? ' AND ' : '';
            $i++;
        }
        $result = $this->connection->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}