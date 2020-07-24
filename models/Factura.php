<?php

class Factura
{

    private $connection;
    function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function createfactura($cliente, $total)
    {
        $this->connection->runStatement('INSERT INTO factura(
            cliente,fecha,total) 
            VALUES ($1,now(),$2)', [
            $cliente,$total
            ]);
    }

    public function max(){
        return $this->connection->runQuery('SELECT max(id) as id from factura');
    }

    public function createdetalle($factura, $producto,$descripcion,$precio,$cantidad)
    {
        $this->connection->runStatement('INSERT INTO detalle(
            idfactura,idproducto,descripcion,preciounitario,cantidad) 
            VALUES ($1,$2,$3,$4,$5)', [
            $factura, $producto, $descripcion, $precio, $cantidad
            ]);
    }

}