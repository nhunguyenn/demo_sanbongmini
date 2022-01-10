<?php

class mysql_database extends database {
    protected $connection;
    protected $table;
    public function __construct() {
        global $db_host, $db_user, $db_password, $db_name;
        $this->connection = new mysqli(
            $db_host,
            $db_user,
            $db_password,
            $db_name
        );
        if ($this->connection->connect_errno) {
            die("Failed");
        }
    }

    public function table($table) {
        $this->table = $table;
        return $this;
    } 

    public function get() {
        $sql = "SELECT * FROM $this->table";
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->get_result();
        while ($row = $result->fetch_object()){
            $data[] = $row;
        }
        if (isset($data)) {
            return $data;
        }
    }

    public function insert($data) {
        $sql = "INSERT INTO $this->table";
        $sql .= '('.implode(',', array_keys($data)).')';
        $sql .= " values ";
        $questionMarks = array_fill(0, count($data), '?');
        $sql .= '('.implode(',', array_values($questionMarks)) . ')';
        $query = $this->connection->prepare($sql);
        $query->bind_param(str_repeat('s', count($data)), ...array_values($data));
        $result  = $query->execute();
        return $result;
    }

    public function update($fields, $id) {
        $set = '';
        $temp = 1;
        foreach ($fields as $name => $value) {
            $set .= "{$name} = \"{$value}\"";
            if ($temp < count($fields)) {
                $set .= ',';
            }
            $temp++;
        }

        $sql = "UPDATE $this->table SET {$set} WHERE id= ?";
        $query = $this->connection->prepare($sql);
        $query->bind_param('i', $id);
        $result = $query->execute();
        if ($result == false) {
            return false;
        }
        return $result;
    }

    public function delete($id) {
        $sql = "DELETE from $this->table WHERE id= ?";
        $query = $this->connection->prepare($sql);
        $query->bind_param('i', $id);
        $result = $query->execute();
        if (false === $result) {
            throw new Exception('Invalid prepare statement');
        }
        return $result;
    }
}