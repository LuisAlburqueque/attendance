<?php
    class user{
        private $db;
        //constructor para inicializar la variable privada a la coneccion de la base
        function __construct($conn){
            $this->db = $conn;
        }

        public function insertUser($usuario,$password){
            try {
                $result = $this->getUserbyUsername($usuario);
                if($result['num'] > 0){
                    return false;
                }else{
                    $new_pass = md5($password.$usuario);
                    //definiendo el comando sql que se ejecutará
                    $sql = "INSERT INTO usuarios(usuario, pass) VALUES (:usuario, :password)";
                    //prepara el comando sql para la ejecucion
                    $stmt =  $this->db->prepare($sql);

                    //bindeando todos los espacios para sus valores
                    $stmt->bindparam(':usuario',$usuario);
                    $stmt->bindparam(':password',$new_pass);

                    //ejecutar el comando
                    $stmt->execute();
                    return true;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getUser($usuario,$password){
            try{
                $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :password";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':usuario',$usuario);
                $stmt->bindparam(':password',$password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getUserbyUsername($usuario){
            try{
                $sql = "SELECT COUNT(*) as num FROM usuarios WHERE usuario = :usuario";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':usuario',$usuario);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
    }
?>