<?php 

class Categoria {
    private $connection;
    function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function find($id)
    {
        return $this->connection->runQuery('SELECT id,name, father_category FROM category WHERE id = $1', [$id]);
    }

    public function create($name, $father_category)
    {
        $this->connection->runStatement('INSERT INTO categories(
    name,father_category)
    VALUES ($1,$2)', [$name,$father_category]);
    }

    public function read()
    {
        return $this->connection->runQuery('SELECT * FROM categories ORDER BY id');
    }

    public function update($id, $name, $father_category)
    {
        $this->connection->runStatement('UPDATE categories
    SET name=$2, $father_category = $3
    WHERE id=$1', [$id, $name,$father_category]);
    }

    public function delete($id)
    {
        $this->connection->runStatement('DELETE FROM categories
    WHERE id=$1', [$id]);
    }




}

