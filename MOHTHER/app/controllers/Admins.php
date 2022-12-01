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

            $data = [
               
            ];

            $this->view('admins/dashboard', $data);
        }
        
        public function statistics(){

            $data = [
               
            ];

            $this->view('admins/Statistics', $data);
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
                    'name_err' => '',
                    'identity_err' => '',
                    'phone_err' => '',
                    'email_err' => '',
                    'password_err' => ''
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
                    if($this->adminModel->findAdminByIdentity($data['identity'])){
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
                if(empty($data['name_err']) && empty($data['identity_err']) && empty($data['phone_err']) && empty($data['email_err']) && empty($data['password_err'])){
                    //validated

                    //Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    //Register User
                    if($this->adminModel->addAdmin($data)){
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
                    'identity' => '',
                    'phone' => '',
                    'email' => '',
                    'password' => '',
                    'name_err' => '',
                    'identity_err' => '',
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
                    
                    'identity' => trim($_POST['identity']),
                    'password' => trim($_POST['password']),
                    'identity_err' => '',
                    'password_err' => ''    
                ];

                //Validate data
                if(empty($data['identity'])){
                    $data['identity_err'] = 'Please enter your identity';
                } elseif(strlen($data['identity']) < 10){
                    $data['identity_err'] = 'Please enter valid ID number';
                }

                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter your password';
                }

                //Check for user/identity
                if($this->adminModel->findAdminByIdentity($data['identity'])){
                    //User found
                } else {
                    //user not found
                    $data['identity_err'] = 'No User Found';
                }

                //Make sure no errors
                if(empty($data['identity_err']) && empty($data['password_err'])){
                    //validated
                    //checked and set logged in user
                    $loggedInUser = $this->adminModel->login($data['identity'], $data['password']);

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
                    
                    'identity' => '',
                    'password' => '',
                    'identity_err' => '',
                    'password_err' => ''
                    
                ];

                //Load view
                $this->view('admins/login', $data);
            }
        }

        public function createAdminSession($admin){
            $_SESSION['admin_id'] = $admin->admin_id;
            $_SESSION['admin_identity'] = $admin->identity;
            $_SESSION['admin_name'] = $admin->name;
            redirect('clinics');
            //redirect('clinics/info/<?php echo $clinic->id; ?-->');
        }

        public function logout(){
            unset($_SESSION['admin_id']);
            unset($_SESSION['admin_identity']);
            unset($_SESSION['admin_name']);
            session_destroy();
            redirect('');
        }

        
    }