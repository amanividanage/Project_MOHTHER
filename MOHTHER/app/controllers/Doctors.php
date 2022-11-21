<?php
    class Doctors extends Controller{
        public function __construct(){

            $this->clinicModel = $this->model('Clinic');
            $this->doctorModel = $this->model('Doctor');
        }

        public function index(){
            //Get clinics 
            $doctors = $this->doctorModel->getDoctors();

            $data = [
                'doctors' => $doctors
            ];

            $this->view('doctors/index', $data);
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
                    'name_err' => '',
                    'identity_err' => '',
                    'phone_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'clinic_err' => ''
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
                    if($this->doctorModel->findDoctorByIdentity($data['identity'])){
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
                    if($this->doctorModel->findDoctorByEmail($data['email'])){
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

                
                //Make sure no errors
                if(empty($data['name_err']) && empty($data['identity_err']) && empty($data['phone_err']) && empty($data['email_err']) && empty($data['password_err'])){
                    //validated

                    //Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //Register User
                    if($this->doctorModel->addDoctor($data)){
                        redirect('doctors');
                    } else {
                        die('Someting went wrong');
                    }

                } else {
                    //Load view with errors
                    $this->view('doctors/add', $data);
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
                    'name_err' => '',
                    'identity_err' => '',
                    'phone_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'clinics' => $clinics,
                    'clinic_err' => ''
                ];

                //Load view
                $this->view('doctors/add', $data);
            }
        }

        

        
    }
