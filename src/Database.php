<?php

namespace Yoda;

class Database {


    private static $instance;

    private $connection;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->setupConnection();
    }

    private function setupConnection()
    {
        $connection = new Connection("127.0.0.1", "test", "test", "test@123");
        $this->connection = $connection->establishConnection();
    }

    public function query($query)
    {
        $result = $this->connection->query($query);

        return $result;
    }

}