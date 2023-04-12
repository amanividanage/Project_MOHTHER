<?php
    class ExpectantRecords extends Controller {
      public function __construct(){
          // if(!isLoggedInExpectant()){ // we use this to say that only the logged in midwife can see this page and add records
            //redirect('users/register');
          // }
          $this->expectantRecordModel = $this->model('ExpectantRecord');
          $this->clinicattendeeModel = $this->model('Clinicattendee');
          $this->clinicModel = $this->model('Clinic');
          $this->midwifeModel = $this->model('Midwife');
          $this->childrenModel = $this->model('Children');
       
       
     
    }


    public function index(){

      //get records
      // $expectantRecords =  $this->expectantRecordModel-> getExpectantRecords(); 
      $newexpectantRecords =  $this->expectantRecordModel-> getNewExpectantRecords(); 

        $data = [
          // 'expectantRecords' => $expectantRecords ,
          'newexpectantRecords'=> $newexpectantRecords
          ];
         
      
        $this->view('expectantRecords/index', $data);
      }

      public function expectnatmotherlist(){
        //get records
        $expectantRecords =  $this->expectantRecordModel-> getExpectantMothers(); 
          $data = [
            'expectantRecords' => $expectantRecords
            
            ];
           
        
          $this->view('expectantRecords/expectnatmotherlist', $data);
      }

      public function midwife_profile(){
        //get midwife details

        $midwifeprofileinfo =  $this->midwifeModel->getProfileMidwife(); 
        if($_SERVER['REQUEST_METHOD']=='POST'){
          //Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $data = [
            'email' => trim($_POST['email']),
            'email_err'=>'',
            'phone' => trim($_POST['phone']),
            'phone_err'=>'',
         //   'midwifeprofileinfo' => $midwifeprofileinfo ,

           
            ];
         //validate data
           if(empty($data['email'])){
            $data['email_err'] = 'Please enter the new email address';
           }
           if(empty($data['phone'])){
            $data['phone_err'] = 'Please enter the new contact number';
          }
         

          //make sure that there are no errors
           if(empty($data['email_err']) && empty($data['phone_err']) )
           {
             //validated
              //die('Successfull');

              //add expectant mother's records
              if($this->midwifeModel->updatemidwifeinfo($data)){
                //print_r($_POST);
               redirect('expectantRecords/midwife_profile');
            }else{
           redirect('expectantRecords/midwife_profile');
            }
        } else{
            //load view with errors
           
            $this->view('expectantRecords/midwife_profile', $data);
          
        }
        
         } else{
          
        $midwifeprofileinfo =  $this->midwifeModel->getProfileMidwife(); 
        $getPHM =  $this->midwifeModel->getPHMByMidwifee();
   
         
        $data = [

        'email' => $midwifeprofileinfo->email,
        'email_err' =>'',
        'phone' =>$midwifeprofileinfo->phone,
        'phone_err'=>'',
        'midwifeprofileinfo' => $midwifeprofileinfo,
        'phm' => $getPHM
           
        ];
  
    $this->view('expectantRecords/midwife_profile', $data);

      }
    }
      
      public function info($nic){
       $info =  $this->expectantRecordModel->displayExpectantRecords($nic);
       $report = $this->expectantRecordModel->showExpectantMonthlyRecords($nic);
       $expectantRecords =  $this->expectantRecordModel-> getExpectantRecords(); 
       $expectantRecordsHeight =  $this->expectantRecordModel-> getExpectantHeight($nic); 
       $children = $this->childrenModel->getChildrenByParent($nic);

       $date = $this->expectantRecordModel-> getMother($nic); 
       $poa =  $this->expectantRecordModel-> calculatePOA($date->poa, $date->registrationDate);
      //  print_r($bplimit);

      $bplimit = array(); // Initialize an empty array to store the blood pressure limits
      $bmilimit = array(); // Initialize an empty array to store the BMI limits
      $risky = array(); // Initialize an empty array to store the risk status
  
      // Loop through the $report array and calculate the values for each index
      foreach ($report as $index => $reportItem) {
          $bplimit[$index] = $this->expectantRecordModel->calculateBloodPressure($reportItem->bp);
          $bmilimit[$index] = $this->expectantRecordModel->calculateBMILimit($reportItem->bmi);
          $risky[$index] = $this->expectantRecordModel->calculateRisky($bplimit[$index], $bmilimit[$index]);
      }

        

        $data = [
            'info' => $info,
            'report'=> $report,
            'children' => $children,
            'expectantRecordsHeight' => $expectantRecordsHeight,
            'poa' => $poa,
            'bplimit' => $bplimit,
            'bmilimit' => $bmilimit,
            'risky' => $risky,
        ];

        $this->view('expectantRecords/info', $data);
      }

    public function expectant($nic, $reportNo){
     
     $singlereport=  $this->expectantRecordModel->displayExpectantReports($nic, $reportNo);

      $data = [
          
          'singlereport'=> $singlereport
      ];

      $this->view('expectantRecords/expectant', $data);
  }

  

   
      public function email(){

        //get records
        $expectantemail =  $this->expectantRecordModel-> getExpectantemail(); 
        $expectantnic =  $this->expectantRecordModel-> getExpectantnic(); 
        //check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //PROCESS FORM
            //die('Submitted');
            //sanitizing the POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    
    
            //init data 
            $data =[
                'expectantnic' =>$expectantnic ,
                'expectantemail' => $expectantemail,
                'password' => trim($_POST['password']),
                
           
                'expectantnic_err' => '',
                'expectantemail_err' => '',
                'password_err' => '',
            
                ];
    
                //validate variables
                if(empty($data['password'])){
                    $data['password_err']='*Please enter the password';
                }else{
                   // check nic with email
                    if($this->expectantRecordModel->getExpectantemail($data['expectantemail'])){
                        $data['expectantemail_err'] = 'This user is already registered';
                    }
                }
    
               
                //make sure all the necessary data are filled by midwife
                if(empty($data[ 'expectantemail_err']) && empty($data[ 'expectantnic_err'])&& empty($data[ 'password_err'] ))
                {
                    //validated
                    //die('Successfull');
                        //validated
            
                        //Hash password
                  $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            
                        //Register User
                        if($this->expectantRecordModel->email($data)){
                            redirect('users/email');
                        } else {
                            die('Someting went wrong');
                        }
            
                    }
                  $this->view('users/email', $data);
                }
    
                   else{
            //init data
            $data =[
    
                'expectantnic' => '',
                'expectantemail' => '',
                'password' => '',
                
                'expectantnic_err' => '',
                'expectantemail_err' => '',
                'password_err' => '',
            
    
         ];
    
             //load view
             $this->view('users/email', $data);
         
        }
      }

      public function add($nic){
        $info =  $this->clinicattendeeModel->getClinicAttendeeByNic($nic);
        date_default_timezone_set('Asia/Colombo');

        $mother = $this->expectantRecordModel-> getMother($nic); 
        $poa = $this->expectantRecordModel->calculatePOAWeeks($mother->poa, $mother->registrationDate);

        if($_SERVER['REQUEST_METHOD']=='POST'){
            //Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
              'info' => $info,
              'nic' => trim($_POST['nic']),
              'nic_err'=>'',
              // 'reportNo' => trim($_POST['reportNo']),
              // 'reportNo_err'=>'',
              'date' => date("Y-m-d"),
              // 'date_err'=>'',
              'weight'=> trim($_POST['weight']),
              'weight_err'=>'',
              'bp'=> trim($_POST['bp']),
              'bp_err'=>'',
              'vitaminC'=> trim($_POST['vitaminC']),
              'ironorForlate'=> trim($_POST['ironorForlate']),
              'antimarialDrugs'=> trim($_POST['antimarialDrugs']),
              'calcium'=> trim($_POST['calcium']),
              'triposha'=> trim($_POST['triposha']),
              'poa'=>$poa,
              'mother'=>$mother,
              'nextAppointmentDate'=> trim($_POST['nextAppointmentDate']),
              'nextAppointmentDate_err'=> '',
            //  'info'=> $info
            
            ];
           //validate data
            //  if(empty($data['reportNo'])){
            //   $data['reportNo_err'] = 'Please enter the report Number';
            //  }

            //  if(empty($data['date'])){
            //   $data['date_err'] = 'Please enter the date';
            // }
             
             if(empty($data['weight'])){
              $data['weight_err'] = 'Please enter the weight';
             }
             if(empty($data['nextAppointmentDate'])){
              $data['nextAppointmentDate_err'] = 'Please enter the next appointment date';
            }

             if(empty($data['bp'])){
              $data['bp_err'] = 'Please enter the blood pressure';
             }

            //make sure that there are no errors
            //  if(empty($data['weight_err']) && empty($data['bp_err']))
             if(empty($data['weight_err']) && empty($data['bp_err']) && empty($data['nic_err']) && empty($data['nextAppointmentDate_err']))
             {
               //validated
                //die('Successfull');

                //add expectant mother's records
                if($this->expectantRecordModel->addRecords($data) && $this->expectantRecordModel->addMother_age_weight($data)){
                 
                 redirect('expectantRecords/info/'.$nic.'');
              }else{
                  die('Something went wrong');
              }
          } else{
              //load view with errors
              $this->view('expectantRecords/add', $data);
          }
          
           } else{

            $info =  $this->clinicattendeeModel->getClinicAttendeeByNic($nic);
          $data = [
          'nic' =>'',
          'nic_err' =>'',
          // 'reportNo' =>'',
          // 'reportNo_err'=>'',
          'date'=>'',
          'date_err'=>'',
          'weight'=>'',
          'weight_err'=>'',
          'bp'=>'',
          'bp_err'=>'',
          'vitaminC'=>'',
          'ironorForlate'=>'',
          'antimarialDrugs'=>'',
          'calcium'=>'',
          'triposha'=>'',
          'poa' => '',
          'info' => $info,
          'nextAppointmentDate'=> '',
          'nextAppointmentDate_err'=>'',
        
          
          
                
          ];
         
      
        $this->view('expectantRecords/add', $data);

        }
      }

      public function mother_charts($nic){
     
        $mother = $this->expectantRecordModel-> getMother($nic); 
        $chart = $this->expectantRecordModel->getChartByMother($nic);
   
         $data = [
             
             'mother'=> $mother,
             'chart'=> $chart
         ];
   
         $this->view('expectantRecords/mother_charts', $data);
     }

     public function mother_vaccination($nic){

      $mother = $this->expectantRecordModel-> getMother($nic); 
      $vaccines = $this->expectantRecordModel->getVaccine();
      // $months = $this->childrenModel->calculateMonths($child->dob);
      $buttonactive = $this->expectantRecordModel->activateButton($nic);
      $buttondeactive = $this->expectantRecordModel->deactivateButton($nic);


      $data = [
        'mother'=> $mother,
          'vaccines' => $vaccines,
          // 'months' => $months,
          'buttonactive' => $buttonactive,
          'buttondeactive' => $buttondeactive,

          // 'batch'=>'',
          // 'batch_err'=>''
      ];

      $this->view('expectantRecords/mother_vaccination', $data);

  }

  public function expectant_vaccination($nic, $vaccination_id){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $mother = $this->expectantRecordModel-> getMother($nic); 
        date_default_timezone_set('Asia/Colombo');


        $data=[
            'mother'=>$mother,
            'nic' => $nic,
            'date' => date("Y-m-d"),
            'vaccination_id' => $vaccination_id,
            'batch'=>trim($_POST['batch']),
 
            'batch_err'=>'',
        ];

        //Validate data
        if(empty($data['batch'])){
            $data['batch_err']='please enter batch no to complete the registration';
        }

        //Make sure no errors
        if(empty($data['batch_err'])){
            
            //vaccination child
            if($this->expectantRecordModel->addMotherVaccination($data)){
                redirect('expectantRecords/mother_vaccination/'.$nic.'');
            } else {
                die('Someting went wrong');
            }

        } else{
             // Load view with errors
             $this->view('expectantRecords/expectant_vaccination', $data);
        }



    } else {

      $mother = $this->expectantRecordModel-> getMother($nic); 
      $vaccine = $this->expectantRecordModel->getVaccineById($vaccination_id);
        // $months = $this->childrenModel->calculateMonths($child->dob);
        // $buttonactive = $this->childrenModel->activateButton($months);


        $data = [
            'mother' => $mother,
            'vaccine' => $vaccine,
            // 'months' => $months,
            // 'buttonactive' => $buttonactive,

            'batch'=>'',
            'batch_err'=>''
        ];

        $this->view('expectantRecords/expectant_vaccination', $data);

    }

}

    public function expectant_allrecords($nic, $date){
        
      $mother = $this->expectantRecordModel-> getMother($nic); 
      $midwife_records = $this->expectantRecordModel-> getMidwifeRecordsByMotherAndDate($nic, $date); 
      $doctor_records = $this->expectantRecordModel->getDoctorRecordsByMotherAndDate($nic, $date);
      // $chart = $this->expectantRecordModel->getChartByMother($nic);

      $data = [
          
          'mother'=> $mother,
          'midwife_records'=> $midwife_records,
          'doctor_records'=> $doctor_records,
      ];

      $this->view('expectantRecords/expectant_allrecords', $data);
    }

    public function deliveredList(){
        
      // $mother = $this->expectantRecordModel-> getMother($nic); 
      // $midwife_records = $this->expectantRecordModel-> getMidwifeRecordsByMotherAndDate($nic, $date); 
      // $doctor_records = $this->expectantRecordModel->getDoctorRecordsByMotherAndDate($nic, $date);
      // // $chart = $this->expectantRecordModel->getChartByMother($nic);

      $data = [
          
          // 'mother'=> $mother,
          // 'midwife_records'=> $midwife_records,
          // 'doctor_records'=> $doctor_records,
      ];

      $this->view('expectantRecords/delivered', $data);
    }

    public function delivered($nic){
      $info =  $this->clinicattendeeModel->getClinicAttendeeByNic($nic);
      $infoOfRegistrant =  $this->expectantRecordModel->getdatafromRegistration($nic);
      date_default_timezone_set('Asia/Colombo');

    //  $info =  $this->expectantRecordModel->displayExpectantRecords($nic);
      $report = $this->expectantRecordModel->showExpectantMonthlyRecords($nic);
      $expectantRecords =  $this->expectantRecordModel-> getExpectantRecords(); 
      $expectantRecordsHeight =  $this->expectantRecordModel-> getExpectantHeight($nic); 
      $children = $this->childrenModel->getChildrenByParent($nic);

      $date = $this->expectantRecordModel-> getMother($nic); 

     // $info =  $this->clinicattendeeModel->getClinicAttendeeByNic($nic);
     
      $mother = $this->expectantRecordModel-> getMother($nic); 
      $poa = $this->expectantRecordModel->calculatePOAWeeks($mother->poa, $mother->registrationDate);

      if($_SERVER['REQUEST_METHOD']=='POST'){
          //Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $data = [
            'info' => $info,
            'report'=>$report,
            'expectantRecords'=>$expectantRecords,
            'expectantRecordsHeight'=>$expectantRecordsHeight,
            'children'=>$children,
            'infoOfRegistrant'=>$infoOfRegistrant,

            'nic' => trim($_POST['nic']),
            'nic_err'=>'',
            // 'reportNo' => trim($_POST['reportNo']),
            // 'reportNo_err'=>'',
            'phm'=>trim($_POST['phm']),
            'relationship'=>'Mother',
            'name'=>trim($_POST['name']),
            'nic'=>trim($_POST['nic']), 
            'age'=>trim($_POST['age']),
            'nochildren'=>trim($_POST['nochildren']),
            'levelofeducation'=>trim($_POST['levelofeducation']),
            'occupation'=>trim($_POST['occupation']),
            'contactno'=>trim($_POST['contactno']),
            'address'=>trim($_POST['address']),
            'email'=>trim($_POST['email']),
            'date' => date("Y-m-d"),
            'miscarriage' => trim($_POST['miscarriage']),
            'weekscompleted' => trim($_POST['weekscompleted']),
            'weekscompleted_err'=>'',
            'weight'=> trim($_POST['weight']),
            'weight_err'=>'',
            'bp'=> trim($_POST['bp']),
            'bp_err'=>'',
            'placeofDelivery'=> trim($_POST['placeofDelivery']),
            'placeofDelivery_err'=>'',
            'modeofDelivery'=> trim($_POST['weight']),
            'modeofDelivery_err'=>'',
            'postnatalcomplication'=> trim($_POST['postnatalcomplication']),
            'postnatalcomplication_err'=>'',
           
            'symptoms'=> trim($_POST['symptoms']),
            'symptoms_err'=>'',
            'diabetes'=> trim($_POST['diabetes']),
            'diabetes_err'=>'',

            'poa'=>$poa,
            'mother'=>$mother,
          
          
          ];
         //validate data
          //  if(empty($data['reportNo'])){
          //   $data['reportNo_err'] = 'Please enter the report Number';
          //  }

          //  if(empty($data['date'])){
          //   $data['date_err'] = 'Please enter the date';
          // }
           
           if(empty($data['weight'])){
            $data['weight_err'] = 'Please enter the weight';
           }
          

           if(empty($data['bp'])){
            $data['bp_err'] = 'Please enter the blood pressure';
           }
           
           if(empty($data['weekscompleted'])){
            $data['weekscompleted_err'] = 'Enter the No. of weeks completed';
          }
          if(empty($data['symptoms'])){
            $data['symptoms_err'] = 'Enter the symptoms if any';
          }
          if(empty($data['postnatalcomplication'])){
            $data['postnatalcomplication_err'] = 'Any Postnatal complications?';
          }
          //make sure that there are no errors
          //  if(empty($data['weight_err']) && empty($data['bp_err']))
           if(empty($data['weight_err']) && empty($data['bp_err']) && empty($data['weekscompleted_err']) && ($data['miscarriage'])=='No'  )
           {
             //validated
              //die('Successfull');

              //add expectant mother's records
              if($this->expectantRecordModel->movingToDeliveredList($data) && $this->expectantRecordModel->updateactiveOfExpectant($data) && $this->expectantRecordModel->deliveredToParent($data)){
               
               redirect('expectantRecords/expectnatmotherlist');
            }else{
                die('Something went wrong');
            }
        }  if(empty($data['weight_err']) && empty($data['bp_err']) && empty($data['weekscompleted_err']) && ($data['miscarriage'])=='Yes'  ){
          if($this->expectantRecordModel->movingToDeliveredList($data) && $this->expectantRecordModel->updateactiveOfExpectant($data)){
         
            redirect('expectantRecords/expectnatmotherlist');
          }
        } 
        
        
        
        
        
        else{
            //load view with errors
            $this->view('expectantRecords/delivered', $data);
        }
        
         } else{

        
         // $mother = $this->expectantRecordModel-> getMother($nic); 
         // $poa = $this->expectantRecordModel->calculatePOAWeeks($mother->poa, $mother->registrationDate);
    
        $data = [
          'info' => $info,
          'nic' => '',
          'nic_err'=>'',
          'date' => date("Y-m-d"),
          'miscarriage' => '',
          'weekscompleted' => '',
          'weekscompleted_err'=>'',
          'weight'=> '',
          'weight_err'=>'',
          'bp'=> '',
          'bp_err'=>'',
          'placeofDelivery'=> '',
          'placeofDelivery_err'=>'',
          'modeofDelivery'=> '',
          'modeofDelivery_err'=>'',
          'postnatalcomplication'=> '',
          'postnatalcomplication_err'=>'',
         
          'symptoms'=> '',
          'symptoms_err'=>'',
          'diabetes'=> '',

          'poa'=>$poa,
          'mother'=>$mother,
          'report'=>$report,
          'expectantRecords'=>$expectantRecords,
          'expectantRecordsHeight'=>$expectantRecordsHeight,
          'children'=>$children,
          'infoOfRegistrant'=>$infoOfRegistrant
        //  'newexpectantRecords'=> $newexpectantRecords,
        
      
        
        
              
        ];
       
    
      $this->view('expectantRecords/delivered', $data);

      






      }
    
  
} }
