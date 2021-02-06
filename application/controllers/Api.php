<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Content-Type: application/json');
date_default_timezone_set('asia/bangkok');
class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->model('admin_model');
        $this->load->model('rate_model');
        $this->load->library('session');
    }
    private function json_status($status, $message)
    {

        return json_encode(['status' => $status, 'message' => $message]);
    }
    private function json_score($status, $message, $score )
    {

        return json_encode(['status' => $status, "message"=>$message,'score' => $score]);
    }
    public function login()
    {
        if ($_POST) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $check =  $this->user_model->login($username, $password);
            if ($check > 0) {
                echo $this->json_status(true, 'เข้าสู่ระบบสำเร็จ');
                $this->session->set_userdata('user', $username);
            } else {
                echo $this->json_status(false, 'ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง');
                
            }
        }else{
            echo $this->json_status(false, "not allow method"); http_response_code(405); 
            
        }

        //return $this->load->view('Login');
    }
    public function admin_login()
    {
        if ($_POST) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $check =  $this->admin_model->login($username, $password);
            if ($check > 0) {
                echo $this->json_status(true, 'เข้าสู่ระบบสำเร็จ');
                $this->session->set_userdata('admin', $username);
                $this->admin_model->last_login($username);
            } else {
                echo $this->json_status(false, 'ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง');
                
            }
        }else{
            echo $this->json_status(false, "not allow method"); http_response_code(405); 
            
        }

        //return $this->load->view('Login');
    }
    public function Logout()
    {

        $user_session = $this->session->userdata('user');
        if (isset($user_session)) {
            $this->session->unset_userdata('user');
            echo $this->json_status(true, 'ออกจากระบบสำเร็จ');
        } else {

            echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
            
        }
    }
    public function admin_logout()
    {

        $user_session = $this->session->userdata('admin');
        if (isset($user_session)) {
            $this->session->unset_userdata('admin');
            echo $this->json_status(true, 'ออกจากระบบสำเร็จ');
        } else {

            echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
            
        }
    }
    public function result(){
        $user_session = $this->session->userdata('user');
        $admin = $this->session->userdata('admin');
        if (isset($user_session) ||  isset($admin)) {
           // $permission = $this->user_model->UserData($user_session);
            //if($permission['status'])
            $id = $this->input->post('id');
            $result = $this->rate_model->result_data( $id );
           echo  json_encode( $result);

        } else {

            echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
            
        }

    }
    public function edit_weight(){
        $user_session = $this->session->userdata('admin');
        if ($_POST) {
            if (isset($user_session)) {
                $this->admin_model->update_weight($_POST);
                echo $this->json_status(true, 'เปลี่ยนแปลงสำเร็จ');
            } else {
                echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
                
            }
        } else {
            echo $this->json_status(false, "not allow method"); http_response_code(405); 
            
        }
    }
    public function edit_member()
    {
        $user_session = $this->session->userdata('admin');
        if ($_POST) {
            if (isset($user_session)) {
                $this->admin_model->edit_member($_POST);
                echo $this->json_status(true, 'เปลี่ยนแปลงสำเร็จ');
            } else {
                echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
                
            }
        } else {
            echo $this->json_status(false, "not allow method"); http_response_code(405); 
            
        }
    }
    /*  public function data_member()
    {
        $user_session = $this->session->userdata('admin');
        if ($_POST) {
            if (isset($user_session)) {
                $data =  $this->admin_model->member_data($_POST['id']);
                echo json_encode( $data);
            } else {
                echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
            }
        } else {
            echo $this->json_status(false, "not allow method"); http_response_code(405); 
        }
    }*/
    public function upload_workload(){
        
            $user_session = $this->session->userdata('user');
            if (isset($user_session)) {
                try {
                    if (
                        !isset($_FILES['file']['error']) ||
                        is_array($_FILES['file']['error'])
                    ) {
                        throw new RuntimeException('Invalid parameters.');
                    }

                    switch ($_FILES['file']['error']) {
                        case UPLOAD_ERR_OK:
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            throw new RuntimeException('No file sent.');
                        case UPLOAD_ERR_INI_SIZE:
                        case UPLOAD_ERR_FORM_SIZE:
                            throw new RuntimeException('Exceeded filesize limit.');
                        default:
                            throw new RuntimeException('Unknown errors.');
                    }
                    $filename = $_FILES['file']['name'];
                    $filepath = sprintf('fileupload/' . $user_session . '/%s',  trim(time().'_'.$_FILES['file']['name']));
                    $allowed = array("xlsx" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                    $filetype = $_FILES["file"]["type"];

                    if (in_array($filetype, $allowed)) {
                       
                       
                            if (!move_uploaded_file(
                                $_FILES['file']['tmp_name'],
                                $filepath
                            )) {
                                throw new RuntimeException('เกิดปัญหาไม่ทราบสาเหตุ');
                            }

                            echo json_encode([
                                'status' => true,
                                'message' => "อัพไฟล์ " . $filename . " สำเร็จ"
                            ]);
                            $this->rate_model->upload_workload(trim(time().'_'.$_FILES['file']['name']), $user_session);
                        
                    } else {

                        throw new RuntimeException('รูปแบบไฟล์ผิดพลาด');
                    }
                } catch (RuntimeException $e) {
                    // Something went wrong, send the err message as JSON
                    http_response_code(400);

                    echo json_encode([
                        'status' => 'error',
                        'message' => $e->getMessage()
                    ]);
                }
            } else {
                echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
            }
        
    }
    public function upload_file()
    {
        if ($_POST) {
            $user_session = $this->session->userdata('user');
            if (isset($user_session)) {
                $per_id =  $_POST['performance_id'];
                if (!isset($per_id)) {
                    echo $this->json_status(false, 'ID not found');
                    die();
                }
                try {
                    if (
                        !isset($_FILES['file']['error']) ||
                        is_array($_FILES['file']['error'])
                    ) {
                        throw new RuntimeException('Invalid parameters.');
                    }

                    switch ($_FILES['file']['error']) {
                        case UPLOAD_ERR_OK:
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            throw new RuntimeException('No file sent.');
                        case UPLOAD_ERR_INI_SIZE:
                        case UPLOAD_ERR_FORM_SIZE:
                            throw new RuntimeException('Exceeded filesize limit.');
                        default:
                            throw new RuntimeException('Unknown errors.');
                    }
                    $filename = $per_id . "_" . $_FILES['file']['name'];
                    $filepath = sprintf('fileupload/' . $user_session . '/%s_%s', $per_id, $_FILES['file']['name']);
                    $allowed = array("pdf" => "application/pdf", "doc" => "application/msword", 'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
                    $filetype = $_FILES["file"]["type"];

                    if (in_array($filetype, $allowed)) {
                        // Check whether file exists before uploading it
                        if (file_exists("fileupload/" . $user_session . "/" .  $filename)) {
                            throw new RuntimeException('ไฟล์ ' . $filename . ' มีอยู่แล้ว');
                        } else {
                            if (!move_uploaded_file(
                                $_FILES['file']['tmp_name'],
                                $filepath
                            )) {
                                throw new RuntimeException('เกิดปัญหาไม่ทราบสาเหตุ');
                            }

                            echo json_encode([
                                'status' => true,
                                'message' => "อัพไฟล์ " . $filename . " สำเร็จ"
                            ]);
                            $this->rate_model->upload_file($per_id, $per_id . "_" . $_FILES['file']['name'], $user_session);
                        }
                    } else {

                        throw new RuntimeException('รูปแบบไฟล์ผิดพลาด');
                    }
                } catch (RuntimeException $e) {
                    // Something went wrong, send the err message as JSON
                    http_response_code(400);

                    echo json_encode([
                        'status' => 'error',
                        'message' => $e->getMessage()
                    ]);
                }
            } else {
                echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
            }
        } else {
            echo $this->json_status(false, 'not allow method');
        }
    }
    public function del_file()
    {
        $user_session = $this->session->userdata('user');
        if ($_POST) {
            if (isset($user_session)) {
                $this->rate_model->del_file($_POST['id']);
                unlink('fileupload/' . $user_session . '/' . $_POST['filename']);
                echo $this->json_status(true, 'ลบไฟล์สำเร็จ');
            } else {
                echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
                
            }
        } else {
            echo $this->json_status(false, "not allow method"); http_response_code(405); 
            
        }
    }
    public function update_rate()
    {
        $user_session = $this->session->userdata('user');
        if ($_POST) {
            if (isset($user_session)) {
                $this->rate_model->update_rate($_POST);
                echo $this->json_status(true, 'บันทึกข้อมูลสำเร็จ');
            } else {
                echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
                
            }
        } else {
            echo $this->json_status(false, "not allow method"); http_response_code(405); 
            
        }
    }
    public function del_user()
    {
        $user_session = $this->session->userdata('admin');
        if ($_POST) {
            if (isset($user_session)) {
                $this->admin_model->del_user($_POST['id']);
                echo $this->json_status(true, 'ลบผู้ใช้งานสำเร็จ');
            } else {
                echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
                
            }
        } else {
            echo $this->json_status(false, "not allow method"); http_response_code(405); 
            
        }
    }
    public function del_date()
    {
        $user_session = $this->session->userdata('admin');
        if ($_POST) {
            if (isset($user_session)) {
                $this->admin_model->del_date($_POST['id']);
                echo $this->json_status(true, 'ลบสำเร็จ');
            } else {
                echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
                
            }
        } else {
            echo $this->json_status(false, "not allow method"); http_response_code(405); 
            
        }
    }
    public function changpass()
    {
        if ($_POST) {
            $user_session = $this->session->userdata('user');
            if (isset($user_session)) {
                $o_password = $this->input->post('o_password');
                $password = $this->input->post('password');
                $c_password = $this->input->post('c_password');
                $userdata = $this->user_model->UserData($user_session);
                if ($o_password != $userdata['password']) {
                    echo $this->json_status(false, 'รหัสผ่านเก่าไม่ถูกต้อง');
                } else if ($password != $c_password) {
                    echo $this->json_status(false, 'รหัสผ่านใหม่ไม่ตรงกัน');
                } else {
                    $this->user_model->chang_password($user_session, $password);
                    echo $this->json_status(true, 'เปลี่ยนรหัสผ่านสำเร็จ');
                }
            } else {
                echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
                
            }
        }else{
            echo $this->json_status(false, "not allow method"); http_response_code(405); 
            
        }
    }
    public function add_date()
    {
        $user_session = $this->session->userdata('admin');
        if ($_POST) {
            if (isset($user_session)) {
                $this->admin_model->add_date($_POST);
                echo $this->json_status(true, 'เพิ่มสำเร็จ');
            } else {
                echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
                
            }
        } else {
            echo $this->json_status(false, "not allow method"); http_response_code(405); 
            
        }
    }
    public function change_password(){
        $user_session = $this->session->userdata('admin');
        if ($_POST) {
            if (isset($user_session)) {
                $check = $this->admin_model->check_password($_POST['password']);
                if($check  == 1){
                    $this->admin_model->change_password($_POST['newpassword']);
                    echo $this->json_status(true, 'เปลี่ยนรหัสผ่านสำเร็จ');
                }else{
                    echo $this->json_status(false, 'รหัสผ่านเก่าไม่ถูกต้อง');
                    
                }         
                
            } else {
                echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
                
            }
        } else {
            echo $this->json_status(false, "not allow method"); http_response_code(405); 
            
        }
    }
    public function calculate()
    {
        $scores = 0;
        $user_session = $this->session->userdata('user');
        if (isset($user_session)) {
            if ($_POST) {
               
                $username = $this->input->post('username');
                $userdata = $this->user_model->UserData($username);
                $permission = $this->user_model->UserData($username);
                if ($permission['status'] == 0) {
                    $x = 1;
                } else if ($permission['status'] == 1) {
                    $x = 2;
                }
                if (!isset($userdata)) {
                    echo $this->json_status(false, "username exit.");
                    exit;
                }
                $officialposition =   $userdata['officialposition'];
                $managementposition =   $userdata['managementposition'];
                if ($managementposition == 4 and $officialposition == 1) {
                    $status = 2;
                } else if ($officialposition == 1) {
                    $status = 1;
                } else if ($managementposition == 4) {
                    $status = 2;
                } else if ($officialposition == 2) {
                    $status = 3;
                } else if ($officialposition == 3) {
                    $status = 4;
                }
                //echo  $status;
                $status_in = $this->input->post('status_in');
                $score = $this->input->post('score');
                if ($status_in == '' || $score == '' || $username == '') {
                    echo $this->json_status(false, "parameter null");
                    exit;
                }
                if ($score > 5) {
                    echo $this->json_status(false, "เกิดข้อผิดพลาด");
                    exit;
                }
                if ($status_in == 1) {
                    if ($status == 1 || $status == 3) {
                        if ($score >= 3) {

                            $scores = $x;
                        } else {
                            $scores = 0;
                        }
                    } else if ($status == 2 || $status == 4) {
                        if ($score >= 4) {
                            $scores = $x;
                        } else {
                            $scores = 0;
                        }
                    }
                    if($scores == 0){
                        $message = "ไม่ผ่านระดับสมถนะที่คาดหวัง";
                    }else{
                        $message = "ผ่านระดับสมถนะที่คาดหวัง";
                    }
                    echo $this->json_score(true,$message, $scores);
                } elseif ($status_in == 2) {
                    if ($status == 1 || $status == 3) {
                        if ($score >= 5) {
                            $scores = $x;
                        } else {
                            $scores = 0;
                        }
                    } else if ($status == 2 || $status == 4) {
                        if ($score >= 5) {
                            $scores = $x;
                        } else {
                            $scores = 0;
                        }
                    }
                    if($scores == 0){
                        $message = "ไม่ผ่านระดับสมถนะที่คาดหวัง";
                    }else{
                        $message = "ผ่านระดับสมถนะที่คาดหวัง";
                    }
                    echo $this->json_score(true,$message, $scores);
                } else if ($status_in == 3) {
                    if ($status == 1 || $status == 3) {
                        if ($score >= 3) {
                            $scores = $x;
                        } else {
                            $scores = 0;
                        }
                    } else if ($status == 2 || $status == 4) {
                        if ($score >= 4) {
                            $scores = $x;
                        } else {
                            $scores = 0;
                        }
                    }
                    if($scores == 0){
                        $message = "ไม่ผ่านระดับสมถนะที่คาดหวัง";
                    }else{
                        $message = "ผ่านระดับสมถนะที่คาดหวัง";
                    }
                    echo $this->json_score(true,$message, $scores);
                } else if ($status_in == 4) {
                    if ($status == 1 || $status == 3) {
                        if ($score >= 5) {
                            $scores = $x;
                        } else {
                            $scores = 0;
                        }
                    } else if ($status == 2 || $status == 4) {
                        if ($score >= 5) {
                            $scores = $x;
                        } else {
                            $scores = 0;
                        }
                    }
                    if($scores == 0){
                        $message = "ไม่ผ่านระดับสมถนะที่คาดหวัง";
                    }else{
                        $message = "ผ่านระดับสมถนะที่คาดหวัง";
                    }
                    echo $this->json_score(true,$message, $scores);
                } else if ($status_in == 5) {
                    if ($status == 1 || $status == 3) {
                        if ($score >= 5) {
                            $scores = $x;
                        } else {
                            $scores = 0;
                        }
                    } else if ($status == 2 || $status == 4) {
                        if ($score >= 5) {
                            $scores = $x;
                        } else {
                            $scores = 0;
                        }
                    }
                    if($scores == 0){
                        $message = "ไม่ผ่านระดับสมถนะที่คาดหวัง";
                    }else{
                        $message = "ผ่านระดับสมถนะที่คาดหวัง";
                    }
                    echo $this->json_score(true,$message, $scores);
                } else {
                    echo $this->json_status(false, "เกิดข้อผิดพลาด");
                    
                }
            } else {
                echo $this->json_status(false, "not allow method"); http_response_code(405); 
                
            }
        } else {
            echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
            
        }
    }
    private function Open_rate()
    {
        // date_default_timezone_set('Asia/Bangkok') ;
        $open_rate = $this->rate_model->rate_open();
        $date_now = date('Y-m-d H:i:s');
        if ($date_now > $open_rate['start_date'] && $date_now < $open_rate['end_date']) {
            $check_date = 1;
        } else {
            $check_date = 0;
        }
        return $check_date;
    }
    public function accept()
    {
        if ($_POST) {
            $user_session = $this->session->userdata('user');
            if (isset($user_session)) {
                $open_rate = $this->rate_model->rate_open();
                // print_r( $open_rate);
                 $check_date = $this->Open_rate();
                $check_rate = $this->rate_model->rate_select($user_session, $open_rate['year'], $open_rate['semester']);


                if ($check_date == 1 and @$check_rate['status'] ==0) {
                    // $this->show('กำลังพาไปทำแบบประเมิน', 'success', 'rate');
                    echo $this->json_status(true, 'กำลังพาไปทำแบบประเมิน');
                    $rate_check =  $this->rate_model->check_rate($user_session, $open_rate['year'], $open_rate['semester']);
                    if ($rate_check == 0) {
                        $this->rate_model->rate_insert(['username' => $user_session, 'year' => $open_rate['year'], 'Semester' => $open_rate['semester'], 'code_date' => $open_rate['code_date']]);
                    }
                } else if($check_date == 0) {
                    // $this->show('ยังไม่ถึงวันประเมิน', 'error', 'home');
                    echo $this->json_status(false, 'ยังไม่ถึงวันประเมิน');
                    
                }else if (isset($check_rate)) {
                    if ($check_rate['status'] != 0) {
                        echo $this->json_status(false, 'คุณได้ส่งแบบประเมินไปแล้ว');
                        
                        die();
                    }

                }
            } else {
                echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
                
            }
        } else {
            echo $this->json_status(false, "not allow method"); http_response_code(405); 
            
        }
    }
    public function cancel_rate()
    {
        if ($_POST) {
            $user_session = $this->session->userdata('user');
            if (isset($user_session)) {
                $open_rate = $this->rate_model->rate_open();
                $check_rate = $this->rate_model->rate_select($user_session, $open_rate['year'], $open_rate['semester']);
                if (!isset($check_rate)) {                   
                        echo $this->json_status(false, 'คุณยังไม่ได้ทำแบบประเมิน');                       
                        die();
                }else{
                    if($check_rate['status'] == 0){
                        echo $this->json_status(false, 'คุณยังไม่ได้ส่งแบบประเมิน');
                    }else{
                        
                        if($check_rate['update'] == 1){
                            echo $this->json_status(false, 'ยกเลิกไม่ได้');                           
                        }
                        else if($check_rate['update'] == 0){
                            $this->rate_model->cancel_rate($check_rate['id']);
                            echo $this->json_status(true, 'ยกเลิกเลิกการส่งสำเร็จ');
                            die();
                        }
                    }
                }
            } else {
                echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');               
            }
        } else {
            echo $this->json_status(false, "not allow method"); http_response_code(405);            
        }
    }
    public function sent()
    {
        if ($_POST) {
            $user_session = $this->session->userdata('user');
            if (isset($user_session)) {
                $permission = $this->user_model->UserData($user_session);


                if ($_POST['step'] == 1) {
                    if ($permission['status'] == 0) {

                        $this->rate_model->sent($_POST, 1,$permission['status']);
                        echo $this->json_status(true, 'ส่งแบบประเมินสำเร็จ');
                    } else if ($permission['status'] == 1) {
                        $this->rate_model->sent($_POST, 2,$permission['status']);
                        echo $this->json_status(true, 'ส่งแบบประเมินสำเร็จ');

                    }
                } else if ($_POST['step'] == 2) {

                   //print_r($_POST);
                    //exit;
                    if ($permission['status'] == 1) {
                        $this->rate_model->update($_POST, 2,$permission['status']);
                        echo $this->json_status(true, 'ส่งแบบประเมินสำเร็จ');
                    } else if ($permission['status'] == 2) {
                        $this->rate_model->update($_POST, 3,$permission['status']);
                        echo $this->json_status(true, 'ส่งแบบประเมินสำเร็จ');
                    }
                }
            } else {
                echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
                
            }
        } else {
            echo $this->json_status(false, "not allow method"); http_response_code(405); 
            
        }
    }
    public function edit_profile()
    {
        if ($_POST) {
            $user_session = $this->session->userdata('user');
            if (isset($user_session)) {
                $this->user_model->edit_profile($user_session, $_POST);
                echo $this->json_status(true, 'เปลี่ยนแปลงสำเร็จ');
            } else {
                echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
                
            }
        }else{
            echo $this->json_status(false, "not allow method"); http_response_code(405); 
            
        }
    }
    public function edit_date()
    {
        if ($_POST) {
            $user_session = $this->session->userdata('admin');
            if (isset($user_session)) {
                $this->admin_model->edit_date($_POST);
                echo $this->json_status(true, 'เปลี่ยนแปลงสำเร็จ');
            } else {
                echo $this->json_status(false, 'คุณยังไม่ได้เข้าสู่ระบบ');
                
            }
        }else{
            echo $this->json_status(false, "not allow method"); http_response_code(405); 
            
        }
    }
    public function register()
    {
        if ($_POST) {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $name = $this->input->post('name');
            $Check_Username =  $this->user_model->Check_Username($username);
            $Check_name =  $this->user_model->Check_name($name);
            $Check_email =  $this->user_model->Check_email($email);
            if ($Check_Username > 0) {
                echo $this->json_status(false, 'ชื่อผู้ใช้งานนี้มีแล้ว');
                
            } else if ($Check_name  > 0) {
                echo $this->json_status(false, 'ชื่อนี้มีแล้ว');
                
            } else if ($Check_email  > 0) {
                echo $this->json_status(false, 'อีเมลล์นี้มีแล้ว');
                
            } else {
                //print_r($_POST);

                $this->user_model->register($_POST);
                echo $this->json_status(true, 'ลงเทะเบียนสำเร็จ');
                mkdir("./fileupload/" . $_POST['username']);
            }
        }else{
            echo $this->json_status(false, "not allow method"); http_response_code(405); 
            
        }
    }
}
