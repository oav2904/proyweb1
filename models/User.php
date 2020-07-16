<?php


class User
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
     * Metodo que permite verificar en la base de datos si los valores ingresados por el usuario son correctos y de ser así se extrae todo los datos que se están
     * en la tabla users
     *
     * @param [text] $email
     * @param [text] $password
     * @return void id, f_name,f_lastname,s_lastname, email, password, address, phone_number, admin 
     */
    public function login($email, $password)
    {
        return $this->connection->runQuery('SELECT id, f_name,f_lastname,s_lastname, email, password, address, phone_number, admin FROM users WHERE email = $1 and password = $2', [$email, $password]);
    }

    /**
     * Funcion que permite encontrar un usuario según su id
     *
     * @param [type] $id
     * @return void id, f_name,f_lastname,s_lastname, email, password, address, phone_number, admin 
     */
    public function find($id)
    {
        return $this->connection->runQuery('SELECT id, f_name,f_lastname, s_lastname, email, password, address, phone_number FROM users WHERE id = $1', [$id]);
    }

    /**
     * Función que permite insertar usuarios a la base de datos para poder tener acceso a la pagina de EShop
     *
     * @param [type] $p_name
     * @param [type] $f_lastname
     * @param [type] $s_lastname
     * @param [type] $email
     * @param [type] $password
     * @param [type] $address
     * @param [type] $phone_number
     * @return void true o false según el resultado del query
     */
    public function create($p_name, $f_lastname, $s_lastname, $email, $password, $address, $phone_number)
    {
        $this->connection->runStatement('INSERT INTO users(
        f_name,f_lastname, s_lastname, email, password, address, phone_number)
        VALUES ($1,$2,$3,$4,$5,$6,$7)', [$p_name, $f_lastname, $s_lastname, $email, $password, $address, $phone_number]);
    }

    /**
     * Undocumented function
     *
     * @return void id, f_name,f_lastname,s_lastname, email, password, address, phone_number, admin 
     */
    public function read()
    {
        return $this->connection->runQuery('SELECT * FROM users ORDER BY id');
    }

    /**
     * Funcion que actualiza los datos del usuario
     *
     * @param [type] $id
     * @param [type] $p_name
     * @param [type] $f_lastname
     * @param [type] $s_lastname
     * @param [type] $email
     * @param [type] $password
     * @param [type] $address
     * @param [type] $phone_number
     * @return void true o false según el resultado del query
     */
    public function update($id, $p_name, $f_lastname, $s_lastname, $email, $password, $address, $phone_number)
    {
        $this->connection->runStatement('UPDATE users
        SET f_name=$2,f_lastname= $3,s_lastname= $4, $email = $5, password= $6,address= $7, position= $8
        WHERE id=$1', [$id, $p_name, $f_lastname, $s_lastname, $email, $password, $address, $phone_number]);
    }

    /**
     * Función que elimina al usuario
     *
     * @param [type] $id
     * @return void true o false según el resultado del query
     */
    public function delete($id)
    {
        $this->connection->runStatement('DELETE FROM users
        WHERE id=$1', [$id]);
    }
    /**
     * Funcion que hace un count desde la base de datos para ver la cantidad de usuarios clientes registrados en la base de datos
     *
     * @return void cantidad de usuarios clientes ingresados al sistema
     */
    public function sumusers()
    {
        return $this->connection->runQuery('SELECT COUNT(id) FROM users where admin = false');
    }
}
