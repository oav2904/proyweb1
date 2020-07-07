<?php


class User
{
    private $connection;
    function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function login($email, $password)
    {
        return $this->connection->runQuery('SELECT id, f_name,f_lastname, s_lastname, email, password, address, phone_number FROM users WHERE email = $1 and password = $2', [$email, $password]);
    }

     public function find($id)
    {
        return $this->connection->runQuery('SELECT id, f_name,f_lastname, s_lastname, email, password, address, phone_number FROM users WHERE id = $1', [$id]);
    }

    public function create($p_name, $f_lastname, $s_lastname, $email, $address,$phone_number)
    {
        $this->connection->runStatement('INSERT INTO users(
    f_name,f_lastname, s_lastname, email, password, address, phone_number)
    VALUES ($1,$2,$3,$4,$5,$6,$7)', [$p_name,$f_lastname, $s_lastname, $email, $password,$address,$phone_number]);
    }

    public function read()
    {
        return $this->connection->runQuery('SELECT * FROM users ORDER BY id');
    }

    public function update($id, $p_name,$f_lastname, $s_lastname, $email, $password,$address,$phone_number)
    {
        $this->connection->runStatement('UPDATE users
    SET f_name=$2,f_lastname= $3,s_lastname= $4, $email = $5, password= $6,address= $7, position= $8
    WHERE id=$1', [$id, $p_name,$f_lastname, $s_lastname, $email, $password,$address,$phone_number]);
    }

    public function delete($id)
    {
        $this->connection->runStatement('DELETE FROM users
    WHERE id=$1', [$id]);
    }

}