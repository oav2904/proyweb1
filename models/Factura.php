<?php

class Factura
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
     * Funcion que permite crear la factura
     *
     * @param [type] $cliente id del cliente    
     * @param [type] $total total de la factura almacenado en la session carrito
     * @return void
     */
    public function createFactura($cliente, $total)
    {
        $this->connection->runStatement('INSERT INTO factura(
            cliente,fecha,total) 
            VALUES ($1,now(),$2)', [
            $cliente,$total
            ]);
    }
    /**
     * Funcion que permite extraer el ultimo valor id de la base de datos para hacer la relación el detalle de la factura
     *
     * @return void
     */
    public function max(){
        return $this->connection->runQuery('SELECT max(id) as id from factura');
    }
    /**
     * Funcion que permite crear el detalle de la factura, que en sí son los productos de una factura
     *
     * @param [type] $factura
     * @param [type] $producto
     * @param [type] $descripcion
     * @param [type] $precio
     * @param [type] $cantidad
     * @return void
     */
    public function createDetalle($factura, $producto,$descripcion,$precio,$cantidad)
    {
        $this->connection->runStatement('INSERT INTO detalle(
            idfactura,idproducto,descripcion,preciounitario,cantidad) 
            VALUES ($1,$2,$3,$4,$5)', [
            $factura, $producto, $descripcion, $precio, $cantidad
            ]);
    }
    /**
     * Cantidad de productos vendidos en su totalidad por la pagina
     *
     * @return void
     */
    public function proVendidos(){
        return $this->connection->runQuery('SELECT sum(cantidad) from detalle');
    }
    /**
     * Funcion que trae el total monetario de las ventas
     *
     * @return void
     */
    public function totalVentas(){
        return $this->connection->runQuery('SELECT sum(total) from factura');
    }

    
}