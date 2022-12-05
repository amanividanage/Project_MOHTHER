<?php
    class Midwife{
        private $db;
        
        public function __construct(){
            $this->db = new Database;
        }

        public function getMidwifes(){
            $this->db->query("SELECT * FROM midwifes");

            $results = $this->db->resultSet();

            return $results;
        }

        public function searchMidwifes($search){
            $this->db->query("SELECT * FROM midwifes WHERE CONCAT(name,identity) LIKE '%$search%' ");

            $results = $this->db->resultSet();

            return $results;
        }

        //Add admin
        public function addMidwife($data){
            $this->db->query('INSERT INTO midwifes (name, identity, phone, email, password, clinic, phm) VALUES (:name, :identity, :phone, :email, :password, :clinic, :phm)');

            //Bind values
            $this->db->bindParam(':name', $data['name']);
            $this->db->bindParam(':identity', $data['identity']);
            $this->db->bindParam(':phone', $data['phone']);
            $this->db->bindParam(':email', $data['email']);
            $this->db->bindParam(':password', $data['password']);
            $this->db->bindParam(':clinic', $data['clinic']);
            $this->db->bindParam(':phm', $data['phm']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        //Login user
        public function login($identity, $password){
            $this->db->query('SELECT * FROM midwifes WHERE identity = :identity');
            $this->db->bindparam(':identity', $identity);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }
        }

        //Find midwife by ID number
        public function findMidwifeByIdentity($identity){
            $this->db->query('SELECT * FROM midwifes WHERE identity = :identity');

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

        //Find midwife by E-mail
        public function findMidwifeByEmail($email){
            $this->db->query('SELECT * FROM midwifes WHERE email = :email');

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

        //Find midwife by Clinic Id
        public function findMidwifeByClinic($clinic){
            $this->db->query('SELECT * FROM midwifes WHERE clinic = :clinic');

            //Bind value
            $this->db->bindParam(':clinic', $clinic);

            $results = $this->db->resultSet();

            return $results;
        }
    }