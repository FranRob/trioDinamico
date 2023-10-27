<?php 

    class Alumno{
        //ATRIBUTOS
        public $dni;
        public $nombre;
        public $apellido;
        public $fecha_nacimiento;
        private $con;

        //METODOS
        public function __construct($db)
        {
            $this->con = $db;
        }

        public function agregar($dni, $nombre, $apellido,$fecha_nacimiento) {
            //Preparar consulta
            $query = "INSERT INTO alumno (dni, nombre, apellido, fecha_nacimiento) VALUES (?, ?, ?, ?)";
            $stmt = $this->con->prepare($query);
            //bindear parametros
            $stmt-> bindParam(':dni', $dni);
            $stmt-> bindParam(':nombre', $nombre);
            $stmt-> bindParam(':apellido', $apellido);
            $stmt-> bindParam(':fecha_nacimiento', $fecha_nacimiento);
            //ejecutar consulta
            $stmt->execute([$dni, $nombre, $apellido,$fecha_nacimiento]);


            if ($stmt->rowCount() > 0) {
                return true; // Éxito
            } else {
                return false; // Fallo
            }
        }


        public function eliminar($dni) {
            //preparar sql
            $query = "DELETE FROM alumno WHERE dni = ?";
            $stmt = $this->con->prepare($query);
            //Bindear parametros
            $stmt->bindParam(':dni',$dni);
            //Ejercutar consulta
            $stmt->execute([$dni]);
            
            // Verificar si la eliminación fue exitosa
            if ($stmt->rowCount() > 0) {
                return true; // Éxito
            } else {
                return false; // Fallo
            }
        }


        public function modificar($dni_actual, $nuevo_dni, $nombre, $apellido, $fecha_nacimiento) {
            $query = "UPDATE alumno SET dni = ?, nombre = ?, apellido = ?, fecha_nacimiento = ? WHERE dni = ?";
            $stmt = $this->con->prepare($query);
        
            $stmt->bindValue(1, $nuevo_dni);
            $stmt->bindValue(2, $nombre);
            $stmt->bindValue(3, $apellido);
            $stmt->bindValue(4, $fecha_nacimiento);
            $stmt->bindValue(5, $dni_actual);
        
            $stmt->execute();
            
            // Verificar si la actualización fue exitosa
            if ($stmt->rowCount() > 0) {
                return true; // Éxito
            } else {
                return false; // Fallo
            }
        }

        public function mostrarTodos() {
            $query = "SELECT dni,nombre,apellido,fecha_nacimiento FROM alumno ORDER BY apellido ASC";
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            // Devolver un arreglo asociativo con los resultados
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function buscarPorDni($dni) {
            $sql = "SELECT * FROM alumno WHERE dni = ?";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(1, $dni);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result !== false) {
                return $result;
            } else {
                return null;
            }
        }
        
        public function calcularPorcentajeAsistencia() {
            $sql_total_dias = "SELECT COUNT(DISTINCT fecha) AS total_dias FROM asistencias";
            $result_total_dias = $this->con->query($sql_total_dias);
            $row_total_dias = $result_total_dias->fetch(PDO::FETCH_ASSOC); // Usa FETCH_ASSOC para obtener un arreglo asociativo
        
            $total_dias = $row_total_dias['total_dias'];
        
            $sql_asistencias_alumno = "SELECT COUNT(DISTINCT fecha) AS asistencias FROM asistencias WHERE dni_alumno = :dni";
            $stmt = $this->con->prepare($sql_asistencias_alumno);
            $stmt->bindParam(':dni', $this->dni);
            $stmt->execute();
            $row_asistencias_alumno = $stmt->fetch(PDO::FETCH_ASSOC); // Usa FETCH_ASSOC para obtener un arreglo asociativo
        
            $asistencias = $row_asistencias_alumno['asistencias'];
        
            if ($total_dias > 0) {
                $porcentaje = ($asistencias / $total_dias) * 100;
            } else {
                $porcentaje = 0;
            }
        
            return $porcentaje;
        }


    }
?> 