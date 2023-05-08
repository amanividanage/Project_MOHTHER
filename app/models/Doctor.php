<?php
    class Doctor{
        private $db;
        
        public function __construct(){
            $this->db = new Database;
        }

        public function getDoctors(){
            $this->db->query("SELECT * FROM doctors WHERE active != '2'");

            $results = $this->db->resultSet();

            return $results;
        }
        
        public function getNotAddedDoctors(){
            $this->db->query("SELECT * FROM doctors WHERE active='0' ");

            $results = $this->db->resultSet();

            return $results;
        }

        public function searchDoctors($search){
            $this->db->query("SELECT * FROM doctors WHERE CONCAT(name,nic) LIKE '%$search%' ");

            $results = $this->db->resultSet();

            return $results;
        }

        //Add admin
        public function addDoctor($data){
            $this->db->query('INSERT INTO doctors (name, nic, phone, email, password, regdate) VALUES (:name, :nic, :phone, :email, :password, :regdate)');

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

        //Find doctor by ID number
        public function findDoctorBynic($nic){
            $this->db->query('SELECT * FROM users
                              INNER JOIN doctors ON doctors.nic=users.nic WHERE users.nic = :nic');

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
            $this->db->query('SELECT * FROM doctors WHERE nic = :nic');
            $this->db->bindparam(':nic', $nic);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
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
        public function getDoctorByClinic($clinic){
            $this->db->query('SELECT doctor_clinic.nic, doctors.name, doctors.email FROM doctor_clinic, doctors WHERE doctor_clinic.nic=doctors.nic AND doctor_clinic.clinic = :clinic');

            //Bind value
            $this->db->bindParam(':clinic', $clinic);

            $results = $this->db->resultSet();

            return $results;
        }

        
        public function addDoctorToClinic($data){
            $this->db->query('INSERT INTO doctor_clinic (nic, clinic, appdate) VALUES (:nic, :clinic, :appdate)');

            //Bind values
            $this->db->bindParam(':nic', $data['doctor']);
            $this->db->bindParam(':clinic', $data['id']);
            $this->db->bindParam(':appdate', $data['appdate']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        
        public function addDoctorToClinicTwo($data){
            $this->db->query('INSERT INTO doctor_transfer (nic, clinic, appdate) VALUES (:nic, :clinic, :appdate)');

            //Bind values
            $this->db->bindParam(':nic', $data['doctor']);
            $this->db->bindParam(':clinic', $data['id']);
            $this->db->bindParam(':appdate', $data['appdate']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        
        public function updateAddededDoctorToClinic($data){
            $this->db->query("UPDATE doctors  SET active ='1' WHERE nic = :nic");
            $this->db->bindParam(':nic', $data['doctor']);
                // $row = $this->db->single();
        
                // return $row;
                
                //Execute
                if($this->db->execute()){
                    return true;
                } else {
                    return false;
                }
            }

        public function getDoctorByNic($nic){
            $this->db->query('SELECT * FROM doctors WHERE nic = :nic');
            $this->db->bindParam(':nic', $nic);
    
            $row = $this->db->single();
    
            return $row;
        }

        public function getClinicByDoctor($nic){
            $this->db->query('SELECT doctor_clinic.clinic, clinics.clinic_name, clinics.id FROM doctor_clinic INNER JOIN clinics ON clinics.id = doctor_clinic.clinic WHERE doctor_clinic.nic = :nic');
            $this->db->bindParam(':nic', $nic);
    
            $row = $this->db->single();
    
            return $row;

            // if($this->db->rowCount() > 0){
            //     return $row;
            // } else {
            //     return false;
            // }
        }
        
        public function getClinicsToTransfer($nic){
            $this->db->query("SELECT clinics.clinic_name, clinics.id FROM clinics EXCEPT SELECT clinics.clinic_name, clinics.id FROM clinics INNER JOIN doctor_clinic ON clinics.id = doctor_clinic.clinic WHERE doctor_clinic.nic = :nic");

            // SELECT * FROM clinics INNERJOIN doctor_clinic ON clinics.id = doctor_clinic.clinics WHERE doctor_clinic.nic = :nic

        
             $this->db->bindParam(':nic', $nic);

            $results = $this->db->resultSet();

            return $results;
        }
        
        public function findClinicByDoctor($newclinic){
            $this->db->query('SELECT * FROM doctor_clinic WHERE clinic = :clinic');

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
        
        public function getDoctorClinicByDoctor($nic){
            $this->db->query('SELECT * FROM doctor_clinic WHERE nic = :nic');
            $this->db->bindParam(':nic', $nic);
    
            $row = $this->db->single();
    
            return $row;
        }
        
        public function transferDoctor($data){
            $this->db->query('INSERT INTO doctor_transfer (nic, clinic, appdate, transdate) VALUES (:nic, :clinic, :appdate, :transdate)');

            //Bind values
            $this->db->bindParam(':nic', $data['nic']);
            $this->db->bindParam(':clinic', $data['clinic']);
            $this->db->bindParam(':appdate', $data['appdate']);
            $this->db->bindParam(':transdate', $data['transdate']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        
        public function getWorkingHistory($nic){
            $this->db->query("SELECT clinics.clinic_name, doctor_transfer.appdate, doctor_transfer.transdate FROM doctor_transfer INNER JOIN clinics on doctor_transfer.clinic = clinics.id WHERE nic = :nic ORDER BY doctor_transfer.id;");
            $this->db->bindParam(':nic', $nic);
            $results = $this->db->resultSet();
        
            // Calculate age for each history record
            // foreach ($results as $result) {
            //     $start_date = $result->appdate;
            //     $end_date = $result->transdate;
            //     $diff = strtotime($end_date) - strtotime($start_date);
        
            //     $years = floor($diff / (365 * 60 * 60 * 24));
            //     $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
            //     $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        
            //     $result->working_period = "$years years, $months months, and $days days";
            // }
        
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
        
        public function updatetransferDoctor($data){
            $this->db->query('UPDATE doctor_clinic SET clinic = :newclinic, appdate = :transdate WHERE nic = :nic');

            //Bind values
            $this->db->bindParam(':nic', $data['nic']);
            $this->db->bindParam(':newclinic', $data['newclinic']);
            $this->db->bindParam(':transdate', $data['transdate']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function updateDoctor($data){
            $this->db->query('UPDATE doctor_transfer SET transdate = :transdate WHERE clinic = :clinic');

            //Bind values
            // $this->db->bindParam(':nic', $data['nic']);
            $this->db->bindParam(':clinic', $data['clinic']);
            $this->db->bindParam(':transdate', $data['transdate']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        
        public function addtransferDoctor($data){
            $this->db->query('INSERT doctor_transfer (nic, clinic, appdate) VALUES (:nic, :newclinic, :transdate)');

            //Bind values
            $this->db->bindParam(':nic', $data['nic']);
            $this->db->bindParam(':newclinic', $data['newclinic']);
            $this->db->bindParam(':transdate', $data['transdate']);

            //Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        // public function getWorkingHistory2($nic){
        //     $this->db->query("SELECT clinics.clinic_name, doctor_transfer.appdate, doctor_transfer.transdate FROM doctor_transfer INNER JOIN clinics on doctor_transfer.clinic = clinics.id WHERE nic = :nic");

        //     // SELECT * FROM clinics INNERJOIN doctor_clinic ON clinics.id = doctor_clinic.clinics WHERE doctor_clinic.nic = :nic

        
        //      $this->db->bindParam(':nic', $nic);

        //     $results = $this->db->resultSet();

        //     return $results;
        // }

        // public function getWorkingPeriod($nic){
        //         $this->db->query("SELECT clinics.clinic_name, doctor_transfer.appdate, doctor_transfer.transdate FROM doctor_transfer INNER JOIN clinics on doctor_transfer.clinic = clinics.id WHERE nic = :nic");
        //         $this->db->bindParam(':nic', $nic);
        //         $results = $this->db->resultSet();
            
        //         // Calculate age for each history record
        //         foreach ($results as $result) {
        //             $start_date = $result->appdate;
        //             $end_date = $result->transdate;
        //             $diff = strtotime($end_date) - strtotime($start_date);
            
        //             $years = floor($diff / (365 * 60 * 60 * 24));
        //             $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        //             $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
            
        //             $result->working_period = "$years years, $months months, and $days days";
        //         }
            
        //         return $results;
        //     }

        public function deleteFromDoctorClinic($nic){
            $this->db->query('DELETE FROM doctor_clinic WHERE nic = :nic');

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
            $this->db->query("UPDATE doctor_transfer SET transdate = :transdate WHERE nic = :nic AND transdate = '0000-00-00' ");

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

        public function updateDoctorActive($nic){
            $this->db->query("UPDATE doctors SET active = '2' WHERE nic = :nic");

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