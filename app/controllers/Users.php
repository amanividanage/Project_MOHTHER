<?php
class Users extends Controller{
    public function __construct(){
        $this->userModel = $this->model('User');
        $this->expectantRecordModel = $this->model('ExpectantRecord');
        $this->adminModel = $this->model('Admin');
        $this->midwifeModel = $this->model('Midwife');
        $this->doctorModel = $this->model('Doctor');
        $this->clinicattendeeModel = $this->model('Clinicattendee');
        $this->doctorModel = $this->model('Doctor');
       
    }

    public function index(){

        //get records
        $expectantRecords =  $this->expectantRecordModel-> getExpectantRecords(); 

        $data = [
            'expectantRecords' => $expectantRecords
        ]; 
        $this->view('expectantRecords/index', $data);
    }

    public function expectant(){
        //get records
        $expectantemail =  $this->userModel-> getExpectantemail(); 
        $expectantnic =  $this->userModel-> getExpectantnic(); 
        //check for post
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
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
                if($this->userModel->getExpectantemail($data['expectantemail'])){
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
                    if($this->userModel->email($data)){
                        redirect('expectantRecords/expectant');
                    } else {
                        die('Someting went wrong');
                    }
        
                }
                    $this->view('expectantRecords/expectant', $data);
        } else{
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
            $this->view('expectantRecords/expectant', $data);
  
        }
    }

    public function risky(){
        $data = [];
    
        $this->view('users/risky', $data);
    }

    public function email(){

        //get records
        $expectantemail =  $this->userModel-> getExpectantemail(); 
        $expectantnic =  $this->userModel-> getExpectantnic(); 
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
                if($this->userModel->getExpectantemail($data['expectantemail'])){
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
                    if($this->userModel->email($data)){
                        redirect('users/email');
                    } else {
                        die('Someting went wrong');
                    }
        
                }
              $this->view('users/email', $data);
        } else{
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
    
 // public function index(){
    //Get clinics 
 //   $display = $this->userModel->getUsers();

   // $data = [
        //'nic' => $display
   // ];

   /// $this->view('users/index', $data);
//}


   public function register($nic){
    //check for post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //PROCESS FORM
        //die('Submitted');
        //sanitizing the POST data
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

        $newexpectantRecords =  $this->expectantRecordModel-> getNewExpectantRecordsByNic($nic); 
        $findPHM = $this->expectantRecordModel-> findPHM();
        //init data 
        $data =[
            'newexpectantRecords'=> $newexpectantRecords,
            'phm'=>$findPHM->phm,
            'active'=>'0',
            'nic' => $nic,
            'name' => trim($_POST['name']),
            'poa' => trim($_POST['poa']),
            'height' => trim($_POST['height']),
            'weight' => trim($_POST['weight']),
            'bloodPressure' => trim($_POST['bloodPressure']),
            'allergies' => trim($_POST['allergies']),
            'consanguinity'=> trim($_POST['consanguinity']),
            'rubellaImmunization'=> trim($_POST['rubellaImmunization']),
            'prePregnancyScreening'=> trim($_POST['prePregnancyScreening']),
            'preconceptionalFolicAcid'=> trim($_POST['preconceptionalFolicAcid']),
            'subfertility' =>  trim($_POST['subfertility']),
            'gravidity' =>  trim($_POST['gravidity']),
            'noofChildren' =>  trim($_POST['noofChildren']),
            'ageofYoungest'=> trim($_POST['ageofYoungest']),
            'lastMenstrualDate' => trim($_POST['lastMenstrualDate']),
            'registrationDate' =>  trim($_POST['registrationDate']),
            'expectedDateofDelivery' =>  trim($_POST['expectedDateofDelivery']),
            'password' => trim($_POST['password']),

          // 'bmi' => trim($_POST['bmi']),
           //'output' => trim($_POST['output']),
            'nic_err' => '',
            'name_err' => '',
            'poa_err' => '',
            'height_err' => '',
            'weight_err' => '',
            'bloodPressure_err' => '',
            'allergies_err' => '',
            'consanguinity_err'=> '',
            'rubellaImmunization_err'=>'',
            'prePregnancyScreening_err'=>'',
            'preconceptionalFolicAcid_err'=>'',
            'subfertility_err' => '',
            'gravidity_err' => '',
            'noofChildren_err' => '',
            'ageofYoungest_err'=>'',
            'lastMenstrualDate_err' => '',
            'registrationDate_err' => '',
            'expectedDateofDelivery_err' => '',
            'password_err' => '',            
            'bmi_err'=>'',
            'output_err'=>'',
            'active'=>'0',
            
            
            ];

            //validate variables
            if(empty($data['nic'])){
                $data['nic_err']='*Please enter the NIC';
            }else{
               // check nic
                if($this->userModel->findUserByNIC($data['nic'])){
                    $data['nic_err'] = 'This user is already registered';
                }
            }

            if(empty($data['height'])){
                $data['height_err']='*Please enter the height';
            }

            if(empty($data['weight'])){
                $data['weight_err']='*Please enter the weight';
            }

            if(empty($data['bloodPressure'])){
                $data['bloodPressure_err']='*Please enter the Blood Pressure';
            }

            if(empty($data['allergies'])){
                $data['allergies_err']='*Please enter any allergies that the patient is having';
            }

            if(empty($data['subfertility'])){
                $data['subfertility_err']='*Please enter the histroy of subfertility';
            }

            if(empty($data['gravidity'])){
                $data['gravidity_err']='*Please enter the gradivity details';
            }

            if(empty($data['noofChildren'])){
                $data['noofChildren_err']='*Please enter the No of Children the expectant mother has';
            }

           
            if(empty($data['lastMenstrualDate'])){
                $data['lastMenstrualDate_err']='*Please enter the Last Menstrual Date';
            }

            if(empty($data['registrationDate'])){
                $data['registrationDate_err']='*Please enter the Registration Date';
            }

            if(empty($data['expectedDateofDeliver'])){
                $data['expectedDateofDeliver_err']='Please enter the Expected date of delivery';
            }

            //validate the date of registration and expected date of delivery
            //if($data['registrationDate'] == $data['expectedDateofDeliver'] ){
                //$data['expectedDateofDelivery_err'] ='Expecetd date cannot be the registration date';
            //}

            //make sure all the necessary data are filled by midwife
            if(empty($data['nic_err']) && empty($data['height_err'])&& empty($data['weight_err']) && empty($data['bloodPressure_err']) && empty($data['allergies_err']) && empty($data['subfertility_err']) && empty($data['gravidity_err']) && empty($data['noofChildren_err']))
            {
                //validated
                //die('Successfull');

                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //register user
                if($this->userModel->addUser($data) && $this->userModel->register($data) && $this->userModel->updateactive($data) ){  
                    redirect('expectantRecords');
                }
                // else
                // {
                //     die('Something went wrong');
                // }


            } else {
                //load view with errors
                $this->view('users/register', $data);
            }

    }else{
        $newexpectantRecords =  $this->expectantRecordModel-> getNewExpectantRecordsByNic($nic); 
        //init data
        $data =[
        'newexpectantRecords'=> $newexpectantRecords,
        'nic' => '',
        'name' => '',
        'poa' => '',
        'height' => '',
        'weight' => '',
        'bloodPressure' => '',
        'allergies' => '',
        'consanguinity' =>'',
        'rubellaImmunization' => '',
        'prePregnancyScreening' => '',
        'preconceptionalFolicAcid'=>'',
        'subfertility' => '',
        'gravidity' => '',
        'noofChildren' => '',
        'ageofYoungest'=>'',
        'lastMenstrualDate' => '',
        'registrationDate' => '',
        'expectedDateofDelivery' => '',
        'password' => '',
        
        'nic_err' => '',
        'name_err' => '',
        'poa_err' => '',
        'height_err' => '',
        'weight_err' => '',
        'bloodPressure_err' => '',
        'allergies_err' => '',
        'consanguinity_err'=>'',
        'rubellaImmunization_err'=>'',
        'prePregnancyScreening_err'=>'',
        'preconceptionalFolicAcid_err'=>'',
        'subfertility_err' => '',
        'gravidity_err' => '',
        'noofChildren_err' => '',
        'ageofYoungest_err'=>'',
        'lastMenstrualDate_err' => '',
        'registrationDate_err' => '',
        'expectedDateofDelivery_err' => '',
        'password_err' => '',
        'date'=>'',
        'calculatedBMI'=> '',
        'year' => '',
        'active'=>'',
        
        
        ];

        //load view
        $this->view('users/register', $data);
     
    }
  }

  public function info($nic){
    $display = $this->userModel->getUserByNIC($nic);
    

    $data = [
        'display' => $display
    ];

    $this->view('users/risky', $data);
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
                $data['nic_err'] = 'Please enter a nic number';
            }

            if(empty($data['password'])){
                $data['password_err'] = 'Please enter a password';
            }

            if(empty($data['nic_err']) && empty($data['password_err'])){

                if($this->adminModel->findAdminBynic($data['nic'])){
                    //validated
                    //checked and set logged in user
                    $loggedInUser = $this->adminModel->login($data['nic'], $data['password']);

                    if($loggedInUser){
                        //Create session
                        $this->createAdminSession($loggedInUser);
                    } else{
                        $data['password_err'] = 'Password Incorrect';

                        $this->view('users/login', $data);
                    }

                } elseif($this->midwifeModel->findMidwifeBynic($data['nic'])){
                    $loggedInUser = $this->midwifeModel->login($data['nic'], $data['password']);

                    if($loggedInUser){
                        //Create session
                        $this->createMidwifeSession($loggedInUser);
                    } else{
                        $data['password_err'] = 'Password Incorrect';

                        $this->view('users/login', $data);
                    }

                }elseif($this->doctorModel->findDoctorBynic($data['nic'])){
                    $loggedInUser = $this->doctorModel->login($data['nic'], $data['password']);

                    if($loggedInUser){
                        //Create session
                        $this->createDoctorSession($loggedInUser);
                    } else{
                        $data['password_err'] = 'Password Incorrect';

                        $this->view('users/login', $data);
                    }

                }elseif(($this->clinicattendeeModel->findClinicAttendeeByNic($data['nic'])) OR ($this->clinicattendeeModel->findParentByNic($data['nic']))){
                    $loggedInUser = $this->clinicattendeeModel->login($data['nic'], $data['password']);

                        if($loggedInUser){
                            //Create session
                            $this->createClinicAttendeeSession($loggedInUser);
                           //die('success');
                        } else{
                            $data['password_err'] = 'Password Incorrect';

                            $this->view('clinicattendees/login', $data);
                        }

                } else {
                    //Clinic Attendee not found
                    $data['nic_err'] = 'No User found';
                    
                    $this->view('midwifes/login', $data);
                }
                
                
            } else {
                //load view with errors
                $this->view('users/login', $data);
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
            $this->view('users/login', $data);
        }
    
        
    }

    public function createAdminSession($admin){
        $_SESSION['admin_id'] = $admin->admin_id;
        $_SESSION['admin_nic'] = $admin->nic;
        $_SESSION['admin_name'] = $admin->name;
        redirect('clinics');
        //redirect('clinics/info/<?php echo $clinic->id; ?-->');
    }

    public function createMidwifeSession($midwife){
        $_SESSION['midwife_id'] = $midwife->midwife_id;
        $_SESSION['midwife_nic'] = $midwife->nic;
        $_SESSION['midwife_name'] = $midwife->name;
        $_SESSION['midwife_clinic'] = $midwife->clinic;
        redirect('expectantRecords');
        //redirect('clinicattendees/'.$clinicattendee->id.'');
    }
    
    public function createDoctorSession($doctor){
        $_SESSION['doctor_id'] = $doctor->doctor_id;
        $_SESSION['doctor_nic'] = $doctor->nic;
        $_SESSION['doctor_name'] = $doctor->name;
        $_SESSION['doctor_clinic'] = $doctor->clinic;
        redirect('doctorRecords');
        //redirect('clinicattendees/'.$clinicattendee->id.'');
    }

    public function createClinicAttendeeSession($clinicattendee){
        $_SESSION['clinicattendee_id'] = $clinicattendee->regID;
        $_SESSION['clinicattendee_nic'] = $clinicattendee->nic;
        $_SESSION['clinicattendee_name'] = $clinicattendee->name;
        redirect('clinicattendees');
        //redirect('clinicattendees/'.$clinicattendee->id.'');
    }
    // public function createDoctorSession($clinicattendee){
    //     $_SESSION['doctor_id'] = $doctor->doctor_id;
    //     $_SESSION['doctor_nic'] = $doctor->nic;
    //     $_SESSION['doctor_name'] = $doctor->name;
    //     redirect('users/register');
        //redirect('clinicattendees/'.$clinicattendee->id.'');
    //}

    public function logout(){
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_nic']);
        unset($_SESSION['admin_name']);
        session_destroy();
        redirect('');
    }



    
    
}
