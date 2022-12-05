<?php
    class Childrens extends Controller{
        public function __construct(){

            //$this->clinicattendeeModel = $this->model('Clinicattendee');
            $this->childrenModel = $this->model('Children');
            $this->midwifeModel = $this->model('Midwife');
        }

        public function index(){
            

            $data = [
                
            ];

            $this->view('childrens/index', $data);
        }

        public function parent(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process form
                
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data =[
                    'midwife_id'=>$_SESSION['midwife_id'],
                    'relationship'=>trim($_POST['relationship']),
                    'name'=>trim($_POST['name']),
                    'nic'=>trim($_POST['nic']), 
                    'age'=>trim($_POST['age']),
                    'nochildren'=>trim($_POST['nochildren']),
                    'levelofeducation'=>trim($_POST['levelofeducation']),
                    'occupation'=>trim($_POST['occupation']),
                    'contactno'=>trim($_POST['contactno']),
                    'address'=>trim($_POST['address']),
                    'email'=>trim($_POST['email']),
                    'gnd'=>trim($_POST['gnd']),
                    'phm' => trim($_POST['phm']),
                    'password' => trim($_POST['password']),

        
                    'relationship_err'=>'',
                    'name_err'=>'',
                    'nic_err'=>'', 
                    'age_err'=>'',
                    'nochildren_err'=>'',
                    'levelofeducation_err'=>'',
                    'occupation_err'=>'',
                    'contactno_err'=>'',
                    'address_err'=>'',
                    'email_err'=>'',
                    'gnd_err'=>'',
                    'phm_err' => '',
                    'password_err' => ''
                ];
                
                //Validate data
                /*if(empty($data['relationship'])){
                    $data['relationship_err']='please enter relationship to the child';
                }

                if(empty($data['name'])){
                    $data['name_err']='please enter name';
                }

                if(empty($data['nic'])){
                    $data['nic_err'] = 'Please enter an identity number';
                } elseif(strlen($data['nic']) < 10){
                    $data['nic_err'] = 'Please enter valid ID number';
                } else {
                    //Check identity no
                    if($this->clinicattendeeModel->findClinicAttendeeByNic($data['nic'])){
                        $data['nic_err'] = 'Id is already registered as a expectant mother';
                    } elseif($this->childrenModel->findParentByNic($data['nic'])){
                        $data['nic_err'] = 'Id is already taken';
                    }
                }

                if(empty($data['age'])){
                    $data['age_err']='please enter age';
                }

                if(empty($data['nochildren'])){
                    $data['nochildren_err']='please enter no of children';
                }

                if(empty($data['levelofeducation'])){
                    $data['levelofeducation_err']='please select level of education';
                }

                if(empty($data['occupation'])){
                    $data['occupation_err']='please enter occupation';
                }

                if(empty($data['contactno'])){
                    $data['contactno_err'] = 'Please enter a phone number';
                } elseif(strlen($data['contactno']) < 10){
                    $data['contactno_err'] = 'Please enter valid phone number';
                }
                
                if(empty($data['address'])){
                    $data['address_err']='please enter address';
                }

                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter an E-mail';
                }

                if(empty($data['gnd'])){
                    $data['gnd_err']='please enter garama niladharii area';
                }

                if(empty($data['phm'])){
                    $data['phm_err']='please enter phm';
                }

                if(empty($data['password'])){
                    $data['password_err']='please enter password';
                }*/

                //Make sure no errors
                if(/*empty($data['name_err']) && empty($data['nic_err']) &&empty($data['contactno_err']) && empty($data['email_err']) &&*/ empty($data['gnd_err']) && empty($data['phm_err'])){
                    
                   $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //register clinic attendee
                    if($this->childrenModel->parent($data)){
                        redirect('childrens/parentlist');
                    } else {
                        die('Someting went wrong');
                    }

                } else{
                    // Load view with errors
                    $this->view('childrens/parent', $data);
                }
            
            
            
            } else {
                //Init data
                $data =[
                    'relationship'=>'',
                    'name'=>'',
                    'nic'=>'', 
                    'age'=>'',
                    'nochildren'=>'',
                    'levelofeducation'=>'',
                    'occupation'=>'',
                    'contactno'=>'',
                    'address'=>'',
                    'email'=>'',
                    'gnd'=>'',
                    'phm' =>'',
                    'password' =>'',
        
                    'relationship_err'=>'',
                    'name_err'=>'',
                    'nic_err'=>'', 
                    'age_err'=>'',
                    'nochildren_err'=>'',
                    'levelofeducation_err'=>'',
                    'occupation_err'=>'',
                    'contactno_err'=>'',
                    'address_err'=>'',
                    'email_err'=>'',
                    'gnd_err'=>'',
                    'phm_err' => '',
                    'password_err' => ''
                ];
                
                // Load view
                $this->view('childrens/parent', $data);
            }
            
        }

        public function add(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

            } else {
                //init data
                $data=[

                ];

                // Load view
                $this->view('childrens/add', $data);
            }
        }

        public function parentlist(){
            $parents = $this->childrenModel->getParentList();
            
            $data = [
                'parents' => $parents
            ];

            $this->view('childrens/parentlist', $data);
        }

        public function parentprofile($mnic){
            $parents = $this->childrenModel->getParentById($mnic);

            $data = [
                'parents' => $parents
            ];

            $this->view('childrens/parentprofile', $data);
        }
    }