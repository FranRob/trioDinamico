<?php
class Parametros{
    private $con; // tu conexión a la base de datos

    public function __construct($db) {
        $this->con = $db;
    }

    public function guardarConfiguracion($dias_de_clases, $porcentaje_promocion, $porcentaje_regular) {
        echo "Dias de clases: $dias_de_clases, Porcentaje Promoción: $porcentaje_promocion, Porcentaje Regular: $porcentaje_regular";
    
        $query = "INSERT INTO parametros (dias_de_clases, porcentaje_promocion, porcentaje_regular) 
                  VALUES (:dias, :promocion, :regular)";

        $statement = $this->con->prepare($query);
        $statement->bindValue(':dias', $dias_de_clases, PDO::PARAM_INT);
        $statement->bindValue(':promocion', $porcentaje_promocion, PDO::PARAM_INT);
        $statement->bindValue(':regular', $porcentaje_regular, PDO::PARAM_INT);
        // Ejecutar la consulta
        $result = $statement->execute();

        return $result;
    }
    
    public function limpiarBaseDeDatos() {
        $query = "DELETE FROM parametros";
        $statement = $this->con->prepare($query);
        $statement->execute();
    }

    public function actualizarConfiguracion($dias_de_clases, $porcentaje_promocion, $porcentaje_regular) {
        $query = "UPDATE parametros SET dias_de_clases = :dias, porcentaje_promocion = :promocion, porcentaje_regular = :regular";
                  
        $statement = $this->con->prepare($query);
        $statement->bindValue(':dias', $dias_de_clases, PDO::PARAM_INT);
        $statement->bindValue(':promocion', $porcentaje_promocion, PDO::PARAM_INT);
        $statement->bindValue(':regular', $porcentaje_regular, PDO::PARAM_INT);
        $statement->execute();
    }

  
}
