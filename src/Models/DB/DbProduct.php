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
            $type;

    #PDO/ORM
    private $stmt,
            $results,
            $data,
            $count,
            $error;

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
        $this->results = $stmt->fetchAll();
        return $this;
    }

    public function query($sql, $params = [])
    {
        $this->error = FALSE;

        if($stmt = $this->dbc->prepare($sql)){
            $i = 1;
            if(count($params)){
                foreach($params as $param){
                    $stmt->bindValue($i, $param);
                    $i++;
                }
            }
        }

        if($stmt->execute()){
            
            if($this->error = FALSE){
                $this->results = $stmt->fetchAll(PDO::FETCH_OBJ);
                $this->count = $stmt->rowCount();
            }
            
        }else{
            $this->error = TRUE;
        }
        return $this;
    }

    public function generate($action, $table, $where = [])
    {   
        if(count($where) === 3) {
            $allowed_operators = ['=','>','<','>=','<='];
            $field      =   $where[0];
            $operator   =   $where[1];
            $value      =   $where[2];

            if(in_array($operator, $allowed_operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

                if($this->query($sql, [$value])) {
                    return $this;
                }
            }
            return FALSE;
        }
    }

    public function insert($table, $fields = [])
    {
        if(count($fields)) {
            $keys = array_keys($fields);
            $values = '';
            $x = 1;

            foreach($fields as $field) {
                $values .= '?';
                if($x < count($fields)) {
                    $values .= ', ';
                }
                $x++;
            }

            $sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";

            if($this->query($sql, $fields)) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function update($table, $id, $fields = [])
    {
        $set = '';
        $x = 1;

        foreach($fields as $col => $val) {
            $set .= "{$col} = ?";
            if($x < count($fields)) {
                $set .= ', ';
            }
            $x++;
        }   

        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id} ";

        if($this->query($sql, $fields)) {
            return TRUE;
        }
        return FALSE;
    }

    public function select($table, $where)
    {
        if(count($where) === 3) {
            $allowed_operators = ['=', '>', '<', '>=', '<='];

            $field = $where[0];
            $operator = $where[1];
            $value = $where[2];

            if(in_array($operator, $allowed_operators)) {
                $sql = "SELECT * FROM {$table} WHERE {$field} {$operator} ?";
                if($stmt = $this->dbc->prepare($sql)) {
                    $stmt->bindValue(1, $value);
                }
                if($stmt->execute()) {
                     $this->results = $stmt->fetchAll();
                     return $this;
                }
            }
        }
        return FALSE;
    }

    public function delete($table, $where)
    {
        return $this->generate('DELETE', $table, $where);
    }

    public function results()
    {
        return $this->results;
    }

    public function first()
    {
        return $this->results()[0];
    }

    public function count()
    {
        return $this->count;
    }

    public function error()
    {
        return $this->error;
    }

}


?>