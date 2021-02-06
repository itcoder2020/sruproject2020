<?php
class Rate_model extends CI_Model
{

  public function __construct()

  {
    parent::__construct();

    $this->load->database();
  }
  public function rate_open()
  {
    $query = $this->db->limit(1)->order_by("id", "DESC")->get('setting_date');
    return  $query->unbuffered_row('array');
  }
  public function compentency1()
  {
    $query = $this->db->get_where('compentency_detail', ['compentency_id' => 1]);
    return $query->result_array();
  }
  public function compentency2()
  {
    $query = $this->db->get_where('compentency_detail', ['compentency_id' => 2]);
    return $query->result_array();
  }
  public function compentency3()
  {
    $query = $this->db->get_where('compentency_detail', ['compentency_id' => 3]);
    return $query->result_array();
  }
  public function compentency4()
  {
    $query = $this->db->get_where('compentency_detail', ['compentency_id' => 4]);
    return $query->result_array();
  }
  public function compentency5()
  {
    $query = $this->db->get_where('compentency_detail', ['compentency_id' => 5]);
    return $query->result_array();
  }
  public function performance1_1()
  {
    $query = $this->db->get_where('performance_detail', ['performance_id' => 1]);
    return $query->result_array();
  }
  public function performance2_1()
  {
    $query = $this->db->get_where('performance_detail', ['performance_id' => 2]);
    return $query->result_array();
  }
  public function performance2_2()
  {
    $query = $this->db->get_where('performance_detail', ['performance_id' => 3]);
    return $query->result_array();
  }
  public function performance2_3()
  {
    $query = $this->db->get_where('performance_detail', ['performance_id' => 4]);
    return $query->result_array();
  }
  public function performance2_4()
  {
    $query = $this->db->get_where('performance_detail', ['performance_id' => 5]);
    return $query->result_array();
  }
  public function performance3_1()
  {
    $query = $this->db->get_where('performance_detail', ['performance_id' => 6]);
    return $query->result_array();
  }
  public function performance3_2()
  {
    $query = $this->db->get_where('performance_detail', ['performance_id' => 7]);
    return $query->result_array();
  }
  public function performance3_3()
  {
    $query = $this->db->get_where('performance_detail', ['performance_id' => 8]);
    return $query->result_array();
  }
  public function performance4_1()
  {
    $query = $this->db->get_where('performance_detail', ['performance_id' => 9]);
    return $query->result_array();
  }
  public function performance5_1()
  {
    $query = $this->db->get_where('performance_detail', ['performance_id' => 10]);
    return $query->result_array();
  }
  public function performance6_1()
  {
    $query = $this->db->get_where('performance_detail', ['performance_id' => 11]);
    return $query->result_array();
  }
  public function id_out_user($id)
  {
    $query = $this->db->get_where('rate', ['id' => $id]);
    return $query->unbuffered_row('array');
  }
  public function rate_select($username, $year, $Semester)
  {
    $sql = "SELECT *,rate.id,rate.status FROM `rate` LEFT JOIN member on member.username = rate.username LEFT JOIN rate_topic on rate_topic.rate_id = rate.id  WHERE member.username = ? and rate.Semester = ? and rate.year = ? ";
    $query = $this->db->query($sql, [$username, $Semester, $year]);
    return $query->unbuffered_row('array');
  }
  public function rate_insert($data)
  {
    $this->db->insert('rate', $data);
    $id = $this->db->insert_id();
    $this->db->insert('rate_topic', ['rate_id' => $id]);
    $this->db->insert('performance_score', ['rate_id' => $id]);
    $this->db->insert('compentency_score', ['rate_id' => $id]);
    $this->db->insert('workload_file', ['rate_id' => $id]);
  }
  public function update_update(){

  }
  public function sent($data,$status,$permiss)
  {
    $this->db->set('performance1_1', @$data['performance1_1']);
    $this->db->set('performance2_1', @$data['performance2_1']);
    $this->db->set('performance2_2', @$data['performance2_2']);
    $this->db->set('performance2_3', @$data['performance2_3']);
    $this->db->set('performance2_4', @$data['performance2_4']);
    $this->db->set('performance3_1', @$data['performance3_1']);
    $this->db->set('performance3_2', @$data['performance3_2']);
    $this->db->set('performance3_3', @$data['performance3_3']);
    $this->db->set('performance4_1', @$data['performance4_1']);
    $this->db->set('performance5_1', @$data['performance5_1']);
    $this->db->set('performance6_1', @$data['performance6_1']);
    $this->db->where('rate_id', $data['id']);
    $this->db->update('rate_topic');
    if ($permiss == 1 || $permiss == 2) {
        $this->db->set('message1', @$data['message1']);
        $this->db->set('message2', @$data['message2']);
        $this->db->set('message3', @$data['message3']);
        //$this->db->set('update', 1);
    }
    $this->db->set('status', $status);
    $this->db->where('id', $data['id']);
    $this->db->update('rate');
   
   
    
  }
  public function cancel_rate($id){
    $this->db->set('status', 0);
    $this->db->where('id', $id);
    $this->db->update('rate');
  }
  public function select_workloadfile($username){
    $query = $this->db->order_by('id', 'DESC')->limit(1)->get_where('rate', ['username' => $username]);
    $rate_id =  $query->unbuffered_row('array');
    $query = $this->db->get_where('workload_file', array('rate_id' => $rate_id['id']));
    return $query->unbuffered_row('array');
  }
  public function upload_workload($file_name,$username){
    $query = $this->db->order_by('id', 'DESC')->limit(1)->get_where('rate', ['username' => $username]);
    $rate_id =  $query->unbuffered_row('array');
    $this->db->set('file_name',$file_name);
    $this->db->where('rate_id', $rate_id['id']);
    $this->db->update('workload_file');
  }
  public function update_rate($data)
  {
    $this->db->set('performance1_1', @$data['performance1_1']);
    $this->db->set('performance2_1', @$data['performance2_1']);
    $this->db->set('performance2_2', @$data['performance2_2']);
    $this->db->set('performance2_3', @$data['performance2_3']);
    $this->db->set('performance2_4', @$data['performance2_4']);
    $this->db->set('performance3_1', @$data['performance3_1']);
    $this->db->set('performance3_2', @$data['performance3_2']);
    $this->db->set('performance3_3', @$data['performance3_3']);
    $this->db->set('performance4_1', @$data['performance4_1']);
    $this->db->set('performance5_1', @$data['performance5_1']);
    $this->db->set('performance6_1', @$data['performance6_1']);
    $this->db->where('rate_id', $data['id']);
    $this->db->update('rate_topic');
    if(isset($data['update'])){
      $this->db->set('message1', @$data['message1']);
      $this->db->set('message2', @$data['message2']);
      $this->db->set('message3', @$data['message3']);
      $this->db->set('update', 1);
      $this->db->where('id', $data['id']);
      $this->db->update('rate');
    }
  }
  public function del_file($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('performance_fileupload');
  }
  public function getfile_list($id, $performance_id)
  {

    $query = $this->db->where('performance_id', $performance_id)->where('rate_id', $id)->get('performance_fileupload');


    return $query->result_array();
  }
  public function upload_file($performance_id, $file_name, $username)
  {
    $query = $this->db->order_by('id', 'DESC')->limit(1)->get_where('rate', ['username' => $username]);
    $rate_id =  $query->unbuffered_row('array');
    $this->db->insert('performance_fileupload', ['performance_id' => $performance_id, "file_name" => $file_name, "rate_id" => $rate_id['id']]);
  }
  public function rate_($affiliated_agencies, $Semester, $year)
  {
    $sql = "SELECT *,rate.id FROM `rate` LEFT JOIN member on member.username = rate.username  WHERE rate.status = 1
    and member.affiliated_agencies = ? and rate.Semester = ? and rate.year = ? and member.status = 0";
    $query = $this->db->query($sql, [$affiliated_agencies, $Semester, $year]);
    return $query->result_array();
  }
  public function result_data($id){
    $sql = "SELECT compentency_score.rate_id,compentency_score.total_score_c,performance_score.total_score_p,member.name,rate.message1,rate.message2,rate.message3  FROM `compentency_score` LEFT JOIN performance_score on performance_score.rate_id = compentency_score.rate_id   LEFT JOIN rate on rate.id = compentency_score.rate_id LEFT JOIN  member on member.username = rate.username WHERE rate.id = ?";
    $query = $this->db->query($sql,[$id]);
    return $query->unbuffered_row('array');
  }
  public function result_all(){
    $sql = "SELECT *,rate.id,affiliated_agencies.name as name_a,member.name as name_member FROM `rate` LEFT JOIN member on member.username = rate.username left JOIN affiliated_agencies on affiliated_agencies.id = member.affiliated_agencies LEFT JOIN performance_score on performance_score.rate_id = rate.id LEFT JOIN compentency_score on compentency_score.rate_id = rate.id WHERE rate.status = 3 and member.status = 0";
    $query = $this->db->query($sql);
   return $query->result_array();
  }
  public function result_Persident(){
    $sql = "SELECT *,rate.id,affiliated_agencies.name as name_a,member.name as name_member FROM `rate` LEFT JOIN member on member.username = rate.username left JOIN affiliated_agencies on affiliated_agencies.id = member.affiliated_agencies LEFT JOIN performance_score on performance_score.rate_id = rate.id LEFT JOIN compentency_score on compentency_score.rate_id = rate.id WHERE rate.status = 3 and member.status = 1";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  public function rate_all($Semester, $year,$status)
  {
    $sql = "SELECT *,rate.id,affiliated_agencies.name as name_a,member.name as name_member  FROM `rate` LEFT JOIN member on member.username = rate.username  left JOIN affiliated_agencies on  affiliated_agencies.id = member.affiliated_agencies WHERE rate.status = ?
     and rate.Semester = ? and rate.year = ? and member.status = 0";
    $query = $this->db->query($sql, [$status,$Semester, $year]);
    return $query->result_array();
  }
  public function rate_President($Semester, $year,$status)
  {
    $sql = "SELECT *,rate.id,affiliated_agencies.name as name_a,member.name as name_member FROM `rate` left JOIN member on member.username = rate.username   left JOIN affiliated_agencies on  affiliated_agencies.id = member.affiliated_agencies WHERE rate.status = ?
     and rate.Semester = ? and rate.year = ? and member.status = 1";
    $query = $this->db->query($sql, [$status,$Semester, $year]);
    return $query->result_array();
  }

  public function update($data, $status,$permiss)
  {
    // print_r($data);
    $this->db->set('performance1_1', @$data['performance1_1']);
    $this->db->set('performance2_1', @$data['performance2_1']);
    $this->db->set('performance2_2', @$data['performance2_2']);
    $this->db->set('performance2_3', @$data['performance2_3']);
    $this->db->set('performance2_4', @$data['performance2_4']);
    $this->db->set('performance3_1', @$data['performance3_1']);
    $this->db->set('performance3_2', @$data['performance3_2']);
    $this->db->set('performance3_3', @$data['performance3_3']);
    $this->db->set('performance4_1', @$data['performance4_1']);
    $this->db->set('performance5_1', @$data['performance5_1']);
    $this->db->set('performance6_1', @$data['performance6_1']);
    $this->db->where('rate_id', $data['id']);
    $this->db->update('rate_topic');
    if ($permiss == 1 ||$permiss == 2 ) {
        $this->db->set('message1', @$data['message1']);
        $this->db->set('message2', @$data['message2']);
        $this->db->set('message3', @$data['message3']);
    }
    $this->db->set('update', 1);
    $this->db->set('status', $status);
    $this->db->where('id', $data['id']);
    $this->db->update('rate');

    $this->db->set('total_score_c', 'total_score_c+' . $data['total_score_c'], FALSE);
    $this->db->where('rate_id', $data['id']);
    $this->db->update('compentency_score');

    $this->db->set('total_score_p', $data['total_score_p']);
    $this->db->where('rate_id', $data['id']);
    $this->db->update('performance_score');
  }
  public function performance_weight()
  {
    $query = $this->db->get('performance_weight');
    return $query->result_array();
  }
  public function topic_update($id, $data)
  {
    $this->db->set('performance1_1', $data['performance1_1']);
    $this->db->set('performance2_1', $data['performance2_1']);
    $this->db->set('performance2_2', $data['performance2_2']);
    $this->db->set('performance2_3', $data['performance2_3']);
    $this->db->set('performance2_4', $data['performance2_4']);
    $this->db->set('performance3_1', $data['performance3_1']);
    $this->db->set('performance3_2', $data['performance3_2']);
    $this->db->set('performance3_3', $data['performance3_3']);
    $this->db->set('performance4_1', $data['performance4_1']);
    $this->db->set('performance5_1', $data['performance5_1']);
    $this->db->set('performance6_1', $data['performance6_1']);
    $this->db->where('rate_id', $id);
    $this->db->update('rate_topic');
  }
  public function rates_select($id, $sj)
  {
    $sql = "SELECT *,rate.id FROM `rate`  LEFT JOIN member on member.username = rate.username LEFT JOIN rate_topic on rate_topic.rate_id = rate.id  WHERE rate.status = 1
    and rate.id = ? and member.affiliated_agencies = ? and member.status = 0";
    $query = $this->db->query($sql, [$id, $sj]);
    return $query->unbuffered_row('array');
  }
  public function result_me($username){
    $sql = "SELECT *,rate.id,affiliated_agencies.name as name_a,member.name as name_member  FROM `rate` LEFT JOIN member on member.username = rate.username  LEFT JOIN performance_score on performance_score.rate_id = rate.id LEFT JOIN compentency_score on compentency_score.rate_id = rate.id left JOIN affiliated_agencies on  affiliated_agencies.id = member.affiliated_agencies WHERE rate.status = 3 and rate.username = ?";
    $query = $this->db->query($sql,[$username]);
   return $query->result_array();
  }
  public function result_sj($sj){
    $sql = "SELECT  *,rate.id,member.name as name_member FROM `rate`  LEFT JOIN member on member.username = rate.username LEFT JOIN performance_score on performance_score.rate_id = rate.id LEFT JOIN compentency_score on compentency_score.rate_id = rate.id LEFT JOIN rate_topic on rate_topic.rate_id = rate.id  WHERE rate.status = 3
    and member.affiliated_agencies = ? and member.status = 0";
    $query = $this->db->query($sql,[$sj]);
   return $query->result_array();
    }
  public function rates_select_($id)
  {
    $sql = "SELECT *,rate.id FROM `rate`  LEFT JOIN member on member.username = rate.username LEFT JOIN rate_topic on rate_topic.rate_id = rate.id WHERE rate.status = 2
    and rate.id = ? ";
    $query = $this->db->query($sql, [$id]);
    return $query->unbuffered_row('array');
  }
  public function update_status($username, $year, $Semester, $status)
  {
    $this->db->set('status', $status);
    $this->db->where('username', $username);
    $this->db->where('year', $year);
    $this->db->where('Semester', $Semester);
    $this->db->update('rate');
  }
  public function check_rate($username, $year, $Semester)
  {

    $query = $this->db->get_where('rate', array('username' => $username, 'year' => $year, 'Semester' => $Semester));

    $result = $query->num_rows();

    return $result;
  }
}
