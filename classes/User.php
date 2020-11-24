<?php
    class User extends ConnectionBuilder{

        public $userLogged = null;
        public $userRegistered = null;

        public function loginUser($email,$password){
            $sql = "select * from users u where u.email = '{$email}' and u.password = '{$password}' ";
            $query = $this->conn->prepare($sql);
            $query->execute();
            
            //Ovde koristim fetch metodu jer vraca samo jedan podatak, ne koristim fetchAll
            $checkUser = $query->fetch(PDO::FETCH_OBJ);

            if($checkUser != null){

                $this->userLogged = $checkUser;
                $_SESSION['user'] = $checkUser;

                header('Location: ../index.php');
            }else{
                header('Location: ../views/register.view.php');
            }       
        }

        public function registerUser($name,$email,$password){
            $sql = "insert into users values(null,'{$name}','{$email}','{$password}')";
            $query = $this->conn->prepare($sql);
            $checkInsert = $query->execute();

            if($checkInsert){
                $this->userRegistered = true;
            }else{
                $this->userRegistered = false;
            }
        }

        public function checkUserAdmin($user_id){
            $sql = "select ur.user_id 
                    from user_roles ur
                    inner join roles r on r.role_id = ur.role_id
                    where   ur.user_id = {$user_id} 
                            and r.name = 'Admin' ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $checkUserAdmin = $query->fetchAll(PDO::FETCH_OBJ);
            return $checkUserAdmin;
        }

        public function checkUserBloger($user_id){
            $sql = "select ur.user_id 
                    from user_roles ur
                    inner join roles r on r.role_id = ur.role_id
                    where   ur.user_id = {$user_id} 
                            and r.name = 'Bloger' ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $checkUserBloger = $query->fetchAll(PDO::FETCH_OBJ);
            return $checkUserBloger;
        }
    }
?>