<?php
class User_model extends CI_Model
{

    public function __construct()

    {
        parent::__construct();

        $this->load->database();
    }
    public function login($username, $password)
    {
        $query = $this->db->get_where('member', array('username' => $username,'password'=>$password));
        $result = $query->num_rows();
        return $result;
    }
    public function UserData($username){
        $query = $this->db->get_where('member', array('username' => $username));
        return $query->unbuffered_row('array');
    }
    public function register($data){

        $this->db->insert('member', $data);
    }
    public function Check_Username($username){
        $query = $this->db->get_where('member', array('username' => $username));

        $result = $query->num_rows();

        return $result;

    }
    public function Check_Email($email){
        $query = $this->db->get_where('member', array('email' => $email));

        $result = $query->num_rows();

        return $result;

    }
    public function Check_Name($name){
        $query = $this->db->get_where('member', array('name' => $name));

        $result = $query->num_rows();

        return $result;

    }
    public function chang_password($username,$password){
        $this->db->set('password',$password);
        $this->db->where('username',$username);
        $this->db->update('member');
    }
    public function edit_profile($username,$data){
        $this->db->set('name',$data['name']);
        $this->db->set('officialposition',$data['officialposition']);
        $this->db->where('username',$username);
        $this->db->update('member');

    }
    public function affiliated_agencies(){
        $query = $this->db->get('affiliated_agencies');
        return $query->result_array();
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
}
