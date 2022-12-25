<?php
    class Admin{
        private $db;
        
        public function __construct(){
            $this->db = new Database;
        }

        public function getAdmins(){
            $this->db->query("SELECT * FROM admins");

            $results = $this->db->resultSet();

            return $results;
        }

        public function searchAdmins($search){
            $this->db->query("SELECT * FROM admins WHERE CONCAT(name,identity) LIKE '%$search%' ");

            $results = $this->db->resultSet();

            return $results;
        }

        //get profile
        /*public function getProfile(){
            $this->db->query("SELECT * FROM admins WHERE admin_id = ".$_SESSION['admin_id']);
    
            $row = $this->db->single();
    
            return $row;
        }*/

        //Add admin
        public function addAdmin($data){
            $this->db->query('INSERT INTO admins (name, identity, phone, email, password) VALUES (:name, :identity, :phone, :email, :password)');

            //Bind values
            $this->db->bindParam(':name', $data['name']);
            $this->db->bindParam(':identity', $data['identity']);
            $this->db->bindParam(':phone', $data['phone']);
            $this->db->bindParam(':email', $data['email']);
            $this->db->bindParam(':password', $data['password']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        //Login User
        public function login($identity, $password){
            $this->db->query('SELECT * FROM admins WHERE identity = :identity');
            $this->db->bindparam(':identity', $identity);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }
        }

        //Find user by ID number
        public function findAdminByIdentity($identity){
            $this->db->query('SELECT * FROM admins WHERE identity = :identity');

            //Bind value
            $this->db->bindParam(':identity', $identity);

            $row = $this->db->single();

            //Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        //Find user by E-mail
        public function findAdminByEmail($email){
            $this->db->query('SELECT * FROM admins WHERE email = :email');

            //Bind value
            $this->db->bindParam(':email', $email);

            $row = $this->db->single();

            //Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

    }