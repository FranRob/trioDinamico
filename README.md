# trioDinamico




Requisitos del sistema:

Se solicita por parte del profesor Javier Parra, realizar un sistema que permita dar de alta/baja/modificar alumnos, dar de alta/baja/modificar profesores y registrar las asistencias del año para concluir así con un porcentaje de su cantidad de asistencias que refleje si el alumno se encuentra en condicion de libre, regular o promocionado.

El sistema para tomar asistencia se  realizará con PHP, usando objetos (clases): herencia, encapsulamiento, traits, metodos estaticos. HTML + bootstrap(Local)+jsvanilla. MySQL - script de la base de datos = .sql

- El sistema además de dar ABM(alta, baja y modificación, CRUD) de alumnos y profesores, debe contar con una interfaz gráfica.
- La tabla Alumno, debe contar con los campos: Apellido, Nombre, DNI, Fecha Nac.
- La tabla Asistencias cuenta con: id_asistencia, id_alumno, fecha, estado_asistencia.
- Realizar un listado alfabeticamente por apellido.
- Permitir cargar asistencias.
- Se debe ingresar la cantidad de clases en el año y confirmar si con las asistencias el alumno se encuentra en condición para promocionar o no.
- Mysql tiene que persistir, es decir, no se deben perder los datos.
- Tener en cuenta las validaciones, por ejemplo: si yo doy de alta un alumno que ya existe, que el sistema de mensaje de error.
- La pantalla principal (index.html) debe permitir ingresar el nombre/dni en una caja junto a un botón buscar, revelando datos del alumno y que permita ponerle la asistencia. Además debe contar con un menú de Alumno y de Profesor para realizar las modificaciones que necesite el usuario y ver un listado completo.
-Agregar un menú de configuración  donde se pueda ingresar la cantidad de clases total para el año dentro de la tabla parámetros.
