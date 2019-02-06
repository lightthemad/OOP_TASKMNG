<?php

/**
 * This class is used for establishing connection with database.
 *
 * Class DBConnection
 */
class DBConnection
{

    protected $conn;


    public function __construct()
    {

        $this->conn = new PDO('mysql:host=localhost; dbname=task_manager',
            'root', 'root');


    }


    public function getConnection()
    {
        return $this->conn;
    }
}
