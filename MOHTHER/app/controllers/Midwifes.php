<?php
    class Midwifes extends Controller{
        public function __construct(){
            $this->clinicModel = $this->model('Clinic');
            $this->midwifeModel = $this->model('Midwife');
        }

        public function index(){
            //Get clinics 
            $midwifes = $this->midwifeModel->getMidwifes();

            $data = [
                'midwifes' => $midwifes
            ];

            $this->view('midwifes/index', $data);
        }


        public function add(){
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //Process form 

                //Init data
                $data = [
                    'name' => trim($_POST['name']),
                    'identity' => trim($_POST['identity']),
                    'phone' => trim($_POST['phone']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'clinic' => trim($_POST['clinic']),
                    'phm' => trim($_POST['phm']),
                    'name_err' => '',
                    'identity_err' => '',
                    'phone_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'clinic_err' => '',
                    'phm_err' => ''
                ];

                //validate data
                if(empty($data['name'])){
                    $data['name_err'] = 'Please enter the name';
                }

                if(empty($data['identity'])){
                    $data['identity_err'] = 'Please enter an identity number';
                } elseif(strlen($data['identity']) < 10){
                    $data['identity_err'] = 'Please enter valid ID number';
                } else {
                    //Check identity no
                    if($this->midwifeModel->findMidwifeByIdentity($data['identity'])){
                        $data['identity_err'] = 'Id is already taken';
                    }
                }

                if(empty($data['phone'])){
                    $data['phone_err'] = 'Please enter a phone number';
                } elseif(strlen($data['phone']) < 10){
                    $data['phone_err'] = 'Please enter valid phone number';
                }

                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter an E-mail';
                } else{
                    //Check email
                    if($this->midwifeModel->findMidwifeByEmail($data['email'])){
                        $data['email_err'] = 'E-mail is already taken';
                    }
                }

                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                } elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be at least 6 characters'; 
                }

                if(empty($data['clinic'])){
                    $data['clinic_err'] = 'Please select a clinic';
                }

                if(empty($data['phm'])){
                    $data['phm_err'] = 'Please select the PHM Area';
                }

                
                //Make sure no errors
                if(empty($data['name_err']) && empty($data['identity_err']) && empty($data['phone_err']) && empty($data['email_err']) && empty($data['password_err'])){
                    //validated

                    //Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //Register User
                    if($this->midwifeModel->addMidwife($data)){
                        redirect('midwifes');
                    } else {
                        die('Someting went wrong');
                    }

                } else {
                    //Load view with errors
                    $this->view('midwifes/add', $data);
                }

            } else {
                $clinics = $this->clinicModel->getClinics();
                //Init data
                $data = [
                    'name' => '',
                    'identity' => '',
                    'phone' => '',
                    'email' => '',
                    'password' => '',
                    'clinic' => '',
                    'phm' => '',
                    'name_err' => '',
                    'identity_err' => '',
                    'phone_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'clinics' => $clinics,
                    'clinic_err' => '',
                    'phm_err' => ''
                ];

                //Load view
                $this->view('midwifes/add', $data);
            }
        }

        public function login(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'identity' => trim($_POST['identity']),
                    'password' => trim($_POST['password']),
                    'identity_err' => '',
                    'password_err' => ''
                ];

                //Validate data
                if(empty($data['identity'])){
                    $data['identity_err'] = 'Please enter an identity number';
                }

                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter an identity number';
                }


                //Check for clinicattendee id
                if($this->midwifeModel->findMidwifeByIdentity($data['identity'])){
                    //Clinic attendee found 
                    if(empty($data['identity_err']) && empty($data['password_err'])){
                    //Validated
                    //Check and set logged in Clinic attendee
                    $loggedInUser = $this->midwifeModel->login($data['identity'], $data['password']);

                    if($loggedInUser){
                        //Create session
                        $this->createMidwifeSession($loggedInUser);
                    } else{
                        $data['password_err'] = 'Password Incorrect';

                        $this->view('midwifes/login', $data);
                    }

                } else {
                    //load view with errors
                    $this->view('midwifes/login', $data);
                }
                } else {
                    //Clinic Attendee not found
                    $data['identity_err'] = 'No Clinic Attendee found';
                }
 

            } else {
                //Init data
                $data = [
                    'identity' => '',
                    'password' => '',
                    'identity_err' => '',
                    'password_err' => ''
                ];

                //Load view
                $this->view('midwifes/login', $data);
            }
        }

        public function createMidwifeSession($midwife){
            $_SESSION['midwife_id'] = $midwife->midwife_id;
            $_SESSION['midwife_identity'] = $midwife->identity;
            $_SESSION['midwife_name'] = $midwife->name;
            redirect('expectantRecords');
            //redirect('clinicattendees/'.$clinicattendee->id.'');
        }

        

        
    }
