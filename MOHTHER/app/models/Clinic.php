<?php
    class Clinic{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getClinics(){
            $this->db->query("SELECT * FROM clinics");

            $results = $this->db->resultSet();

            return $results;
        }


        public function addClinic($data){
            $this->db->query("INSERT INTO `clinics` (clinic_name, gnd, location) VALUES(:clinic_name, :gnd, :location)");
            //Bind values
            $this->db->bindParam(':clinic_name', $data['clinic_name']);
            $this->db->bindParam(':gnd', $data['gnd']);
            $this->db->bindParam(':location', $data['location']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }

        public function getClinicById($id){
            $this->db->query('SELECT * FROM clinics WHERE id = :id');
            $this->db->bindParam(':id', $id);

            $row = $this->db->single();

            return $row;
        }


        

    }