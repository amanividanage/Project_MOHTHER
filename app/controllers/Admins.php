<?php
    class Admins extends Controller{
        public function __construct(){
            $this->adminModel = $this->model('Admin');
        }

        /*public function index(){
            //Get clinics 
            $admins = $this->adminModel->getAdmins();

            $data = [
                'admins' => $admins
            ];

            $this->view('admins/index', $data);
        }*/

        public function index(){

            //Check if its a search
            $find = false;
            if(isset($_GET['search'])){
                $search = addslashes($_GET['search']);
                $find = true;

                if($find){
                    $admins = $this->adminModel->searchAdmins($search);
    
                    $data = [
                        'admins' => $admins
                    ];
    
                    $this->view('admins/index', $data);
                } 
            } else {
                $admins = $this->adminModel->getAdmins();

                $data = [
                    'admins' => $admins
                ];

                $this->view('admins/index', $data);
            }

            /*if($find){
                $admins = $this->adminModel->searchAdmins();

                $data = [
                    'admins' => $admins
                ];

                $this->view('admins/index', $data);
            } else {
                $admins = $this->adminModel->getAdmins();

                $data = [
                    'admins' => $admins
                ];

                $this->view('admins/index', $data);
            }*/
        }
        
        public function dashboard(){

            $total_clinicattendees = $this->adminModel->calculateTotalClinicAttendees();
            $total_children = $this->adminModel->calculateTotalChildren();
            $chart = $this->adminModel->calculateParentAndExpectantMotherCount();
            $chart2 = $this->adminModel->calculateSpecialChildren();
            $chart3 = $this->adminModel->calculateStaff();
            $child_deaths = $this->adminModel->calculateChildDeaths();
            $mother_deaths = $this->adminModel->calculateMotherDeaths();
            $total_deaths = $this->adminModel->calculateTotalDeaths();

            $data = [
               'total_clinicattendees' => $total_clinicattendees,
               'total_children' => $total_children,
               'chart' => $chart,
               'chart2' => $chart2,
               'child_deaths' => $child_deaths,
               'mother_deaths' => $mother_deaths,
               'total_deaths' => $total_deaths,
               'chart3' => $chart3,
            ];

            $this->view('admins/dashboard', $data);
        }

        public function profile(){
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
                    if($this->adminModel->editAdmin($data)){
                        //flash('clinic_added', 'Clinic Added');
                        redirect('admins/profile');
                        //header("Location: http://localhost/moh/clinics");
                        //exit();
                    } else {
                        die('Someting went wrong');
                    }
                } else {
                    //Load view with errors
                    $this->view('admins/profile', $data);
                }

            } else {
                $adminprofile = $this->adminModel->getProfileAdmin();
                $data = [
                    'adminprofile' => $adminprofile,
                ];
            
        
                $this->view('admins/profile', $data);

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
                $hashed_password = $this->adminModel->getAdminPassword();
        
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

                    if($this->adminModel->editAdminPassword($data) AND $this->adminModel->editUserPassword($data)){
                    //     //flash('clinic_added', 'Clinic Added');
                        redirect('admins/profile');
                    //     //header("Location: http://localhost/moh/clinics");
                    //     //exit();
                    } else {
                        die('Someting went wrong');
                    }
                } else {
                    //Load view with errors
                    $this->view('admins/changepassword', $data);
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
            
        
                $this->view('admins/changepassword', $data);
        
            }
                
        }
        
        public function statistics(){

            $find = false;
            if(isset($_POST['vaccine'])){
                $vaccine = trim($_POST['vaccine']);
                $find = true;

                $newRegistrants = $this->adminModel->getNewRegistrantsMonthWise();
                $newRegistrantsYear = $this->adminModel->getNewRegistrantsYearWise();
                $newRegistrantsClinic = $this->adminModel->getNewRegistrantsClinicWise();
                // $vaccine = $this->adminModel->getTotalChildVaccination();

                if($find){
                    $vaccine = $this->adminModel->getChildVaccinatedByVaccine($vaccine);
    
                    $data = [
                        // 'vacc' => $vaccines,
                        'vaccine' => $vaccine,
                        'newRegistrants' => $newRegistrants,
                        'newRegistrantsYear' => $newRegistrantsYear,
                        'newRegistrantsClinic' => $newRegistrantsClinic,
                    ];
                    
                    $this->view('admins/Statistics', $data);
                } 
            } else {
                //Get doctors
                $newRegistrants = $this->adminModel->getNewRegistrantsMonthWise();
                $newRegistrantsYear = $this->adminModel->getNewRegistrantsYearWise();
                $newRegistrantsClinic = $this->adminModel->getNewRegistrantsClinicWise();
                $vaccine = $this->adminModel->getTotalChildVaccination();

                $data = [
                    'vacc' => '',
                    'newRegistrants' => $newRegistrants,
                    'newRegistrantsYear' => $newRegistrantsYear,
                    'newRegistrantsClinic' => $newRegistrantsClinic,
                    'vaccine' => $vaccine,
                ];

                $this->view('admins/Statistics', $data);
            }       
        }
        
        public function downloadreport($vaccine = ''){

            if(!empty($vaccine)){
                $getreport = $this->adminModel->getChildVaccinatedByVaccine($vaccine); 
            } else {
                $getreport = $this->adminModel->getTotalChildVaccination();
            }

            // $getreport = $this->adminModel-> getChildVaccinatedByVaccine($vaccine); 
       
             $data = [
                 
                 'getreport'=> $getreport,
                 'vacc' => $vaccine,
             ];
       
             $this->view('admins/downloadreport', $data);
        }

        public function vaccination_stats() {
            
    
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $vaccine = trim($_POST['vaccine']);
    
                if ($vaccine == '') {
                    // No vaccine selected, show all child vaccination data
                    $childVaccinations = $adminModel->getChildVaccinatedByVaccine('');
                } else {
                    // Show child vaccination data for selected vaccine
                    $childVaccinations = $adminModel->getChildVaccinatedByVaccine($vaccine);
                }
    
                $data = [
                    'childVaccinations' => $childVaccinations
                ];
    
                $this->view('admins/Statistics', $data);
            } else {
                $this->view('admins/Statistics');
            }
        }

        // public function statistics(){
        //     if($_SERVER["REQUEST_METHOD"] == 'POST'){
        //         //Sanitize POST array
        //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        //         $vaccine = trim($_POST['vaccine']);
        
        //         if (!isset($vaccine) || $vaccine === ''){
        //             // No vaccine selected, show all data
        //             $totalchildvaccinated = $this->adminModel->getTotalChildVaccination();
        
        //             if(!empty($totalchildvaccinated)){
        //                 $data = [
        //                     'totalchildvaccinated' => $totalchildvaccinated
        //                 ];
        //                 redirect('admins/statistics');
        //             }
        //         } else {
        //             // A vaccine is selected, show filtered data
        //             $totalchildvaccinated = $this->adminModel->getChildVaccinatedByVaccine($vaccine);
        
        //             if(!empty($totalchildvaccinated)){
        //                 $data = [
        //                     'totalchildvaccinated' => $totalchildvaccinated
        //                 ];

        //                 redirect('admins/statistics');
        //             } 
        //         }
        
                
        //     } else {
        //         $newRegistrants = $this->adminModel->getNewRegistrantsMonthWise();
        //         $newRegistrantsYear = $this->adminModel->getNewRegistrantsYearWise();
        //         $newRegistrantsClinic = $this->adminModel->getNewRegistrantsClinicWise();
        //         // $totalchildvaccinated = $this->adminModel->getTotalChildVaccination();
        
        //         $data = [
        //             'newRegistrants' => $newRegistrants,
        //             'newRegistrantsYear' => $newRegistrantsYear,
        //             'newRegistrantsClinic' => $newRegistrantsClinic,
        //             // 'totalchildvaccinated' => $totalchildvaccinated,
        //         ];
        
        //         $this->view('admins/Statistics', $data);
        //     }
        // }
        
        
        public function new_statistics($request){

            $filteredvaccination = $this->adminModel->getFilteredChildVaccination($request);
            // $newRegistrants = $this->adminModel->getNewRegistrantsMonthWise();
            // $newRegistrantsYear = $this->adminModel->getNewRegistrantsYearWise();
            // $newRegistrantsClinic = $this->adminModel->getNewRegistrantsClinicWise();
            // $totalchildvaccinated = $this->adminModel->getTotalChildVaccination();

            // $data = [
            //     'newRegistrants' => $newRegistrants,
            //     'newRegistrantsYear' => $newRegistrantsYear,
            //     'newRegistrantsClinic' => $newRegistrantsClinic,
            //     'totalchildvaccinated' => $totalchildvaccinated,
            // ];

            // $this->view('admins/Statistics', $data);
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
                    'name_err' => '',
                    'nic_err' => '',
                    'phone_err' => '',
                    'email_err' => '',
                    'password_err' => ''
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
                    if($this->adminModel->findAdminBynic($data['nic'])){
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
                    if($this->adminModel->findAdminByEmail($data['email'])){
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

                    //Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //Register User
                    if($this->adminModel->addAdmin($data) AND $this->adminModel->addUser($data)){
                        redirect('admins');
                    } else {
                        die('Someting went wrong');
                    }

                } else {
                    //Load view with errors
                    $this->view('admins/add', $data);
                }

            } else {
                //Init data
                $data = [
                    'name' => '',
                    'nic' => '',
                    'phone' => '',
                    'email' => '',
                    'password' => '',
                    'name_err' => '',
                    'nic_err' => '',
                    'phone_err' => '',
                    'email_err' => '',
                    'password_err' => ''
                ];

                //Load view
                $this->view('admins/add', $data);
            }
        }

        public function login(){
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
               //Process form 

                //Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //Init data
                $data = [
                    
                    'nic' => trim($_POST['nic']),
                    'password' => trim($_POST['password']),
                    'nic_err' => '',
                    'password_err' => ''    
                ];

                //Validate data
                if(empty($data['nic'])){
                    $data['nic_err'] = 'Please enter your nic';
                } elseif(strlen($data['nic']) < 10){
                    $data['nic_err'] = 'Please enter valid ID number';
                }

                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter your password';
                }

                //Check for user/nic
                if($this->adminModel->findAdminBynic($data['nic'])){
                    //User found
                } else {
                    //user not found
                    $data['nic_err'] = 'No admin Found';
                }

                //Make sure no errors
                if(empty($data['nic_err']) && empty($data['password_err'])){
                    //validated
                    //checked and set logged in user
                    $loggedInUser = $this->adminModel->login($data['nic'], $data['password']);

                    if($loggedInUser){
                        //Create session
                        $this->createAdminSession($loggedInUser);
                    } else{
                        $data['password_err'] = 'Password Incorrect';

                        $this->view('admins/login', $data);
                    }
                
                } else {
                    //Load view with errors
                    $this->view('admins/login', $data);
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
                $this->view('admins/login', $data);
            }
        }

        public function createAdminSession($admin){
            $_SESSION['admin_id'] = $admin->admin_id;
            $_SESSION['admin_nic'] = $admin->nic;
            $_SESSION['admin_name'] = $admin->name;
            redirect('clinics');
            //redirect('clinics/info/<?php echo $clinic->id; ?-->');
        }

        public function logout(){
            unset($_SESSION['admin_id']);
            unset($_SESSION['admin_nic']);
            unset($_SESSION['admin_name']);
            session_destroy();
            redirect('');
        }

        
    }