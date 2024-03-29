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
            $this->db->query("INSERT INTO `clinics` (clinic_name, gnd, location, child_clinic_date, maternity_clinic_date) VALUES(:clinic_name, :gnd, :location, :child_clinic_date, :maternity_clinic_date)");
            //Bind values
            $this->db->bindParam(':clinic_name', $data['clinic_name']);
            $this->db->bindParam(':gnd', $data['gnd']);
            $this->db->bindParam(':location', $data['location']);
            $this->db->bindParam(':child_clinic_date', $data['child_clinic_date']);
            $this->db->bindParam(':maternity_clinic_date', $data['maternity_clinic_date']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }

        public function editClinic($data){
            $this->db->query("UPDATE clinics SET clinic_name = :clinic_name, location =:location WHERE id = :clinic_id");
    
            $this->db->bindParam(':clinic_id', $data['id']);
            $this->db->bindParam(':clinic_name',  $data['edit-name']);
            $this->db->bindParam(':location',  $data['edit-location']);
            
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
            $this->db->query('SELECT midwife_clinic.nic, midwife_clinic.phm, midwifes.name, midwifes.email FROM midwife_clinic, midwifes WHERE midwife_clinic.nic=midwifes.nic AND midwife_clinic.clinic = :clinic');

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
 
        public function getPreviousDoctorsByClinic($clinic){
            $this->db->query('SELECT doctor_transfer.nic, doctors.name 
                              FROM doctor_transfer
                              INNER JOIN doctors ON doctor_transfer.nic=doctors.nic 
                              WHERE doctor_transfer.clinic = :clinic
                              EXCEPT 
                              SELECT doctors.nic, doctors.name 
                              FROM doctor_clinic 
                              INNER JOIN doctors ON doctor_clinic.nic=doctors.nic 
                              WHERE doctor_clinic.clinic = :clinic
                            ');

            //Bind value
            $this->db->bindParam(':clinic', $clinic);

            $results = $this->db->resultSet();

            return $results;
        }
        
        public function getPreviousMidwifesByClinic($clinic){
            $this->db->query("SELECT midwife_transfer.nic, midwifes.name, phm.phm 
                              FROM midwife_transfer
                              INNER JOIN midwifes ON midwife_transfer.nic=midwifes.nic 
                              INNER JOIN phm ON midwife_transfer.phm = phm.id
                              WHERE midwife_transfer.clinic = :clinic AND midwife_transfer.transdate != '0000-00-00'
                            --   EXCEPT (
                            --   SELECT midwifes.nic, midwifes.name, midwife_clinic.phm
                            --   FROM midwife_clinic 
                            --   INNER JOIN midwifes ON midwife_clinic.nic=midwifes.nic 
                            --   WHERE midwife_clinic.clinic = :clinic)
                            ");

            //Bind value
            $this->db->bindParam(':clinic', $clinic);

            $results = $this->db->resultSet();

            return $results;
        }

        public function getClinicAttendeeCountByClinic($clinic){

            $this->db->query("SELECT COUNT(DISTINCT nic) AS total_count FROM (
                SELECT expectant.nic FROM expectant, phm WHERE expectant.phm=phm.id AND phm.clinic_id=:clinic 
                UNION ALL
                SELECT parent.nic FROM parent, phm WHERE parent.phm=phm.id AND phm.clinic_id=:clinic AND parent.nic NOT IN (SELECT expectant.nic FROM expectant, phm WHERE expectant.phm=phm.id AND phm.clinic_id=:clinic)
            ) AS clinic_attendees");

            $this->db->bindParam(':clinic', $clinic);

            $row = $this->db->single();

            return $row->total_count;
        }
        
        public function getChildrenCountByClinic($clinic){

            $this->db->query("SELECT COUNT(*) AS total_count FROM children, phm WHERE children.phm=phm.id AND phm.clinic_id=:clinic");

            $this->db->bindParam(':clinic', $clinic);

            $row = $this->db->single();

            return $row->total_count;
        }
        

        

    }
    