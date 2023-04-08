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

        
        //Find midwife by ID number
        public function findCilinicByGnd($gnd){
            $this->db->query('SELECT * FROM clinics WHERE gnd = :gnd');

            //Bind value
            $this->db->bindParam(':gnd', $gnd);

            $row = $this->db->single();

            //Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }
        
        public function addPHM($data){
            $this->db->query("INSERT INTO `phm` (clinic_id, phm) VALUES(:clinic_id, :phm)");
            //Bind values
            $this->db->bindParam(':clinic_id', $data['id']);
            $this->db->bindParam(':phm', $data['newphm']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }

        public function showPHM($id){
            $this->db->query("SELECT * FROM phm WHERE clinic_id = :clinic_id");

            $this->db->bindParam(':clinic_id', $id);

            $results = $this->db->resultSet();

            return $results;
        }
        
        //Find doctor by Clinic Id
        public function showMidwife($clinic){
            $this->db->query('SELECT midwife_clinic.nic, midwifes.name, midwifes.email FROM midwife_clinic, midwifes WHERE midwife_clinic.nic=midwifes.nic AND midwife_clinic.clinic = :clinic');

            //Bind value
            $this->db->bindParam(':clinic', $clinic);
            // $this->db->bindParam(':phm', $phm);
            // AND midwife_clinic.phm = :phm

            $results = $this->db->resultSet();

            return $results;
        }

        
        public function getPHMAreaById($id){
            $this->db->query("SELECT * FROM phm WHERE id = :id");

            $this->db->bindParam(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        
        public function getClinicByPHM($id){
            $this->db->query('SELECT * FROM phm WHERE id = :id');
            $this->db->bindParam(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        

    }
    