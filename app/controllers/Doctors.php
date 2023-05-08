<?php
    class Doctors extends Controller{
        public function __construct(){

            $this->clinicModel = $this->model('Clinic');
            $this->doctorModel = $this->model('Doctor');
        }

        public function index(){
            //Check if its a search
            $find = false;
            if(isset($_GET['search'])){
                $search = addslashes($_GET['search']);
                $find = true;

                if($find){
                    $doctors = $this->doctorModel->searchDoctors($search);
    
                    $data = [
                        'doctors' => $doctors
                    ];
                    
                    $this->view('doctors/index', $data);
                } 
            } else {
                //Get doctors
                $doctors = $this->doctorModel->getDoctors();

                $data = [
                    'doctors' => $doctors
                ];

                $this->view('doctors/index', $data);
            }
            
        }

        public function doctorprofile($nic){
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $doctor = $this->doctorModel->getDoctorByNic($nic);
                $postclinic = $this->doctorModel->getDoctorClinicByDoctor($nic);

                //Init data
                $data = [
                    'doctor' => $doctor,
                    'nic' => $nic,
                    'clinic' => $postclinic->clinic,
                    'appdate' => $postclinic->appdate,
                    'newclinic' => trim($_POST['newclinic']),
                    'newclinic_err' => '',
                    'transdate'=> date("Y-m-d"),
                ];

                //validate data
                if(empty($data['newclinic'])){
                    $data['newclinic_err'] = 'Please select a clinic';
                } else {
                    //Check whether the selected clinic is the already selected clinic
                    if($this->doctorModel->findClinicByDoctor($data['newclinic'])){
                        $data['newclinic_err'] = 'Doctor is already working in the clinic';
                    }
                }

                if(empty($data['newclinic_err'])){
                    //Transfer doctor
                    if(($this->doctorModel->updatetransferDoctor($data)) && ($this->doctorModel->addtransferDoctor($data)) && ($this->doctorModel->updateDoctor($data))){
                        redirect('doctors/doctorprofile/'.$nic.'', $data);
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    $this->view('doctors/doctorprofile/'.$nic.'', $data);
                }

            } else {

                $doctor = $this->doctorModel->getDoctorByNic($nic);
                $clinic = $this->doctorModel->getClinicByDoctor($nic);
                $clinics = $this->doctorModel->getClinicsToTransfer($nic);
                $history = $this->doctorModel->getWorkingHistory($nic);
                
                $workperiod = array(); 
                foreach ($history as $index => $historyItem) {
                    $workperiod[$index] = $this->doctorModel->calculateWorkPeriod($historyItem->appdate, $historyItem->transdate);
                }
                

                $data = [
                    'doctor' => $doctor,
                    'clinic' => $clinic,
                    'clinics' => $clinics,
                    'newclinic_err' => '',
                    'history' => $history,
                    'workperiod' => $workperiod,
                ];

                $this->view('doctors/doctorprofile', $data);
            }
            
            

            
            

            

            // if(empty($data['clinic'])){
            //     $this->view('doctors/doctorprofile', $data);
            // } else {
            //     $this->view('doctors/doctorprofile', $data);
            // }

            // $this->view('doctors/doctorprofile', $data);
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
                    'clinic_err' => '',
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
                    if($this->doctorModel->findDoctorBynic($data['nic'])){
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
                    if($this->doctorModel->findDoctorByEmail($data['email'])){
                        $data['email_err'] = 'E-mail is already taken';
                    }
                }

                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                } elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be at least 6 characters'; 
                }



                //Make sure no errors
                if(empty($data['name_err']) && empty($data['nic_err']) && empty($data['phone_err']) && empty($data['email_err']) && empty($data['password_err'])){
                    //validated

                    sendmail($data);
                    
                    //Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    //Register User
                    if($this->doctorModel->addDoctor($data) AND $this->doctorModel->addUser($data)){
                        
                        redirect('doctors');
                    } else {
                        die('Someting went wrong');
                    }

                } else {
                    //Load view with errors
                    $this->view('doctors/add', $data);
                }

            } else {
                // $clinics = $this->clinicModel->getClinics();
                //Init data
                $data = [
                    'name' => '',
                    'nic' => '',
                    'phone' => '',
                    'email' => '',
                    'password' => '',
                    'clinic' => '',
                    'name_err' => '',
                    'nic_err' => '',
                    'phone_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'regdate' => '',
                    'clinic_err' => '',
                    'active'=>''
                ];

                //Load view
                $this->view('doctors/add', $data);
            }
        }

        public function delete($nic){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                date_default_timezone_set('Asia/Colombo');
                $data = [
                    'date' => date("Y-m-d"), 
                    'nic' => $nic,
                ];

                if($this->doctorModel->deleteFromDoctorClinic($nic) && $this->doctorModel->setTerminatedDate($data) && $this->doctorModel->updateDoctorActive($nic) && $this->doctorModel->deleteFromUser($nic)){
                    redirect('doctors');
                } else {
                    die('Something went wrong');
                } 
            }else {
                redirect('midwifes');
            }
        }

        

        
    }
