<?php 
    class Profesor{
        public $nombre;
        public $apellido;
        public $dni_profesor;
        private $con;

        public function __construct($db)
        {
            $this->con = $db;
        }

        public function agregar($nombre, $apellido, $dni_profesor) {
            //Preparar consulta
            $query = "INSERT INTO profesores(nombre, apellido, dni_profesor) VALUES (:nombre, :apellido, :dni_profesor)";
            $stmt = $this->con->prepare($query);
            //bindear parametros
            $stmt-> bindParam(':nombre', $nombre);
            $stmt-> bindParam(':apellido', $apellido);
            $stmt-> bindParam(':dni_profesor', $dni_profesor);
            //ejecutar consulta
            $stmt->execute([$nombre, $apellido,$dni_profesor]);


            if ($stmt->rowCount() > 0) {
                return true; // Éxito
            } else {
                return false; // Fallo
            }
        }


        public function eliminar($dni_profesor) {
            //preparar sql
            $query = "DELETE FROM alumno WHERE dni_profesor = :dni_profesor";
            $stmt = $this->con->prepare($query);
            //Bindear parametros
            $stmt->bindParam(':dni_profesor',$dni_profesor);
            //Ejercutar consulta
            $stmt->execute([$dni_profesor]);
            
            // Verificar si la eliminación fue exitosa
            if ($stmt->rowCount() > 0) {
                return true; // Éxito
            } else {
                return false; // Fallo
            }
        }


        public function modificar($nombre, $apellido, $dni_profesor) {
            $query = "UPDATE profesores SET nombre = :nombre, apellido = :apellido WHERE dni_profesor = :dni_profesor";
            $stmt = $this->con->prepare($query);

            $stmt->bindParam(':nombre',$nombre);
            $stmt->bindParam(':apellido',$apellido);
            $stmt->bindParam(':dni_profesor',$dni_profesor);


            $stmt->execute([$nombre, $apellido, $dni_profesor]);
            
            // Verificar si la actualización fue exitosa
            if ($stmt->rowCount() > 0) {
                return true; // Éxito
            } else {
                return false; // Fallo
            }
        }

        public function mostrarTodos() {
            $query = "SELECT * FROM profesores";
            $stmt = $this->con->prepare($query);
            $stmt->execute();
            
            // Devolver un arreglo asociativo con los resultados
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?> 