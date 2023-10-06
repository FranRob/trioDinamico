<?php 
    class Asistencia{
        
        public $dni_alumno;
        public $fecha;
        private $con;


        public function __construct($db)
        {
            $this->con = $db;
        }

        public function agregar($dni_alumno, $fecha) {
            //Preparar consulta
            $query = "INSERT INTO asistencias(dni_alumno, fecha) VALUES (:dni_alumno, :fecha)";
            $stmt = $this->con->prepare($query);
            //bindear parametros
            $stmt-> bindParam(':dni_alumno', $dni_alumno);
            $stmt-> bindParam(':fecha', $fecha);
            //ejecutar consulta
            $stmt->execute();


            if ($stmt->rowCount() > 0) {
                return true; // Éxito
            } else {
                return false; // Fallo
            }
        }

        public function obtenerPorcentaje() {
            try {
                // Realiza la consulta SQL para obtener el porcentaje de asistencias
                $query = "SELECT AVG(asistencia) * 100 AS porcentaje FROM asistencias";
                $stmt = $this->con->prepare($query);
                $stmt->execute();
    
                // Obtiene el resultado de la consulta
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if ($resultado) {
                    return $resultado['porcentaje'];
                } else {
                    return 0; // Valor predeterminado si no se encuentra ningún resultado
                }
            } catch (PDOException $e) {
                // Manejo de errores en caso de que la consulta falle
                echo "Error: " . $e->getMessage();
                return 0; // Valor predeterminado en caso de error
            }
        }
    }
?> 