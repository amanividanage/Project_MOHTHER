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
            $this->db->query("SELECT * FROM admins WHERE CONCAT(name,nic) LIKE '%$search%' ");

            $results = $this->db->resultSet();

            return $results;
        }

        public function getProfileAdmin(){
            $this->db->query("SELECT * FROM admins WHERE nic = :admin_nic");
            $this->db->bindParam(':admin_nic',  $_SESSION['admin_nic']);
    
            $row = $this->db->single();
    
            return $row;
        }

        public function editAdmin($data){
            $this->db->query("UPDATE admins SET name = :name, email =:email, phone=:phone WHERE nic = :admin_nic");
    
            $this->db->bindParam(':admin_nic',  $_SESSION['admin_nic']);
            $this->db->bindParam(':name',  $data['edit-name']);
            $this->db->bindParam(':phone',  $data['edit-phone']);
            $this->db->bindParam(':email',  $data['edit-email']);
            
             //Execute
             if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getAdminPassword() {
            $this->db->query("SELECT password FROM admins WHERE nic = :admin_nic");
            $this->db->bindParam(':admin_nic', $_SESSION['admin_nic']);
        
            $row = $this->db->single();
        
            return $row->password;
        }
        
        public function editAdminPassword($data){
            $this->db->query("UPDATE admins SET password = :password WHERE nic = :admin_nic");
    
            $this->db->bindParam(':admin_nic',  $_SESSION['admin_nic']);
            $this->db->bindParam(':password',  $data['new-password']);
            // $row = $this->db->single();
    
            // return $row;
            
             //Execute
             if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    
        public function editUserPassword($data){
            $this->db->query("UPDATE users SET password = :password WHERE nic = :admin_nic");
    
            $this->db->bindParam(':admin_nic',  $_SESSION['admin_nic']);
            $this->db->bindParam(':password',  $data['new-password']);
            // $row = $this->db->single();
    
            // return $row;
            
             //Execute
             if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        //Add admin
        public function addAdmin($data){
            $this->db->query('INSERT INTO admins (name, nic, phone, email, password) VALUES (:name, :nic, :phone, :email, :password)');
            

            //Bind values
            $this->db->bindParam(':name', $data['name']);
            $this->db->bindParam(':nic', $data['nic']);
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

        //Login User
        public function login($nic, $password){
            $this->db->query('SELECT * FROM users WHERE nic = :nic');
            $this->db->bindparam(':nic', $nic);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }
        }

        //Find user by ID number
        public function findAdminBynic($nic){
            $this->db->query('SELECT * FROM users
                              INNER JOIN admins ON admins.nic = users.nic WHERE users.nic = :nic');

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
        
        public function calculateTotalClinicAttendees(){

            $this->db->query("SELECT COUNT(DISTINCT nic) AS total_count FROM (
                SELECT nic FROM expectant
                UNION ALL
                SELECT nic FROM parent WHERE nic NOT IN (SELECT nic FROM expectant)
            ) AS clinic_attendees");

            $row = $this->db->single();

            return $row->total_count;
        }
        
        public function calculateTotalChildren(){

            $this->db->query("SELECT COUNT(*) AS total_count FROM children");

            $row = $this->db->single();

            return $row->total_count;
        }

        public function calculateParentAndExpectantMotherCount(){
            $this->db->query("SELECT 'Parent' AS label, COUNT(*) AS value FROM parent
                              UNION
                              SELECT 'Expectant Mother' AS label, COUNT(*) AS value FROM expectant WHERE expectant.active=0");
        
            $rows = $this->db->resultSet();
        
            $data = array();
            foreach($rows as $row){
                $data[] = array(
                    'label' => $row->label,
                    'value' => $row->value
                );
            }
            return $data;
        }
        
        public function calculateSpecialChildren(){
            $this->db->query("SELECT special AS label, COUNT(*) AS value FROM children WHERE special IN ('Premature births', 'Low birth weight', 'Neonatal complications', 'Congenital disorders') GROUP BY special");
            
            $rows = $this->db->resultSet();
            
            $data = array();
            foreach($rows as $row){
                $data[] = array(
                    'label' => $row->label,
                    'value' => $row->value
                );
            }
            return $data;
        }

        public function calculateStaff(){
            $this->db->query("SELECT 'Midwives' AS label, COUNT(*) AS value FROM midwifes
                              UNION
                              SELECT 'Doctors' AS label, COUNT(*) AS value FROM doctors");
        
            $rows = $this->db->resultSet();
        
            $data = array();
            foreach($rows as $row){
                $data[] = array(
                    'label' => $row->label,
                    'value' => $row->value
                );
            }
            return $data;
        }
        
        public function calculateChildDeaths(){

            $this->db->query("SELECT COUNT(*) AS total_count FROM deliveredlist WHERE miscarriage='Yes'");

            $row = $this->db->single();

            return $row->total_count;
        }

        public function calculateMotherDeaths(){

            $this->db->query("SELECT COUNT(*) AS total_count FROM deliveredlist WHERE mother_safe='no'");

            $row = $this->db->single();

            return $row->total_count;
        }

        public function calculateTotalDeaths(){

            $this->db->query("SELECT COUNT(*) AS total_count, MONTH(deliveredlist.date) AS month, 'child' AS type 
                            FROM deliveredlist WHERE miscarriage='Yes'
                            GROUP BY MONTH(deliveredlist.date)
                            UNION ALL
                            SELECT COUNT(*) AS total_count, MONTH(deliveredlist.date) AS month, 'mother' AS type 
                            FROM deliveredlist WHERE mother_safe='no'
                            GROUP BY MONTH(deliveredlist.date)");

            $rows = $this->db->resultSet();

            $data = array();
            foreach($rows as $row){
                $data[] = array(
                    'month' => date('F', mktime(0, 0, 0, $row->month, 1)),
                    'type' => $row->type,
                    'total_count' => $row->total_count
                );
            }

            return $data;
        }

        public function getNewRegistrantsMonthWise(){
            $this->db->query("SELECT MONTH(date) AS month, COUNT(*) AS value 
                                FROM registration
                                GROUP BY MONTH(date);");
    
            // $this->db->bindParam(':midwife_nic', $_SESSION['midwife_nic']);
            $rows = $this->db->resultSet();
            
            $data = array();
            foreach($rows as $row){
                $data[] = array(
                    'label' => date('F', mktime(0, 0, 0, $row->month, 1)),
                    'value' => $row->value
                );
            }
            return $data;
        }
        
        public function getNewRegistrantsYearWise() {
            $this->db->query("SELECT YEAR(date) AS year, COUNT(*) AS value 
                                FROM registration
                                GROUP BY YEAR(date);");
        

            $rows = $this->db->resultSet();
        
            $data = array();
            foreach($rows as $row) {
                $data[] = array(
                    'label' => $row->year,
                    'value' => $row->value
                );
            }
            return $data;
        }

        public function getNewRegistrantsClinicWise() {
            $this->db->query("SELECT clinics.clinic_name AS clinic, COUNT(*) AS value 
                                FROM registration
                                INNER JOIN clinics ON registration.gnd=clinics.gnd
                                GROUP BY clinics.clinic_name;");
        

            $rows = $this->db->resultSet();
        
            $data = array();
            foreach($rows as $row) {
                $data[] = array(
                    'label' => $row->clinic,
                    'value' => $row->value
                );
            }
            return $data;
        }

        
        public function getTotalChildVaccination(){
            $this->db->query("SELECT * FROM children INNER JOIN children_vaccination ON children.child_id=children_vaccination.child_id ");

            $results = $this->db->resultSet();

            return $results;
        }
        
        public function getChildVaccinatedByVaccine($vaccine){
            $this->db->query("SELECT children.name, children.parent, children.dob, children.date, children.weight 
                              FROM children 
                              INNER JOIN children_vaccination ON children.child_id=children_vaccination.child_id 
                              INNER JOIN vaccination ON vaccination.id=children_vaccination.vaccination_id 
                              WHERE vaccination.vaccine=:vaccine");
            $this->db->bindParam(':vaccine', $vaccine);
            $results = $this->db->resultSet();

            return $results;
        }

        // public function getChildVaccinatedByVaccine($vaccine){
        //     $this->db->query("SELECT children.name, children.parent, children.dob, children.date, children.weight 
        //                       FROM children 
        //                       INNER JOIN children_vaccination ON children.child_id=children_vaccination.child_id
        //                       WHERE children_vaccination.vaccination_id=:vaccine");
        //     $this->db->bindParam(':vaccine', $vaccine);
        //     $results = $this->db->resultSet();

        //     return $results;
        // }

        // public function getVaccinatedReport($vaccine){
        
        //     $this->db->query("SELECT * FROM registration WHERE date BETWEEN :date1 AND :date2 ");
    
        //     $this->db->bindParam(':date1', $date1);
        //     $this->db->bindParam(':date2', $date2);
    
        //     $row = $this->db->resultSet();
            
        //     return $row;
        // }
    }