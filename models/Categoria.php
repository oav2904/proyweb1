<?php 

class Categoria {
    private $connection;
    function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function find($id)
    {
        return $this->connection->runQuery('SELECT id,name,description, image, category, stock,price FROM products WHERE id = $1', [$id]);
    }

    public function create($name, $description, $image, $category, $stock,$price)
    {
        $this->connection->runStatement('INSERT INTO products(
    name,description,image,category, stock, price)
    VALUES ($1,$2,$3,$4,$5,$6)', [$name,$description, $image, $category,
     $stock,$price]);
    }

    public function read()
    {
        return $this->connection->runQuery('SELECT * FROM products ORDER BY id');
    }

    public function update($id, $name,$description, $image, $category, $stock,$price)
    {
        $this->connection->runStatement('UPDATE products
    SET name=$2,description= $3,image= $4, $category = $5, stock= $6,price= $7
    WHERE id=$1', [$id, $name,$description, $image, $category, $stock,$price]);
    }

    public function delete($id)
    {
        $this->connection->runStatement('DELETE FROM products
    WHERE id=$1', [$id]);
    }




}

