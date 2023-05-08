<?php
    class Childrens extends Controller{
        public function __construct(){

            $this->clinicattendeeModel = $this->model('Clinicattendee');
            $this->childrenModel = $this->model('Children');
            $this->midwifeModel = $this->model('Midwife');
            $this->doctorRecordModel = $this->model('DoctorRecord');
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

                $gnd = $this->childrenModel->findGndByClinic($_SESSION['midwife_clinic']);
                $phm = $this->childrenModel->findPhmByMidwife($_SESSION['midwife_nic']);

                $findPHM = $this->childrenModel-> findPHM();

                $data =[
                    'phm'=>$findPHM->phm,
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
                    // 'gnd'=>trim($_POST['gnd']),
                    // 'phm' => trim($_POST['phm']),
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
                    $data['nic_err'] = 'Please enter an nic number';
                } elseif(strlen($data['nic']) < 10){
                    $data['nic_err'] = 'Please enter valid ID number';
                } else {
                    //Check nic no
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
                if(empty($data['name_err']) && empty($data['nic_err']) &&empty($data['contactno_err']) && empty($data['email_err'])){
                    // && empty($data['gnd_err']) && empty($data['phm_err'])
                   $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //register clinic attendee
                    if($this->childrenModel->parent($data) AND $this->childrenModel->addUser($data)){
                        redirect('childrens/parentlist');
                    } else {
                        die('Someting went wrong');
                    }

                } else{
                    // Load view with errors
                    $this->view('childrens/parent', $data);
                }
            
            
            
            } else {
                $gnd = $this->childrenModel->findGndByClinic($_SESSION['midwife_nic']);
                $phm = $this->childrenModel->findPhmByMidwife($_SESSION['midwife_nic']);
                //Init data
                $data =[
                    //'phm' =>$phm,
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
                    // 'gnd'=> $gnd,
                    // 'phm' =>$phm,
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
                    // 'gnd_err'=>'',
                    // 'phm_err' => '',
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
                $findPHM = $this->childrenModel-> findPHM();
                // $expectant = $this->expectantRecordModel->displayExpectantRecords($nic);

                $data=[
                    'parents'=>$parents,
                    // 'expectant'=>$expectant,
                    'phm'=>$findPHM->phm,
                    'parent' => $nic,
                    'name'=>trim($_POST['name']),
                    'dob'=>trim($_POST['dob']), 
                    'date'=>trim($_POST['date']),
                    'hospital'=>trim($_POST['hospital']),
                    'weight'=>trim($_POST['weight']),
                    'circumference'=>trim($_POST['circumference']),
                    'length'=>trim($_POST['length']),
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

                if (!empty($_POST['special'])) {
                    $data['special'] = implode(',', $_POST['special']);
                }

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
                date_default_timezone_set('Asia/Colombo');
              

                $data=[
                    'child'=>$child,
                    'child_id' => $id,
                    'date' => date("Y-m-d"),
                    // 'reportno'=>trim($_POST['reportno']),
                    'skin'=>trim($_POST['skin']), 
                    'eye'=>trim($_POST['eye']),
                    'temp'=>trim($_POST['temp']),
                    'umbilicus'=>trim($_POST['umbilicus']),
                    'weight'=>trim($_POST['weight']),
                    'other'=>trim($_POST['other']),
        
                    // 'date_err'=>'',
                    // 'reportno_err'=>'', 
                    'skin_err'=>'',
                    'eye_err'=>'',
                    'temp_err'=>'',
                    'umbilicus_err'=>'',
                    'weight_err'=>'',
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
                if(empty($data['date_err']) && empty($data['skin_err']) && empty($data['eye_err']) && empty($data['temp_err']) && empty($data['umbilicus_err'])){
                    
                    //register child
                    if($this->childrenModel->addReport($data) && $this->childrenModel->addChildren_age_weight($data)){
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
                    // 'reportno'=>'', 
                    'skin'=>'',
                    'eye'=>'',
                    'temp'=>'',
                    'umbilicus'=>'',
                    'weight'=>'',
                    'other'=>'',

                    'date_err'=>'',
                    // 'reportno_err'=>'', 
                    'skin_err'=>'',
                    'eye_err'=>'',
                    'temp_err'=>'',
                    'umbilicus_err'=>'',
                    'weight_err'=>'',
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
            $age = $this->childrenModel->calculateAge($child->dob);
            $months = $this->childrenModel->calculateMonths($child->dob);
            $checkvaccine = $this->childrenModel->checkvaccine($months);

            $check_doctorrecords = $this->doctorRecordModel->getDoctorRecordsByChild($id);

            $data = [
                'child' => $child,
                'records' => $records,
                'age' => $age,
                'months' => $months,
                'checkvaccine' => $checkvaccine,
                'check_doctorrecords' => $check_doctorrecords,
            ];

            $this->view('childrens/childprofile', $data);
        }
        
        public function children_charts($id){
            $child = $this->childrenModel->getChildById($id);
            $chart = $this->childrenModel->getChartByChild($id);
            // $age = $this->childrenModel->calculateAge($child->dob);
            // $jsonChartData = json_encode($chart);

            // die($jsonChartData);

            $data = [
                'child' => $child,
                // 'ageweight' => "['age','weight']",
                'chart' => $chart,
                // 'jsonChartData' => $jsonChartData
            ];

            $this->view('childrens/children_charts', $data);
        }

        public function vaccination($id){

            $child = $this->childrenModel->getChildById($id);
            $vaccines = $this->childrenModel->getVaccine();
            $months = $this->childrenModel->calculateMonths($child->dob);
            $buttonactive = $this->childrenModel->activateButton($months, $id);
            $buttondeactive = $this->childrenModel->deactivateButton($id);


            $data = [
                'child' => $child,
                'vaccines' => $vaccines,
                'months' => $months,
                'buttonactive' => $buttonactive,
                'buttondeactive' => $buttondeactive,

                'batch'=>'',
                'batch_err'=>''
            ];

            $this->view('childrens/vaccination', $data);

        }
    
        


        public function child_vaccination($id, $vaccination_id){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $child = $this->childrenModel->getChildById($id);
                date_default_timezone_set('Asia/Colombo');


                $data=[
                    'child'=>$child,
                    'child_id' => $id,
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
                    if($this->childrenModel->addChildVaccination($data)){
                        redirect('childrens/vaccination/'.$id.'');
                    } else {
                        die('Someting went wrong');
                    }
 
                } else{
                     // Load view with errors
                     $this->view('childrens/report', $data);
                }



            } else {

                $child = $this->childrenModel->getChildById($id);
                $vaccine = $this->childrenModel->getVaccineById($vaccination_id);
                // $months = $this->childrenModel->calculateMonths($child->dob);
                // $buttonactive = $this->childrenModel->activateButton($months);


                $data = [
                    'child' => $child,
                    'vaccine' => $vaccine,
                    // 'months' => $months,
                    // 'buttonactive' => $buttonactive,

                    'batch'=>'',
                    'batch_err'=>''
                ];

                $this->view('childrens/child_vaccination', $data);

            }
    
        }
        
        public function child_reports($id, $date){
            $child = $this->childrenModel->getChildById($id);
            $midwiferecords = $this->childrenModel->getMidwifeRecordsByChildAndDate($id, $date);
            $doctorrecords = $this->childrenModel->getDoctorRecordsByChildAndDate($id, $date);
            // $chart = $this->doctorRecordModel->getChartByChild($id);
            // $age = $this->childrenModel->calculateAge($child->dob);
            // $jsonChartData = json_encode($chart);

            // die($jsonChartData);

            $data = [
                'child' => $child,
                'midwiferecords' => $midwiferecords,
                'doctorrecords' => $doctorrecords,
                // 'chart' => $chart,
                // 'jsonChartData' => $jsonChartData
            ];

            $this->view('childrens/child_reports', $data);
        }
    }