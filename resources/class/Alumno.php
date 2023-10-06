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


        public function modificar($dni, $nombre, $apellido, $fecha_nacimiento) {
            $query = "UPDATE alumno SET nombre = ?, apellido = ?, fecha_nacimiento = ? WHERE dni = ?";
            $stmt = $this->con->prepare($query);

            $stmt->bindParam(':nombre',$nombre);
            $stmt->bindParam(':apellido',$apellido);
            $stmt->bindParam(':fecha_nacimiento',$fecha_nacimiento);
            $stmt->bindParam(':dni',$dni);


            $stmt->execute([$nombre, $apellido, $fecha_nacimiento, $dni]);
            
            // Verificar si la actualización fue exitosa
            if ($stmt->rowCount() > 0) {
                return true; // Éxito
            } else {
                return false; // Fallo
            }
        }

        public function mostrarTodos() {
            $query = "SELECT dni,nombre,apellido,fecha_nacimiento FROM alumno ORDER BY nombre ASC";
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
                return false;
            }
        }
        
        


    }
?> 