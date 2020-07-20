<?php

class Producto
{

    private $connection;
    function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function find($id)
    {
        return $this->connection->runQuery('SELECT p.id,p.name as producto ,
        p.description,p.image,p.category as category, p.stock, p.price, c.name from 
        products as p inner join categories as c 
        on category = c.id where p.id = $1', [$id]);
    }

    public function create($name, $description, $image, $stock, $price, $category)
    {
        $this->connection->runStatement('INSERT INTO products(
            name,description,image, stock, price,category)
            VALUES ($1,$2,$3,$4,$5,$6)', [
            $name, $description, $image, $stock, $price, $category
        ]);
    }

    public function read($name = '')
    {
        $params = [];
        $sql = "SELECT p.id,p.name as producto ,p.description,p.image, p.stock, p.price, c.name from 
        products as p inner join categories as c on p.category = c.id";
        if ($name) {
            $sql .= " WHERE p.name ilike $1 ";
            array_push($params, "%$name%");
        }
        $sql .= " ORDER BY p.id";
        return $this->connection->runQuery($sql, $params);
    }

    public function update($id, $name, $description, $image, $stock, $price, $category)
    {
        $this->connection->runStatement('UPDATE products 
            SET name= $2,description= $3,image= $4, stock= $5,price= $6, category = $7
             WHERE id= $1', [$id, $name, $description, $image, $stock, $price, $category]);
    }

    public function delete($id)
    {
        $this->connection->runStatement('DELETE FROM products
            WHERE id=$1', [$id]);
    }
}
