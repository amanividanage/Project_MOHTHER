<?php
    class Midwifes extends Controller{
        public function __construct(){
            $this->clinicModel = $this->model('Clinic');
            $this->midwifeModel = $this->model('Midwife');
        }

        public function index(){
            //Check if its a search
            $find = false;
            if(isset($_GET['search'])){
                $search = addslashes($_GET['search']);
                $find = true;

                if($find){
                    $midwifes = $this->midwifeModel->searchMidwifes($search);
    
                    $data = [
                        'midwifes' => $midwifes
                    ];
    
                    $this->view('midwifes/index', $data);
                } 
            } else {
                //Get midwives 
                $midwifes = $this->midwifeModel->getMidwifes();

                //Edit
                // $midwife = $this->midwifeModel->getMidwifeByNic($nic);

                $data = [
                    'midwifes' => $midwifes,

                    // 'midwife' => $midwife
                ];

                $this->view('midwifes/index', $data);
            }
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
                    'nic' => trim($_POST['nic']),
                    'phone' => trim($_POST['phone']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'regdate' => date("Y-m-d"),
                    'name_err' => '',
                    'nic_err' => '',
                    'phone_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'active'=>'0'
                ];

                //validate data
                if(empty($data['name'])){
                    $data['name_err'] = 'Please enter the name';
                }

                if(empty($data['nic'])){
                    $data['nic_err'] = 'Please enter an nic number';
                } elseif(strlen($data['nic']) < 10){
                    $data['nic_err'] = 'Please enter valid ID number';
                } else {
                    //Check nic no
                    if($this->midwifeModel->findMidwifeBynic($data['nic'])){
                        $data['nic_err'] = 'Id is already taken';
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

                if(empty($data['phm'])){
                    $data['phm_err'] = 'Please select the PHM Area';
                }

                
                //Make sure no errors
                if(empty($data['name_err']) && empty($data['nic_err']) && empty($data['phone_err']) && empty($data['email_err']) && empty($data['password_err'])){
                    //validated

                    //Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //Register User
                    if($this->midwifeModel->addMidwife($data) AND $this->midwifeModel->addUser($data)){
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
                    'nic' => '',
                    'phone' => '',
                    'email' => '',
                    'password' => '',
                    'regdate' => '',
                    'name_err' => '',
                    'nic_err' => '',
                    'phone_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'active'=>''
                ];

                //Load view
                $this->view('midwifes/add', $data);
            }
        }

        public function delete($nic){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                date_default_timezone_set('Asia/Colombo');
                $data = [
                    'date' => date("Y-m-d"), 
                    'nic' => $nic,
                ];

                if($this->midwifeModel->deleteFromMidwifeClinic($nic) && $this->midwifeModel->setTerminatedDate($data) && $this->midwifeModel->updateMidwifeActive($nic) && $this->midwifeModel->deleteFromUser($nic)){
                    redirect('midwifes');
                } else {
                    die('Something went wrong');
                } 
            }else {
                redirect('midwifes');
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
                    $data['password_err'] = 'Please enter an password number';
                }


                //Check for clinicattendee id
                /*if($this->midwifeModel->findMidwifeBynic($data['nic'])){
                    //Clinic attendee found 
                    if(empty($data['nic_err']) && empty($data['password_err'])){
                        //Validated
                        //Check and set logged in Clinic attendee
                        $loggedInUser = $this->midwifeModel->login($data['nic'], $data['password']);

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
                    $data['nic_err'] = 'No Midwife found';
                }*/

                if(empty($data['nic_err']) && empty($data['password_err'])){

                    if($this->midwifeModel->findMidwifeBynic($data['nic'])){
                        $loggedInUser = $this->midwifeModel->login($data['nic'], $data['password']);

                        if($loggedInUser){
                            //Create session
                            $this->createMidwifeSession($loggedInUser);
                        } else{
                            $data['password_err'] = 'Password Incorrect';

                            $this->view('midwifes/login', $data);
                        }

                    }else {
                        //Clinic Attendee not found
                        $data['nic_err'] = 'No Midwife found';
                        
                        $this->view('midwifes/login', $data);
                    }
                    
                    
                } else {
                    //load view with errors
                    $this->view('midwifes/login', $data);
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
                $this->view('midwifes/login', $data);
            }
        }

        public function midwifeprofile($nic){
            $midwife = $this->midwifeModel->getMidwifeByNic($nic);
            $clinic = $this->midwifeModel->getClinicByMidwife($nic);
            $clinics = $this->midwifeModel->getClinicsToTransfer($nic);
            $history = $this->midwifeModel->getWorkingHistory($nic);

            $workperiod = array(); 
                foreach ($history as $index => $historyItem) {
                    $workperiod[$index] = $this->midwifeModel->calculateWorkPeriod($historyItem->appdate, $historyItem->transdate);
            }

            $data = [
                'midwife' => $midwife,
                'clinic' => $clinic,
                'clinics' => $clinics,
                'history' => $history,
                'workperiod' => $workperiod,
            ];

            $this->view('midwifes/midwifeprofile', $data);
        }
        

        public function midwife_transfer($nic){
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $midwife = $this->midwifeModel->getMidwifeByNic($nic);
                $postclinic = $this->midwifeModel->getMidwifeClinicByMidwife($nic);
                

                //Init data
                $data = [
                    'midwife' => $midwife,
                    'nic' => $nic,
                    'clinic' => $postclinic->clinic,
                    'appdate' => $postclinic->appdate,
                    'newclinic' => trim($_POST['newclinic']),
                    'newphm' => trim($_POST['newphm']),
                    'newclinic_err' => '',
                    'newphm_err' => '',
                    'transdate'=> date("Y-m-d"),
                ];

                //validate data
                if(empty($data['newclinic'])){
                    $data['newclinic_err'] = 'Please select a clinic';
                } else {
                    //Check whether the selected clinic is the already selected clinic
                    if($this->midwifeModel->findClinicByMidwife($data['newclinic'])){
                        $data['newclinic_err'] = 'Midwife is already working in the clinic';
                    }
                }

                if(empty($data['newclinic_err']) && empty($data['newphm_err'])){
                    //Transfer midwife
                    if(($this->midwifeModel->updatetransferMidwife($data)) && ($this->midwifeModel->addtransferMidwife($data)) && ($this->midwifeModel->updateMidwife($data))){
                        // redirect('midwifes/midwifeprofile/'.$nic.'', $data);
                        redirect('midwifes');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    $this->view('midwifes/midwife_transfer/'.$nic.'', $data);
                }

            } else {

                
                $midwife = $this->midwifeModel->getMidwifeByNic($nic);
                $clinics = $this->midwifeModel->getClinicsToTransfer($nic);
                $phms = $this->midwifeModel->getPHMsToTransfer();
                $postclinic = $this->midwifeModel->getMidwifeClinicByMidwife($nic);
                $history = $this->midwifeModel->getWorkingHistory($nic);
               // $postclinic = $this->midwifeModel->getMidwifeClinicByMidwife($nic);

                $data =[
                    'midwife' => $midwife,
                    'clinics' => $clinics,
                    'phms' => $phms,
                    'newclinic' => '',
                    'newphm' => '',
                    'newclinic_err' => '',
                    'newphm_err' => '',
                    'history' => $history
                ];

                
            }
            

            $this->view('midwifes/midwife_transfer', $data);
        }






  

        public function createMidwifeSession($midwife){
            $_SESSION['midwife_id'] = $midwife->midwife_id;
            $_SESSION['midwife_nic'] = $midwife->nic;
            $_SESSION['midwife_name'] = $midwife->name;
            $_SESSION['midwife_clinic'] = $midwife->clinic;
          
            redirect('expectantRecords');
            //redirect('clinicattendees/'.$clinicattendee->id.'');
        }

        
        // public function createMidwifeSession($midwife) {
        //     $_SESSION['midwife_id'] = $midwife->midwife_id;
        //     $_SESSION['midwife_nic'] = $midwife->nic;
        //     $_SESSION['midwife_name'] = $midwife->name;
        //     $_SESSION['midwife_clinic'] = $midwife->clinic;
        //    // $_SESSION['midwife_gnd'] = $this->getMidwifeGnd($midwife->midwife_id);
        //     redirect('expectantRecords');
        // }
        
        

        
    }
