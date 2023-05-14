<?php
    class Midwife{
        private $db;
        
        public function __construct(){
            $this->db = new Database;
        }

        public function getMidwifes(){
            $this->db->query("SELECT * FROM midwifes WHERE active != '2' ");

            $results = $this->db->resultSet();

            return $results;
        }

        public function getPHMByMidwife(){
            $this->db->query('SELECT clinics.gnd FROM midwife_clinic INNER JOIN clinics ON  midwife_clinic.clinic=clinics.id WHERE nic=:nic');

            $this->db->bindParam(':nic', $_SESSION['midwife_nic']);
    
            $row = $this->db->single();
    
            return $row;
        }

        
        public function getPHMByMidwifee(){
            $this->db->query('SELECT * FROM midwife_clinic WHERE nic = :nic');

            $this->db->bindParam(':nic', $_SESSION['midwife_nic']);
    
            $row = $this->db->single();
    
            return $row;
        }

        public function searchMidwifes($search){
            $this->db->query("SELECT * FROM midwifes WHERE CONCAT(name,nic) LIKE '%$search%' ");

            $results = $this->db->resultSet();

            return $results;
        }

        //Add admin
        public function addMidwife($data){
            $this->db->query('INSERT INTO midwifes (name, nic, phone, email, password, regdate) VALUES (:name, :nic, :phone, :email, :password, :regdate)');

            //Bind values
            $this->db->bindParam(':name', $data['name']);
            $this->db->bindParam(':nic', $data['nic']);
            $this->db->bindParam(':phone', $data['phone']);
            $this->db->bindParam(':email', $data['email']);
            $this->db->bindParam(':password', $data['password']);
            $this->db->bindParam(':regdate', $data['regdate']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function addUser($data){
            $this->db->query('INSERT INTO users (nic, name, password) VALUES (:nic, :name, :password)');
            

            //Bind values
            $this->db->bindParam(':nic', $data['nic']);
            $this->db->bindParam(':name', $data['name']);
            $this->db->bindParam(':password', $data['password']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        //Login user
        public function login($nic, $password){
            $this->db->query('SELECT * FROM midwifes WHERE nic = :nic');
            $this->db->bindparam(':nic', $nic);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }
        }

        //Find midwife by ID number
        public function findMidwifeBynic($nic){
            $this->db->query('SELECT * FROM users
                              INNER JOIN midwifes ON midwifes.nic = users.nic WHERE users.nic = :nic');

            //Bind value
            $this->db->bindParam(':nic', $nic);

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
        public function updatemidwifeinfo($data){
            $this->db->query("UPDATE midwifes  SET email =:email, phone=:phone WHERE midwife_id = :midwife_id");
            $this->db->bindParam(':midwife_id',  $_SESSION['midwife_id']);
            $this->db->bindParam(':phone',  $data['phone']);
            $this->db->bindParam(':email',  $data['email']);
            $row = $this->db->single();
    
            return $row;
            
             //Execute
             if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        public function updateclinicinfo($data){
            $this->db->query("UPDATE calendar  SET title =:title, clinic_date=:clinic_date, start_event=:start_event, end_event=:end_event, duration=:duration WHERE midwife_id = :midwife_id");
            $this->db->bindParam(':midwife_id',  $_SESSION['midwife_id']);
            $this->db->bindParam(':title',  $data['title']);
            $this->db->bindParam(':clinic_date',  $data['clinic_date']);
            $this->db->bindParam(':start_event',  $data['start_event']);
            $this->db->bindParam(':end_event',  $data['end_event']);
            $this->db->bindParam(':duration',  $data['duration']);
            $row = $this->db->single();
    
            return $row;
            
             //Execute
             if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        
        public function getProfileMidwife(){
            $this->db->query("SELECT * FROM midwifes WHERE midwife_id = :midwife_id");
            $this->db->bindParam(':midwife_id',  $_SESSION['midwife_id']);
          

            $row = $this->db->single();
            return $row;

             //Execute
             if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        
        public function getNotAddedMidwifes(){
            $this->db->query("SELECT * FROM midwifes WHERE active='0' ");

            $results = $this->db->resultSet();

            return $results;
        }

        public function addMidwifeToClinic($data){
            $this->db->query('INSERT INTO midwife_clinic (nic, clinic, phm, appdate) VALUES (:nic, :clinic, :phm, :appdate)');

            //Bind values
            $this->db->bindParam(':nic', $data['midwife']);
            $this->db->bindParam(':clinic', $data['clinic']);
            $this->db->bindParam(':phm', $data['id']);
            $this->db->bindParam(':appdate', $data['appdate']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function addMidwifeToClinicTwo($data){
            $this->db->query('INSERT INTO midwife_transfer (nic, clinic, phm, appdate) VALUES (:nic, :clinic, :phm, :appdate)');

            //Bind values
            $this->db->bindParam(':nic', $data['midwife']);
            $this->db->bindParam(':clinic', $data['clinic']);
            $this->db->bindParam(':phm', $data['id']);
            $this->db->bindParam(':appdate', $data['appdate']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function updateAddededMidwifeToClinic($data){
            $this->db->query("UPDATE midwifes  SET active ='1' WHERE nic = :nic");
            $this->db->bindParam(':nic', $data['midwife']);
                // $row = $this->db->single();
        
                // return $row;
                
                //Execute
                if($this->db->execute()){
                    return true;
                } else {
                    return false;
                }
        }

        public function getMidwifeByNic($nic){
            $this->db->query('SELECT * FROM midwifes WHERE nic = :nic');
            $this->db->bindParam(':nic', $nic);
    
            $row = $this->db->single();
    
            return $row;
        }
        
        public function getClinicByMidwife($nic){
            $this->db->query('SELECT midwife_clinic.clinic, phm.phm, clinics.clinic_name, clinics.id 
                              FROM midwife_clinic 
                              INNER JOIN clinics ON clinics.id = midwife_clinic.clinic 
                              INNER JOIN phm ON phm.id = midwife_clinic.phm 
                              WHERE midwife_clinic.nic = :nic');
            $this->db->bindParam(':nic', $nic);
    
            $row = $this->db->single();
    
            return $row;
        }
        // public function getMidwifeGnd($midwife_id) {
        //     $this->db->query('SELECT * FROM calendar INNER JOIN clinics ON calendar.gnd=clinics.gnd WHERE midwife_id=:midwife_id');
        //     $this->db->bindParam(':midwife_id', $midwife_id);
        //     $result = $this->db->single();
        //     return $result['gnd'];
        // }
        

        public function getClinicsToTransfer($nic){
            $this->db->query("SELECT clinics.clinic_name, clinics.id FROM clinics EXCEPT SELECT clinics.clinic_name, clinics.id FROM clinics INNER JOIN midwife_clinic ON clinics.id = midwife_clinic.clinic WHERE midwife_clinic.nic = :nic");

            // SELECT * FROM clinics INNERJOIN doctor_clinic ON clinics.id = doctor_clinic.clinics WHERE doctor_clinic.nic = :nic

        
            $this->db->bindParam(':nic', $nic);

            $results = $this->db->resultSet();

            return $results;
        }
        
        public function getPHMsToTransfer(){
            $this->db->query("SELECT * FROM phm");

            // SELECT * FROM clinics INNERJOIN doctor_clinic ON clinics.id = doctor_clinic.clinics WHERE doctor_clinic.nic = :nic

        
            // $this->db->bindParam(':clinic_id', $newclinic);

            $results = $this->db->resultSet();

            return $results;
        }

        public function getMidwifeClinicByMidwife($nic){
            $this->db->query('SELECT * FROM midwife_clinic WHERE nic = :nic');
            $this->db->bindParam(':nic', $nic);
    
            $row = $this->db->single();
    
            return $row;
        }
        
        public function findClinicByMidwife($newclinic){
            $this->db->query('SELECT * FROM midwife_clinic WHERE clinic = :clinic');

            //Bind value
            $this->db->bindParam(':clinic', $newclinic);

            $row = $this->db->single();

            //Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }
        
        public function updatetransferMidwife($data){
            $this->db->query('UPDATE midwife_clinic SET clinic = :newclinic, phm = :newphm, appdate = :transdate WHERE nic = :nic');

            //Bind values
            $this->db->bindParam(':nic', $data['nic']);
            $this->db->bindParam(':newclinic', $data['newclinic']);
            $this->db->bindParam(':newphm', $data['newphm']);
            $this->db->bindParam(':transdate', $data['transdate']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        
        public function addtransferMidwife($data){
            $this->db->query('INSERT midwife_transfer (nic, clinic, phm, appdate) VALUES (:nic, :newclinic, :newphm, :transdate)');

            //Bind values
            $this->db->bindParam(':nic', $data['nic']);
            $this->db->bindParam(':newclinic', $data['newclinic']);
            $this->db->bindParam(':newphm', $data['newphm']);
            $this->db->bindParam(':transdate', $data['transdate']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        
        public function updateMidwife($data){
            $this->db->query('UPDATE midwife_transfer SET transdate = :transdate WHERE clinic = :clinic AND nic = :nic');

            //Bind values
            $this->db->bindParam(':nic', $data['nic']);
            $this->db->bindParam(':clinic', $data['clinic']);
            $this->db->bindParam(':transdate', $data['transdate']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        
        public function getWorkingHistory($nic){
            $this->db->query("SELECT clinics.clinic_name, phm.phm, midwife_transfer.appdate, midwife_transfer.transdate 
                              FROM midwife_transfer 
                              INNER JOIN clinics ON midwife_transfer.clinic = clinics.id 
                              INNER JOIN PHM ON phm.id = midwife_transfer.phm
                              WHERE nic = :nic
                              ORDER BY midwife_transfer.id;");

            $this->db->bindParam(':nic', $nic);
            $results = $this->db->resultSet();
        
            return $results;
        }

        public function calculateWorkPeriod($appdate, $transdate){
            
            
            // $start_date = appdate;
            // $end_date = transdate;
            $diff = strtotime($transdate) - strtotime($appdate);
    
            $years = floor($diff / (365 * 60 * 60 * 24));
            $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
    
            $result = "$years years, $months months, and $days days";
        
    
            return $result;
        }

        public function deleteFromMidwifeClinic($nic){
            $this->db->query('DELETE FROM midwife_clinic WHERE nic = :nic');

            //Bind values
            $this->db->bindParam(':nic', $nic);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function setTerminatedDate($data){
            $this->db->query("UPDATE midwife_transfer SET transdate = :transdate WHERE nic = :nic AND transdate = '0000-00-00' ");

            //Bind values
            $this->db->bindParam(':nic', $data['nic']);
            $this->db->bindParam(':transdate', $data['date']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function updateMidwifeActive($nic){
            $this->db->query("UPDATE midwifes SET active = '2' WHERE nic = :nic");

            //Bind values
            $this->db->bindParam(':nic', $nic);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        
        public function deleteFromUser($nic){
            $this->db->query('DELETE FROM users WHERE nic = :nic');

            //Bind values
            $this->db->bindParam(':nic', $nic);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }