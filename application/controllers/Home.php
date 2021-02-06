<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('asia/bangkok');
class Home extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->model('rate_model');
        $this->load->library('session');
    }
    public function index()
    {

        return $this->load->view('prelogin');
    }
    public function login(){
        $user_session = $this->session->userdata('user');
        if (isset($user_session)) {
            redirect('home');
        }
        return $this->load->view('Login');

    }
    public function workload(){
        $user_session = $this->session->userdata('user');
        if (isset($user_session)) {

        }else{
            redirect('./'); 
        }
        return $this->load->view('workload');
    }
    public function results()
    {
        $user_session = $this->session->userdata('user');
        if (isset($user_session)) {
            $permission = $this->user_model->UserData($user_session);
            if ($permission['status'] == 0) {
                $data = $this->rate_model->result_me($user_session);
               
                $data = [
                    "data" => $data,
                  

                ];
            return $this->load->view('result', $data);
            } else  if ($permission['status'] == 1) {
                $data = $this->rate_model->result_me($user_session);
                $datas = $this->rate_model->result_sj($permission['affiliated_agencies']);
                //print_r($datas);
                $data = [
                    "data" => $data,
                    "data_affiliated_agencies" =>$datas

                ];
            return $this->load->view('result_persident',$data);
            } else if ($permission['status'] == 2) {
                $data = $this->rate_model->result_all();
                $data_President =  $this->rate_model->result_Persident();
                $data = [
                    "data" => $data,
                    "data_President" => $data_President

                ];
                return $this->load->view('result_excutive', $data);
            }
        } else {
            redirect('./');
        }
    }
    public function register()
    {
        $data = [
            "affiliated_agencies" => $this->user_model->affiliated_agencies(),
            "managementposition" => $this->user_model->managementposition(),
            "officialposition" => $this->user_model->officialposition(),
            "personneltype" => $this->user_model->personneltype(),
        ];
        return $this->load->view('Register', $data);
    }
    public function rate_select()
    {

        $user_session = $this->session->userdata('user');
        if (isset($user_session)) {
            $permission = $this->user_model->UserData($user_session);
            $id =  $this->uri->segment(2);
            if (!is_numeric($id)) {
                echo 'ไอดีผิดพลาด';
            }
            $check_rate = $this->Open_rate();
            if ($permission['status'] == 1) {


                $data = $this->rate_model->rates_select($id, $permission['affiliated_agencies']);

                if (!isset($data)) {
                    redirect('home');
                }
                $data_rate = [
                    'weight' => $this->rate_model->performance_weight(),
                    'data' =>  $data,
                    'performance1_1' => $this->rate_model->performance1_1(),
                    'performance2_1' => $this->rate_model->performance2_1(),
                    'performance2_2' => $this->rate_model->performance2_2(),
                    'performance2_3' => $this->rate_model->performance2_3(),
                    'performance2_4' => $this->rate_model->performance2_4(),
                    'performance3_1' => $this->rate_model->performance3_1(),
                    'performance3_2' => $this->rate_model->performance3_2(),
                    'performance3_3' => $this->rate_model->performance3_3(),
                    'performance4_1' => $this->rate_model->performance4_1(),
                    'performance5_1' => $this->rate_model->performance5_1(),
                    'performance6_1' => $this->rate_model->performance6_1(),
                    'compentency1' => $this->rate_model->compentency1(),
                    'compentency2' => $this->rate_model->compentency2(),
                    'compentency3' => $this->rate_model->compentency3(),
                    'compentency4' => $this->rate_model->compentency4(),
                    'compentency5' => $this->rate_model->compentency5(),
                    'listfile_1_1' => $this->rate_model->getfile_list($id, 1),
                    'listfile_2_1' => $this->rate_model->getfile_list($id, 2),
                    'listfile_2_2' => $this->rate_model->getfile_list($id,3),
                    'listfile_2_3' => $this->rate_model->getfile_list($id, 4),
                    'listfile_2_4' => $this->rate_model->getfile_list($id, 5),
                    'listfile_3_1' => $this->rate_model->getfile_list($id, 6),
                    'listfile_3_2' => $this->rate_model->getfile_list($id, 7),
                    'listfile_4_1' => $this->rate_model->getfile_list($id, 9),
                    'listfile_5_1' => $this->rate_model->getfile_list($id, 10),
                    'listfile_6_1' => $this->rate_model->getfile_list($id, 11),
                    'listfile_3_3' => $this->rate_model->getfile_list($id, 8),
                    'workload_file'=>$this->rate_model->select_workloadfile($data['username']),
                    'permission'=> $permission



                ];
            } else if ($permission['status'] == 2) {

                $data = $this->rate_model->rates_select_($id);

                if (!isset($data)) {
                    redirect('home');
                }
                $data_rate = [
                    'weight' => $this->rate_model->performance_weight(),
                    'data' =>  $data,
                    'performance1_1' => $this->rate_model->performance1_1(),
                    'performance2_1' => $this->rate_model->performance2_1(),
                    'performance2_2' => $this->rate_model->performance2_2(),
                    'performance2_3' => $this->rate_model->performance2_3(),
                    'performance2_4' => $this->rate_model->performance2_4(),
                    'performance3_1' => $this->rate_model->performance3_1(),
                    'performance3_2' => $this->rate_model->performance3_2(),
                    'performance3_3' => $this->rate_model->performance3_3(),
                    'performance4_1' => $this->rate_model->performance4_1(),
                    'performance5_1' => $this->rate_model->performance5_1(),
                    'performance6_1' => $this->rate_model->performance6_1(),
                    'compentency1' => $this->rate_model->compentency1(),
                    'compentency2' => $this->rate_model->compentency2(),
                    'compentency3' => $this->rate_model->compentency3(),
                    'compentency4' => $this->rate_model->compentency4(),
                    'compentency5' => $this->rate_model->compentency5(),
                    'listfile_1_1' => $this->rate_model->getfile_list($id, 1),
                    'listfile_2_1' => $this->rate_model->getfile_list($id, 2),
                    'listfile_2_2' => $this->rate_model->getfile_list($id,3),
                    'listfile_2_3' => $this->rate_model->getfile_list($id, 4),
                    'listfile_2_4' => $this->rate_model->getfile_list($id, 5),
                    'listfile_3_1' => $this->rate_model->getfile_list($id, 6),
                    'listfile_3_2' => $this->rate_model->getfile_list($id, 7),
                    'listfile_4_1' => $this->rate_model->getfile_list($id, 9),
                    'listfile_5_1' => $this->rate_model->getfile_list($id, 10),
                    'listfile_6_1' => $this->rate_model->getfile_list($id, 11),
                    'listfile_3_3' => $this->rate_model->getfile_list($id, 8),
                    'workload_file'=>$this->rate_model->select_workloadfile($data['username']),
                    'permission'=> $permission



                ];
            } else {
                redirect('home');
            }


            return $this->load->view('rate_select', $data_rate);
        } else {
            redirect('./');
        }
    }
    public function ViewWord()
    {
        $user_session = $this->session->userdata('user');
        if (isset($user_session)) {
            $username =  $this->uri->segment(2);
            $name =  $this->uri->segment(3);
            $name = urldecode($name);
            header('Content-disposition: inline');
            header('Content-type: application/msword'); // not sure if this is the correct MIME type
            readfile('fileupload/' . $username . '/' . $name);
            exit;
        }
    }
    public function Viewxls()
    {
        $user_session = $this->session->userdata('user');
        if (isset($user_session)) {
            $username =  $this->uri->segment(2);
            $name =  $this->uri->segment(3);
            $name = urldecode($name);
            header('Content-disposition: inline');
            header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); // not sure if this is the correct MIME type
            readfile('fileupload/' . $username . '/' . $name);
            exit;
        }
    }
    public function Viewpdf()
    {
        $user_session = $this->session->userdata('user');
        if (isset($user_session)) {
            $username =  $this->uri->segment(2);
            $name =  $this->uri->segment(3);
            $name = urldecode($name);
            // exit;
            // Store the file name into variable
            $file = 'fileupload/' . $username . '/' . $name;
            $filename = 'fileupload/' . $username . '/' . $name;

            // Header content type
            header('Content-type: application/pdf');

            header('Content-Disposition: inline; filename="' . $filename . '"');

            header('Content-Transfer-Encoding: binary');

            header('Accept-Ranges: bytes');

            // Read the file
            @readfile($file);
        }
    }
    public function rate()
    {
        // print_r($_POST);
        $user_session = $this->session->userdata('user');
        if (isset($user_session)) {
            $id =  $this->uri->segment(2);
            /* if($id == null){
                redirect('home');
            }*/
            $open_rate = $this->rate_model->rate_open();
            $check_rate = $this->Open_rate();
            $permission = $this->user_model->UserData($user_session);
            if ($check_rate == 1) {
                $check = $this->rate_model->rate_select($user_session, $open_rate['year'], $open_rate['semester']);
                $id_rate = $check['id'];
                // print_r($check);

                if (!isset($check)) {
                    redirect('home');
                }
                if ($check['status'] != 0) {
                    redirect('home');
                }

                $performance = [
                    'data' => $this->rate_model->rate_select($user_session, $open_rate['year'], $open_rate['semester']),
                    'permission' => $permission,
                    'performance1_1' => $this->rate_model->performance1_1(),
                    'performance2_1' => $this->rate_model->performance2_1(),
                    'performance2_2' => $this->rate_model->performance2_2(),
                    'performance2_3' => $this->rate_model->performance2_3(),
                    'performance2_4' => $this->rate_model->performance2_4(),
                    'performance3_1' => $this->rate_model->performance3_1(),
                    'performance3_2' => $this->rate_model->performance3_2(),
                    'performance3_3' => $this->rate_model->performance3_3(),
                    'performance4_1' => $this->rate_model->performance4_1(),
                    'performance5_1' => $this->rate_model->performance5_1(),
                    'performance6_1' => $this->rate_model->performance6_1(),
                    'listfile_1_1' => $this->rate_model->getfile_list($id_rate, 1),
                    'listfile_2_1' => $this->rate_model->getfile_list($id_rate, 2),
                    'listfile_2_2' => $this->rate_model->getfile_list($id_rate, 3),
                    'listfile_2_3' => $this->rate_model->getfile_list($id_rate, 4),
                    'listfile_2_4' => $this->rate_model->getfile_list($id_rate, 5),
                    'listfile_3_1' => $this->rate_model->getfile_list($id_rate, 6),
                    'listfile_3_2' => $this->rate_model->getfile_list($id_rate, 7),
                    'listfile_4_1' => $this->rate_model->getfile_list($id_rate, 9),
                    'listfile_5_1' => $this->rate_model->getfile_list($id_rate, 10),
                    'listfile_6_1' => $this->rate_model->getfile_list($id_rate, 11),
                    'listfile_3_3' => $this->rate_model->getfile_list($id_rate,8),
                    'workload_file'=>$this->rate_model->select_workloadfile($user_session),

                ];
            } else {
                redirect('./');
            }
        } else {
            redirect('./');
        }

        return $this->load->view('Rate', $performance);
    }
    /* private function show($text, $type, $url)
    {
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script><script type="text/javascript">
        $("document").ready(function(){
		const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        onOpen: (toast) => {
         toast.addEventListener("mouseenter", Swal.stopTimer)
            toast.addEventListener("mouseleave", Swal.resumeTimer)
            }

        }   )
        Toast.fire({
        icon: "' . $type . '",
        title: "' . $text . '"
        }).then(function() {
        window.location.href = "' . $url . '";
        });});</script>';
    }*/
    private function DateThai($strDate)
    {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strHour = date("H", strtotime($strDate));
        $strMinute = date("i", strtotime($strDate));
        $strSeconds = date("s", strtotime($strDate));
        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear เวลา  $strHour:$strMinute";
    }
    private function Open_rate()
    {
        // date_default_timezone_set('Asia/Bangkok') ;
        $open_rate = $this->rate_model->rate_open();
        $date_now = date('Y-m-d H:i:s') . '<br>';
        $open_rate['end_date'] . '<br>';
        $open_rate['start_date'] . '<br>';
        if ($date_now > $open_rate['start_date'] && $date_now < $open_rate['end_date']) {
            $check_date = 1;
        } else {
            $check_date = 0;
        }
        //echo $check_date;
        return $check_date;
    }
    public function home()
    {
        $user_session = $this->session->userdata('user');

        if (isset($user_session)) {
            $permission = $this->user_model->UserData($user_session);
            $open_rate = $this->rate_model->rate_open();
            // print_r( $open_rate);
            $check_date = $this->Open_rate();
            if ($permission['status'] == 0) {
                $date = $this->DateThai(date('Y-m-d'));
                $data_s = [
                    "date" => $date,
                    "check" => $check_date,
                    "start_date" => $this->DateThai($open_rate['start_date']),
                    "end_date" => $this->DateThai($open_rate['end_date']),
                    "year" => $open_rate['year'],
                    "Semester" => $open_rate['semester'],
                ];
                return $this->load->view('home', $data_s);
            } else if ($permission['status'] == 1) {
                $open_rate = $this->rate_model->rate_open();
                $data = $this->rate_model->rate_($permission['affiliated_agencies'], $open_rate['semester'], $open_rate['year']);
                // print_r($data);
                $affiliated_agencies = $this->user_model->affiliated_agencies();
                foreach ($affiliated_agencies as $v) {

                    if ($v['id'] == $permission['affiliated_agencies']) {
                        $affiliated_agenciesname = $v['name'];
                        break;
                    }
                }
                $check_date = $this->Open_rate();
                $data_s = [
                    "check" => $check_date,
                    "affiliated_agenciesname" => $affiliated_agenciesname,
                    "start_date" => $this->DateThai($open_rate['start_date']),
                    "end_date" => $this->DateThai($open_rate['end_date']),
                    "year" => $open_rate['year'],
                    "Semester" => $open_rate['semester'],
                    "data" => $data
                ];
                return $this->load->view('HomePresident', $data_s);
            } else if ($permission['status'] == 2) {
                $open_rate = $this->rate_model->rate_open();
                $data = $this->rate_model->rate_all($open_rate['semester'], $open_rate['year'], 2);
                $data_President =  $this->rate_model->rate_President($open_rate['semester'], $open_rate['year'], 2);
                // print_r($data);
                $affiliated_agencies = $this->user_model->affiliated_agencies();
                foreach ($affiliated_agencies as $v) {

                    if ($v['id'] == $permission['affiliated_agencies']) {
                        $affiliated_agenciesname = $v['name'];
                        break;
                    }
                }
                $check_date = $this->Open_rate();
                $data_s = [
                    "check" => $check_date,
                    "affiliated_agenciesname" => $affiliated_agenciesname,
                    "start_date" => $this->DateThai($open_rate['start_date']),
                    "end_date" => $this->DateThai($open_rate['end_date']),
                    "year" => $open_rate['year'],
                    "Semester" => $open_rate['semester'],
                    "data" => $data,
                    "data_President" => $data_President

                ];
                return $this->load->view('HomeExecutive', $data_s);
            }
        } else {
            redirect('./');
        }
    }

    public function profile()
    {
        $user_session = $this->session->userdata('user');

        if (isset($user_session)) {
            $affiliated_agencies  = $this->user_model->affiliated_agencies();
            $managementposition =  $this->user_model->managementposition();
            $officialposition =  $this->user_model->officialposition();
            $personneltype = $this->user_model->personneltype();
            $userdata = $this->user_model->UserData($user_session);
            foreach ($affiliated_agencies as $value) {

                if ($userdata['affiliated_agencies'] == $value['id']) {
                    $affiliated_agencies = $value['name'];
                    break;
                }
            }
            foreach ($managementposition as $value) {

                if ($userdata['managementposition'] == $value['id']) {
                    $managementposition = $value['name'];
                    break;
                }
            }
            foreach ($personneltype as $value) {

                if ($userdata['personneltype'] == $value['id']) {
                    $personneltype = $value['name'];
                    break;
                }
            }
            $data = [
                "userdata" => $userdata,
                "affiliated_agencies" => $affiliated_agencies,
                "managementposition" => $managementposition,
                "officialposition" => $officialposition,
                "personneltype" => $personneltype,
            ];

            return $this->load->view('profile', $data);
        } else {
            redirect('./');
        }
    }
    public function setting()
    {

        return $this->load->view('setting');
    }
}
