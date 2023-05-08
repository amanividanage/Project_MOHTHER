<?php
    class DoctorRecords extends Controller{
        public function __construct(){

            
            $this->doctorRecordModel = $this->model('DoctorRecord');
            $this->expectantRecordModel = $this->model('ExpectantRecord');
            $this->clinicModel = $this->model('Clinic');
            $this->doctorModel = $this->model('Doctor');
            $this->midwifeModel = $this->model('Midwife');
            $this->childrenModel = $this->model('Children');
        }

        public function index(){
            

            $data = [
                
            ];
         
      
            $this->view('doctorRecords/index', $data);
        }

        public function dashboard(){
            
            $expectant = $this->doctorRecordModel->getTotalExpectanat(); 
            $children = $this->doctorRecordModel->getTotalChildren(); 
            $risky = $this->doctorRecordModel->calculateRiskyCount();
            // $child_deaths = $this->expectantRecordModel->getTotalChildDeaths(); 
            // $chart = $this->expectantRecordModel->calculateParentAndExpectantMotherCount();
            $chart2 = $this->doctorRecordModel->calculateSpecialChildren();
            // $chart3 = $this->doctorRecordModel->calculateRiskyCount();
            $highrisk_list = $this->doctorRecordModel->getHighRiskList();
            $moderaterisk_list = $this->doctorRecordModel->getModerateRiskList();

            $data = [
                'expectant' => $expectant,
                'children' => $children,
                'risky' => $risky,
                // 'child_deaths' => $child_deaths,
                // 'chart' => $chart,
                'chart2' => $chart2,
                'highrisk_list' => $highrisk_list,
                'moderaterisk_list' => $moderaterisk_list,
            ];
         
      
            $this->view('doctorRecords/dashboard', $data);
        }

        public function expectantmothers(){
            
            $mothers = $this->doctorRecordModel->getExpectantMothers();

            $data = [
                'mothers' => $mothers
            ];
         
      
            $this->view('doctorRecords/expectantmothers', $data);
        }

        public function info($nic){
            
            $mother = $this->doctorRecordModel->getExpectantMotherByNic($nic);
            $children = $this->doctorRecordModel->getChildrenByExpectantMother($nic);

            $midwiferecords = $this->doctorRecordModel->getMidwifeRecordsByMother($nic);
            $doctorrecords = $this->doctorRecordModel->getDoctorRecordsByMother($nic);

            $date = $this->doctorRecordModel-> getPrgnantMotherByNic($nic); 
            $poa = $this->doctorRecordModel-> calculatePOA($date->poa, $date->registrationDate);

            

            $bplimit = array(); // Initialize an empty array to store the blood pressure limits
            $bmilimit = array(); // Initialize an empty array to store the BMI limits
            $risky = array(); // Initialize an empty array to store the risk status
        
            // Loop through the $midwiferecords array and calculate the values for each index
            foreach ($midwiferecords as $index => $midwiferecordsItem) {
                $bplimit[$index] = $this->doctorRecordModel->calculateBloodPressure($midwiferecordsItem->bp);
                $bmilimit[$index] = $this->doctorRecordModel->calculateBMILimit($midwiferecordsItem->bmi);
                $risky[$index] = $this->doctorRecordModel->calculateRisky($bplimit[$index], $bmilimit[$index]);
            }



            $data = [
                'mother' => $mother,
                'children' => $children,

                'midwiferecords' => $midwiferecords,
                'doctorrecords' => $doctorrecords,
                'poa' => $poa,

                'bplimit' => $bplimit,
                'bmilimit' => $bmilimit,
                'risky' => $risky,
            ];
         
      
            $this->view('doctorRecords/info', $data);
        }

        
        public function mother_vaccination($nic){

            $mother = $this->doctorRecordModel->getPrgnantMotherByNic($nic);
            $vaccines = $this->doctorRecordModel->getMotherVaccines();
            $buttonactive = $this->doctorRecordModel->activateButton($nic);
            $buttondeactive = $this->doctorRecordModel->deactivateButton($nic);
      
      
            $data = [
                'mother'=> $mother,
                'vaccines' => $vaccines,
                'buttonactive' => $buttonactive,
                'buttondeactive' => $buttondeactive,
      
                
            ];
      
            $this->view('doctorRecords/mother_vaccination', $data);
      
        }

        public function doctor_profile(){
            if($_SERVER["REQUEST_METHOD"] == 'POST'){
                //Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'edit-name' => trim($_POST['edit-name']),
                    'edit-phone' => trim($_POST['edit-phone']),
                    'edit-email' => trim($_POST['edit-email']),
                    'edit-name_err' => '',
                    'edit-phone_err' => '',
                    'edit-email_err' => '',
                    
                ];

                //validate data
                // if(empty($data['clinic_name'])){
                //     $data['clinic_name_err'] = 'Please enter the name';
                // }

                // if(empty($data['gnd'])){
                //     $data['gnd_err'] = 'Please select the Grama Niladhari Division';
                // } else{
                //     //Check for gnd repetition
                //     if($this->clinicModel->findCilinicByGnd($data['gnd'])){
                //         $data['gnd_err'] = 'Clinic is already there for this gnd, Can not make another clinic for this gnd';
                //     }
                // }

                // if(empty($data['location'])){
                //     $data['location_err'] = 'Please enter the address';
                // }


                //Make sure no errors
                if(empty($data['edit-name_err']) && empty($data['edit-phone_err']) && empty($data['edit-email_err'])){
                    if($this->doctorRecordModel->editDoctor($data)){
                        //flash('clinic_added', 'Clinic Added');
                        redirect('doctorRecords/doctor_profile');
                        //header("Location: http://localhost/moh/clinics");
                        //exit();
                    } else {
                        die('Someting went wrong');
                    }
                } else {
                    //Load view with errors
                    $this->view('doctorRecords/doctor_profile', $data);
                }

            } else {
                $doctorprofile = $this->doctorRecordModel->getProfileDoctor();
                $doctorclinic = $this->doctorRecordModel->getDoctorClinic();

                $data = [
                    'doctorprofile' => $doctorprofile,
                    'doctorclinic' => $doctorclinic,
                ];
            
        
                $this->view('doctorRecords/doctor_profile', $data);

            }
                
        }

        
        public function changepassword(){
            if($_SERVER["REQUEST_METHOD"] == 'POST'){
                //Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
                $data = [
                    'current-password' => trim($_POST['current-password']),
                    'new-password' => trim($_POST['new-password']),
                    'confirm-password' => trim($_POST['confirm-password']),
                    'current-password_err' => '',
                    'new-password_err' => '',
                    'confirm-password_err' => '',
                ];
        
                // Retrieve the hashed password from the database
                $hashed_password = $this->doctorRecordModel->getDoctorPassword();
        
                // Validate the current password
                if (!password_verify($data['current-password'], $hashed_password)) {
                    $data['current-password_err'] = 'Current password is incorrect';
                }
        
                //validate data
        
                if(empty($data['new-password'])){
                    $data['new-password_err'] = 'Please enter a password';
                } elseif(strlen($data['new-password']) < 8){
                    $data['new-password_err'] = 'Password must be at least 8 characters long';
                } elseif(!preg_match('/[A-Z]/', $data['new-password'])){
                    $data['new-password_err'] = 'Password must contain at least one uppercase letter';
                } elseif(!preg_match('/[a-z]/', $data['new-password'])){
                    $data['new-password_err'] = 'Password must contain at least one lowercase letter';
                } elseif(!preg_match('/[0-9]/', $data['new-password'])){
                    $data['new-password_err'] = 'Password must contain at least one number';
                } elseif(!preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $data['new-password'])){
                    $data['new-password_err'] = 'Password must contain at least one special character';
                } elseif(empty($data['confirm-password'])) {
                    $data['confirm-password_err'] = 'Please confirm your password';
                } elseif($data['new-password'] !== $data['confirm-password']){
                    $data['confirm-password_err'] = 'Passwords do not match';
                }
        
                //Make sure no errors
                if(empty($data['confirm-password_err']) && empty($data['new-password_err']) && empty($data['current-password_err'])){

                    //Hash password
                    $data['new-password'] = password_hash($data['new-password'], PASSWORD_DEFAULT);

                    if($this->doctorRecordModel->editDoctorPassword($data) AND $this->doctorRecordModel->editUserPassword($data)){
                    //     //flash('clinic_added', 'Clinic Added');
                        redirect('doctorRecords/doctor_profile');
                    //     //header("Location: http://localhost/moh/clinics");
                    //     //exit();
                    } else {
                        die('Someting went wrong');
                    }
                } else {
                    //Load view with errors
                    $this->view('doctorRecords/changepassword', $data);
                }
        
            } else {
                $data = [
                    'current-password' => '',
                    'new-password' => '',
                    'confirm-password' => '',
                    'current-password_err' => '',
                    'new-password_err' => '',
                    'confirm-password_err' => '',
                ];
            
        
                $this->view('doctorRecords/changepassword', $data);
        
            }
                
        }
        
        public function childrens(){
            
            $children = $this->doctorRecordModel->getAllChildren();

            $data = [
                'children' => $children
            ];
         
      
            $this->view('doctorRecords/childrens', $data);
        }

        public function child($id){
            
            $child = $this->doctorRecordModel->getchildById($id);
            $midwiferecords = $this->doctorRecordModel->getMidwifeRecordsByChild($id);
            $doctorrecords = $this->doctorRecordModel->getDoctorRecordsByChild($id);
            $age = $this->doctorRecordModel->calculateAge($child->dob);

            // $check_doctorreport = $this->doctorRecordModel->checkDoctorReport($id, $doctorrecords->date);


            $data = [
                'child' => $child,
                'midwiferecords' => $midwiferecords,
                'doctorrecords' => $doctorrecords,
                'age' => $age,
                // 'check_doctorreport' => $check_doctorreport,
                
            ];
         
      
            $this->view('doctorRecords/child', $data);
        }
        
        public function childreport($id){
            if($_SERVER["REQUEST_METHOD"] == 'POST'){
                //Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $child = $this->doctorRecordModel->getchildById($id);
                date_default_timezone_set('Asia/Colombo');

                $data = [
                    'child' => $child,
                    'child_id' => $id,
                    'date' => date("Y-m-d"),
                    'eye1' => trim($_POST['eye1']),
                    'eye2' => trim($_POST['eye2']),
                    'eye3' => trim($_POST['eye3']),
                    'eye4' => trim($_POST['eye4']),
                    'leftear' => trim($_POST['leftear']),
                    'rightear' => trim($_POST['rightear']),
                    'teeth1' => trim($_POST['teeth1']),
                    'teeth2' => trim($_POST['teeth2']),
                    'heart' => trim($_POST['heart']),
                    'lungs' => trim($_POST['lungs']),
                    'hip' => trim($_POST['hip']),
                    'other1' => trim($_POST['other1']),
                    'other2' => trim($_POST['other2']),

                    'eye1_err' => '',
                    'eye2_err' => '',
                    'eye3_err' => '',
                    'eye4_err' => '',
                    'leftear_err' => '',
                    'rightear_err' => '',
                    'teeth1_err' => '',
                    'teeth2_err' => '',
                    'heart_err' => '',
                    'lungs_err' => '',
                    'hip_err' => '',
                    'other1_err' => '',
                    'other2_err' => '',

                ];

                //Validate data
                if(empty($data['eye1'])){
                    $data['eye1_err']='This feild cannot be null';
                }

                if(empty($data['eye2'])){
                    $data['eye2_err']='This feild cannot be null';
                }

                if(empty($data['eye3'])){
                    $data['eye3_err']='This feild cannot be null';
                }

                if(empty($data['eye4'])){
                    $data['eye4_err']='This feild cannot be null';
                }

                if(empty($data['leftear'])){
                    $data['leftear_err']='This feild cannot be null';
                }
                
                if(empty($data['rightear'])){
                    $data['rightear_err']='This feild cannot be null';
                }

                if(empty($data['teeth1'])){
                    $data['teeth1_err']='This feild cannot be null';
                }

                if(empty($data['teeth2'])){
                    $data['teeth2_err']='This feild cannot be null';
                }

                if(empty($data['heart'])){
                    $data['heart_err']='This feild cannot be null';
                }

                if(empty($data['lungs'])){
                    $data['lungs_err']='This feild cannot be null';
                }

                if(empty($data['hip'])){
                    $data['hip_err']='This feild cannot be null';
                }
                
                if(empty($data['other1'])){
                    $data['other1_err']='This feild cannot be null';
                }

                //Make sure no errors
                if(empty($data['eye1_err']) && empty($data['other1_err']) && empty($data['hip_err']) && empty($data['lungs_err']) && empty($data['heart_err'])){
                    
                    //register child
                    if($this->doctorRecordModel->addChildReport($data)){
                        redirect('doctorRecords/child/'.$id.'');
                    } else {
                        die('Someting went wrong');
                    }
 
                } else{
                     // Load view with errors
                     $this->view('doctorRecords/childreport', $data);
                }

                

            } else {

                $child = $this->doctorRecordModel->getchildById($id);
                // $midwiferecords = $this->doctorRecordModel->getMidwifeRecordsByChild($id);

                $data = [
                    'child' => $child,
                    'eye1' => '',
                    'eye2' => '',
                    'eye3' => '',
                    'eye4' => '',
                    'leftear' => '',
                    'rightear' => '',
                    'teeth1' => '',
                    'teeth2' => '',
                    'heart' => '',
                    'lungs' => '',
                    'hip' => '',
                    'other1' => '',
                    'other2' => '',

                    'eye1_err' => '',
                    'eye2_err' => '',
                    'eye3_err' => '',
                    'eye4_err' => '',
                    'leftear_err' => '',
                    'rightear_err' => '',
                    'teeth1_err' => '',
                    'teeth2_err' => '',
                    'heart_err' => '',
                    'lungs_err' => '',
                    'hip_err' => '',
                    'other1_err' => '',
                    'other2_err' => '',

                ];
            
        
                $this->view('doctorRecords/childreport', $data);

            }
            
            
        }
        
        public function child_vaccination($id){
            
            $child = $this->doctorRecordModel->getchildById($id);
            $vaccines = $this->doctorRecordModel->getVaccine();
            $given_vaccines = $this->doctorRecordModel->getGivenVaccinesByChild($id);

            $data = [
                'child' => $child,
                'vaccines' => $vaccines,
                'given_vaccines' => $given_vaccines,
            ];
      
            $this->view('doctorRecords/child_vaccination', $data);
        }
            
        public function child_charts($id){
            $child = $this->doctorRecordModel->getChildById($id);
            $chart = $this->doctorRecordModel->getChartByChild($id);
            // $age = $this->childrenModel->calculateAge($child->dob);
            // $jsonChartData = json_encode($chart);

            // die($jsonChartData);

            $data = [
                'child' => $child,
                // // 'ageweight' => "['age','weight']",
                'chart' => $chart,
                // 'jsonChartData' => $jsonChartData
            ];

            $this->view('doctorRecords/child_charts', $data);
        }

        public function child_reports($id, $date){
            $child = $this->doctorRecordModel->getChildById($id);
            $midwiferecords = $this->doctorRecordModel->getMidwifeRecordsByChildAndDate($id, $date);
            $doctorrecords = $this->doctorRecordModel->getDoctorRecordsByChildAndDate($id, $date);
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

            $this->view('doctorRecords/child_reports', $data);
        }
        
        public function motherreport($nic){
            if($_SERVER["REQUEST_METHOD"] == 'POST'){
                //Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $mother = $this->doctorRecordModel->getPrgnantMotherByNic($nic);
                date_default_timezone_set('Asia/Colombo');

                $data = [
                    'mother' => $mother,
                    'nic' => $nic,
                    'date' => date("Y-m-d"),
                    'pallor' => trim($_POST['pallor']),
                    'fhs' => trim($_POST['fhs']),
                    'fm' => trim($_POST['fm']),
                    'ankle' => trim($_POST['ankle']),
                    'facial' => trim($_POST['facial']),
                    'delivary' => trim($_POST['delivary']),

                    'pallor_err' => '',
                    'fhs_err' => '',
                    'fm_err' => '',
                    'ankle_err' => '',
                    'facial_err' => '',
                    'delivary_err' => '',

                ];

                //Validate data
                if(empty($data['pallor'])){
                    $data['pallor_err']='This feild cannot be null';
                }

                if(empty($data['fhs'])){
                    $data['fhs_err']='This feild cannot be null';
                }

                if(empty($data['fm'])){
                    $data['fm_err']='This feild cannot be null';
                }

                if(empty($data['ankle'])){
                    $data['ankle_err']='This feild cannot be null';
                }

                if(empty($data['facial'])){
                    $data['facial_err']='This feild cannot be null';
                }
                
                if(empty($data['delivary'])){
                    $data['delivary_err']='This feild cannot be null';
                }

                

                //Make sure no errors
                if(empty($data['pallor_err']) && empty($data['fhs_err']) && empty($data['fm_err']) && empty($data['ankle_err']) && empty($data['delivary_err'])){
                    
                    //register child
                    if($this->doctorRecordModel->addMotherReport($data)){
                        redirect('doctorRecords/info/'.$nic.'');
                    } else {
                        die('Someting went wrong');
                    }
 
                } else{
                     // Load view with errors
                     $this->view('doctorRecords/motherreport', $data);
                }

                

            } else {

                $mother = $this->doctorRecordModel->getPrgnantMotherByNic($nic);
                // $midwiferecords = $this->doctorRecordModel->getMidwifeRecordsByChild($id);

                $data = [
                    'mother' => $mother,

                    'pallor' => '',
                    'fhs' => '',
                    'fm' => '',
                    'ankle' => '',
                    'facial' => '',
                    'delivary' => '',

                    'pallor_err' => '',
                    'fhs_err' => '',
                    'fm_err' => '',
                    'ankle_err' => '',
                    'facial_err' => '',
                    'delivary_err' => '',

                ];
            
        
                $this->view('doctorRecords/motherreport', $data);

            }
            
            
        }

        public function mother_reports($nic, $date){
            $mother = $this->doctorRecordModel->getPrgnantMotherByNic($nic);

            $midwiferecords = $this->doctorRecordModel->getMidwifeRecordsByMotherAndDate($nic, $date);
            $doctorrecords = $this->doctorRecordModel->getDoctorRecordsByMotherAndDate($nic, $date);

            $data = [
                'mother' => $mother,
                'midwiferecords' => $midwiferecords,
                'doctorrecords' => $doctorrecords,
            ];

            $this->view('doctorRecords/mother_reports', $data);
        }

        public function mother_charts($nic){
     
            $mother = $this->doctorRecordModel->getPrgnantMotherByNic($nic);
            $chart = $this->doctorRecordModel->getChartByMother($nic);
       
            $data = [
                 
                'mother'=> $mother,
                'chart'=> $chart
            ];
       
            $this->view('doctorRecords/mother_charts', $data);
        }

        
        


    }