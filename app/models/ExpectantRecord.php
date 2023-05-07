<?php
class ExpectantRecord {

    private $db;

    public function __construct(){

        $this->db =new Database;
    }
   /* public function getExpectantRecords(){
        $this->db->query('SELECT nic, height, weight FROM expectant');
        $results =  $this->db->resultSet();
        return $results;
    }*/

      public function getExpectantRecords(){
        $this->db->query("SELECT * FROM expectant, midwife_clinic WHERE midwife_clinic.phm = expectant.phm AND midwife_clinic.nic = :midwife_nic ");

        $this->db->bindParam(':midwife_nic', $_SESSION['midwife_nic']);
         

        $results =  $this->db->resultSet();
        return $results;
    }

    public function showExpectantMonthlyRecords($nic){
        $this->db->query('SELECT * FROM detailrecords_Expectant WHERE nic= :nic'
              
                         
                         );
                         $this->db->bindParam(':nic', $nic); 
        $results =  $this->db->resultSet();
        return $results;
    }

    public function showMonthlyRecordsByGravidity($nic){
        $this->db->query('SELECT MAX(gravidity) as max_gravidity FROM detailrecords_Expectant WHERE nic= :nic');
        $this->db->bindParam(':nic', $nic); 
        $result = $this->db->single();
        return $result->max_gravidity;
    }

    public function showPreviousReportsInDeliveredlist($nic, $gravidity){
        $this->db->query('SELECT * FROM detailrecords_Expectant WHERE nic= :nic AND gravidity = :gravidity');
        $this->db->bindParam(':nic', $nic); 
        $this->db->bindParam(':gravidity', $gravidity);
        $result = $this->db->resultSet();
        return $result;
    }
   


 public function getDeliveredList(){
        $this->db->query("SELECT deliveredlist.nic, deliveredlist.date, deliveredlist.miscarriage , deliveredlist.placeofDelivery FROM deliveredlist, midwife_clinic WHERE midwife_clinic.phm = deliveredlist.phm AND midwife_clinic.nic = :midwife_nic ");

        $this->db->bindParam(':midwife_nic', $_SESSION['midwife_nic']);
         

        $results =  $this->db->resultSet();
        return $results;
    }
   



    
    public function getExpectantMothers(){
        $this->db->query("SELECT expectant.nic, expectant.name, expectant.registrationDate, expectant.expectedDateofDelivery FROM expectant, midwife_clinic WHERE midwife_clinic.phm = expectant.phm AND expectant.active='0' AND midwife_clinic.nic = :midwife_nic ");

        $this->db->bindParam(':midwife_nic', $_SESSION['midwife_nic']);
         

        $results =  $this->db->resultSet();
        return $results;
    }
    
    public function findPHM(){
        $this->db->query('SELECT * FROM midwife_clinic WHERE nic= :nic');

        $this->db->bindParam('nic', $_SESSION['midwife_nic']);
    
        $row = $this->db->single();
    
        return $row;
    }


    

    public function getNewExpectantRecords(){
        // $this->db->query('SELECT s.nic, s.mname
        //                   FROM registration s
        //                     INNER JOIN clinics c ON S.gnd = C.gnd
        //                     JOIN midwifes m ON C.id = m.clinic

        // $this->db->query("SELECT r.nic, r.mname FROM  registration r 
        //                   INNER JOIN clinics c  ON r.gnd = c.gnd   WHERE active ='1' AND 
        //                   c.id = ".$_SESSION['midwife_clinic']);

        $this->db->query("SELECT r.nic, r.mname 
                        FROM  registration r 
                        INNER JOIN clinics c  ON r.gnd = c.gnd 
                        INNER JOIN midwife_clinic m ON m.clinic = c.id
                        WHERE active ='1' AND m.nic = :midwife_nic ");
                           
                       $this->db->bindParam(':midwife_nic', $_SESSION['midwife_nic']);
                     
        $results =  $this->db->resultSet();
        return $results;
    }

    public function getNewExpectantRecordsByNic($nic){
        // $this->db->query('SELECT s.nic, s.mname
        //                   FROM registration s
        //                     INNER JOIN clinics c ON S.gnd = C.gnd
        //                     JOIN midwifes m ON C.id = m.clinic

        $this->db->query("SELECT * FROM  registration WHERE nic=:nic" ) ;
 
        $this->db->bindParam(':nic', $nic);        
                         
                         
        $results =  $this->db->single();
        return $results;
    }

    public function displayExpectantRecords($nic){
        $this->db->query("SELECT *
                         FROM registration
                         WHERE nic= :nic"
                         );
        $this->db->bindParam(':nic', $nic); 
        $results =  $this->db->single();
        return $results;
    }
    
    public function getExpectantHeight($nic){
        $this->db->query("SELECT height
                         FROM expectant
                         WHERE nic= :nic"
                         
                         );
                         $this->db->bindParam(':nic', $nic); 
        $results =  $this->db->single();
        return $results;
    }

    // public function showExpectantMonthlyRecords($nic){
    //     $this->db->query('SELECT * FROM detailrecords_Expectant WHERE nic= :nic'
              
                         
    //                      );
    //                      $this->db->bindParam(':nic', $nic); 
    //     $results =  $this->db->resultSet();
    //     return $results;
    // }

    public function displayExpectantReports($nic, $reportNo){
        $this->db->query('SELECT *
                        FROM detailrecords_Expectant
                        WHERE nic= :nic AND reportNo = :reportNo'

        
                      );
                         $this->db->bindParam(':nic', $nic); 
                         $this->db->bindParam(':reportNo', $reportNo);
        $results =  $this->db->single();
        return $results;
    }

   


    public function filterExpectantRecords(){
        $this->db->query ("SELECT * 
        FROM expectant
        WHERE nic LIKE '%".$valueToSearch."%'");
        $results =  $this->db->resultSet();
        return $results;
    }

    public function addRecords($data){
        $this->db->query('INSERT INTO detailrecords_Expectant (nic, date, gravidity, weight, bmi, bp, ironorForlate, vitaminC, calcium, antimarialDrugs, triposha, nextAppointmentDate) 
                          SELECT :nic, :date, :gravidity, :weight, (:weight / POW((:height / 100), 2)) AS bmi, :bp, :ironorForlate, :vitaminC, :calcium, :antimarialDrugs, :triposha, :nextAppointmentDate');
        
        
        //bind values
        $this->db->bindParam(':nic', $data['nic']);
        $this->db->bindParam(':date', $data['date']);
        $this->db->bindParam(':gravidity', $data['gravidity']);
        $this->db->bindParam(':weight', $data['weight']);
        $this->db->bindParam(':height', $data['mother']->height);
        $this->db->bindParam(':bp', $data['bp']);
        $this->db->bindParam(':ironorForlate', $data['ironorForlate']);
        $this->db->bindParam(':vitaminC', $data['vitaminC']);
        $this->db->bindParam(':calcium', $data['calcium']);
        $this->db->bindParam(':antimarialDrugs', $data['antimarialDrugs']);
        $this->db->bindParam(':triposha', $data['triposha']);
        $this->db->bindParam(':nextAppointmentDate', $data['nextAppointmentDate']);

      
        //execute for update/delete
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }


    }

    public function movingToDeliveredList($data){
        $this->db->query('INSERT INTO deliveredlist (nic,date, phm, miscarriage, weekscompleted, weight,bmi, bp, placeofDelivery, modeofDelivery, postnatalcomplication, symptoms, diabetes) 
                          SELECT :nic, :date,:phm,:miscarriage,:weekscompleted, :weight, (:weight / POW((:height / 100), 2)) AS bmi, :bp, :placeofDelivery, :modeofDelivery, :postnatalcomplication, :symptoms, :diabetes');
        
        
        //bind values
        $this->db->bindParam(':nic', $data['nic']);
        $this->db->bindParam(':date', $data['date']);
        $this->db->bindParam(':phm', $data['phm']);
        $this->db->bindParam(':miscarriage', $data['miscarriage']);
        $this->db->bindParam(':weekscompleted', $data['weekscompleted']);
        $this->db->bindParam(':weight', $data['weight']);
        $this->db->bindParam(':height', $data['mother']->height);
        $this->db->bindParam(':bp', $data['bp']);
        $this->db->bindParam(':placeofDelivery', $data['placeofDelivery']);
        $this->db->bindParam(':modeofDelivery', $data['modeofDelivery']);
        $this->db->bindParam(':postnatalcomplication', $data['postnatalcomplication']);
        $this->db->bindParam(':symptoms', $data['symptoms']);
        $this->db->bindParam(':diabetes', $data['diabetes']);

      
        //execute for update/delete
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }


    }
    public function deliveredToParent($data){

        //$sessionId = $_SESSION['midwife_id'];
        $this->db->query("INSERT INTO parent (phm, relationship, name, nic, age, nochildren, levelofeducation, occupation, contactno, address, email) VALUES (:phm, :relationship, :name, :nic, :age, :nochildren, :levelofeducation, :occupation, :contactno, :address, :email)");
    
        //bind values
        $this->db->bindParam(':phm',$data['phm']);
        $this->db->bindParam(':relationship',$data['relationship']);
    
        $this->db->bindParam(':name',$data['name']);
        $this->db->bindParam(':nic',$data['nic']);
        $this->db->bindParam(':age',$data['age']);
        $this->db->bindParam(':nochildren',($data['nochildren'] + 1));
        $this->db->bindParam(':levelofeducation',$data['levelofeducation']);
        $this->db->bindParam(':occupation',$data['occupation']);
        $this->db->bindParam(':contactno',$data['contactno']);
        $this->db->bindParam(':address',$data['address']);
        $this->db->bindParam(':email',$data['email']);
    
        // $this->db->bindParam(':gnd',$data['gnd']);
        // $this->db->bindParam(':phm',$data['phm']);
      //  $this->db->bindParam(':password',$data['password']);
         
        //execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    


    public function getdatafromRegistration($nic){
        $this->db->query('SELECT * FROM registration WHERE nic = :nic');
        $this->db->bindParam(':nic', $nic);

        $row = $this->db->single();

        return $row;
    }

    public function updateactiveOfExpectant($data){
       
        $this->db->query("UPDATE expectant  SET active ='1' WHERE nic = :nic");
    
        $this->db->bindParam(':nic', $data['nic']);
            // $row = $this->db->single();
    
            // return $row;
            
             //Execute
             if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }


    public function addMother_age_weight($data){


        $this->db->query("INSERT INTO mother_age_weight (nic, poa, weight, weightgain) 
                  SELECT :nic, :poa, :weight, (:weight - :weightbefore) AS weightgain");

        //bind values
        $this->db->bindParam(':nic', $data['nic']);
        $this->db->bindParam(':poa', $data['poa']);
        $this->db->bindParam(':weight', $data['weight']);
        $this->db->bindParam(':weightbefore', $data['mother']->weight);
        
         
        //execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    
    public function getMother($nic){
        $this->db->query('SELECT * FROM expectant WHERE nic= :nic');
        $this->db->bindParam(':nic', $nic); 

        $results =  $this->db->single();
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

    public function calculatePOAWeeks($weeks, $date) {
        $now = time();
        $registered = strtotime($date);

        $diff = $now - $registered;

        $weeks_diff = floor($diff / (7 * 24 * 60 * 60));

        return $weeks_diff + $weeks;
    }
    
    public function getChartByMother($nic){
        $this->db->query("SELECT * FROM mother_age_weight WHERE nic = :nic");

        $this->db->bindParam(':nic', $nic);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getVaccine(){
        $this->db->query("SELECT * FROM mother_vaccination");

        // $this->db->bindParam(':child_id', $id);

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

    public function getVaccineById($vaccination_id){
        $this->db->query('SELECT * FROM mother_vaccination WHERE id = :vaccination_id');
        $this->db->bindParam(':vaccination_id', $vaccination_id);

        $row = $this->db->single();

        return $row;
    }

    public function addMotherVaccination($data){


        $this->db->query("INSERT INTO expectant_vaccination (nic, vaccination_id, date, batch) VALUES (:nic, :vaccination_id, :date, :batch)");

        //bind values
        $this->db->bindParam(':nic', $data['nic']);
        $this->db->bindParam(':vaccination_id', $data['vaccination_id']);
        $this->db->bindParam(':date', $data['date']);
        $this->db->bindParam(':batch', $data['batch']);
         
        //execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
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

    
    


}