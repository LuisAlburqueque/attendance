<?php
    class crud{
        //objeto de base de datos privado
        private $db;
        //constructor para inicializar la variable privada a la coneccion de la base
        function __construct($conn){
            $this->db = $conn;
        }

        //funcion para insertar datos en la base de datos
        public function insertAsistentes($nombres, $apellidos, $fdn, $email, $numero, $especialidad){
            try {
                //definiendo el comando sql que se ejecutará
                $sql = "INSERT INTO asistentes(nombres, apellidos, fechnac, email, numero, espec_id) VALUES (:nombres, :apellidos, :fdn, :email, :numero, :especialidad)";
                //prepara el comando sql para la ejecucion
                $stmt =  $this->db->prepare($sql);

                //de d-m-a -> a-m-d
                $nf=date("y-m-d",strtotime($fdn));

                //bindeando todos los espacios para sus valores
                $stmt->bindparam(':nombres',$nombres);
                $stmt->bindparam(':apellidos',$apellidos);
                $stmt->bindparam(':fdn',$nf);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':numero',$numero);
                $stmt->bindparam(':especialidad',$especialidad);
                //ejecutar el comando
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function editarAsistentes($id, $nombres, $apellidos, $fdn, $email, $numero, $especialidad){
            try{
                $sql = "UPDATE `asistentes` SET `nombres`=:nombres,`apellidos`=:apellidos,`fechnac`=:fdn,`email`=:email,`numero`=:numero,`espec_id`=:especialidad WHERE asistente_id=:id";
                $stmt =  $this->db->prepare($sql);
                //de d-m-a -> a-m-d
                $nf=date("y-m-d",strtotime($fdn));
                //bindeando todos los espacios para sus valores
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':nombres',$nombres);
                $stmt->bindparam(':apellidos',$apellidos);
                $stmt->bindparam(':fdn',$nf);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':numero',$numero);
                $stmt->bindparam(':especialidad',$especialidad);
                //ejecutar el comando
                $stmt->execute();
                return true;
            }catch (PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getAsistentes(){
            try{
                $sql = "SELECT * FROM `asistentes` a inner join especialidad s on a.espec_id = s.espec_id;";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getAsistentesDetalles($id){
            try{
                $sql = "SELECT * FROM asistentes a inner join especialidad s on a.espec_id = s.espec_id where asistente_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch (PDOException $e){
                echo $e->getMessage();
                return false;
            }
            
        }

        public function deleteAsistentes($id){
            try{
                $sql = "DELETE from asistentes WHERE asistente_id= :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            }catch (PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getEspecialidades(){
            try{
                $sql = "SELECT * FROM `especialidad`;";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e){
                echo $e->getMessage();
                return false;
            }
            
        }

        public function getEspecialidadesPorId($id){
            try{
                $sql = "SELECT * FROM `especialidad` where espec_id= :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
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