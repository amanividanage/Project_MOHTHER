<?php
    class Clinicattendees extends Controller {
        public function __construct(){

            $this->clinicattendeeModel = $this->model('Clinicattendee');
            $this->expectantRecordModel = $this->model('ExpectantRecord');
            $this->doctorRecordModel = $this->model('DoctorRecord');
            $this->childrenModel = $this->model('Children');
            $this->calendarModel = $this->model('Calendar');
        }

        public function index(){
            //Get clinic attendee
           //$clinicattendee = $this->clinicattendeeModel->getClinicAttendeeByNic($nic);
            $mother_or_parent = $this->clinicattendeeModel->clarifyMotherOrParent();
            $children =  $this->clinicattendeeModel->getchild_list();
            $report = $this->clinicattendeeModel->getReport();

            $mother = $this->clinicattendeeModel-> getMother(); 
            $poa = '';
            if(!empty($mother_or_parent)){
                $poa = $this->clinicattendeeModel->calculatePOA($mother->poa, $mother->registrationDate);
            }
            // $poa = $this->clinicattendeeModel-> calculatePOA($mother->poa, $mother->registrationDate);

            $data = [
              // 'clinicattendee' => $clinicattendee
              'mother_or_parent' => $mother_or_parent,
              'children' => $children,
              'report'  => $report,

              'poa' => $poa,
            ];

            $this->view('clinicattendees/index', $data);
        }

        public function calendar(){
           
            $data = [
              
            ];
        
             $this->view('clinicattendees/calendar', $data);
           
        }
        // public function calendarEvents($nic){
          
        //   $calendarEvents =  $this->calendarModel->getEventsforClinicAttendee($nic);
        //     $data = [
        //         'clinic_dates' => $calendarEvents,
        //     ];
        //     echo json_encode($data['clinic_dates']);
          
           
        // }
        public function getGnd($nic){

            //$calendarEvents =  $this->calendarModel->getEvents();
            $calendarEvents =  $this->calendarModel->getEventsforClinicAttendee($nic);
    
    
            $data = [
               'clinic_dates' => $calendarEvents,
                ];
    
           echo json_encode($data['clinic_dates']);
           // $id = 
        }

        // public function profile(){
        //     $profile =  $this->clinicattendeeModel->getProfile();

        //     $data = [
        //         'profile' => $profile
        //     ];

        //     $this->view('clinicattendees/profile', $data);
        // }

        public function profile(){
            $profile =  $this->clinicattendeeModel->getProfile();
            

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              // Sanitize profile array
            //   $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
            //   $data = [
            //     // 'clinicattendee_nic' => $_SESSION['clinicattendee_nic'],
            //     'mcontactno' => trim($_POST['mcontactno']),
            //     'hcontactno' => trim($_POST['hcontactno']),
            //     // 'new_password' =>trim($_POST['new_password']),
            //     // 'confirm_password' =>trim($_POST['confirm_password']),
            //     'mcontactno_err' => '',
            //     'hcontactno_err' => '',
            //     // 'new_password_err' => '',
            //     // 'confirm_password_err' => '',
            //     'profile' => $profile
            //   ];
      
            //   // Validate data
            //   if(empty($data['mcontactno'])){
            //     $data['mcontactno_err'] = 'Please enter new contact number';
            //   }
            //   if(strlen($data['mcontactno']) < 10){
            //     $data['mcontactno_err'] = 'Please enter valid phone number';
            // }
            //   if(empty($data['hcontactno'])){
            //     $data['hcontactno_err'] = 'Please enter new contact number';
            //   }
            //   if(strlen($data['hcontactno']) < 10){
            //     $data['hcontactno_err'] = 'Please enter valid phone number';
            // }

            // if(empty($data['new_password'])){
            //     $data['new_password'] = 'please enter new password';
            // }elseif(strlen($data['new_password']) <8){
            //     $data['new_password_err'] = "Password be at least 8 characters";
            // }

            // //validate confirm password
            // if(empty($data['confirm_password'])){
            //     $data['confirm_password_err'] = 'please confirm password';
            // }else{
            //     if($data['new_password'] !=$data['confirm_password']) {
            //         $data['confirm_password_err'] ='password do not match'; 
            //     }
            // }
      
            //   // Make sure no errors
            //   if(empty($data['mcontactno_err']) && empty($data['hcontactno_err'])){
            //     // Validated
                
            //     if($this->clinicattendeeModel->updateclinicattendeeinfo($data)){
            //         //print_r($_POST);
            //        redirect('clinicattendees/profile');
            //     }else{
            //      redirect('clinicattendees/profile');
            //     }
                
            //   } else {
            //     // Load view with errors
            //     $this->view('clinicattendees/profile', $data);
            //   }
      
            } else {
                
                //  $profile = $this->clinicattendeeModel->getProfile(); 
                $profile_expectant = $this->clinicattendeeModel->getProfile_expectant();
                $profile_parent = $this->clinicattendeeModel->getProfile_parent();
      
              $data = [
                'profile_expectant' => $profile_expectant,
                'profile_parent' => $profile_parent,
                // 'id' => $id,
                // 'mcontactno' => $profile->mcontactno,
                // 'mcontactno_err' =>'',
                // 'hcontactno' => $profile->hcontactno,
                // 'hcontactno_err' =>'',
                // 'profile' => $profile
              ];
        
              $this->view('clinicattendees/profile', $data);
            }
        }


        public function register(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data =[
                    'mname'=>trim($_POST['mname']),
                    'nic'=>trim($_POST['nic']), 
                    'mage'=>trim($_POST['mage']),
                    'gravidity'=>trim($_POST['gravidity']),
                    'mlevelofeducation'=>trim($_POST['mlevelofeducation']),
                    'moccupation'=>trim($_POST['moccupation']),
                    'mcontactno'=>trim($_POST['mcontactno']),
                    'address'=>trim($_POST['address']),
                    'memail'=>trim($_POST['memail']),
                    'hname'=>trim($_POST['hname']),
                    'hage'=>trim($_POST['hage']),
                    'hlevelofeducation'=>trim($_POST['hlevelofeducation']),
                    'hoccupation'=>trim($_POST['hoccupation']),
                    'hcontactno'=>trim($_POST['hcontactno']),
                    'hemail'=>trim($_POST['hemail']),
                    'gnd'=>trim($_POST['gnd']),
                    'active'=>'1',
            
                    
        
                    'mname_err'=>'',
                    'nic_err'=>'', 
                    'mage_err'=>'',
                    'gravidity_err'=>'',
                    'mlevelofeducation_err'=>'',
                    'moccupation_err'=>'',
                    'mcontactno_err'=>'',
                    'address_err'=>'',
                    'memail_err'=>'',
                    'hname_err'=>'',
                    'hage_err'=>'',
                    'hlevelofeducation_err'=>'',
                    'hoccupation_err'=>'',
                    'hcontactno_err'=>'',
                    'hemail_err'=>'',
                    'gnd_err'=>''
                   
                ];

                //Validate data
                if(empty($data['mname'])){
                    $data['mname_err']='Please enter your name';
                }

                if(empty($data['nic'])){
                    $data['nic_err'] = 'Please enter an nic number';
                } elseif(strlen($data['nic']) < 10){
                    $data['nic_err'] = 'Please enter valid ID number';
                } else {
                    //Check nic no
                    if($this->childrenModel->findParentByNic($data['nic'])){
                        $data['nic_err'] = 'Id is already registered as a parent';
                    } elseif($this->clinicattendeeModel->findClinicAttendeeByNic($data['nic'])){
                        $data['nic_err'] = 'Id is already taken';
                    }
                }

                if(empty($data['mage'])){
                    $data['mage_err']='Please enter your age';
                }

                if(empty($data['gravidity'])){
                    $data['gravidity_err']='Please enter your no of pregnancies';
                }

                if(empty($data['mlevelofeducation'])){
                    $data['mlevelofeducation_err']='Please select your level of education';
                }

                if(empty($data['moccupation'])){
                    $data['moccupation_err']='Please enter your occupation';
                }

                if(empty($data['mcontactno'])){
                    $data['mcontactno_err'] = 'Please enter a phone number';
                } elseif(strlen($data['mcontactno']) < 10){
                    $data['mcontactno_err'] = 'Please enter valid phone number';
                }
                
                if(empty($data['address'])){
                    $data['address_err']='Please enter your address';
                }
        
                if(empty($data['memail'])){
                    $data['memail_err'] = 'Please enter an E-mail';
                }

                if(empty($data['hname'])){
                    $data['hname_err']='Please enter name';
                }

                if(empty($data['hage'])){
                    $data['hage_err']='Please enter age';
                }

                if(empty($data['hlevelofeducation'])){
                    $data['hlevelofeducation_err']='please enter level of education';
                }

                if(empty($data['hoccupation'])){
                    $data['hoccupation_err']='please enter occupation';
                }

                if(empty($data['hcontactno'])){
                    $data['hcontactno_err']='please enter contact no';
                } elseif(strlen($data['hcontactno']) < 10){
                    $data['hcontactno_err'] = 'Please enter valid phone number';
                }


                if(empty($data['hemail'])){
                    $data['hemail_err']='please enter an e-mail';
                }

                if(empty($data['gnd'])){
                    $data['gnd_err']='Please enter grama niladhari area';
                }

               

                //Make sure no errors
                if(empty($data['mname_err']) && empty($data['nic_err']) &&empty($data['mcontactno_err']) && empty($data['memail_err']) && empty($data['gnd_err'])){
                    
                    // $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //register clinic attendee
                    if($this->clinicattendeeModel->register($data)){
                       // redirect('');
                     //  $this->view('clinicattendees/calendar', $data);
                     redirect('clinicattendees/calendar');
                    } else {
                        die('Someting went wrong');
                    }
                  //  redirect('clinics/info/'.$clinic->clinic_id.'');
                } else{
                    // Load view with errors
                    $this->view('clinicattendees/register', $data);
                }



            } else {
                //Init data
                $data =[
                    'mname'=>'',
                    'nic'=>'', 
                    'mage'=>'',
                    'gravidity'=>'',
                    'mlevelofeducation'=>'',
                    'moccupation'=>'',
                    'mcontactno'=>'',
                    'address'=>'',
                    'memail'=>'',
                    'hname'=>'',
                    'hage'=>'',
                    'hlevelofeducation'=>'',
                    'hoccupation'=>'',
                    'hcontactno'=>'',
                    'hemail'=>'',
                    'gnd'=>'',
                    
        
                    'mname_err'=>'',
                    'nic_err'=>'', 
                    'mage_err'=>'',
                    'gravidity_err'=>'',
                    'mlevelofeducation_err'=>'',
                    'moccupation_err'=>'',
                    'mcontactno_err'=>'',
                    'address_err'=>'',
                    'memail_err'=>'',
                    'hname_err'=>'',
                    'hage_err'=>'',
                    'hlevelofeducation_err'=>'',
                    'hoccupation_err'=>'',
                    'hcontactno_err'=>'',
                    'hemail_err'=>'',
                    'gnd_err'=>'',
                    'active'=>'',

                    
                ];

                // Load view
                $this->view('clinicattendees/register', $data);

            }
        }

        public function login(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'nic' => trim($_POST['nic']),
                    'password' => trim($_POST['password']),
                    'nic_err' => '',
                    'password_err' => ''
                ];

                //Validate data
                if(empty($data['nic'])){
                    $data['nic_err'] = 'Please enter an nic number';
                }

                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter a password';
                }


                if(empty($data['nic_err']) && empty($data['password_err'])){

                    if(($this->clinicattendeeModel->findClinicAttendeeByNic($data['nic'])) OR ($this->clinicattendeeModel->findParentByNic($data['nic']))){
                        $loggedInUser = $this->clinicattendeeModel->login($data['nic'], $data['password']);

                        if($loggedInUser){
                            //Create session
                            $this->createClinicAttendeeSession($loggedInUser);
                           //die('success');
                        } else{
                            $data['password_err'] = 'Password Incorrect';

                            $this->view('clinicattendees/login', $data);
                        }

                    }else {
                        //Clinic Attendee not found
                        $data['nic_err'] = 'No Clinic Attendee found';
                        
                        $this->view('clinicattendees/login', $data);
                    }
                    
                    
                } else {
                    //load view with errors
                    $this->view('clinicattendees/login', $data);
                }

                
 

            } else {
                //Init data
                $data = [
                    'nic' => '',
                    'password' => '',
                    'nic_err' => '',
                    'password_err' => ''
                ];

                //Load view
                $this->view('clinicattendees/login', $data);
        }
    }

    public function detailreport(){
        $detailreport =  $this->clinicattendeeModel->getDetailReport();

        $data = [
            'detailreport' => $detailreport
        ];

        $this->view('clinicattendees/detailreport', $data);
    }


    public function children(){
        $children =  $this->clinicattendeeModel->getChildrenList();

        $data = [
            'children' => $children
        ];

        $this->view('clinicattendees/children', $data);
    }

    public function child($id){
        
        $child =  $this->clinicattendeeModel->getChildById($id);
        // $records = $this->clinicattendeeModel->getReportListByChild($id);
        $midwiferecords = $this->doctorRecordModel->getMidwifeRecordsByChild($id);
        $doctorrecords = $this->doctorRecordModel->getDoctorRecordsByChild($id);
        $age = $this->doctorRecordModel->calculateAge($child->dob);

        $data = [
            
            'child' => $child,
            'midwiferecords' => $midwiferecords,
            'doctorrecords' => $doctorrecords,
            'age' => $age,
        ];

        $this->view('clinicattendees/child', $data);
    }

    public function child_reports($id, $date){
        $child =  $this->clinicattendeeModel->getChildById($id);

        $midwiferecords = $this->doctorRecordModel->getMidwifeRecordsByChildAndDate($id, $date);
        $doctorrecords = $this->doctorRecordModel->getDoctorRecordsByChildAndDate($id, $date);

        $data = [
            'child' => $child,
            'midwiferecords' => $midwiferecords,
            'doctorrecords' => $doctorrecords,
        ];

        $this->view('clinicattendees/child_reports', $data);
    }
    
    public function session(){
       

        $data = [
            
        ];

        $this->view('clinicattendees/session', $data);
    }

    public function timeslot_monthlyclinic(){
        //$monthly_clinic =  $this->clinicattendeeModel->getmonthly_clinic();

        $data = [
            
        ];

        $this->view('clinicattendees/timeslot_monthlyclinic', $data);
    }

    public function child_vaccination($id){
        $child =  $this->clinicattendeeModel->getChildById($id);
        $vaccines = $this->doctorRecordModel->getVaccine();
        $given_vaccines = $this->doctorRecordModel->getGivenVaccinesByChild($id);
        
        $data = [
            'child' => $child,
            'vaccines' => $vaccines,
            'given_vaccines' => $given_vaccines,
        ];

        $this->view('clinicattendees/child_vaccination', $data);
    }

    public function child_charts($id){
        $child = $this->doctorRecordModel->getChildById($id);
        $chart = $this->doctorRecordModel->getChartByChild($id);
        // $age = $this->childrenModel->calculateAge($child->dob);
        // $jsonChartData = json_encode($chart);

        // die($jsonChartData);

        $data = [
            'child' => $child,
            // // 'ageweight' => "['age','weight']",
            'chart' => $chart,
            // 'jsonChartData' => $jsonChartData
        ];

        $this->view('clinicattendees/child_charts', $data);
    }

    public function request(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data =[
               
                'hname'=>trim($_POST['hname']),
                'hage'=>trim($_POST['hage']),
                'hlevelofeducation'=>trim($_POST['hlevelofeducation']),
                'hoccupation'=>trim($_POST['hoccupation']),
                'hcontactno'=>trim($_POST['hcontactno']),
                'hemail'=>trim($_POST['hemail']),
                
    
               
                'hname_err'=>'',
                'hage_err'=>'',
                'hlevelofeducation_err'=>'',
                'hoccupation_err'=>'',
                'hcontactno_err'=>'',
                'hemail_err'=>''
                
            ];

            //Validate data
           

            if(empty($data['hname'])){
                $data['hname_err']='please enter name';
            }

            if(empty($data['hage'])){
                $data['hage_err']='please enter age';
            }

            if(empty($data['hlevelofeducation'])){
                $data['hlevelofeducation_err']='please enter level of education';
            }

            if(empty($data['hoccupation'])){
                $data['hoccupation_err']='please enter occupation';
            }

            if(empty($data['hcontactno'])){
                $data['h_contactno_err']='please enter contact no';
            } 
            if(strlen($data['hcontactno']) < 10){
                $data['hcontactno_err'] = 'Please enter valid phone number';
            }


            if(empty($data['hemail'])){
                $data['hemail_err']='please enter an e-mail';
            }
            
           

            //Make sure no errors
            if(empty($data['hname_err']) && empty($data['hage_err']) &&empty($data['h_levelofeducation_err']) && empty($data['h_occupation_err']) && empty($data['h_contactno_err']) && empty($data['hemail_err'])){
                
               

                //reuestq clinic attendee
                if($this->clinicattendeeModel->request($data)){
                    redirect('clinicattendees/request_date');
                } else {
                    die('Someting went wrong');
                }

            } else{
                // Load view with errors
                $this->view('clinicattendees/request', $data);
            }



        } else {
            //Init data
            $data =[
                
                'hname'=>'',
                'hage'=>'',
                'hlevelofeducation'=>'',
                'hoccupation'=>'',
                'hcontactno'=>'',
                'hemail'=>'',
                
    
                
                'hname_err'=>'',
                'hage_err'=>'',
                'hlevelofeducation_err'=>'',
                'hoccupation_err'=>'',
                'hcontactno_err'=>'',
                'hemail_err'=>''
              
            ];

            // Load view
            $this->view('clinicattendees/request', $data);

        }
    }

    public function req_expectant(){

        $req_expectant =  $this->clinicattendeeModel->getreq_expectant();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              // Sanitize profile array
              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
              $data = [
                // 'clinicattendee_nic' => $_SESSION['clinicattendee_nic'],
                
                 'gravidity' => trim($_POST['gravidity']),
                 'mcontactno' => trim($_POST['mcontactno']),
                 'moccupation' => trim($_POST['moccupation']),
                 'memail' => trim($_POST['memail']),
                 'hname' => trim($_POST['hname']),
                 'hage' => trim($_POST['hage']),
                 'hlevelofeducation' => trim($_POST['hlevelofeducation']),
                 'hcontactno' => trim($_POST['hcontactno']),
                 'hoccupation' => trim($_POST['hoccupation']),
                 'hemail' => trim($_POST['hemail']),
                
                'gravidity_err' => '',
                'mcontactno_err' => '',
                'moccupation_err' => '',
                'memail_err' => '',
                'hname_err' => '',
                'hage_err' => '',
                'hlevelofeducation_err' => '',
                'hcontactno_err' => '',
                'hoccupation_err' => '',
                'hemail_err' => '',
                
               
                'req_expectant' => $req_expectant
              ];
      
              // Validate data
              if(empty($data['mcontactno'])){
                $data['mcontactno_err'] = 'Please enter new contact number';
              }
              if(strlen($data['mcontactno']) < 10){
                $data['mcontactno_err'] = 'Please enter valid phone number';
            }
              if(empty($data['hcontactno'])){
                $data['hcontactno_err'] = 'Please enter new contact number';
              }
              if(strlen($data['hcontactno']) < 10){
                $data['hcontactno_err'] = 'Please enter valid phone number';
            }

      
              // Make sure no errors
              if(empty($data['mcontactno_err']) && empty($data['hcontactno_err'])){
                // Validated
                
                if($this->clinicattendeeModel->update_expectant_info($data)){
                    //print_r($_POST);
                   redirect('clinicattendees/req_expectant');
                }else{
                 redirect('clinicattendees/req_expectant');
                }
                
              } else {
                // Load view with errors
                $this->view('clinicattendees/req_expectant', $data);
              }
      
            } else {
                
                 $req_expectant = $this->clinicattendeeModel->getreq_expectant(); 
      
              $data = [
                // 'id' => $id,
                'gravidity' => $req_expectant->gravidity,
                'gravidity_err' => '',
                'mcontactno' => $req_expectant->mcontactno,
                'mcontactno_err' =>'',
                'moccupation' => $req_expectant->moccupation,
                'moccupation_err' => '',
                'memail' => $req_expectant->memail,
                'memail_err' => '',
                'hname' => $req_expectant->hname,
                'hname_err' => '',
                'hage' => $req_expectant->hage,
                'hage_err' => '',
                'hlevelofeducation' => $req_expectant->hlevelofeducation,
                'hlevelofeducation_err' => '',
                'hcontactno' => $req_expectant->hcontactno,
                'hcontactno_err' =>'',
                'hoccupation' => $req_expectant->hoccupation,
                'hoccupation_err' =>'',
                'hemail' => $req_expectant->hemail,
                'hemail_err' =>'',
                
                'req_expectant' => $req_expectant
              ];
        
              $this->view('clinicattendees/req_expectant', $data);
            }
      
    }

    
    public function mother_vaccination(){

        $mother = $this->clinicattendeeModel-> getMother(); 
        $vaccines = $this->expectantRecordModel->getVaccine();
        // // $months = $this->childrenModel->calculateMonths($child->dob);
        $buttonactive = $this->clinicattendeeModel->activateButton();
        $buttondeactive = $this->clinicattendeeModel->deactivateButton();
  
  
        $data = [
          'mother'=> $mother,
            'vaccines' => $vaccines,
        //     // 'months' => $months,
            'buttonactive' => $buttonactive,
            'buttondeactive' => $buttondeactive,
  
        //     // 'batch'=>'',
        //     // 'batch_err'=>''
        ];
  
        $this->view('clinicattendees/mother_vaccination', $data);
  
    }
    

    public function mother_charts(){
     
        $mother = $this->clinicattendeeModel-> getMother(); 
        $chart = $this->clinicattendeeModel->getChartByMother();
   
         $data = [
             
             'mother'=> $mother,
             'chart'=> $chart
         ];
   
         $this->view('clinicattendees/mother_charts', $data);
    }

    public function expectant_allrecords($date){
        
        $mother = $this->clinicattendeeModel-> getMother(); 
        $midwife_records = $this->clinicattendeeModel-> getMidwifeRecordsByMotherAndDate($date); 
        $doctor_records = $this->clinicattendeeModel->getDoctorRecordsByMotherAndDate($date);
        // // $chart = $this->expectantRecordModel->getChartByMother($nic);
  
        $data = [
            
            'mother'=> $mother,
            'midwife_records'=> $midwife_records,
            'doctor_records'=> $doctor_records,
        ];
  
        $this->view('clinicattendees/expectant_allrecords', $data);
    }

    

    



    

    public function createClinicAttendeeSession($clinicattendee){
        $_SESSION['clinicattendee_id'] = $clinicattendee->regID;
        $_SESSION['clinicattendee_nic'] = $clinicattendee->nic;
        $_SESSION['clinicattendee_name'] = $clinicattendee->name;
        redirect('clinicattendees');
        //redirect('clinicattendees/'.$clinicattendee->id.'');
    }

    public function logout(){
        unset($_SESSION['clinicattendee_id']);
        unset($_SESSION['clinicattendee_nic']);
        unset($_SESSION['clinicattendee_name']);
        session_destroy();
        redirect('');
    }

    

}

