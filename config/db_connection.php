<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'calendar-interview');

function getConnection()
{
    try {
        // try and get the database connection
        $conn = new mysqli(DB_HOST, DB_NAME, DB_USER, DB_PASS);
        // if the connection fails, throw an exception
        if ($conn->connect_error) {
            throw new Exception('Database connection failed: ' . $conn->connect_error);
        }
        return $conn;
    } catch (\Throwable $th) {
        throw $th;
    }
}


function closeConnection()
{
    getConnection()->close();
}
