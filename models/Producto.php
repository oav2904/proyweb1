<?php

class Producto
{

    private $connection;
    /**
     * Metodo constructor que permite realizar las conexiones de manera sencilla
     *
     * @param [type] $connection
     */
    function __construct($connection)
    {
        $this->connection = $connection;
    }
    /**
     * Funcion encargada de encontrar los productos por medio del id
     *
     * @param [type] $id
     * @return void
     */
    public function find($id)
    {
        return $this->connection->runQuery('SELECT p.id,p.name as producto ,
        p.description,p.image,p.category as category, p.stock, p.price, c.name from 
        products as p inner join categories as c 
        on category = c.id where p.id = $1', [$id]);
    }

    /**
     * Funcion encargad de crear un nuevo producto con las varaibles de los parametros
     *
     * @param [type] $name nombre del producto
     * @param [type] $description descripcion del producto
     * @param [type] $image ruta de la imagen donde se almacena la imagen
     * @param [type] $stock cantidad de productos disponibles
     * @param [type] $price precio unitario del producto
     * @param [type] $category categoria a la cual pertenece
     * @return void
     */
    public function create($name, $description, $image, $stock, $price, $category)
    {
        $this->connection->runStatement('INSERT INTO products(
            name,description,image, stock, price,category)
            VALUES ($1,$2,$3,$4,$5,$6)', [
            $name, $description, $image, $stock, $price, $category
        ]);
    }
    /**
     * Funcion que permite leer el producto según su nombre
     *
     * @param string $name
     * @return void
     */
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

    public function findpro($id){
        return $this->connection->runQuery('SELECT p.id,p.name as producto ,p.description,p.image, p.stock, p.price, c.name from 
        products as p inner join categories as c on p.category = c.id where p.category = $1',[$id]);

    }
    /**
     * Funcion que permite actualizar los productos, usa los mismos parametros que crear
     *
     * @param [type] $id
     * @param [type] $name
     * @param [type] $description
     * @param [type] $image
     * @param [type] $stock
     * @param [type] $price
     * @param [type] $category
     * @return void
     */
    public function update($id, $name, $description, $image, $stock, $price, $category)
    {
        $this->connection->runStatement('UPDATE products 
            SET name= $2,description= $3,image= $4, stock= $5,price= $6, category = $7
             WHERE id= $1', [$id, $name, $description, $image, $stock, $price, $category]);
    }
    /**
     * Funcion que permite eliminar los productos dentro de la base de datos
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        $this->connection->runStatement('DELETE FROM products
            WHERE id=$1', [$id]);
    }
    /**
     * Funcion que permite ver el stock que se encuentra segun el producto seleccionado
     *
     * @param [type] $id
     * @return void
     */
    public function stock($id)
    {
        return $this->connection->runQuery('SELECT stock from products where id = $1',[$id]);
    }
    /**
     * Función que permite reducir el stock de la base de datos
     *
     * @param [type] $stock
     * @param [type] $id
     * @return void
     */
    public function reducirStock($stock,$id)
    {
        return $this->connection->runQuery('UPDATE products stock = stock - $1 from products where id = $2',[$stock,$id]);
    }
    /**
     * Funcion que permite revisar si el stock enviado por parametro es menos o igual al enviado
     *
     * @param [type] $stock
     * @return void
     */
    public function revisarStock($stock)
    {
        return $this->connection->runQuery('SELECT id, name, stock from products where stock <= $1 ',[$stock]);
    }

}
