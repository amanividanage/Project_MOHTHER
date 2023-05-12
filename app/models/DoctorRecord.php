<?php
class DoctorRecord {

    private $db;

    public function __construct(){

        $this->db = new Database;
    }
   

    public function getExpectantMothers(){
        $this->db->query("SELECT expectant.nic, expectant.name, expectant.registrationDate, expectant.expectedDateofDelivery FROM expectant
                          INNER JOIN phm ON expectant.phm=phm.id
                          INNER JOIN doctor_clinic ON phm.clinic_id=doctor_clinic.clinic
                          WHERE doctor_clinic.nic = :doctor_nic ");

        $this->db->bindParam(':doctor_nic', $_SESSION['doctor_nic']);
         

        $results =  $this->db->resultSet();
        return $results;
    }

    public function getExpectantMothersforToday() {
        $this->db->query("SELECT expectant.nic, expectant.name, expectant.registrationDate, expectant.expectedDateofDelivery 
                          FROM expectant
                          INNER JOIN phm ON expectant.phm = phm.id
                          INNER JOIN doctor_clinic ON phm.clinic_id = doctor_clinic.clinic
                          INNER JOIN detailrecords_expectant ON expectant.nic = detailrecords_expectant.nic
                          WHERE doctor_clinic.nic = :doctor_nic
                          AND DATE(detailrecords_expectant.nextAppointmentDate) = CURDATE()");
    
        $this->db->bindParam(':doctor_nic', $_SESSION['doctor_nic']);
        
        $results = $this->db->resultSet();
        return $results;
    }
    
    
    public function getExpectantMotherByNic($nic){

        $this->db->query("SELECT * FROM registration WHERE nic=:nic" ) ;
 
        $this->db->bindParam(':nic', $nic);        
                                         
        $row =  $this->db->single();

        return $row;
    }
    
    public function getChildrenByExpectantMother($nic){
        $this->db->query('SELECT * FROM children WHERE parent = :parent');
        $this->db->bindParam(':parent', $nic);

        $row = $this->db->resultSet();

        return $row;
    }
    
    public function getProfileDoctor(){
        $this->db->query("SELECT * FROM doctors WHERE nic = :doctor_nic");
        $this->db->bindParam(':doctor_nic',  $_SESSION['doctor_nic']);

        $row = $this->db->single();

        return $row;
    }

    
    public function getDoctorClinic(){
        $this->db->query("SELECT clinics.clinic_name FROM doctor_clinic, clinics WHERE doctor_clinic.clinic=clinics.id AND nic = :doctor_nic");
        $this->db->bindParam(':doctor_nic',  $_SESSION['doctor_nic']);

        $row = $this->db->single();

        return $row;
    }
    
    public function editDoctor($data){
        $this->db->query("UPDATE doctors SET name = :name, email =:email, phone=:phone WHERE nic = :doctor_nic");

        $this->db->bindParam(':doctor_nic',  $_SESSION['doctor_nic']);
        $this->db->bindParam(':name',  $data['edit-name']);
        $this->db->bindParam(':phone',  $data['edit-phone']);
        $this->db->bindParam(':email',  $data['edit-email']);
        // $row = $this->db->single();

        // return $row;
        
         //Execute
         if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    
    public function getDoctorPassword() {
        $this->db->query("SELECT password FROM doctors WHERE nic = :doctor_nic");
        $this->db->bindParam(':doctor_nic', $_SESSION['doctor_nic']);
    
        $row = $this->db->single();
    
        return $row->password;
    }
    
    public function editDoctorPassword($data){
        $this->db->query("UPDATE doctors SET password = :password WHERE nic = :doctor_nic");

        $this->db->bindParam(':doctor_nic',  $_SESSION['doctor_nic']);
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
        $this->db->query("UPDATE users SET password = :password WHERE nic = :doctor_nic");

        $this->db->bindParam(':doctor_nic',  $_SESSION['doctor_nic']);
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
    
    public function getAllChildren(){
        $this->db->query("SELECT children.child_id, children.name, children.dob, children.date FROM children
                          INNER JOIN phm ON children.phm=phm.id
                          INNER JOIN doctor_clinic ON phm.clinic_id=doctor_clinic.clinic
                          WHERE doctor_clinic.nic = :doctor_nic ");

        $this->db->bindParam(':doctor_nic', $_SESSION['doctor_nic']);
         

        $results =  $this->db->resultSet();
        return $results;
    }
    
    public function getchildById($id){

        $this->db->query("SELECT * FROM children WHERE child_id=:child_id" ) ;
 
        $this->db->bindParam(':child_id', $id);        
                                         
        $row =  $this->db->single();

        return $row;
    }
    
    public function getMidwifeRecordsByChild($id){
        $this->db->query("SELECT * FROM childrecords WHERE child_id = :child_id");

        $this->db->bindParam(':child_id', $id);
         
        $results =  $this->db->resultSet();
        return $results;
    }
    
    public function addChildReport($data){
        $this->db->query("INSERT INTO doctor_child_records (child_id, date, eye1, eye2, eye3, eye4, leftear, rightear, teeth1, teeth2, heart, lungs, hip, other1, other2) VALUES (:child_id, :date, :eye1, :eye2, :eye3, :eye4, :leftear, :rightear, :teeth1, :teeth2, :heart, :lungs, :hip, :other1, :other2)");

        $this->db->bindParam(':child_id',  $data['child_id']);
        $this->db->bindParam(':date',  $data['date']);
        $this->db->bindParam(':eye1',  $data['eye1']);
        $this->db->bindParam(':eye2',  $data['eye2']);
        $this->db->bindParam(':eye3',  $data['eye3']);
        $this->db->bindParam(':eye4',  $data['eye4']);
        $this->db->bindParam(':leftear',  $data['leftear']);
        $this->db->bindParam(':rightear',  $data['rightear']);
        $this->db->bindParam(':teeth1',  $data['teeth1']);
        $this->db->bindParam(':teeth2',  $data['teeth2']);
        $this->db->bindParam(':heart',  $data['heart']);
        $this->db->bindParam(':lungs',  $data['lungs']);
        $this->db->bindParam(':hip',  $data['hip']);
        $this->db->bindParam(':other1',  $data['other1']);
        $this->db->bindParam(':other2',  $data['other2']);
        // $row = $this->db->single();

        // return $row;
        
         //Execute
         if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    
    public function getDoctorRecordsByChild($id){
        $this->db->query("SELECT * FROM doctor_child_records WHERE child_id = :child_id");

        $this->db->bindParam(':child_id', $id);
         
        $results =  $this->db->resultSet();
        return $results;
    }

    public function getVaccine(){
        $this->db->query("SELECT * FROM vaccination");



        $results = $this->db->resultSet();

        return $results;
    }
    
    public function getGivenVaccinesByChild($id){
        $this->db->query("SELECT * FROM children_vaccination where child_id = :child_id");

        $this->db->bindParam(':child_id', $id);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getChartByChild($id){
        $this->db->query("SELECT * FROM children_age_weight WHERE child_id = :child_id");

        $this->db->bindParam(':child_id', $id);

        $results = $this->db->resultSet();

        // return $chart;
        return $results;
    }

    public function calculateAge($birthday) {
        $now = time();
        $age = strtotime($birthday);

        $diff = $now - $age;

        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

        return array(
            'years' => $years,
            'months' => $months,
            'days' => $days
        );
    }
    
    public function getMidwifeRecordsByChildAndDate($id, $date){

        $this->db->query("SELECT * FROM childrecords WHERE child_id=:child_id AND date=:date" ) ;
 
        $this->db->bindParam(':child_id', $id);  
        $this->db->bindParam(':date', $date);      
                                         
        $row =  $this->db->single();

        return $row;
    }
    
    public function getDoctorRecordsByChildAndDate($id, $date){

        $this->db->query("SELECT * FROM doctor_child_records WHERE child_id=:child_id AND date=:date" ) ;
 
        $this->db->bindParam(':child_id', $id);  
        $this->db->bindParam(':date', $date);      
                                         
        $row =  $this->db->single();

        return $row;
    }

    public function checkDoctorReport($id, $date){

        $this->db->query("SELECT * FROM doctor_child_records WHERE child_id=:child_id AND date=:date" ) ;
 
        $this->db->bindParam(':child_id', $id);  
        $this->db->bindParam(':date', $date);      
                                         
        $row =  $this->db->single();

        return $row;
    }

    public function getPrgnantMotherByNic($nic){

        $this->db->query("SELECT * FROM expectant WHERE nic=:nic" ) ;
 
        $this->db->bindParam(':nic', $nic);     
                                         
        $row =  $this->db->single();

        return $row;
    }
    
    public function addMotherReport($data){
        $this->db->query("INSERT INTO doctor_mother_records (nic, date, pallor, fhs, fm, ankle, facial, delivary) VALUES (:nic, :date, :pallor, :fhs, :fm, :ankle, :facial, :delivary)");

        $this->db->bindParam(':nic',  $data['nic']);
        $this->db->bindParam(':date',  $data['date']);
        $this->db->bindParam(':pallor',  $data['pallor']);
        $this->db->bindParam(':fhs',  $data['fhs']);
        $this->db->bindParam(':fm',  $data['fm']);
        $this->db->bindParam(':ankle',  $data['ankle']);
        $this->db->bindParam(':facial',  $data['facial']);
        $this->db->bindParam(':delivary',  $data['delivary']);
        // $row = $this->db->single();

        // return $row;
        
         //Execute
         if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    
    public function getMidwifeRecordsByMother($nic){
        $this->db->query("SELECT * FROM detailrecords_expectant WHERE nic = :nic");

        $this->db->bindParam(':nic', $nic);
         
        $results =  $this->db->resultSet();
        return $results;
    }
    
    public function getDoctorRecordsByMother($nic){
        $this->db->query("SELECT * FROM doctor_mother_records WHERE nic = :nic");

        $this->db->bindParam(':nic', $nic);
         
        $results =  $this->db->resultSet();
        return $results;
    }

    public function getMidwifeRecordsByMotherAndDate($nic, $date){

        $this->db->query("SELECT * FROM detailrecords_expectant WHERE nic=:nic AND date=:date" ) ;
 
        $this->db->bindParam(':nic', $nic);  
        $this->db->bindParam(':date', $date);      
                                         
        $row =  $this->db->single();

        return $row;
    }
    
    public function getDoctorRecordsByMotherAndDate($nic, $date){

        $this->db->query("SELECT * FROM doctor_mother_records WHERE nic=:nic AND date=:date" ) ;
 
        $this->db->bindParam(':nic', $nic);  
        $this->db->bindParam(':date', $date);      
                                         
        $row =  $this->db->single();

        return $row;
    }
    
    public function getMotherVaccines(){
        $this->db->query("SELECT * FROM mother_vaccination");

        $results = $this->db->resultSet();

        return $results;
    }
    
    public function activateButton($nic){
        
        $this->db->query('SELECT mother_vaccination.id, mother_vaccination.vaccine, mother_vaccination.gravidity
                      FROM mother_vaccination, expectant WHERE mother_vaccination.gravidity=expectant.gravidity AND nic=:nic');

        $this->db->bindParam(':nic', $nic);

        $row = $this->db->resultSet();
        
        return $row;
    }

    public function deactivateButton($nic){
        $this->db->query('SELECT * FROM expectant_vaccination WHERE nic = :nic');

        $this->db->bindParam(':nic', $nic);
        // $this->db->bindParam(':term', $data['term']);

        $row = $this->db->resultSet();

        return $row;
    }
    
    public function getChartByMother($nic){
        $this->db->query("SELECT * FROM mother_age_weight WHERE nic = :nic");

        $this->db->bindParam(':nic', $nic);

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

    public function calculateBloodPressure($bp) {
        // echo "BP value: $bp<br>";

        $readings = explode('/', $bp);

        // echo "Readings: "; print_r($readings); echo "<br>";
        $systolic = (int) $readings[0];
        $diastolic = (int) $readings[1];
    
        if ($systolic >= 140 || $diastolic >= 90) {
            return 'High';
        } elseif ($systolic >= 120 && $systolic <= 139 || $diastolic >= 80 && $diastolic <= 89) {
            return 'Moderate';
        } else {
            return 'Low';
        }
    }

    public function calculateBMILimit($bmi)
    {

        if ($bmi < 18.5) {
            return 'Underweight';
        } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
            return 'Normal weight';
        } elseif ($bmi >= 25 && $bmi <= 29.9) {
            return 'Overweight';
        } else {
            return 'Obese';
        }
    }

    public function calculateRisky($bpRisk, $bmiRisk)
    {

        if ($bpRisk == 'High' || $bmiRisk == 'Obese') {
            // high risk
            return 'High Risk';
        } elseif ($bpRisk == 'Moderate' && $bmiRisk == 'Overweight') {
            // moderate risk
            return 'Moderate Risk';
        } elseif ($bpRisk == 'Low' && $bmiRisk == 'Underweight') {
            // low risk
            return 'Low Risk';
        } else {
            return 'Not Risky';
        }
    }

    public function getTotalExpectanat(){

        $this->db->query("SELECT COUNT(DISTINCT nic) AS total_count FROM (
                        SELECT expectant.nic FROM expectant 
                        INNER JOIN phm ON expectant.phm=phm.id 
                        INNER JOIN doctor_clinic ON phm.clinic_id=doctor_clinic.clinic 
                        WHERE expectant.active=0 AND doctor_clinic.nic = :doctor_nic
                        ) AS tmp");

        $this->db->bindParam(':doctor_nic', $_SESSION['doctor_nic']);

        $row = $this->db->single();

        return $row->total_count;
    }

    public function getTotalChildren(){

        $this->db->query("SELECT COUNT(*) AS total_count FROM children
                          INNER JOIN phm ON children.phm=phm.id
                          INNER JOIN doctor_clinic ON phm.clinic_id=doctor_clinic.clinic 
                          WHERE doctor_clinic.nic = :doctor_nic");

        $this->db->bindParam(':doctor_nic', $_SESSION['doctor_nic']);

        $row = $this->db->single();

        return $row->total_count;
    }

    public function calculateSpecialChildren(){
        $this->db->query("SELECT special AS label, COUNT(*) AS value 
                            FROM children 
                            INNER JOIN phm ON children.phm=phm.id 
                            INNER JOIN doctor_clinic ON phm.clinic_id=doctor_clinic.clinic
                            WHERE special IN ('Premature births', 'Low birth weight', 'Neonatal complications', 'Congenital disorders') 
                            AND doctor_clinic.nic=:doctor_nic
                            GROUP BY special;");

        $this->db->bindParam(':doctor_nic', $_SESSION['doctor_nic']);
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

    public function calculateRiskyCount(){

        $this->db->query("SELECT COUNT(*) AS total_count FROM mother_risky
                          INNER JOIN expectant ON mother_risky.nic=expectant.nic
                          INNER JOIN phm ON expectant.phm=phm.id 
                          INNER JOIN doctor_clinic ON phm.clinic_id=doctor_clinic.clinic WHERE doctor_clinic.nic = :doctor_nic AND mother_risky.risky = 'High Risk' ");

        $this->db->bindParam(':doctor_nic', $_SESSION['doctor_nic']);

        $row = $this->db->single();

        return $row->total_count;
    }
    
    public function getHighRiskList(){
        
        $this->db->query("SELECT expectant.nic, expectant.name FROM mother_risky
                          INNER JOIN expectant ON mother_risky.nic=expectant.nic
                          INNER JOIN phm ON expectant.phm=phm.id 
                          INNER JOIN doctor_clinic ON phm.clinic_id=doctor_clinic.clinic WHERE doctor_clinic.nic = :doctor_nic AND mother_risky.risky = 'High Risk' ");

        $this->db->bindParam(':doctor_nic', $_SESSION['doctor_nic']);

        $row = $this->db->resultSet();
        
        return $row;
    }
    
    public function getModerateRiskList(){
        
        $this->db->query("SELECT expectant.nic, expectant.name FROM mother_risky
                          INNER JOIN expectant ON mother_risky.nic=expectant.nic
                          INNER JOIN phm ON expectant.phm=phm.id 
                          INNER JOIN doctor_clinic ON phm.clinic_id=doctor_clinic.clinic WHERE doctor_clinic.nic = :doctor_nic AND mother_risky.risky = 'Moderate Risk' ");

        $this->db->bindParam(':doctor_nic', $_SESSION['doctor_nic']);

        $row = $this->db->resultSet();
        
        return $row;
    }
    
    
    
    


}