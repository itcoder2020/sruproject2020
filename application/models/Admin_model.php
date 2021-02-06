<?php
class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }
    public function login($username,$password){
        $query = $this->db->get_where('administrator', array('username' => $username,'password'=>$password));
        $result = $query->num_rows();
        return $result;
    }
    public function profile($username){
        $query = $this->db->get_where('administrator', array('username' => $username));
        return $query->unbuffered_row('array');
    }
    public function check_password($password){
        $query = $this->db->get_where('administrator', array('password' => $password));
        $result = $query->num_rows();
        return $result;
    }
    public function select_weight($id){
        $query = $this->db->get_where('performance_weight', array('id' => $id));
        return $query->unbuffered_row('array');

    }
    public function update_weight($data){
        $this->db->set('weight_value',$data['weight']);
        $this->db->where('id',$data['id']);
        $this->db->update('performance_weight');

    }
    public function result_all(){
        $sql = "SELECT *,rate.id,affiliated_agencies.name as name_a,member.name as name_member,rate.status as rate_status  FROM `rate` LEFT JOIN member on member.username = rate.username  left JOIN affiliated_agencies on  affiliated_agencies.id = member.affiliated_agencies ";
        $query = $this->db->query($sql);
       return $query->result_array();
      }
    public function last_login($username){
        $last = date('Y-m-d H:i:s');
        $this->db->set('last_login',$last);
        $this->db->where('username',$username);
        $this->db->update('administrator');
    }
    public function edit_member($data){
      //  print_r($data);
        $this->db->set('name',$data['name']);
        $this->db->set('personneltype',$data['personneltype']);
        $this->db->set('affiliated_agencies',$data['affiliated_agencies']);
        $this->db->set('officialposition',$data['officialposition']);
        $this->db->set('managementposition',$data['managementposition']);
        $this->db->set('password',$data['password']);
        $this->db->set('status',$data['status']);
        $this->db->where('id',$data['id']);
        $this->db->update('member');

    }
    public function change_password($password){
          $this->db->set('password',$password);
          $this->db->where('id',1);
          $this->db->update('administrator');
  
      }
    public function edit_date($data){
        if($data['end_date'] == '____/__/__ __:__' && $data['start_date'] =='____/__/__ __:__'){
            $this->db->set('year',$data['year']);
            $this->db->set('semester',$data['semester']);
            $this->db->where('id',$data['id']);
            $this->db->update('setting_date');
  
            $this->db->set('year',$data['year']);
            $this->db->set('Semester',$data['semester']);
            $this->db->where('code_date',$data['code_date']);
            $this->db->update('rate');

        }
        else if($data['start_date'] =='____/__/__ __:__'){
            $this->db->set('end_date',$data['end_date']);
            $this->db->set('year',$data['year']);
            $this->db->set('semester',$data['semester']);
            $this->db->where('id',$data['id']);
            $this->db->update('setting_date');
  
            $this->db->set('year',$data['year']);
            $this->db->set('Semester',$data['semester']);
            $this->db->where('code_date',$data['code_date']);
            $this->db->update('rate');

        } else if($data['end_date'] == '____/__/__ __:__'){
            $this->db->set('start_date',$data['start_date']);
            $this->db->set('year',$data['year']);
            $this->db->set('semester',$data['semester']);
            $this->db->where('id',$data['id']);
            $this->db->update('setting_date');
  
            $this->db->set('year',$data['year']);
            $this->db->set('Semester',$data['semester']);
            $this->db->where('code_date',$data['code_date']);
            $this->db->update('rate');

        } else{
            $this->db->set('start_date',$data['start_date']);
            $this->db->set('end_date',$data['end_date']);
            $this->db->set('year',$data['year']);
            $this->db->set('semester',$data['semester']);
            $this->db->where('id',$data['id']);
            $this->db->update('setting_date');
  
            $this->db->set('year',$data['year']);
            $this->db->set('Semester',$data['semester']);
            $this->db->where('code_date',$data['code_date']);
            $this->db->update('rate');

        }
 
  
      }
    public function member_data($id){
        $query = $this->db->get_where('member', array('id' => $id));
        return $query->unbuffered_row('array');
    }
    public function date_data($id){
        $query = $this->db->get_where('setting_date', array('id' => $id));
        return $query->unbuffered_row('array');
    }
    public function member_all(){
        $query = $this->db->get('member');
        return $query->result_array();
    }
    public function add_date( $data){
        $this->db->insert('setting_date', $data);
    }
    public function date_all(){
        $query = $this->db->get('setting_date');
        return $query->result_array();
    }
    public function get_weight(){
        $query = $this->db->get('performance_weight');
        return $query->result_array();
    }
    public function date_delete($id){
        $this->db->where('id', $id);
        $this->db->delete('setting_date');
    }
    public function managementposition(){
        $query = $this->db->get('managementposition');
        return $query->result_array();
    }
    public function officialposition(){
        $query = $this->db->get('officialposition');
        return $query->result_array();
    }
    public function personneltype(){
        $query = $this->db->get('personneltype');
        return $query->result_array();
    }
    public function affiliated_agencies(){
        $query = $this->db->get('affiliated_agencies');
        return $query->result_array();
    }
    public function del_user($id){
        $query = $this->db->get_where('member', array('id' => $id));
        $user = $query->unbuffered_row('array');
        $query = $this->db->get_where('rate', array('username' => $user['username']));
        $id = $query->result_array('array');
        foreach ($id as $value) {
            $this->db->where('rate_id',  $value['id']);
            $this->db->delete('compentency_score');
            $this->db->where('rate_id',  $value['id']);
            $this->db->delete('performance_score');
            $this->db->where('rate_id',  $value['id']);
            $this->db->delete('performance_fileupload');
            $this->db->where('rate_id',  $value['id']);
            $this->db->delete('workload_file');
            $this->db->where('id',  $value['id']);
            $this->db->delete('rate');
            $this->db->where('rate_id',  $value['id']);
            $this->db->delete('rate_topic');
        }
        $this->db->where('username',  $user['username']);
        $this->db->delete('member');
        $dir = 'fileupload/'.$user['username'];
        $objects = scandir($dir);
			
        foreach ($objects as $object)
        {
            if ($object != '.' && $object != '..')
            {
                if (filetype($dir.'/'.$object) == 'dir') {rrmdir($dir.'/'.$object);}
                else {unlink($dir.'/'.$object);}
            }
        }
        
        reset($objects);
        rmdir($dir);
       
      

      //  echo getcwd() . "\n";

    }
    public function del_date($id){
        $this->db->where('id', $id);
        $this->db->delete('setting_date');

    }
}