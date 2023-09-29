<?php
class Database {
    private $host = "localhost";
    private $db_name = "sistema_asistencias";
    private $user = "root";
    private $pass = "";
    public $conn;

    public function getConexion() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->user, $this->pass);
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }

    public function cerrarConexion(){
        $this->conn = null;
    }
}
?>