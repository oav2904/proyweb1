<?php

class Categoria
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
     * Funcion encargada de buscar las categorias dentro de las bases de datos por medio del id de la categoria
     *
     * @param [type] $id id de categoria
     * @return void
     */
    public function find($id)
    {
        return $this->connection->runQuery('SELECT id,name, father_category FROM categories WHERE id = $1', [$id]);
    }

    /**
     * Funcion encargada de cargar el select de las categorias tengan o no una categoria padre  
     *
     * @return void
     */
    public function chargeSelect()
    {
        return $this->connection->runQuery('SELECT id,name FROM categories');
    }
    public function chargeSelectca()
    {
        return $this->connection->runQuery('SELECT id,name FROM categories where father_category is null');
    }

    public function chargeHeader()
    {
        return $this->connection->runQuery('SELECT id,name as nameca,father_category FROM categories');
    }
    /**
     * Funcion encargada de crear las categorias, si las mismas tienen una categroia padre se ingresa con esos datos, de no tenerla solo se ingresa el nombre de la categrpia
     *
     * @param [type] $name
     * @param [type] $father_category
     * @return void
     */
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
    /**
     * Funcion que permite leer las categorias según su nombre
     *
     * @param [type] $name nombre categoria
     * @return void
     */
    public function read($name = '',$father_category)
    {
        $params = [];
        $sql = "SELECT * from categories";
        if ($name) {
            $sql .= " WHERE name ilike $1 order by id ";
            array_push($params, "%$name%");
        }
        elseif($father_category != null){
            $sql .= " WHERE father_category = $1 order by id ";
            array_push($params, $father_category);
        }
        elseif(!$name && !$father_category)
        $sql .= " where father_category is null ORDER BY id";
        return $this->connection->runQuery($sql, $params);
    }
    /**
     * Funcion que permite actualizar una categoria, si la categoria padre viene con null, solo se actualiza el nombre, de no ser así se actualizan todos sus valores
     *
     * @param [type] $id
     * @param [type] $name
     * @param [type] $father_category
     * @return void
     */
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
    /**
     * Funcion que permite eliminar una categoria solo si esta no tiene productos relacionados con ella
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id)
    {
        $freno = $this->connection->runStatement('SELECT count(id) FROM categories WHERE categoria IN (SELECT category FROM products)');
        if ($freno[0]['count'] == 0) {
            $this->connection->runStatement('DELETE FROM categories
            WHERE id=$1', [$id]);
        }
    }
}
