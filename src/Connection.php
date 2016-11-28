<?php
/**
 * Created by PhpStorm.
 * User: aarmstrong
 * Date: 11/22/2016
 * Time: 1:09 PM
 */

namespace Yoda;

use PDO;

class Connection
{

    private $host;
    private $dbname;
    private $dbusername;
    private $dbpass;

    /**
     * Connection constructor.
     */
    public function __construct($host, $dbname, $dbusername, $dbpass)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->dbusername = $dbusername;
        $this->dbpass = $dbpass;
    }

    /**
     * Establish PDO connection to mysql
     *
     * @return \PDO
     */
    public function establishConnection()
    {
        try {
            $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->dbusername, $this->dbpass);
        } catch (\PDOException $e) {

        }

        return $connection;
    }


}