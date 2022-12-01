<?php
    class Doctor{
        private $db;
        
        public function __construct(){
            $this->db = new Database;
        }

        public function getDoctors(){
            $this->db->query("SELECT * FROM doctors");

            $results = $this->db->resultSet();

            return $results;
        }

        public function searchDoctors($search){
            $this->db->query("SELECT * FROM doctors WHERE CONCAT(name,identity) LIKE '%$search%' ");

            $results = $this->db->resultSet();

            return $results;
        }

        //Add admin
        public function addDoctor($data){
            $this->db->query('INSERT INTO doctors (name, identity, phone, email, password, clinic) VALUES (:name, :identity, :phone, :email, :password, :clinic)');

            //Bind values
            $this->db->bindParam(':name', $data['name']);
            $this->db->bindParam(':identity', $data['identity']);
            $this->db->bindParam(':phone', $data['phone']);
            $this->db->bindParam(':email', $data['email']);
            $this->db->bindParam(':password', $data['password']);
            $this->db->bindParam(':clinic', $data['clinic']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        //Find doctor by ID number
        public function findDoctorByIdentity($identity){
            $this->db->query('SELECT * FROM doctors WHERE identity = :identity');

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

        //Find doctor by E-mail
        public function findDoctorByEmail($email){
            $this->db->query('SELECT * FROM doctors WHERE email = :email');

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

        //Find doctor by id
        public function findDoctorById($doctor_id){
            $this->db->query('SELECT * FROM doctors WHERE doctor_id = :doctor_id');

            //Bind value
            $this->db->bindParam(':doctor_id', $doctor_id);

            $row = $this->db->single();

            return $row;
        }

        //Find doctor by Clinic Id
        public function findDoctorByClinic($clinic){
            $this->db->query('SELECT * FROM doctors WHERE clinic = :clinic');

            //Bind value
            $this->db->bindParam(':clinic', $clinic);

            $results = $this->db->resultSet();

            return $results;
        }
    }