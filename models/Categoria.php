<?php

class Categoria
{
    private $connection;
    function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function find($id)
    {
        return $this->connection->runQuery('SELECT id,name, father_category FROM categories WHERE id = $1', [$id]);
    }

    public function chargeselect()
    {
        return $this->connection->runQuery('SELECT id,name FROM categories');
    }
    public function chargeselectca()
    {
        return $this->connection->runQuery('SELECT id,name FROM categories where father_category is null');
    }
    public function chargeheader()
    {
        return $this->connection->runQuery('SELECT id,name as nameca,father_category FROM categories');
    }
    public function create($name, $father_category)
    {
        if ($father_category == null) {
            $this->connection->runStatement('INSERT INTO categories(
        name)
        VALUES ($1)', [$name]);
        } else {
            $this->connection->runStatement('INSERT INTO categories(
                name,father_category)
                VALUES ($1,$2)', [$name, $father_category]);
        }
    }

    public function read($name)
    {
        $params = [];
        $sql = "SELECT c1.id, c1.name from categories c1 inner join( select c2.id, c2.name 
         from categories c2 where father_category is null) c2 on c1.father_category = c2.id";
        if ($name) {
            $sql .= " and c2.name ilike $1 ";
            array_push($params, "%$name%");
        }
        $sql .= " ORDER BY id";
        return $this->connection->runQuery($sql, $params);
    }

    public function update($id, $name, $father_category)
    {
        if ($father_category == null) {
            $this->connection->runStatement('UPDATE categories
         SET name= $2 
        WHERE id=$1', [$id, $name]);
        } else {
            $this->connection->runStatement('UPDATE categories
         SET name= $2, father_category = $3
        WHERE id=$1', [$id, $name, $father_category]);
        }
    }

    public function delete($id)
    {
        $freno = $this->connection->runStatement('SELECT COUNT(id) FROM categories WHERE categoria IN (SELECT category FROM products)');
        $val = pg_fetch_result($freno, 0, 0);
        if ($val == 0) {
            $this->connection->runStatement('DELETE FROM categories
            WHERE id=$1', [$id]);
        }
    }
}
