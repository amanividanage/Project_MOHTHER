<?php
    class Childrens extends Controller{
        public function __construct(){

            $this->clinicattendeeModel = $this->model('Clinicattendee');
            $this->childrenModel = $this->model('Children');
            $this->midwifeModel = $this->model('Midwife');
        }

        public function index(){
            $children = $this->childrenModel->getChildren();

            $data = [
                'children' => $children
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
                if(empty($data['relationship'])){
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
                }

                //Make sure no errors
                if(empty($data['name_err']) && empty($data['nic_err']) &&empty($data['contactno_err']) && empty($data['email_err']) && empty($data['gnd_err']) && empty($data['phm_err'])){
                    
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

        public function add($nic){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process form
                
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $parents = $this->childrenModel->getParentById($nic);

                $data=[
                    'parents'=>$parents,
                    'midwife_id'=>$_SESSION['midwife_id'],
                    'parent' => $nic,
                    'name'=>trim($_POST['name']),
                    'dob'=>trim($_POST['dob']), 
                    'date'=>trim($_POST['date']),
                    'hospital'=>trim($_POST['hospital']),
                    'weight'=>trim($_POST['weight']),
                    'circumference'=>trim($_POST['circumference']),
                    'length'=>trim($_POST['length']),
                    'special'=>implode(",", $_POST['special']),
        
                    'name_err'=>'',
                    'dob_err'=>'', 
                    'date_err'=>'',
                    'hospital_err'=>'',
                    'weight_err'=>'',
                    'circumference_err'=>'',
                    'length_err'=>'',
                    //'special_err'=>'' 
                ];

                //Validate data
                if(empty($data['name'])){
                    $data['name_err']='please enter name';
                }

                if(empty($data['dob'])){
                    $data['dob_err']='please enter date of birth';
                }

                if(empty($data['date'])){
                    $data['date_err']='please enter registration date';
                }

                if(empty($data['hospital'])){
                    $data['hospital_err']='please enter birth hospital';
                }

                if(empty($data['weight'])){
                    $data['weight_err']='please enter birth weight in Kg';
                }
                
                if(empty($data['circumference'])){
                    $data['circumference_err']='please enter birth head circumference in cm';
                }

                if(empty($data['length'])){
                    $data['length_err'] = 'Please enter birth length in cm';
                }

                /*if(empty($data['special'])){
                    $data['special_err']='please enter special instance if any';
                }*/

                //Make sure no errors
                if(empty($data['name_err']) && empty($data['dob_err']) && empty($data['date_err']) && empty($data['hospital_err']) && empty($data['weight_err']) && empty($data['circumference_err']) && empty($data['length_err'])){
                    
                    //register child
                    if($this->childrenModel->add($data)){
                        redirect('childrens');
                    } else {
                        die('Someting went wrong');
                    }
 
                } else{
                     // Load view with errors
                     $this->view('childrens/add', $data);
                }

            } else {
                //init data
                $parents = $this->childrenModel->getParentById($nic);
                $data=[
                    'parents'=>$parents,
                    'name'=>'',
                    'dob'=>'', 
                    'date'=>'',
                    'hospital'=>'',
                    'weight'=>'',
                    'circumference'=>'',
                    'length'=>'',
                    'address'=>'',
                    'special'=>'',
        
                    'name_err'=>'',
                    'dob_err'=>'', 
                    'date_err'=>'',
                    'hospital_err'=>'',
                    'weight_err'=>'',
                    'circumference_err'=>'',
                    'length_err'=>'',
                    //'special_err'=>''
                ];

                // Load view
                $this->view('childrens/add', $data);
            }
        }

        public function report($id){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process form
                
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $child = $this->childrenModel->getChildById($id);

                $data=[
                    'child'=>$child,
                    'child_id' => $id,
                    'date' => trim($_POST['date']),
                    'reportno'=>trim($_POST['reportno']),
                    'skin'=>trim($_POST['skin']), 
                    'eye'=>trim($_POST['eye']),
                    'temp'=>trim($_POST['temp']),
                    'umbilicus'=>trim($_POST['umbilicus']),
                    'other'=>trim($_POST['other']),
        
                    'date_err'=>'',
                    'reportno_err'=>'', 
                    'skin_err'=>'',
                    'eye_err'=>'',
                    'temp_err'=>'',
                    'umbilicus_err'=>'',
                    'other_err'=>''
                ];

                //Validate data
                if(empty($data['date'])){
                    $data['date_err']='please enter date of registration';
                }

                if(empty($data['reportno'])){
                    $data['reportno_err']='please enter report no';
                }

                if(empty($data['skin'])){
                    $data['skin_err']='please enter nature of the skin color';
                }

                if(empty($data['eye'])){
                    $data['eye_err']='please enter nature of the eye sight ';
                }

                if(empty($data['temp'])){
                    $data['temp_err']='please enter body temperature of the baby';
                }
                
                if(empty($data['umbilicus'])){
                    $data['umbilicus_err']='please enter nature of the umbilicus of the baby';
                }

                //Make sure no errors
                if(empty($data['date_err']) && empty($data['reportno_err']) && empty($data['skin_err']) && empty($data['eye_err']) && empty($data['temp_err']) && empty($data['umbilicus_err'])){
                    
                    //register child
                    if($this->childrenModel->addReport($data)){
                        redirect('childrens/childprofile/'.$id.'');
                    } else {
                        die('Someting went wrong');
                    }
 
                } else{
                     // Load view with errors
                     $this->view('childrens/report', $data);
                }

                
            } else {
                $child = $this->childrenModel->getChildById($id);
                //init data
                $data=[
                    'child'=>$child,
                    'date'=>'',
                    'reportno'=>'', 
                    'skin'=>'',
                    'eye'=>'',
                    'temp'=>'',
                    'umbilicus'=>'',
                    'other'=>'',

                    'date_err'=>'',
                    'reportno_err'=>'', 
                    'skin_err'=>'',
                    'eye_err'=>'',
                    'temp_err'=>'',
                    'umbilicus_err'=>'',
                    'other_err'=>''
                ];

                // Load view
                $this->view('childrens/report', $data);
            }
        }

        public function parentlist(){
            $parents = $this->childrenModel->getParentList();
            
            $data = [
                'parents' => $parents
            ];

            $this->view('childrens/parentlist', $data);
        }

        public function parentprofile($nic){
            $parents = $this->childrenModel->getParentById($nic);
            $children = $this->childrenModel->getChildrenByParent($nic);

            $data = [
                'parents' => $parents,
                'children' => $children
            ];

            $this->view('childrens/parentprofile', $data);
        }

        public function childprofile($id){
            $child = $this->childrenModel->getChildById($id);
            $records = $this->childrenModel->getReportListByChild($id);
            // $age = $this->childrenModel->getAgeByChild($id);

            $data = [
                'child' => $child,
                'records' => $records,
                // 'age' => $age
            ];

            $this->view('childrens/childprofile', $data);
        }

        public function vaccination($id){
            $child = $this->childrenModel->getChildById($id);

            $data = [
                 'child' => $child
            ];

            $this->view('childrens/vaccination', $data);
        }

        
    }