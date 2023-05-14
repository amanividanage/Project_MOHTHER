<?php
class Clinicattendee{
    private $db;

    public function __construct(){
        $this->db=new Database;
    }

    
    public function clarifyMotherOrParent(){
        $this->db->query("SELECT * FROM expectant WHERE nic = :nic AND expectant.active='0' ");
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        $row = $this->db->single();

        // if($row<1){
        //     $this->db->query('SELECT * FROM parent WHERE nic = :nic');
        //     $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);

        //     $row = $this->db->single();

        //     return $row;
            
        // } else {
            return $row;
        // }

       
    }

    public function getProfile_expectant(){
        $this->db->query('SELECT * FROM registration WHERE nic = :nic');
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        $row = $this->db->single();
        return $row;
    }
    
    public function getProfile_parent(){
        $this->db->query('SELECT * FROM parent WHERE nic = :nic');
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        $row = $this->db->single();
        return $row;
    }

    public function getProfile(){
        $this->db->query("SELECT * FROM registration WHERE nic = :nic");
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        $row = $this->db->single();

        if($row<1){
            $this->db->query('SELECT * FROM parent WHERE nic = :nic');
            $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);

            $row = $this->db->single();

            return $row;
            
        } else {
            return $row;
        }

       
    }

    //edit profile
    public function updateExpectantInfo($data){
        $this->db->query("UPDATE registration SET mcontactno=:mcontactno, hcontactno=:hcontactno WHERE nic = :nic");
        $this->db->bindParam(':nic',  $_SESSION['clinicattendee_nic']);
        $this->db->bindParam(':mcontactno',  $data['edit-mcontact']);
        $this->db->bindParam(':hcontactno',  $data['edit-hcontact']);
        // $this->db->bindParam(':password',  $data['password']);
        
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    
    public function updateParentInfo($data){
        $this->db->query("UPDATE parent SET contactno=:contactno WHERE nic = :nic");
        $this->db->bindParam(':nic',  $_SESSION['clinicattendee_nic']);
        $this->db->bindParam(':contactno',  $data['edit-contact']);
        // $this->db->bindParam(':password',  $data['password']);
        
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getExpectantPassword() {
        $this->db->query("SELECT password FROM expectant WHERE nic = :nic");
        $this->db->bindParam(':nic',  $_SESSION['clinicattendee_nic']);
    
        $row = $this->db->single();
    
        return $row->password;
    }

    public function getParentPassword() {
        $this->db->query("SELECT password FROM parent WHERE nic = :nic");
        $this->db->bindParam(':nic',  $_SESSION['clinicattendee_nic']);
    
        $row = $this->db->single();
    
        return $row->password;
    }

    public function editExpectantPassword($data){
        $this->db->query("UPDATE expectant SET password = :password WHERE nic = :nic");

        $this->db->bindParam(':nic',  $_SESSION['clinicattendee_nic']);
        $this->db->bindParam(':password',  $data['new-password']);
        
         //Execute
         if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function editParentPassword($data){
        $this->db->query("UPDATE parent SET password = :password WHERE nic = :nic");

        $this->db->bindParam(':nic',  $_SESSION['clinicattendee_nic']);
        $this->db->bindParam(':password',  $data['new-password']);
        
         //Execute
         if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function editUserPassword($data){
        $this->db->query("UPDATE users SET password = :password WHERE nic = :nic");

        $this->db->bindParam(':nic',  $_SESSION['clinicattendee_nic']);
        $this->db->bindParam(':password',  $data['new-password']);
        
         //Execute
         if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function update_registration($data){
        $this->db->query("UPDATE registration SET mname=:mname, mage=:mage, moccupation=:moccupation, mcontactno=:mcontactno, memail=:memail, hname=:hname, hage=:hage, hoccupation=:hoccupation, hcontactno=:hcontactno, hemail=:hemail, active=:active WHERE nic = :nic");
        $this->db->bindParam(':nic',  $_SESSION['clinicattendee_nic']);
        $this->db->bindParam(':mname',  $data['mname']);
        $this->db->bindParam(':mage',  $data['mage']);
        $this->db->bindParam(':moccupation',  $data['moccupation']);
        $this->db->bindParam(':mcontactno',  $data['mcontactno']);
        $this->db->bindParam(':memail',  $data['memail']);
        $this->db->bindParam(':hname',  $data['hname']);
        $this->db->bindParam(':hage',  $data['hage']);
        $this->db->bindParam(':hoccupation',  $data['hoccupation']);
        $this->db->bindParam(':hcontactno',  $data['hcontactno']);
        $this->db->bindParam(':hemail',  $data['hemail']);
        $this->db->bindParam(':active',  $data['active']);

        
         //Execute
         if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getreq_expectant(){
        $this->db->query("SELECT * FROM registration WHERE nic = :nic");
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        $row = $this->db->single();

        return $row;
    }

    public function getreq_parent(){
        $this->db->query("SELECT * FROM parent WHERE nic = :nic");
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        $row = $this->db->single();

        return $row;
    }

    public function findgndbyPHM(){
        $this->db->query("SELECT clinics.gnd FROM parent 
                          INNER JOIN phm ON parent.phm=phm.id 
                          INNER JOIN clinics ON phm.clinic_id=clinics.id WHERE nic = :nic");

        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        $row = $this->db->single();

        return $row;
    }


    //register user
    public function register($data){
        $this->db->query("INSERT INTO registration (date, mname, nic, mage, mlevelofeducation, moccupation, mcontactno, address, memail, hname, hage, hlevelofeducation, hoccupation, hcontactno, hemail, gnd, active) VALUES (:date, :mname, :nic, :mage, :mlevelofeducation, :moccupation, :mcontactno, :address, :memail, :hname, :hage, :hlevelofeducation, :hoccupation, :hcontactno, :hemail, :gnd, :active)");

         //bind values
         $this->db->bindParam(':date',$data['date']);
         $this->db->bindParam(':mname',$data['mname']);
         $this->db->bindParam(':nic',$data['nic']);
         $this->db->bindParam(':mage',$data['mage']);
        //  $this->db->bindParam(':gravidity',$data['gravidity']);
         $this->db->bindParam(':mlevelofeducation',$data['mlevelofeducation']);
         $this->db->bindParam(':moccupation',$data['moccupation']);
         $this->db->bindParam(':mcontactno',$data['mcontactno']);
         $this->db->bindParam(':address',$data['address']);
         $this->db->bindParam(':memail',$data['memail']);
         $this->db->bindParam(':hname',$data['hname']);
         $this->db->bindParam(':hage',$data['hage']);
         $this->db->bindParam(':hlevelofeducation',$data['hlevelofeducation']);
         $this->db->bindParam(':hoccupation',$data['hoccupation']);
         $this->db->bindParam(':hcontactno',$data['hcontactno']);
         $this->db->bindParam(':hemail',$data['hemail']);
         $this->db->bindParam(':gnd',$data['gnd']);
         $this->db->bindParam(':active',$data['active']);
        
         
         //execute
         if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Login user - previous
    // public function login($nic, $password){
    //     $this->db->query('SELECT * FROM expectant WHERE nic = :nic');
    //     $this->db->bindparam(':nic', $nic);

    //     $row = $this->db->single();

    //     $hashed_password = $row->password;
    //     if(password_verify($password, $hashed_password)){
    //         return $row;
    //     } else {
    //         return false;
    //     }
    // }


    //request user
    public function request($data){
        $this->db->query("INSERT INTO registration (date, mname, nic, mage, mlevelofeducation, moccupation, mcontactno, address, memail, hname, hage, hlevelofeducation, hoccupation, hcontactno, hemail, gnd, active) VALUES (:date, :mname, :nic, :mage, :mlevelofeducation, :moccupation, :mcontactno, :address, :memail, :hname, :hage, :hlevelofeducation, :hoccupation, :hcontactno, :hemail, :gnd, :active)");
   
        //bind values
        $this->db->bindParam(':date',$data['date']);
        $this->db->bindParam(':mname',$data['name']);
        $this->db->bindParam(':nic',$data['nic']);
        $this->db->bindParam(':mage',$data['age']);
        $this->db->bindParam(':mlevelofeducation',$data['levelofeducation']);
        $this->db->bindParam(':moccupation',$data['occupation']);
        $this->db->bindParam(':mcontactno',$data['contactno']);
        $this->db->bindParam(':address',$data['address']);
        $this->db->bindParam(':memail',$data['email']);
        $this->db->bindParam(':hname',$data['hname']);
        $this->db->bindParam(':hage',$data['hage']);
        $this->db->bindParam(':hlevelofeducation',$data['hlevelofeducation']);
        $this->db->bindParam(':hoccupation',$data['hoccupation']);
        $this->db->bindParam(':hcontactno',$data['hcontactno']);
        $this->db->bindParam(':hemail',$data['hemail']);
        $this->db->bindParam(':gnd',$data['gnd']);
        $this->db->bindParam(':active',$data['active']);
       
        //execute
        if($this->db->execute()){
           return true;
        }else{
           return false;
        }
    }
    
    public function prarent_update($data){
        $this->db->query("UPDATE parent SET name=:name, nic=:nic, age=:age, nochildren=:nochildren, levelofeducation=:levelofeducation, occupation=:occupation, contactno=:contactno, address=:address, email=:email WHERE nic=:nic");
   
        //bind values
        $this->db->bindParam(':nic',$data['nic']);
        $this->db->bindParam(':name',$data['name']);
        $this->db->bindParam(':nic',$data['nic']);
        $this->db->bindParam(':age',$data['age']);
        $this->db->bindParam(':nochildren',$data['nochildren']);
        $this->db->bindParam(':levelofeducation',$data['levelofeducation']);
        $this->db->bindParam(':occupation',$data['occupation']);
        $this->db->bindParam(':contactno',$data['contactno']);
        $this->db->bindParam(':address',$data['address']);
        $this->db->bindParam(':email',$data['email']);
       
        //execute
        if($this->db->execute()){
           return true;
        }else{
           return false;
        }
    }

    //Login user
    public function login($nic, $password){
        $this->db->query('SELECT * FROM expectant WHERE nic = :nic');
        $this->db->bindparam(':nic', $nic);

        $row = $this->db->single();

        if($row<1){
            $this->db->query('SELECT * FROM parent WHERE nic = :nic');
            $this->db->bindparam(':nic', $nic);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }
        } else {

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }
        }

    }


    //Login User
    /*public function login($nic, $password){
        $this->db->query('SELECT * FROM registration WHERE nic = :nic');
        $this->db->bindparam(':nic', $nic);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
            return $row;
        } else {
            return false;
        }
    }*/


    //find clinic attendee by nic
    public function findClinicAttendeeByNic($nic){
        $this->db->query('SELECT * FROM users 
                          INNER JOIN expectant ON expectant.nic=users.nic WHERE users.nic = :nic');
        $this->db->bindParam(':nic', $nic);

        $row = $this->db->single();

        //check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    public function findRegistrantByNic($nic){
        $this->db->query('SELECT * FROM registration WHERE nic = :nic');
        $this->db->bindParam(':nic', $nic);

        $row = $this->db->single();

        //check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    public function getNIC($nic){
        $this->db->query('SELECT nic FROM registration WHERE nic = :nic');
        $this->db->bindParam(':nic', $nic);

        $row = $this->db->single();

        //check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }


    //find parent by nic
    public function findParentByNic($nic){
        $this->db->query('SELECT * FROM users
                          INNER JOIN parent ON parent.nic=users.nic WHERE users.nic = :nic');
        $this->db->bindParam(':nic', $nic);

        $row = $this->db->single();

        //check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }


    //get clinic attendee by nic
    public function getClinicAttendeeByNic($nic){
        $this->db->query('SELECT * FROM expectant WHERE nic = :nic');
        $this->db->bindParam(':nic', $nic);

        $row = $this->db->single();

        return $row;
    }

    public function getchild_list(){
        
        $this->db->query("SELECT * FROM children WHERE parent = :parent");
        $this->db->bindParam(':parent', $_SESSION['clinicattendee_nic']);
        
        $results = $this->db->resultSet();

        return $results;
    }
    // public function getPHMByclinicattendee(){
    //     $this->db->query('SELECT clinics.gnd FROM midwife_clinic INNER JOIN clinics ON  midwife_clinic.clinic=clinics.id WHERE nic=:nic');

    //     $this->db->bindParam(':nic', $_SESSION['midwife_nic']);

    //     $row = $this->db->single();

    //     return $row;
    // }

    // public function getnextclinicdate(){
        
    //     $this->db->query("SELECT * FROM calendar INNER JOIN detailrecords_expectant ON detailrecords_expectant.nextAppointmentDate = calendar.clinic_date WHERE  nic =:nic");
    //     // $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
    //     $this->db->query("SELECT * FROM calendar INNER JOIN childrecords INNER JOIN  children ON childrecords.child_id = children.child_id AND childrecords.nextAppointmentDate = calendar.clinic_date WHERE  nic =:nic");

        
    //     // $results = $this->db->resultSet();

    //     // return $results;

    //     // $this->db->query("SELECT * FROM  calendar WHERE nic =:nic ");
    //    //   $this->db->bindParam(':id', $id); 
    //       $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
          
    //         $results =  $this->db->resultSet();
    //         return $results;
    // }
    // public function getnextclinicdate() {
    //     $this->db->query("SELECT calendar.calendar_id, calendar.title, calendar.clinic_date, calendar.start_event, calendar.end_event, calendar.duration FROM calendar INNER JOIN childrecords ON childrecords.nextAppointmentDate = calendar.clinic_date INNER JOIN children ON childrecords.child_id = children.child_id WHERE children.parent =:nic");
    
    //     $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
    
    //     $results = $this->db->resultSet();
    //     return $results;
    // }
    public function getnextclinicdate() {
        $results = array();
    
        // Query 1: Retrieve data from detailrecords_expectant table
        $this->db->query("SELECT calendar.calendar_id, calendar.title, calendar.clinic_date, calendar.start_event, calendar.end_event, calendar.duration FROM calendar 
                          INNER JOIN detailrecords_expectant 
                          ON detailrecords_expectant.nextAppointmentDate = calendar.clinic_date 
                          WHERE nic = :nic");
    
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
    
        $detailRecordsResults = $this->db->resultSet();
    
        // Query 2: Retrieve data from childrecords and children tables
        $this->db->query("SELECT calendar.calendar_id, calendar.title, calendar.clinic_date, calendar.start_event, calendar.end_event, calendar.duration, children.name
                          FROM calendar 
                          INNER JOIN childrecords 
                          ON childrecords.nextAppointmentDate = calendar.clinic_date 
                          INNER JOIN children 
                          ON childrecords.child_id = children.child_id 
                          WHERE children.parent = :nic");
    
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
    
        $childRecordsResults = $this->db->resultSet();
    
        // Combine the results from both queries
        $results = array_merge($detailRecordsResults, $childRecordsResults);
    
        return $results;
    }
    
    
    public function getclinicattendeebyPHM(){
        $this->db->query('SELECT * FROM registration INNER JOIN clinics ON  registration.gnd=clinics.gnd WHERE nic=:nic');

        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);

        $row = $this->db->single();

        return $row;
    }

    public function getReport(){
        $this->db->query("SELECT detailrecords_expectant.date, detailrecords_expectant.weight, detailrecords_expectant.bmi, detailrecords_expectant.bp
                        FROM detailrecords_expectant
                        INNER JOIN expectant ON expectant.nic=detailrecords_expectant.nic 
                        WHERE expectant.gravidity=detailrecords_expectant.gravidity AND expectant.nic= :nic");
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);

        $row = $this->db->resultSet();

        return $row;
    }
    
    public function getDetailReport(){
        $this->db->query("SELECT * FROM detailrecords_expectant WHERE nic = :nic");
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);

        $row = $this->db->single();

        return $row;
    }
    
    public function getChildrenList(){
        $this->db->query("SELECT * FROM children WHERE parent = :parent");
        $this->db->bindParam(':parent', $_SESSION['clinicattendee_nic']);

        $row = $this->db->resultSet();

        return $row;
    }
    
    public function getChildById($id){
        $this->db->query("SELECT * FROM children WHERE child_id = :child_id");
        $this->db->bindParam(':child_id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getReportListByChild($id){
        $this->db->query('SELECT * FROM childrecords WHERE child_id = :child_id');
        $this->db->bindParam(':child_id', $id);

        $row = $this->db->resultSet();

        return $row;
    }
    
    public function getReportByChild($id,$reportno){
        $this->db->query("SELECT * FROM childrecords WHERE child_id = :child_id AND reportno = :reportno");
        $this->db->bindParam(':child_id', $id);
        $this->db->bindParam(':reportno', $reportno);

        $row = $this->db->single();

        return $row;
    }

    
    public function getMother(){
        $this->db->query("SELECT * FROM expectant WHERE nic = :nic");
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);

        $row = $this->db->single();

        return $row;
    }

    public function activateButton(){
        
        $this->db->query('SELECT mother_vaccination.id, mother_vaccination.vaccine, mother_vaccination.gravidity
                      FROM mother_vaccination, expectant WHERE mother_vaccination.gravidity=expectant.gravidity AND nic=:nic');

        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);

        $row = $this->db->resultSet();
        
        return $row;
    }

    public function deactivateButton(){
        $this->db->query('SELECT * FROM expectant_vaccination WHERE nic = :nic');

        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        // $this->db->bindParam(':term', $data['term']);

        $row = $this->db->resultSet();

        return $row;
    }

    public function getChartByMother(){
        $this->db->query("SELECT * FROM mother_age_weight
                        INNER JOIN expectant ON mother_age_weight.nic=expectant.nic 
                        WHERE mother_age_weight.nic = :nic AND mother_age_weight.gravidity=expectant.gravidity");

        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);

        $results = $this->db->resultSet();

        return $results;
    }

    public function calculatePOA($weeks, $date) {
        $now = time();
        $registered = strtotime($date);
    
        $diff = $now - $registered;
    
        $weeks_diff = floor($diff / (7 * 24 * 60 * 60));
        $days_diff = floor($diff / (24 * 60 * 60) % 7);
    
        return array(
            'weeks' => $weeks_diff + $weeks,
            'days' => $days_diff
        );
    }
    
    public function getMidwifeRecordsByMotherAndDate($date){

        $this->db->query("SELECT * FROM detailrecords_expectant WHERE nic=:nic AND date=:date" ) ;
 
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);  
        $this->db->bindParam(':date', $date);      
                                         
        $row =  $this->db->single();

        return $row;
    }

    public function getDoctorRecordsByMotherAndDate($date){

        $this->db->query("SELECT * FROM doctor_mother_records WHERE nic=:nic AND date=:date" ) ;
 
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);  
        $this->db->bindParam(':date', $date);      
                                         
        $row =  $this->db->single();

        return $row;
    }

    public function findExpectantPrevious(){

        $this->db->query("SELECT * FROM deliveredlist WHERE nic = :nic ");

        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);

        $row = $this->db->single();

        return $row;
    }
    
    public function findExpectantPrevious2(){

        $this->db->query("SELECT * FROM deliveredlist
                          INNER JOIN expectant ON deliveredlist.nic=expectant.nic WHERE expectant.nic = :nic AND expectant.active='0' ");

        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);

        $row = $this->db->single();

        return $row;
    }

    public function displayExpectantRecords(){
        $this->db->query("SELECT *
                         FROM registration
                         WHERE nic= :nic"
                         );
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']); 
        $results =  $this->db->single();
        return $results;
    }

    public function getChildrenByParent(){
        $this->db->query('SELECT * FROM children WHERE parent = :parent');
        $this->db->bindParam(':parent', $_SESSION['clinicattendee_nic']);

        $row = $this->db->resultSet();

        return $row;
    }

    public function showMonthlyRecordsByGravidity(){
        $this->db->query('SELECT MAX(gravidity) as max_gravidity FROM detailrecords_Expectant WHERE nic= :nic');
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']); 
        $result = $this->db->single();
        return $result->max_gravidity;
    }

    public function getDilivaryInfoByNic($gravidity){

        $this->db->query("SELECT * FROM deliveredlist WHERE nic = :nic AND gravidity=:gravidity ");

        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        $this->db->bindParam(':gravidity', $gravidity);

        $row = $this->db->single();

        return $row;
    }

    public function getPrevChartByMother($gravidity){
        $this->db->query("SELECT * FROM mother_age_weight WHERE nic = :nic AND gravidity = :gravidity");

        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        $this->db->bindParam(':gravidity', $gravidity);

        $results = $this->db->resultSet();

        return $results;
    }

    public function showPreviousReportsInDeliveredlist($gravidity){
        $this->db->query('SELECT * FROM detailrecords_Expectant WHERE nic= :nic AND gravidity = :gravidity');
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']); 
        $this->db->bindParam(':gravidity', $gravidity);
        $result = $this->db->resultSet();
        return $result;
    }
    
}