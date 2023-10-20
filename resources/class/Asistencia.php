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
    }
?> 