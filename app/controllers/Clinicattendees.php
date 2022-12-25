<?php
    class Clinicattendees extends Controller {
        public function __construct(){

            $this->clinicattendeeModel = $this->model('Clinicattendee');
            $this->expectantRecordModel = $this->model('ExpectantRecord');
        }

        public function index(){
            //Get clinic attendee
           //$clinicattendee = $this->clinicattendeeModel->getClinicAttendeeByNic($nic);
            $children =  $this->clinicattendeeModel->getchild_list();
            $report = $this->clinicattendeeModel->getReport();

            $data = [
              // 'clinicattendee' => $clinicattendee
              'children' => $children,
              'report'  => $report
            ];

            $this->view('clinicattendees/index', $data);
        }

        public function profile(){
            $profile =  $this->clinicattendeeModel->getProfile();

            $data = [
                'profile' => $profile
            ];

            $this->view('clinicattendees/profile', $data);
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
                    $data['mname_err']='please enter your name';
                }

                if(empty($data['nic'])){
                    $data['nic_err'] = 'Please enter an identity number';
                } elseif(strlen($data['nic']) < 10){
                    $data['nic_err'] = 'Please enter valid ID number';
                } else {
                    //Check identity no
                    if($this->clinicattendeeModel->findClinicAttendeeByNic($data['nic'])){
                        $data['nic_err'] = 'Id is already taken';
                    }
                }

                if(empty($data['mage'])){
                    $data['mage_err']='please enter your age';
                }

                if(empty($data['gravidity'])){
                    $data['gravidity_err']='please enter your no of pregnancies';
                }

                if(empty($data['mlevelofeducation'])){
                    $data['mlevelofeducation_err']='please select your level of education';
                }

                if(empty($data['moccupation'])){
                    $data['moccupation_err']='please enter your occupation';
                }

                if(empty($data['mcontactno'])){
                    $data['mcontactno_err'] = 'Please enter a phone number';
                } elseif(strlen($data['mcontactno']) < 10){
                    $data['mcontactno_err'] = 'Please enter valid phone number';
                }
                
                if(empty($data['address'])){
                    $data['address_err']='please enter your address';
                }
        
                if(empty($data['memail'])){
                    $data['memail_err'] = 'Please enter an E-mail';
                }

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
                    $data['hcontactno_err']='please enter contact no';
                } elseif(strlen($data['hcontactno']) < 10){
                    $data['hcontactno_err'] = 'Please enter valid phone number';
                }


                if(empty($data['hemail'])){
                    $data['hemail_err']='please enter an e-mail';
                }

                if(empty($data['gnd'])){
                    $data['gnd_err']='please enter garama niladharii area';
                }

               

                //Make sure no errors
                if(empty($data['mname_err']) && empty($data['nic_err']) &&empty($data['mcontactno_err']) && empty($data['memail_err']) && empty($data['gnd_err'])){
                    
                    // $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //register clinic attendee
                    if($this->clinicattendeeModel->register($data)){
                        redirect('');
                    } else {
                        die('Someting went wrong');
                    }

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
                    'gnd_err'=>''
                    
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
                    $data['nic_err'] = 'Please enter an identity number';
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
        $records = $this->clinicattendeeModel->getReportListByChild($id);

        $data = [
            'id' => $id,
            'child' => $child,
            'records' => $records
        ];

        $this->view('clinicattendees/child', $data);
    }

    public function childreport($id,$reportno){
        $child =  $this->clinicattendeeModel->getChildById($id);
        $records = $this->clinicattendeeModel->getReportListByChild($id);
        $detailrecord =  $this->clinicattendeeModel->getReportByChild($id,$reportno);

        $data = [
            'id' => $id,
            'child' => $child,
            'records' => $records,
            'detailrecord' => $detailrecord
        ];

        $this->view('clinicattendees/childreport', $data);
    }
    
    public function session(){
       

        $data = [
            
        ];

        $this->view('clinicattendees/session', $data);
    }

    public function cliniccalendar(){
       

        $data = [
            
        ];

        $this->view('clinicattendees/cliniccalendar', $data);
    }
    
    public function child_chart(){
       

        $data = [
            
        ];

        $this->view('clinicattendees/child_chart', $data);
    }
    
    public function child_vaccination(){
       

        $data = [
            
        ];

        $this->view('clinicattendees/child_vaccination', $data);
    }
    
    public function timeslot_mothlyclinic(){
       

        $data = [
            
        ];

        $this->view('clinicattendees/timeslot_mothlyclinic', $data);
    }
    
    public function request(){
       

        $data = [
            
        ];

        $this->view('clinicattendees/request', $data);
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
        unset($_SESSION['clinicattendee_identity']);
        unset($_SESSION['clinicattendee_name']);
        session_destroy();
        redirect('');
    }

    

}

