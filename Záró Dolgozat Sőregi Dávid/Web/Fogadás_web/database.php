<?php

$db = new Database();

class Database {

    private $database = 'fogadas_zaro';
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    protected $dbc = null;

    public function security($data){
        return htmlspecialchars(trim($data));
    }

    public function Hash($data){
        return hash('sha512', $data . date("YYYY-mm-dd"));
    }

    public function __construct() {
        try {
            $this->dbc = new mysqli($this->host, $this->user, $this->password, $this->database);
            $this->dbc->set_charset('utf8');
        } catch (mysqli_sql_exception $exc) {
            echo "Kapcsolódási hiba:" . $exc->getMessage();
        }
    }

    public function RunSQL($sql) {
        try {
            $utasitas = $this->dbc->prepare($sql);
            $utasitas->execute();
        } catch (mysqli_sql_exception $exc) {
            echo "Lekérdezési hiba: " . $exc->getMessage();
        }
        $result = $utasitas->get_result();
        if ($result) {
            return $result;
        } else {
            return $utasitas->affected_rows;
        }            
    }

    public function RunSQLPrms($sql, $types, ...$params) {
        try {
            $utasitas = $this->dbc->prepare($sql);
            $utasitas->bind_param($types, ...$params);
            $utasitas->execute();
        } catch (mysqli_sql_exception $exc) {
            echo "Lekérdezési hiba: " . $exc->getMessage();
        }
        $result = $utasitas->get_result();
        return $result;
    }
}?>