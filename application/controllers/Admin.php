<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('asia/bangkok');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin_model');
        $this->load->library('session');
    }
    public function login(){
        $user_session = $this->session->userdata('admin');
        if (isset($user_session)) {
            redirect('admin/main');
        }
        return $this->load->view('admin/login');
    }
    public function manage_member(){
        $user_session = $this->session->userdata('admin');
        if(isset($user_session)){

            $data = [
                'user'=>$this->admin_model->member_all(),
                'managementposition'=>$this->admin_model->managementposition(),
                'officialposition'=>$this->admin_model->officialposition(),
                'personneltype'=>$this->admin_model->personneltype(),
                'affiliated_agencies'=>$this->admin_model->affiliated_agencies(),
            ];
        }else{
            redirect('admin');

        }
        return $this->load->view('admin/manage_member', $data);
    }
    public function data_member(){
        $user_session = $this->session->userdata('admin');
        if ($_POST['id']) {
            if (isset($user_session)) {
                $data =  $this->admin_model->member_data($_POST['id']);
                $data = [
                'data'=> $data,
                'managementposition'=>$this->admin_model->managementposition(),
                'officialposition'=>$this->admin_model->officialposition(),
                'personneltype'=>$this->admin_model->personneltype(),
                'affiliated_agencies'=>$this->admin_model->affiliated_agencies(),
            ];
            } else {
                redirect('admin');
            }
            return $this->load->view('admin/edit_member', $data);
        }
    }
    public function data_weight(){
        $user_session = $this->session->userdata('admin');
        if ($_POST['id']) {
            if (isset($user_session)) {
                $data =  $this->admin_model->select_weight($_POST['id']);
                $data = [
                'data'=> $data,
            ];
            } else {
                redirect('admin');
            }
            return $this->load->view('admin/edit_weight', $data);
        }
    }
    public function setting(){
        $user_session = $this->session->userdata('admin');
        
            if (isset($user_session)) {
                $data =  $this->admin_model->get_weight();
                $data = [
                'data'=> $data,
            ];
            } else {
                redirect('admin');
            }
            return $this->load->view('admin/setting_rate',$data);
        
            
    }
    public function change_pass(){
            $user_session = $this->session->userdata('admin');
        
            if (isset($user_session)) {
                
            
            } else {
                redirect('admin');
            }
            return $this->load->view('admin/change_password');

    }
    public function data_date(){
        $user_session = $this->session->userdata('admin');
        if ($_POST['id']) {
            if (isset($user_session)) {
                $data =  $this->admin_model->date_data($_POST['id']);
                $data = [
                'data'=> $data,
            ];
            } else {
                redirect('admin');
            }
            return $this->load->view('admin/edit_date', $data);
        }
    }
    public function manage_date(){
        $user_session = $this->session->userdata('admin');
        if(isset($user_session)){
            $all = $this->admin_model->date_all();
            $data = [
                'all'=>$all
            ];
          
        }else{
            redirect('admin');

        }
        return $this->load->view('admin/manage_date',$data);
    }
    public function manage_rate(){
        $user_session = $this->session->userdata('admin');
        if(isset($user_session)){

           $data =  $this->admin_model->result_all();
           $data = [
               'data'=>$data
           ];
        }else{
            redirect('admin');

        }
        return $this->load->view('admin/manage_rate',$data);
    }
    public function main(){

        $user_session = $this->session->userdata('admin');
        if(isset($user_session)){

           // redirect('manage_date');
        }else{
            redirect('admin');

        }
        return $this->load->view('admin/main');
    }
    
}