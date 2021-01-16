<?php
    class User extends ConnectionBuilder{

        public $userLogged = null;
        public $userRegistered = null;
        public $roleAdded = null;
        public $roleDeleted = null;

        public function userEmail($userId){
            $sql = "select email from users u where u.user_id = {$userId} ";
            $query = $this->conn->prepare($sql);
            $query->execute();
            
            //Ovde koristim fetch metodu jer vraca samo jedan podatak, ne koristim fetchAll
            $email = $query->fetch(PDO::FETCH_OBJ);
            return $email;
        }

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
            $last_id = $this->conn->lastInsertId();//ako su podaci insertovani, uzima ID da bi ga insertovao u tabelu carts

            if($checkInsert){
                $this->userRegistered = true;

                $sql2 = "insert into carts values(null,{$last_id})";
                $query2 = $this->conn->prepare($sql2);
                $query2->execute();

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

        public function selectAllUsers(){
            $sql = "select u.*, r.name as role_name
                    from users u
                    left join user_roles ur on ur.user_id = u.user_id
                    left join roles r on r.role_id = ur.role_id 
                    order by r.role_id desc, u.user_id desc ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        public function selectAdminAndBlogerUsers(){
            $sql = "select u.*, r.name as role_name, ur.user_role_id
                    from users u
                    inner join user_roles ur on ur.user_id = u.user_id
                    inner join roles r on r.role_id = ur.role_id 
                    order by r.role_id desc, u.user_id desc ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        public function selectAllRoles(){
            $sql = "select r.*
                    from roles r ";

            $query = $this->conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        public function insertRole($userId,$roleId){
            $sql = "insert into user_roles values(null,{$userId},{$roleId})";
            $query = $this->conn->prepare($sql);
            $checkInsert = $query->execute();

            if($checkInsert){
                $this->roleAdded = true;
            }else{
                $this->roleAdded = false;
            }
        }

        public function deleteRole($userRoleId){
            $sql = "delete from user_roles where user_role_id = {$userRoleId}";
            $query = $this->conn->prepare($sql);
            $checkDelete = $query->execute();

            if($checkDelete){
                $this->roleDeleted = true;
            }else{
                $this->roleDeleted = false;
            }
        }
    }
?>