<?php
    class Childrens_expectant extends Controller{
        public function __construct(){

            $this->clinicattendeeModel = $this->model('Clinicattendee');
            $this->childrenModel = $this->model('Children');
            $this->midwifeModel = $this->model('Midwife');
            $this->expectantRecordModel = $this->model('ExpectantRecord');
        }

        public function index(){
            $children = $this->childrenModel->getChildren();

            $data = [
                'children' => $children
            ];

            $this->view('childrens/index', $data);
        }

        

        public function add($nic){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Process form
                
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                
                $expectant = $this->expectantRecordModel->displayExpectantRecords($nic);
                $findPHM = $this->childrenModel-> findPHM();

                $data=[
                    'expectant'=>$expectant,
                    'phm'=>$findPHM->phm,
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
                        redirect('childrens_expectant');
                    } else {
                        die('Someting went wrong');
                    }
 
                } else{
                     // Load view with errors
                     $this->view('childrens_expectant/add', $data);
                }

            } else {
                //init data
                $expectant = $this->expectantRecordModel->displayExpectantRecords($nic);
                $data=[
                    'expectant'=>$expectant,
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
                $this->view('childrens_expectant/add', $data);
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