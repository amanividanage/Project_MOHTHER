<?php
    class Clinics extends Controller{
        public function __construct(){

            // if(!isLoggedIn()){
            //     redirect('admins/login');
            // }
            

            $this->clinicModel = $this->model('Clinic');
            $this->doctorModel = $this->model('Doctor');
            $this->midwifeModel = $this->model('Midwife');
        }



        public function index(){
            //Get clinics 
            $clinics = $this->clinicModel->getClinics();

            $data = [
                'clinics' => $clinics
            ];

            $this->view('clinics/index', $data);
        }


        public function add(){
            if($_SERVER["REQUEST_METHOD"] == 'POST'){
                //Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'clinic_name' => trim($_POST['clinic_name']),
                    'gnd' => trim($_POST['gnd']),
                    'location' => trim($_POST['location']),
                    'child_clinic_date' => trim($_POST['child_clinic_date']),
                    'maternity_clinic_date' => trim($_POST['maternity_clinic_date']),
                    'clinic_name_err' => '',
                    'gnd_err' => '',
                    'location_err' => '',
                    'child_clinic_date_err' => '',
                    'maternity_clinic_date_err' => '',
                    
                ];

                //validate data
                if(empty($data['clinic_name'])){
                    $data['clinic_name_err'] = 'Please enter the name';
                }

                if(empty($data['gnd'])){
                    $data['gnd_err'] = 'Please select the Grama Niladhari Division';
                } else{
                    //Check for gnd repetition
                    if($this->clinicModel->findCilinicByGnd($data['gnd'])){
                        $data['gnd_err'] = 'Clinic is already there for this gnd, Can not make another clinic for this gnd';
                    }
                }

                if(empty($data['location'])){
                    $data['location_err'] = 'Please enter the address';
                }

                if(empty($data['child_clinic_date'])){
                    $data['child_clinic_date_err'] = 'Please select a date';
                }

                if(empty($data['maternity_clinic_date'])){
                    $data['maternity_clinic_date_err'] = 'Please select a date';
                }


                //Make sure no errors
                if(empty($data['clinic_name_err']) && empty($data['gnd_err']) && empty($data['location_err'])){
                    if($this->clinicModel->addClinic($data)){
                        //flash('clinic_added', 'Clinic Added');
                        redirect('clinics');
                        //header("Location: http://localhost/moh/clinics");
                        //exit();
                    } else {
                        die('Someting went wrong');
                    }
                } else {
                    //Load view with errors
                    $this->view('clinics/add', $data);
                }

            } else {
                $data = [
                    'clinic_name' => '',
                    'gnd' => '',
                    'location' => '',
                    'clinic_name_err' => '',
                    'gnd_err' => '',
                    'location_err' => '',
                    'child_clinic_date' => '',
                    'maternity_clinic_date' => '',
                    'child_clinic_date_err' => '',
                    'maternity_clinic_date_err' => '',
                ];
    
                $this->view('clinics/add', $data);
            }
        }

        public function info($id){
            $clinic = $this->clinicModel->getClinicById($id);
            
            // $doctor = $this->doctorModel->findDoctorByClinic($id);

            // $midwife = $this->midwifeModel->findMidwifeByClinic($id);

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //Init data
                $data = [
                    'id' => $id,
                    'clinic' => $clinic,
                    'doctor' => isset($_POST['doctor']) ? trim($_POST['doctor']) : '',
                    'doctor_err' => '',
                    'appdate' => date("Y-m-d"),

                    'newphm' => isset($_POST['newphm']) ? trim($_POST['newphm']) : '',
                    'newphm_err' => '',

                    'edit-name' => isset($_POST['edit-name']) ? trim($_POST['edit-name']) : '',
                    'edit-location' => isset($_POST['edit-location']) ? trim($_POST['edit-location']) : '',
                    'edit-name_err' => '',
                    'edit-location_err' => '',
                ];

                //validate data
                if (empty($data['doctor'])) {
                    $data['doctor_err'] = 'Please select a doctor';
                }

                if (empty($data['newphm'])) {
                    $data['newphm_err'] = 'Please enter new PHM name to add';
                }

                if (empty($data['edit-name'])) {
                    $data['edit-name_err'] = 'This field cannot be empty';
                }

                if (empty($data['edit-location'])) {
                    $data['edit-location_err'] = 'This field cannot be empty';
                }

                //Make sure no errors
                if (empty($data['doctor_err'])) {
                    //Register User
                    if ($this->doctorModel->addDoctorToClinic($data) AND $this->doctorModel->addDoctorToClinicTwo($data) AND $this->doctorModel->updateAddededDoctorToClinic($data)) {
                        redirect('clinics/info/'.$id.'');
                    } else {
                        die('Something went wrong');
                    }
                } elseif (empty($data['newphm_err'])) {
                    if ($this->clinicModel->addPHM($data)) {
                        redirect('clinics/info/'.$id.'');
                    } else {
                        die('Something went wrong');
                    }
                } elseif (empty($data['edit-name_err']) && empty($data['edit-location_err'])) {
                    if ($this->clinicModel->editClinic($data)) {
                        redirect('clinics/info/'.$id.'');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    //Load view with errors
                    $this->view('clinics/info', $data);
                }

            } else {
                $doctors = $this->doctorModel->getNotAddedDoctors();
                $showdoctors = $this->doctorModel->getDoctorByClinic($id);

                $phm = $this->clinicModel->showPHM($id);
                $midwife = $this->clinicModel->showMidwife($id);

                $previousdoctors = $this->clinicModel->getPreviousDoctorsByClinic($id);
                $previousmidwifes = $this->clinicModel->getPreviousMidwifesByClinic($id);

                $clinicattendees = $this->clinicModel->getClinicAttendeeCountByClinic($id);
                $children = $this->clinicModel->getChildrenCountByClinic($id);
                //Init data
                $data = [
                    'clinic' => $clinic,
                    'doctors' => $doctors,
                    'showdoctors' => $showdoctors,
                    'doctor' => '',
                    'doctor_err' => '',
                    'appdate' => '',

                    'newphm' => '',
                    'newphm_err' => '',

                    'edit-name' => '',
                    'edit-location' => '',
                    'edit-name_err' => '',
                    'edit-location_err' => '',

                    'phm' => $phm, 
                    'midwife' => $midwife,

                    'previousdoctors' => $previousdoctors,
                    'previousmidwifes' => $previousmidwifes,

                    'clinicattendees' => $clinicattendees,
                    'children' => $children,
                ];

                //Load view
                $this->view('clinics/info', $data);
            }

            // $data = [
            //     'clinic' => $clinic,
            //     'doctor' => $doctor,
            //     'midwife' => $midwife
            // ];

            // $this->view('clinics/info', $data);
        }

        public function phm($id){
            
             
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $clinic = $this->clinicModel->getClinicByPHM($id);
                //Init data
                $data = [
                    'id' => $id,
                    'clinic' => $clinic->clinic_id,
                    'midwife' => trim($_POST['midwife']),
                    'midwife_err' => '',
                    'appdate'=> date("Y-m-d"),

                    // 'newphm' => trim($_POST['newphm']),
                    // 'newphm_err' => ''
                ];

                //validate data
                if(empty($data['midwife'])){
                    $data['midwife_err'] = 'Please select a midwife';
                }

                // if(empty($data['newphm'])){
                //     $data['newphm_err'] = 'Please enter new PHM name to add';
                // }

                //Make sure no errors
                if(empty($data['midwife_err'])){
                    //Register User
                    if($this->midwifeModel->addMidwifeToClinic($data) AND $this->midwifeModel->addMidwifeToClinicTwo($data)AND $this->midwifeModel->updateAddededMidwifeToClinic($data) ){  
                        redirect('clinics/info/'.$clinic->clinic_id.'');
                    } else{
                        die('Someting went wrong');
                    }

                // } elseif(empty($data['newphm_err'])){
                //     if($this->clinicModel->addPHM($data)){
                //         redirect('clinics/info/'.$id.'');
                //     } else {
                //         die('Someting went wrong');
                //     }

                }else {
                    //Load view with errors
                    $this->view('clinics/phm', $data);
                }

            } else {
                $phm = $this->clinicModel->getPHMAreaById($id);

                $midwifes = $this->midwifeModel->getNotAddedMidwifes();

                $data = [
                    'phm' => $phm,
                    'midwifes' => $midwifes,
                    'midwife_err' => ''
                ];
            }

            

            $this->view('clinics/phm', $data);
        }    

        
        


    }