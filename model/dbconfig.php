<?php
class Database
{
    private $host = "localhost";
    private $db_name = "attach";
    private $username = "root";
    private $password = "";
    public $conn;

//    private $host = "localhost";
//    private $db_name = "id3793091_qia";
//    private $username = "id3793091_qia";
//    private $password = "123456";
//    public $conn;

    public function dbConnection()
    {
        $this->conn = null;
        try
        {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
        catch(PDOException $exception)
        {
            echo "Connection error: " .$exception->getMessage();
        }

        return $this->conn;
    }  
}


// why switch attribute emulation prepare stmts to false
/*
main reason for this is that having the database engine do the prepare instead of PDO
is that the query and the actual data are sent separately, which increases security.
This means when the parameters are passed to the query, attempts to inject SQL into them
are blocked, since MySQL prepared statements are limited to a single query.
That means that a true prepared statement would fail when passed a second query in a parameter.
*/
