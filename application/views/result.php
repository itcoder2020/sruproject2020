<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">
   <link rel="stylesheet" href="asset/css/bootstrap.min.css">
   <link rel="stylesheet" href="asset/css/mdb.min.css">
   <link rel="stylesheet" href="asset/css/toastr.min.css">
   <link rel="stylesheet" href="asset/css/style.css">
   <link rel="stylesheet" href="asset/css/steppers.min.css">
   <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="asset/js/jquery.js"></script>
   <title>ผลการประเมิน</title>
</head>

<body>
   <!--Navbar--> <?php
                  $this->load->view('navbar');
                  ?>
   <div class="container" style="margin-top:120px;margin-bottom:120px;">
      <?php
      //print_r($data_President);
      //print_r($data);
      ?>
      <div class="card-body">
         <div class='card'>
            <div class='card-header text-center'>
               <h2>ผลการประเมิน </h2>
            </div>
            <div class='card-body'>
               <div class="table-responsive">
                  <table class="table table-striped text-center" border="1" id='tb_p'>
                     <thead class="table-dark">
                        <tr>
                           <th scope="col">ชื่อ-สกุล</th>
                           <th scope="col">หน่วยงานที่สังกัด</th>
                           <th scope="col">ปีการศึกษา</th>
                           <th scope="col">ภาคเรียน</th>
                           <th scope="col">ระดับ</th>
                           <th scope="col">คะแนนรวม</th>
                           <th scope="col">ดูเพิ่มเติม</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        foreach ($data as $key => $value) {
                           # code...

                        ?>
                           <tr>
                              <th scope="row"><?= $value['name_member'] ?></th>
                              <td><?= $value['name'] ?></td>
                              <th scope="row"><?= $value['year'] ?></th>
                              <th scope="row"><?= $value['Semester'] ?></th>
                              <th scope="row"><?php
                                                $sum = $value['total_score_p'] + $value['total_score_c'];
                                                if ($sum  >= 90) {
                                                   $message =  '<font color="green">ดีเด่น</font>';
                                                } else if ($sum >= 80 && $sum <= 89.99) {
                                                   $message =  '<font color="green">ดีมาก</font>';
                                                } else if ($sum >= 70 && $sum <= 79.99) {
                                                   $message =  '<font color="green">ดี</font>';
                                                } else if ($sum >= 60 && $sum <= 69.99) {
                                                   $message =  '<font color="#FF9900">พอใช้</font>';
                                                } else if ($sum >= 1 && $sum <= 59.99) {
                                                   $message =  '<font color="red">ต้องปรับปรุง</font>';
                                                }
                                                echo  $message;

                                                ?></th>
                              <th scope="row"><?= $value['total_score_p'] + $value['total_score_c'] ?></th>
                              <td> <a id="result1" id-result="<?= $value['id'] ?>">
                                    <span class="fa fa-arrow-right"></span>
                                 </a>
                              </td>
                           </tr>
                        <?php
                        }
                        ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <!-- <a class='btn btn-success text-light' id='Round'>รอบที่ </a> -->
      </div>
   </div>
   <!-- Modal -->
   <div class="modal fade" id="modalresult" tabindex="-1" role="dialog" aria-labelledby="modalresultModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="modalresultTitle"><i class="fa fa-list-alt"></i> ผลการประเมิน <small id='name'></small></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <table class="table table-striped" border="1">
                  <thead class="table-dark">
                     <tr>
                        <td style="width:50%" class=" text-center">องค์ประกอบการประเมิน</td>
                        <td style="width:25%" class=" text-center">น้ำหนัก</td>
                        <td style="width:25%" class=" text-center">คะแนนที่ได้</td>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td style="width:50%">1.การประเมินผลสำฤทธิ์ของงาน</td>
                        <td style="width:25%" class=" text-center">70</td>
                        <td style="width:25%" class=" text-center" id="total_score_p"></td>
                     </tr>
                     <tr>
                        <td style="width:50%">2.การประเมินพฤติกรรมการปฏิบัติราชการ</td>
                        <td style="width:25%" class=" text-center">30</td>
                        <td style="width:25%" class=" text-center" id="total_score_c"></td>
                     </tr>
                     <tr>
                        <td style="width:50%" class="text-right">รวม</td>
                        <td style="width:25%" class=" text-center">100</td>
                        <td style="width:25%" class=" text-center" id="sum_score"></td>
                     </tr>
                  </tbody>
               </table>
               <h4 class="text-center">ระดับการประเมิน <small id="message"></small></h4>
               <h5>จุดเด่นของผู้รับการประเมิน</h5>
               <div style="text-indent: 30px;" id="message1">
               </div>
               <h5>ข้อควรพัฒนา</h5>
               <div style="text-indent: 30px;" id="message2">
               </div>
               <h5>ข้อเสนอแนะเกี่ยวกับวิธีส่งเสริมและพัฒนา เพื่อจัดทำแผนพัฒนารายบุคคล</h5>
               <div style="text-indent: 30px;" id="message3">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times-circle"></i> ปิด</button>
            </div>
         </div>
      </div>
   </div>
   <script>
      $(document).ready(function() {
         $('#tb_p').DataTable();
         $('#tb_t').DataTable();
      });
   </script>
   <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" src="asset/js/steppers.min.js"></script>
   <script src="asset/js/popper.min.js"></script>
   <script src="asset/js/bootstrap.min.js"></script>
   <script src="asset/js/modules/file-input.min.js"></script>
   <script src="asset/js/toastr.min.js"></script>
   <script type="text/javascript" src="asset/js/mdb.min.js"></script>
   <script src="asset/js/script.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="asset/js/pace.min.js"></script>
</body>
<?php
$this->load->view('footer');
$this->load->view('preloader');
?>

</html>