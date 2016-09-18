<?php 
namespace App\Models\DB;

use PDO;

class DbProduct implements Product
{
    #DB Connection
    private $dbc,
            $user,
            $pass,
            $dbname,
            $host,
            $type,
            $error;

    #PDO/ORM
    private $stmt,
            $result;

    public function __construct()
    {
        return $this->dbc = $this->getConnection();
    }

    public function getConnection()
    {
        // Database Settings
        $file = parse_ini_file('./Core/settings.ini');
        $this->user = $file['user'];
        $this->pass = $file['pass'];
        $this->dbname = $file['dbname'];
        $this->host = $file['host'];
        $this->type = $file['type'];

        $string = '%s:host=%s;dbname=%s';
        $dsn = sprintf($string, $this->type, $this->host, $this->dbname);
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );

        if(!$this->dbc){
            try{
                $this->dbc = new PDO($dsn, $this->user, $this->pass, $options);
            }catch(Exception $e){
                $this->error = $e->getMessage();
            }
        }
        return $this->dbc;
    }

    public function selectAll($where='')
    {
        $stmt = $this->dbc->prepare("SELECT * FROM {$where}");
        $stmt->execute();
        $this->result = $stmt->fetchAll();
        return $this->result;
    }

}


?>