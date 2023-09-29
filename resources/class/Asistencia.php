<?php 
    class Asistencia{
        
        public $id_asistencia;
        public $dni_alumno;
        public $fecha;
        public $estado_asistencia;
        private $con;


        public function __construct($db)
        {
            $this->con = $db;
        }

        public function agregar($id_asistencia, $dni_alumno, $fecha, $estado_asistencia) {
            //Preparar consulta
            $query = "INSERT INTO asistencias(id_asistencia, dni_alumno, fecha, estado_asistencia) VALUES (:id_asistencia, :dni_alumno, :fecha, :estado_asistencia)";
            $stmt = $this->con->prepare($query);
            //bindear parametros
            $stmt-> bindParam(':id_asistencia', $id_asistencia);
            $stmt-> bindParam(':dni_alumno', $dni_alumno);
            $stmt-> bindParam(':fecha', $fecha);
            $stmt-> bindParam(':estado_asistencia', $estado_asistencia);
            //ejecutar consulta
            $stmt->execute([$id_asistencia, $dni_alumno, $fecha, $estado_asistencia]);


            if ($stmt->rowCount() > 0) {
                return true; // Éxito
            } else {
                return false; // Fallo
            }
        }


        public function eliminar($id_asistencia) {
            //preparar sql
            $query = "DELETE FROM asistencias WHERE id_asistencia = :id_asistencia";
            $stmt = $this->con->prepare($query);
            //Bindear parametros
            $stmt->bindParam(':id_asistencia',$id_asistencia);
            //Ejercutar consulta
            $stmt->execute([$id_asistencia]);
            
            // Verificar si la eliminación fue exitosa
            if ($stmt->rowCount() > 0) {
                return true; // Éxito
            } else {
                return false; // Fallo
            }
        }


        public function modificar($id_asistencia, $dni_alumno, $fecha, $estado_asistencia) {
            $query = "UPDATE asistencias SET dni_alumno = :dni_alumno, fecha = :fecha, estado_asistencia = :estado_asistencia WHERE id_asistencia = :id_asistencia";
            $stmt = $this->con->prepare($query);

            $stmt->bindParam(':dni_alumno',$dni_alumno);
            $stmt->bindParam(':fecha',$fecha);
            $stmt->bindParam(':estado_asistencia',$estado_asistencia);
            $stmt->bindParam(':id_asistencia',$id_asistencia);

            $stmt->execute([$dni_alumno, $fecha, $estado_asistencia, $id_asistencia]);
            
            // Verificar si la actualización fue exitosa
            if ($stmt->rowCount() > 0) {
                return true; // Éxito
            } else {
                return false; // Fallo
            }
        }
    }
?> 