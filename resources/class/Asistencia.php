<?php 
    class Asistencia{
        
        public $dni_alumno;
        public $fecha;
        private $con;


        public function __construct($db)
        {
            $this->con = $db;
        }

        public function agregar($dni_alumno, $fecha_asistencia) {
            //Preparar consulta
            $query = "INSERT INTO asistencias(dni_alumno, fecha) VALUES (:dni_alumno, :fecha)";
            $stmt = $this->con->prepare($query);
            //bindear parametros
            $stmt-> bindParam(':dni_alumno', $dni_alumno);
            $stmt-> bindParam(':fecha', $fecha_asistencia);
            //ejecutar consulta
            $stmt->execute();


            if ($stmt->rowCount() > 0) {
                return true; // Éxito
            } else {
                return false; // Fallo
            }
        }

        public function getTotalAsistencias(){

            $sql = "SELECT COUNT(DISTINCT fecha) AS totalAsistencias FROM asistencias WHERE dni_alumno=:dni_alumno ";
            
            $stmt = $this->con->prepare($sql);

            $stmt->bindParam(':dni_alumno', $this->dni_alumno);

            $stmt->execute();

            $resultado= $stmt->fetch(PDO::FETCH_ASSOC);

            $totalAsistencias = $resultado['totalAsistencias'];

           
            var_dump($totalAsistencias);
            return $totalAsistencias;

        }
    }
?> 