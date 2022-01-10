<?php

abstract class database {
    abstract public function table($table);
    abstract public function get();
    abstract public function insert($data);
    abstract public function update($fields, $id);
    abstract public function delete($id);
}
