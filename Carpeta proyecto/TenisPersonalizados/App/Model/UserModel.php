<?php
    class UserModel{
        //creamos un atributo para manipular los datos en la bd
        private $UserConnection;

        //definimos el contructor de la clase usermodel
        public function __construct(){
            
            //requiero la clase dbconnection 
            require_once('App/Config/DBConnection.php');
            //instranciamos userconnection con dbconnection 
            $this->UserConnection=new DBConnection();
        }

        //a partir de esto vienen los metodos logicos de la app

        //metodo para obtener todos los usuarios
        public function getAll(){
            //paso 1 creo la consulta
            $sql="SELECT * FROM vista_usuarios";
            //paso 2 llamo a la conneccion 
            $connection =$this->UserConnection->getconnection();
            //paso 3 ejecuto la consulta
            $result=$connection->query($sql);
            //paso 4 verifico y acomodo datos 
            //paso 4.1 creo un arreglo para almacenar los usuarios de la bd 
            $users=array();
            //tengo que recorrer $result para ir extrayendo los renglones (registros de usuarios)
            //ocupare un while y la instruccion fetch_assoc
            while($user=$result->fetch_assoc()){
                $users[]=$user;
            }
            //paso 5 cierro la coneccion 
            $this->UserConnection->closeConecction();
            //paso 6 arrojo resultados
            return $users;
        }

        //getById metodo que extrae un usuario por su id
        public function getById($id){
            //creamos consulta
            $sql="CALL GetUsuarioById('".$id."')";
            //obtenemos la coneccion 
            $connection=$this->UserConnection->getConnection();
            //ejecutamos la consulta
            $reslt=$connection->query($sql);
            //verificamos que traiga datos y los sacamos a una variable
            if($reslt && $reslt->num_rows > 0){
                $user=$reslt->fetch_assoc();
            }else{
                $user=false;
            }
            //cerramos la coneccion
            $this->UserConnection->closeConecction();
            //arrojamos resultados
            return $user;
        }

        // método para verificar credenciales de inicio de sesión
        public function getCredentials($us, $ps) {
            // Obtenemos la conexión
            $connection = $this->UserConnection->getConnection();
        
            // Creamos una consulta preparada para llamar al procedimiento almacenado
            $sql = "CALL GetCredentials(?, ?)";
        
            // Preparamos la consulta
            $stmt = $connection->prepare($sql);
        
            // Asignamos los valores de los parámetros
            $stmt->bind_param("ss", $us, $ps);
        
            // Ejecutamos la consulta preparada
            $stmt->execute();
        
            // Obtenemos el resultado
            $result = $stmt->get_result();
        
            // Verificamos si hay resultados
            if ($result && $result->num_rows > 0) {
                // Obtenemos los datos del usuario desde el resultado de la consulta
                $user = $result->fetch_assoc();
                // Almacenamos el ID del usuario en la sesión (si es necesario)
                // Cerramos la conexión
                $stmt->close();
                $this->UserConnection->closeConecction();
                // Arrojamos el resultado, que ahora incluye los datos del usuario
                return $user;
            } else {
                // Cerramos la conexión
                $stmt->close();
                $this->UserConnection->closeConecction();
                return false;
            }
        }
        


        //metodo para insertar usuarios
        public function insert($user) {
            // Obtenemos la conexión
            $connection = $this->UserConnection->getConnection();
        
            // Creamos una consulta preparada para llamar al procedimiento almacenado
            //Los signos de interrogación (?) se utilizan como marcadores de posición para los valores que serán insertados en la consulta SQL 
            $sql = "CALL InsertUsuario(?, ?, ?, ?, ?, ?, ?)";
        
            // Preparamos la consulta
            $stmt = $connection->prepare($sql);
        
            // Asignamos los valores de los parámetros
            $stmt->bind_param(
                //La letra "s" se utiliza para especificar el tipo de dato que se está asignando a cada uno de los parámetros de la consulta SQL.
                //se utiliza s por que es string
                "sssssss",
                $user['nombre'],
                $user['apellido_paterno'],
                $user['apellido_materno'],
                $user['email'],
                $user['telefono'],
                $user['usuario'],
                $user['password']
            );
        
            // Ejecutamos la consulta preparada
            $reslt = $stmt->execute();
        
            // Cerramos la conexión
            $stmt->close();
            $this->UserConnection->closeConecction();
        
            // Preparamos la respuesta
            return $reslt;
        }
        
        //metodo para editar usuarios
        public function update($user) {
            // Obtenemos la conexión
            $connection = $this->UserConnection->getConnection();
        
            // Creamos una consulta preparada para llamar al procedimiento almacenado
            $sql = "CALL UpdateUsuario(?, ?, ?, ?, ?, ?, ?, ?)";
        
            // Preparamos la consulta
            $stmt = $connection->prepare($sql);
        
            // Asignamos los valores de los parámetros
            $stmt->bind_param(
                //i de entero
                "isssssss",
                $user['ID_Usuario'],
                $user['nombre'],
                $user['apellido_paterno'],
                $user['apellido_materno'],
                $user['email'],
                $user['telefono'],
                $user['usuario'],
                $user['password']
            );
        
            // Ejecutamos la consulta preparada
            $reslt = $stmt->execute();
        
            // Cerramos la conexión
            $stmt->close();
            $this->UserConnection->closeConecction();
        
            // Preparamos la respuesta
            return $reslt;
        }
        

        //metodo para eliminar usuarios
        //metodo para eliminar un usuario por su ID
        public function delete($id) {
            // Obtenemos la conexión
            $connection = $this->UserConnection->getConnection();
        
            // Creamos una consulta preparada para llamar al procedimiento almacenado
            $sql = "CALL DeleteUsuario(?)";
        
            // Preparamos la consulta
            $stmt = $connection->prepare($sql);
        
            // Asignamos el valor del parámetro
            $stmt->bind_param("i", $id);
        
            // Ejecutamos la consulta preparada
            $reslt = $stmt->execute();
        
            // Cerramos la conexión
            $stmt->close();
            $this->UserConnection->closeConecction();
        
            // Preparamos la respuesta
            return $reslt;
        }
        


        
            


    }
?>