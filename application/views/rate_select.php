<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="../asset/img/logo.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="../asset/img/logo.png" type="image/x-icon"/>
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">
      <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
      <link rel="stylesheet" href="../asset/css/mdb.min.css">
      <link rel="stylesheet" href="../asset/css/mdb.css">
      <link rel="stylesheet" href="../asset/css/toastr.min.css">
      <link rel="stylesheet" href="../asset/css/style.css">
      <link rel="stylesheet" href="../asset/css/steppers.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="../asset/js/jquery.js"></script>
      <title>แบบประเมิน</title>
   </head>
   <style>

   </style>
   <body>
      <!--Navbar--> <?php
         $this->load->view('navbar');
         
         
         ?>
      <div class="container" style="margin-top:120px;margin-bottom:120px;">
         <div class="card my-5">
            <div class="card-header">
               <div class='text-center '>
                  <h1>แบบประเมิน</h1>
                  <h5>(<?= $data['name'] ?>)</h5>
                  <input type="hidden" id="status" value='<?= $data['status'] ?>'>
               </div>
            </div>
            <div class="card-body">
               <!-- <a class='btn btn-success text-light' id='Round'>รอบที่ </a> -->
               <div id='body'>
                  <div class="accordion" id="accordionExample">
                     <div class="card">
                        <div class="card-header" id="headingOne">
                           <h2 class="mb-0">
                              <a class="btn btn-link text-dark" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 <h6 class="mb-0"> 1) การประเมินผลสัมฤทธ์ของงาน (70 คะแนน) <i class="fa fa-angle-down rotate-icon"></i> </h6>
                              </a>
                           </h2>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                           <div class="card-body">
                              <form action="" method="post">
                                 <ul class="stepper">
                                    <li class="step active">
                                       <div data-step-label="" class="step-title waves-effect waves-dark">1.ด้านภาระงาน</div>
                                       <div class="step-new-content">
                                          <?php
                                             //print_r($data);
                                             ?>
                                          <fieldset>
                                             <legend for="performance1_1">1.1 ภาระงานรวม ภาคปกติ</legend>
                                             <div class="form-group" name='performance1_1'>
                                                <p>(หมายถึงผลรวมของภาระงานตามพันธกิจ 4 ด้าน ซึ่งเป็นไปตามเกณฑ์ที่มหาวิทยาลัยประกาศและมีหลักฐานประกอบ)</p>
                                                <?php
                                                   //print_r($performance1_1);
                                                   foreach ($performance1_1 as $v) {
                                                       if ($v['level'] == $data['performance1_1']) {
                                                           $checked = ' checked="checked" ';
                                                       } else {
                                                   
                                                           $checked = '';
                                                       }
                                                   ?>
                                                <div class="radio">
                                                   <label>
                                                   <input type="radio" <?= $checked ?> name="performance1_1" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                </div>
                                                <?php
                                                   }
                                                   ?>
                                             </div>
                                             <div>
                                                <?php
                                               if ($workload_file['file_name'] !='') {
                                                   ?>
                                                <a  class="btn btn-danger btn-sm"href="../xls/<?= $data['username']?>/<?=$workload_file['file_name']?>"><i class="fa fa-download" aria-hidden="true"></i>
 ดูภาระงาน</a>                 
 <?php
                                               }
 ?>
                                             </div>
                                          </fieldset>
                                          <hr>
                                          <?php
                                            if (!empty($listfile_1_1)) {
                                                ?>
                                          <div class="table-responsive">
                                             <table class="table table-striped text-center" border="1">
                                                <thead class="table-dark">
                                                   <tr>
                                                      <td><h3>หลักฐาน</h3></td>
                                                   </tr>
                                                </thead>
                                                <tr>
                                                   <?php
                                                    if (isset($listfile_1_1)) {
                                                        foreach ($listfile_1_1 as $value) {
                                                            ?> 
                                                   <td>
                                                      <?php
                                                         
                                                         if (strpos($value['file_name'], 'pdf') == true) {
                                                             ?> <a target="_blank" class="nav-link" href="../pdf/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } else {
                                                             ?> <a target="_blank" class="nav-link" href="../word/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } ?>
                                                   </td>
                                                </tr>
                                                <?php
                                                        }
                                                    } ?>
                                             </table>
                                          </div>
<?php
                                            }
?>
                                          <hr>
                                          <!-- Default input -->
                                          <label for="inputDisabledEx2" class="disabled">ค่าน้ำหนัก</label>
                                          <input type="text" id="weight1_1" class="form-control" value='<?= $weight[0]['weight_value'] ?>' disabled>
                                          <label for="inputDisabledEx2" class="disabled">คะแนนที่ได้</label>
                                          <input type="text" id="score1_1" pattern="[0-9]+" class="form-control" disabled>
                                          <label for="inputDisabledEx2" class="disabled">ผลการประเมิน</label>
                                          <input type="text" id="scores1_1" class="form-control" disabled>
                                          <div class="step-actions">
                                             <button class="waves-effect waves-dark btn btn-sm btn-primary next-step"><i class="fa fa-arrow-right"></i> ถัดไป</button>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="step">
                                       <div class="step-title waves-effect waves-dark">2.ด้านการสอนและผลิตบัณฑิต</div>
                                       <div class="step-new-content">
                                          <fieldset>
                                             <legend for="1628660912">2.1 เอกสารประกอบการสอนหรือเอกสารคำสอนหรือตำรา</legend>
                                             <div class="form-group">
                                                <p>(หมายถึงเอกสารที่จัดทำ/ปรับปรุงขึ้นในปีที่ทำการประเมิน และมีหลักฐานประกอบโดยเอกสาร 1 เล่ม ใช้ประเมินได้ 1 ปีแล้วสามารถปรับปรุงใช้ประเมินในปีต่อไป)</p>
                                                <?php
                                                   foreach ($performance2_1 as $v) {
                                                       if ($v['level'] == $data['performance2_1']) {
                                                           $checked = ' checked="checked" ';
                                                       } else {
                                                   
                                                           $checked = '';
                                                       }
                                                   ?>
                                                <div class="radio">
                                                   <label>
                                                   <input type="radio" <?= $checked ?> name="performance2_1" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                </div>
                                                <?php
                                                   }
                                                   ?>
                                             </div>
                                          </fieldset>
                                          <hr>
                                          <?php
                                            if (!empty($listfile_2_1)) {
                                                ?>
                                          <div class="table-responsive">
                                             <table class="table table-striped text-center" border="1">
                                                <thead class="table-dark">
                                                   <tr>
                                                      <td><h3>หลักฐาน</h3></td>
                                                   </tr>
                                                </thead>
                                                <tr>
                                                   <?php
                                                    if (isset($listfile_2_1)) {
                                                        foreach ($listfile_2_1 as $value) {
                                                            ?> 
                                                   <td>
                                                      <?php
                                                      
                                                         if (strpos($value['file_name'], 'pdf') == true) {
                                                             ?> <a target="_blank" class="nav-link" href="../pdf/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } else {
                                                             ?> <a target="_blank" class="nav-link" href="../word/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } ?>
                                                   </td>
                                                </tr>
                                                <?php
                                                        }
                                                    } ?>
                                             </table>
                                          </div>
                                                   <?php
                                            }
                                                   ?>
                                          <hr>
                                          <!-- Default input -->
                                          <label for="inputDisabledEx2" class="disabled">ค่าน้ำหนัก</label>
                                          <input type="text" id="weight2_1" class="form-control" value='<?= $weight[1]['weight_value'] ?>' disabled>
                                          <label for="inputDisabledEx2" class="disabled">คะแนนที่ได้</label>
                                          <input type="text" id="score2_1" pattern="[0-9]+" class="form-control" disabled>
                                          <label for="inputDisabledEx2" class="disabled">ผลการประเมิน</label>
                                          <input type="text" id="scores2_1" class="form-control" disabled>
                                          <!-- Field type: "choices" id: "717043520" -->
                                          <fieldset>
                                             <legend for="717043520">2.2 การจัดกิจกรรมการเรียนการสอน</legend>
                                             <div class="form-group">
                                                <p>(การจัดการเรียนการสอน จะประเมินจาก มคอ.3,4 และผลการประเมินความพึงพอใจของนักศึกษาเป็นหลักฐานประกอบ)</p>
                                                <?php
                                                   foreach ($performance2_2 as $v) {
                                                       if ($v['level'] == $data['performance2_2']) {
                                                           $checked = ' checked="checked" ';
                                                       } else {
                                                   
                                                           $checked = '';
                                                       }
                                                   ?>
                                                <div class="radio">
                                                   <label>
                                                   <input type="radio" <?= $checked ?> name="performance2_2" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                </div>
                                                <?php
                                                   }
                                                   ?>
                                             </div>
                                          </fieldset>
                                          <hr>
                                          <?php
                                            if (!empty($listfile_2_2)) {
                                                ?>
                                          <div class="table-responsive">
                                             <table class="table table-striped text-center" border="1">
                                                <thead class="table-dark">
                                                   <tr>
                                                      <td><h3>หลักฐาน</h3></td>
                                                   </tr>
                                                </thead>
                                                <tr>
                                                   <?php
                                                    if (isset($listfile_2_2)) {
                                                        foreach ($listfile_2_2 as $value) {
                                                            ?> 
                                                   <td>
                                                      <?php
                                                         if (strpos($value['file_name'], 'pdf') == true) {
                                                             ?> <a target="_blank" class="nav-link" href="../pdf/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } else {
                                                             ?> <a target="_blank" class="nav-link" href="../word/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } ?>
                                                   </td>
                                                </tr>
                                                <?php
                                                        }
                                                    } ?>
                                             </table>
                                          </div>
                                                   <?php
                                            }
                                                   ?>
                                          <hr>
                                          <!-- Default input -->
                                          <label for="inputDisabledEx2" class="disabled">ค่าน้ำหนัก</label>
                                          <input type="text" id="weight2_2" class="form-control" value='<?= $weight[2]['weight_value'] ?>' disabled>
                                          <label for="inputDisabledEx2" class="disabled">คะแนนที่ได้</label>
                                          <input type="text" id="score2_2" pattern="[0-9]+" class="form-control" disabled>
                                          <label for="inputDisabledEx2" class="disabled">ผลการประเมิน</label>
                                          <input type="text" id="scores2_2" class="form-control" disabled>
                                          <!-- Field type: "choices" id: "106633996" -->
                                          <fieldset>
                                             <legend for="106633996">2.3 ผลการบริหารหลักสูตร </legend>
                                             <div class="form-group">
                                                <p>(หมายถึงผลการประกันคุณภาพในระดับหลักสูตร ที่อาจารย์สังกัดในปีล่าสุด ก่อนภาคเรียนที่ทำการประเมิน แต่จะไม่รวมตัวบ่งชี้คุณสมบัติอาจารย์ประจำหลักสูตร)</p>
                                                <?php
                                                   foreach ($performance2_3 as $v) {
                                                       if ($v['level'] == $data['performance2_3']) {
                                                           $checked = ' checked="checked" ';
                                                       } else {
                                                   
                                                           $checked = '';
                                                       }
                                                   ?>
                                                <div class="radio">
                                                   <label>
                                                   <input type="radio" <?= $checked ?> name="performance2_3" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                </div>
                                                <?php
                                                   }
                                                   ?>
                                             </div>
                                          </fieldset>
                                          <hr>
                                          <?php
                                            if (!empty($listfile_2_3)) {
                                                ?>
                                          <div class="table-responsive">
                                             <table class="table table-striped text-center" border="1">
                                                <thead class="table-dark">
                                                   <tr>
                                                      <td><h3>หลักฐาน</h3></td>
                                                   </tr>
                                                </thead>
                                                <tr>
                                                   <?php
                                                    if (isset($listfile_2_3)) {
                                                        foreach ($listfile_2_3 as $value) {
                                                            ?> 
                                                   <td>
                                                      <?php
                                                         if (strpos($value['file_name'], 'pdf') == true) {
                                                             ?> <a target="_blank" class="nav-link" href="../pdf/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } else {
                                                             ?> <a target="_blank" class="nav-link" href="../word/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } ?>
                                                   </td>
                                                </tr>
                                                <?php
                                                        }
                                                    } ?>
                                             </table>
                                          </div>
<?php
                                            }
?>
                                          <hr>
                                          <!-- Default input -->
                                          <label for="inputDisabledEx2" class="disabled">ค่าน้ำหนัก</label>
                                          <input type="text" id="weight2_3" class="form-control" value='<?= $weight[3]['weight_value'] ?>' disabled>
                                          <label for="inputDisabledEx2" class="disabled">คะแนนที่ได้</label>
                                          <input type="text" id="score2_3" pattern="[0-9]+" class="form-control" disabled>
                                          <label for="inputDisabledEx2" class="disabled">ผลการประเมิน</label>
                                          <input type="text" id="scores2_3" class="form-control" disabled>
                                          <!-- Field type: "short" id: "1600155582" -->
                                          <!-- Field type: "choices" id: "933038004" -->
                                          <fieldset>
                                             <legend for="933038004">2.4 ด้านการพัฒนาตนเอง เพื่อการผลิตบัณฑิตที่พึงประสงค์</legend>
                                             <div class="form-group">
                                                <?php
                                                   foreach ($performance2_4 as $v) {
                                                       if ($v['level'] == $data['performance2_4']) {
                                                           $checked = ' checked="checked" ';
                                                       } else {
                                                   
                                                           $checked = '';
                                                       }
                                                   ?>
                                                <div class="radio">
                                                   <label>
                                                   <input type="radio" <?= $checked ?> name="performance2_4" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                </div>
                                                <?php
                                                   }
                                                   ?>
                                             </div>
                                          </fieldset>
                                          <hr>
                                          <?php
                                            if (!empty($listfile_2_4)) {
                                                ?>
                                          <div class="table-responsive">
                                             <table class="table table-striped text-center" border="1">
                                                <thead class="table-dark">
                                                   <tr>
                                                      <td><h3>หลักฐาน</h3></td>
                                                   </tr>
                                                </thead>
                                                <tr>
                                                   <?php
                                                   if (isset($listfile_2_4)) {
                                                       foreach ($listfile_2_4 as $value) {
                                                           ?> 
                                                   <td>
                                                      <?php
                                                         if (strpos($value['file_name'], 'pdf') == true) {
                                                             ?> <a target="_blank" class="nav-link" href="../pdf/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } else {
                                                             ?> <a target="_blank" class="nav-link" href="../word/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } ?>
                                                   </td>
                                                </tr>
                                                <?php
                                                       }
                                                   } ?>
                                             </table>
                                          </div>
                                                   <?php
                                            }
                                                   ?>
                                          <hr>
                                          <!-- Default input -->
                                          <label for="inputDisabledEx2" class="disabled">ค่าน้ำหนัก</label>
                                          <input type="text" id="weight2_4" class="form-control" value='<?= $weight[4]['weight_value'] ?>' disabled>
                                          <label for="inputDisabledEx2" class="disabled">คะแนนที่ได้</label>
                                          <input type="text" id="score2_4" pattern="[0-9]+" class="form-control" disabled>
                                          <label for="inputDisabledEx2" class="disabled">ผลการประเมิน</label>
                                          <input type="text" id="scores2_4" class="form-control" disabled>
                                          <div class="step-actions">
                                             <button class="waves-effect waves-dark btn btn-sm btn-primary next-step"><i class="fa fa-arrow-right"></i> ถัดไป</button>
                                             <button class="waves-effect waves-dark btn btn-sm btn-danger previous-step">กลับ</button>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="step">
                                       <div class="step-title waves-effect waves-dark">3.ด้านงานวิจัยและสร้างสรรค์วิชาการ</div>
                                       <div class="step-new-content">
                                          <fieldset>
                                             <legend for="465137235">3.1 จำนวนทุนสนับสนุนงานวิจัย</legend>
                                             <div class="form-group">
                                                <p>(งานวิจัยที่ได้รับจัดสรรทุน สามารถใช้ในการประเมินในช่วงเวลา1 ปี หลังจากการทำสัญญาขอรับทุน โดยไม่นับการขยายเวลา)</p>
                                                <?php
                                                   foreach ($performance3_1 as $v) {
                                                       if ($v['level'] == $data['performance3_1']) {
                                                           $checked = ' checked="checked" ';
                                                       } else {
                                                   
                                                           $checked = '';
                                                       }
                                                   ?>
                                                <div class="radio">
                                                   <label>
                                                   <input type="radio" <?= $checked ?> name="performance3_1" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                </div>
                                                <?php
                                                   }
                                                   ?>
                                             </div>
                                          </fieldset>
                                          <hr>
                                          <?php
                                            if (!empty($listfile_3_1)) {
                                                ?>
                                          <div class="table-responsive">
                                             <table class="table table-striped text-center" border="1">
                                                <thead class="table-dark">
                                                   <tr>
                                                      <td><h3>หลักฐาน</h3></td>
                                                   </tr>
                                                </thead>
                                                <tr>
                                                   <?php
                                                   if (isset($listfile_3_1)) {
                                                       foreach ($listfile_3_1 as $value) {
                                                           ?> 
                                                   <td>
                                                      <?php
                                                         if (strpos($value['file_name'], 'pdf') == true) {
                                                             ?> <a target="_blank" class="nav-link" href="../pdf/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } else {
                                                             ?> <a target="_blank" class="nav-link" href="../word/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } ?>
                                                   </td>
                                                </tr>
                                                <?php
                                                       }
                                                   } ?>
                                             </table>
                                          </div>
                                                   <?php
                                            }
                                                   ?>
                                          <hr>
                                          <!-- Default input -->
                                          <label for="inputDisabledEx2" class="disabled">ค่าน้ำหนัก</label>
                                          <input type="text" id="weight3_1" class="form-control" value='<?= $weight[5]['weight_value'] ?>' disabled>
                                          <label for="inputDisabledEx2" class="disabled">คะแนนที่ได้</label>
                                          <input type="text" id="score3_1" pattern="[0-9]+" class="form-control" disabled>
                                          <label for="inputDisabledEx2" class="disabled">ผลการประเมิน</label>
                                          <input type="text" id="scores3_1" class="form-control" disabled>
                                          <!-- Field type: "choices" id: "1300834964" -->
                                          <fieldset>
                                             <legend for="1300834964">3.2 การมีส่วนร่วมในงานวิจัยที่มีการดำเนินการ</legend>
                                             <div class="form-group">
                                                <p>(งานวิจัยที่ได้รับจัดสรรทุน สามารถใช้ในการประเมินในช่วงเวลา 1 ปี หละงจากการทำสัญญาขอรับทุน โดยไม่นับการขยายเวลา)</p>
                                                <?php
                                                   foreach ($performance3_2 as $v) {
                                                       if ($v['level'] == $data['performance3_2']) {
                                                           $checked = ' checked="checked" ';
                                                       } else {
                                                   
                                                           $checked = '';
                                                       }
                                                   ?>
                                                <div class="radio">
                                                   <label>
                                                   <input type="radio" <?= $checked ?> name="performance3_2" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                </div>
                                                <?php
                                                   }
                                                   ?>
                                             </div>
                                          </fieldset>
                                          <hr>
                                          <?php
                                            if (!empty($listfile_3_2)) {
                                                ?>
                                          <div class="table-responsive">
                                             <table class="table table-striped text-center" border="1">
                                                <thead class="table-dark">
                                                   <tr>
                                                      <td><h3>หลักฐาน</h3></td>
                                                   </tr>
                                                </thead>
                                                <tr>
                                                   <?php
                                                   if (isset($listfile_3_2)) {
                                                       foreach ($listfile_3_2 as $value) {
                                                           ?> 
                                                   <td>
                                                      <?php
                                                         if (strpos($value['file_name'], 'pdf') == true) {
                                                             ?> <a target="_blank" class="nav-link" href="../pdf/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } else {
                                                             ?> <a target="_blank" class="nav-link" href="../word/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } ?>
                                                   </td>
                                                </tr>
                                                <?php
                                                       }
                                                   } ?>
                                             </table>
                                          </div>
                                                   <?php
                                            }
                                                   ?>
                                          <hr>
                                          <!-- Default input -->
                                          <label for="inputDisabledEx2" class="disabled">ค่าน้ำหนัก</label>
                                          <input type="text" id="weight3_2" class="form-control" value='<?= $weight[6]['weight_value'] ?>' disabled>
                                          <label for="inputDisabledEx2" class="disabled">คะแนนที่ได้</label>
                                          <input type="text" id="score3_2" pattern="[0-9]+" class="form-control" disabled>
                                          <label for="inputDisabledEx2" class="disabled">ผลการประเมิน</label>
                                          <input type="text" id="scores3_2" class="form-control" disabled>
                                          <!-- Field type: "choices" id: "1303417440" -->
                                          <fieldset>
                                             <legend for="1303417440">3.3 กระบวนการดำเนินการวิจัย</legend>
                                             <div class="form-group">
                                                <p>(ระดับ 5 สามารถใช้ผลงานตีพิมพ์ เผยแพร่ ในรอบที่มีการตีพิมพ์เผยแพร่ของรอบประเมินนั้น ซึ่งอาจจะอยู่ในรอบวิจัยหลังจากปีที่ทำวิจัยก็ได้)</p>
                                                <?php
                                                   foreach ($performance3_3 as $v) {
                                                       if ($v['level'] == $data['performance3_3']) {
                                                           $checked = ' checked="checked" ';
                                                       } else {
                                                   
                                                           $checked = '';
                                                       }
                                                   ?>
                                                <div class="radio">
                                                   <label>
                                                   <input type="radio" <?= $checked ?> name="performance3_3" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                </div>
                                                <?php
                                                   }
                                                   ?>
                                             </div>
                                          </fieldset>
                                          <hr>
                                          <?php
                                            if (!empty($listfile_3_3)) {
                                                ?>
                                          <div class="table-responsive">
                                             <table class="table table-striped text-center" border="1">
                                                <thead class="table-dark">
                                                   <tr>
                                                      <td><h3>หลักฐาน</h3></td>
                                                   </tr>
                                                </thead>
                                                <tr>
                                                   <?php
                                                    if (isset($listfile_3_3)) {
                                                        foreach ($listfile_3_3 as $value) {
                                                            ?> 
                                                   <td>
                                                      <?php
                                                         if (strpos($value['file_name'], 'pdf') == true) {
                                                             ?> <a target="_blank" class="nav-link" href="../pdf/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } else {
                                                             ?> <a target="_blank" class="nav-link" href="../word/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } ?>
                                                   </td>
                                                </tr>
                                                <?php
                                                        }
                                                    } ?>
                                             </table>
                                          </div>
                                                   <?php
                                            }
                                                   ?>
                                          <hr>
                                          <!-- Default input -->
                                          <label for="inputDisabledEx2" class="disabled">ค่าน้ำหนัก</label>
                                          <input type="text" id="weight3_3" class="form-control" value='<?= $weight[7]['weight_value'] ?>' disabled>
                                          <label for="inputDisabledEx2" class="disabled">คะแนนที่ได้</label>
                                          <input type="text" id="score3_3" pattern="[0-9]+" class="form-control" disabled>
                                          <label for="inputDisabledEx2" class="disabled">ผลการประเมิน</label>
                                          <input type="text" id="scores3_3" class="form-control" disabled>
                                          <div class="step-actions">
                                             <button class="waves-effect waves-dark btn btn-sm btn-primary next-step"><i class="fa fa-arrow-right"></i> ถัดไป</button>
                                             <button class="waves-effect waves-dark btn btn-sm btn-danger previous-step">กลับ</button>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="step">
                                       <div class="step-title waves-effect waves-dark">4.ด้านการบริการวิชาการ</div>
                                       <div class="step-new-content">
                                          <fieldset>
                                             <legend for="1579888430">4.1 การเข้าร่วมกิจกรรม/โครงการ และกระบวนการดำเนินงานบริการวิชาการ</legend>
                                             <div class="form-group">
                                                <?php
                                                   foreach ($performance4_1 as $v) {
                                                       if ($v['level'] == $data['performance4_1']) {
                                                           $checked = ' checked="checked" ';
                                                       } else {
                                                   
                                                           $checked = '';
                                                       }
                                                   ?>
                                                <div class="radio">
                                                   <label>
                                                   <input type="radio" <?= $checked ?> name="performance4_1" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                </div>
                                                <?php
                                                   }
                                                   ?>
                                             </div>
                                          </fieldset>
                                          <hr>
                                          <?php
                                            if (!empty($listfile_4_1)) {
                                                ?>
                                          <div class="table-responsive">
                                             <table class="table table-striped text-center" border="1">
                                                <thead class="table-dark">
                                                   <tr>
                                                      <td><h3>หลักฐาน</h3></td>
                                                   </tr>
                                                </thead>
                                                <tr>
                                                   <?php
                                                    if (isset($listfile_4_1)) {
                                                        foreach ($listfile_4_1 as $value) {
                                                            ?> 
                                                   <td>
                                                      <?php
                                                         if (strpos($value['file_name'], 'pdf') == true) {
                                                             ?> <a target="_blank" class="nav-link" href="../pdf/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } else {
                                                             ?> <a target="_blank" class="nav-link" href="../word/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } ?>
                                                   </td>
                                                </tr>
                                                <?php
                                                        }
                                                    } ?>
                                             </table>
                                          </div>
                                                   <?php
                                            }
                                                   ?>
                                          <hr>
                                          <!-- Default input -->
                                          <label for="inputDisabledEx2" class="disabled">ค่าน้ำหนัก</label>
                                          <input type="text" id="weight4_1" class="form-control" value='<?= $weight[8]['weight_value'] ?>' disabled>
                                          <label for="inputDisabledEx2" class="disabled">คะแนนที่ได้</label>
                                          <input type="text" id="score4_1" pattern="[0-9]+" class="form-control" disabled>
                                          <label for="inputDisabledEx2" class="disabled">ผลการประเมิน</label>
                                          <input type="text" id="scores4_1" class="form-control" disabled>
                                          <div class="step-actions">
                                             <button class="waves-effect waves-dark btn btn-sm btn-primary next-step">ถัดไป</button>
                                             <button class="waves-effect waves-dark btn btn-sm btn-danger previous-step">กลับ</button>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="step">
                                       <div class="step-title waves-effect waves-dark">5.ด้านการทำนุบำรุงศิลปวัฒนธรรม</div>
                                       <div class="step-new-content">
                                          <fieldset>
                                             <legend for="1881094579">5.1 การเข้าร่วมกิจกรรมและรับผิดชอบโครงการทำนุบำรุงศิลปวัฒนธรรมของสาขาวิชา/คณะ/มหาวิทยาลัย</legend>
                                             <div class="form-group">
                                                <?php
                                                   foreach ($performance5_1 as $v) {
                                                       if ($v['level'] == $data['performance5_1']) {
                                                           $checked = ' checked="checked" ';
                                                       } else {
                                                   
                                                           $checked = '';
                                                       }
                                                   ?>
                                                <div class="radio">
                                                   <label>
                                                   <input type="radio" <?= $checked ?> name="performance5_1" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                </div>
                                                <?php
                                                   }
                                                   ?>
                                             </div>
                                          </fieldset>
                                          <hr>
                                          <?php
                                            if (!empty($listfile_5_1)) {
                                                ?>
                                          <div class="table-responsive">
                                             <table class="table table-striped text-center" border="1">
                                                <thead class="table-dark">
                                                   <tr>
                                                      <td><h3>หลักฐาน</h3></td>
                                                   </tr>
                                                </thead>
                                                <tr>
                                                   <?php
                                                    if (isset($listfile_5_1)) {
                                                        foreach ($listfile_5_1 as $value) {
                                                            ?> 
                                                   <td>
                                                      <?php
                                                         if (strpos($value['file_name'], 'pdf') == true) {
                                                             ?> <a target="_blank" class="nav-link" href="../pdf/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } else {
                                                             ?> <a target="_blank" class="nav-link" href="../word/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } ?>
                                                   </td>
                                                </tr>
                                                <?php
                                                        }
                                                    } ?>
                                             </table>
                                          </div>
                                          <?php
                                            }
                                          ?>
                                          <hr>
                                          <!-- Default input -->
                                          <label for="inputDisabledEx2" class="disabled">ค่าน้ำหนัก</label>
                                          <input type="text" id="weight5_1" class="form-control" value='<?= $weight[9]['weight_value'] ?>' disabled>
                                          <label for="inputDisabledEx2" class="disabled">คะแนนที่ได้</label>
                                          <input type="text" id="score5_1" pattern="[0-9]+" class="form-control" disabled>
                                          <label for="inputDisabledEx2" class="disabled">ผลการประเมิน</label>
                                          <input type="text" id="scores5_1" class="form-control" disabled>
                                          <div class="step-actions">
                                             <button class="waves-effect waves-dark btn btn-sm btn-primary next-step"><i class="fa fa-arrow-right"></i> ถัดไป</button>
                                             <button class="waves-effect waves-dark btn btn-sm btn-danger previous-step">กลับ</button>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="step">
                                       <div class="step-title waves-effect waves-dark">6.ด้านอื่นๆ</div>
                                       <div class="step-new-content">
                                          <fieldset>
                                             <legend for="60872892">6.1 ภาระงานอื่น ๆ ในระดับมหาวิทยาลัยและระดับคณะ </legend>
                                             <div class="form-group">
                                                <p>(เป็นกิจกรรม/โครงการ/งาน ที่ได้ดำเนินการแต่ไม่ปรากฏในแบบข้อตกลงฉบับนี้และยังไม่มีการกำหนดภาระงาน โดยให้อธิบายลักษณะและขอบเขตของงาน/กิจกรรมพอสังเขป)</p>
                                                <?php
                                                   foreach ($performance6_1 as $v) {
                                                       if ($v['level'] == $data['performance6_1']) {
                                                           $checked = ' checked="checked" ';
                                                       } else {
                                                   
                                                           $checked = '';
                                                       }
                                                   ?>
                                                <div class="radio">
                                                   <label>
                                                   <input type="radio" <?= $checked ?> name="performance6_1" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                </div>
                                                <?php
                                                   }
                                                   ?>
                                             </div>
                                          </fieldset>
                                          <hr>
                                          <?php
                                            if (!empty($listfile_6_1)) {
                                                ?>
                                          <div class="table-responsive">
                                             <table class="table table-striped text-center" border="1">
                                                <thead class="table-dark">
                                                   <tr>
                                                      <td><h3>หลักฐาน</h3></td>
                                                   </tr>
                                                </thead>
                                                <tr>
                                                   <?php
                                                   
                                                      foreach ($listfile_6_1 as $value) {
                                                          ?> 
                                                   <td>
                                                      <?php
                                                         if (strpos($value['file_name'], 'pdf') == true) {
                                                             ?> <a target="_blank" class="nav-link" href="../pdf/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } else {
                                                             ?> <a target="_blank" class="nav-link" href="../word/<?= $data['username'] ?>/<?= $value['file_name'] ?>"><?= $value['file_name'] ?></a> <?php
                                                         } ?>
                                                   </td>
                                                </tr>
                                                <?php
                                                      } ?>
                                             </table>
                                          </div>
                                          <?php
                                            }
                                          ?>
                                          <hr>
                                          <!-- Default input -->
                                          <label for="inputDisabledEx2" class="disabled">ค่าน้ำหนัก</label>
                                          <input type="text" id="weight6_1" class="form-control" value='<?= $weight[10]['weight_value'] ?>' disabled>
                                          <label for="inputDisabledEx2" class="disabled">คะแนนที่ได้</label>
                                          <input type="text" id="score6_1" pattern="[0-9]+" class="form-control" disabled>
                                          <label for="inputDisabledEx2" class="disabled">ผลการประเมิน</label>
                                          <input type="text" id="scores6_1" class="form-control" disabled>
                                          <div class="step-actions">
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="card">
                        <div class="card-header" id="headingTwo">
                           <h2 class="mb-0">
                              <a class="btn btn-link text-dark" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                 <h6 class="mb-0"> 2) การประเมินพฤติกรรมการปฏิบัติราชการ (30 คะแนน) <i class="fa fa-angle-down rotate-icon"></i> </h6>
                              </a>
                           </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                           <div class="card-body">
                              <ul class="stepper">
                                 <li class="step active">
                                    <div data-step-label="" class="step-title waves-effect waves-dark">1. การมุ่งผลสัมฤทธิ์ (Achievement Motivation)</div>
                                    <div class="step-new-content">
                                       <?php
                                          //print_r($data);
                                          ?>
                                       <fieldset>
                                          <p style="text-indent: 2.5em;">ความมุ่งมั่นที่จะปฏิบัติหน้าที่ราชการให้ดีหรือให้เกินมาตรฐานที่มีอยู่ โดยมาตรฐานนี้อาจเป็นผลการปฏิบัติงานที่ผ่านมาของตนเองหรือเกณฑ์วัดผลสัมฤทธิ์ที่ส่วนราชการกําหนดขึ้น อีกทั้งยังหมายความรวมถึงการสร้างสรรค์พัฒนาผลงาน หรือกระบวนการปฏิบัติงานตามเป้าหมายที่ยากและท้าทายชนิดที่อาจไม่เคยมีผู้ใดสามารถกระทําได้มาก่อน</p>
                                       </fieldset>
                                       <hr>
                                       <div class="form-group" name='compentency1'>
                                          <?php
                                             foreach ($compentency1 as $v) {
                                             ?>
                                          <div class="radio">
                                             <label>
                                             <input type="radio" name="compentency1" id="compentency1" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                          </div>
                                          <?php
                                             }
                                             ?>
                                       </div>
                                       <hr>
                                       <b>ระดับสมรรถนะที่คาดหวัง</b>
                                       <br>
                                       <small>อาจารย์ทั่วไปไม่ต่ำกว่า ระดับ 3</small>
                                       <br>
                                       <small>หัวหน้าสาขาวิชาไม่ต่ำกว่าระดับ 4</small>
                                       <br>
                                       <small>ผศ. ไม่ต่ำกว่าระดับ 3</small>
                                       <br>
                                       <small>รศ. ไม่ต่ำกว่าระดับ 4</small>
                                       <hr>
                                       <label class="disabled">ระดับสมรรถนะ</label>
                                       <input type="text" class="form-control" id='score_compentency1m' disabled>
                                       <input type="hidden" id="score_compentency1">
                                       <div class="step-actions">
                                          <button class="waves-effect waves-dark btn btn-sm btn-primary next-step"><i class="fa fa-arrow-right"></i> ถัดไป</button>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="step">
                                    <div class="step-title waves-effect waves-dark">2. บริการที่ดี</div>
                                    <div class="step-new-content">
                                       <fieldset>
                                          <p style="text-indent: 2.5em;">ความตั้งใจและพยายามของข้าราชการในการให้บริการต่อประชาชน ข้าราชการหรือหน่วยงานอื่นๆ ที่เกี่ยวข้อง</p>
                                       </fieldset>
                                       <hr>
                                       <div class="form-group" name='compentency2'>
                                          <?php
                                             foreach ($compentency2 as $v) {
                                             ?>
                                          <div class="radio">
                                             <label>
                                             <input type="radio" name="compentency2" id="compentency2" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                          </div>
                                          <?php
                                             }
                                             ?>
                                       </div>
                                       <hr>
                                       <b>ระดับสมรรถนะที่คาดหวัง</b>
                                       <br>
                                       <small>อาจารย์ทั่วไปไม่ต่ำกว่า ระดับ 5</small>
                                       <br>
                                       <small>หัวหน้าสาขาวิชาไม่ต่ำกว่าระดับ 5</small>
                                       <br>
                                       <small>ผศ. ไม่ต่ำกว่าระดับ 5</small>
                                       <br>
                                       <small>รศ. ไม่ต่ำกว่าระดับ 5</small>
                                       <hr>
                                       <label class="disabled">ระดับสมรรถนะ</label>
                                       <input type="text" class="form-control" id='score_compentency2m' disabled>
                                       <input type="hidden" id="score_compentency2">
                                       <div class="step-actions">
                                          <button class="waves-effect waves-dark btn btn-sm btn-primary next-step"><i class="fa fa-arrow-right"></i> ถัดไป</button>
                                          <button class="waves-effect waves-dark btn btn-sm btn-danger previous-step">กลับ</button>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="step">
                                    <div class="step-title waves-effect waves-dark">3. การสั่งสมความเชี่ยวชาญในงานอาชีพ (Expertise) </div>
                                    <div class="step-new-content">
                                       <fieldset>
                                          <p style="text-indent: 2.5em;">ความขวนขวาย สนใจใฝ่รู้เพื่อสั่งสมพัฒนาศักยภาพความรู้ความสามารถของตนในการปฏิบัติราชการด้วยการศึกษา ค้นคว้า หาความรู้ พัฒนาตนเองอย่างต่อเนื่อง อีกทั้งรู้จักพัฒนา ปรับปรุง ประยุกต์ใช้ความรู้เชิงวิชาการและเทคโนโลยีต่าง ๆ เข้ากับการปฏิบัติงาน หัวหน้า ให้เกิดผลสัมฤทธิ์ </p>
                                       </fieldset>
                                       <hr>
                                       <div class="form-group" name='compentency3'>
                                          <?php
                                             foreach ($compentency3 as $v) {
                                             ?>
                                          <div class="radio">
                                             <label>
                                             <input type="radio" name="compentency3" id="compentency3" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                          </div>
                                          <?php
                                             }
                                             ?>
                                       </div>
                                       <hr>
                                       <b>ระดับสมรรถนะที่คาดหวัง</b>
                                       <br>
                                       <small>อาจารย์ทั่วไปไม่ต่ำกว่า ระดับ 3</small>
                                       <br>
                                       <small>หัวหน้าสาขาวิชาไม่ต่ำกว่าระดับ 4</small>
                                       <br>
                                       <small>ผศ. ไม่ต่ำกว่าระดับ 3</small>
                                       <br>
                                       <small>รศ. ไม่ต่ำกว่าระดับ 4</small>
                                       <hr>
                                       <label class="disabled">ระดับสมรรถนะ</label>
                                       <input type="text" class="form-control" id='score_compentency3m' disabled>
                                       <input type="hidden" id="score_compentency3">
                                       <div class="step-actions">
                                          <button class="waves-effect waves-dark btn btn-sm btn-primary next-step"><i class="fa fa-arrow-right"></i> ถัดไป</button>
                                          <button class="waves-effect waves-dark btn btn-sm btn-danger previous-step">กลับ</button>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="step">
                                    <div class="step-title waves-effect waves-dark">4. การยึดมั่นในความถูกต้องชอบธรรม และจริยธรรม (Integrity) </div>
                                    <div class="step-new-content">
                                       <fieldset>
                                          <p style="text-indent: 2.5em;">การดํารงตนและประพฤติปฏิบัติอย่างถูกต้องเหมาะสมทั้งตามกฎหมายคุณธรรม เพื่อรักษาศักดิ์ศรีแห่งความเป็นข้าราชการ เพื่อรักษาศักดิ์ศรีแห่งความเป็นราชการ</p>
                                       </fieldset>
                                       <hr>
                                       <div class="form-group" name='compentency4'>
                                          <?php
                                             foreach ($compentency4 as $v) {
                                             ?>
                                          <div class="radio">
                                             <label>
                                             <input type="radio" name="compentency4" id="compentency4" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                          </div>
                                          <?php
                                             }
                                             ?>
                                       </div>
                                       <hr>
                                       <b>ระดับสมรรถนะที่คาดหวัง</b>
                                       <br>
                                       <small>อาจารย์ทั่วไปไม่ต่ำกว่า ระดับ 5</small>
                                       <br>
                                       <small>หัวหน้าสาขาวิชาไม่ต่ำกว่าระดับ 5</small>
                                       <br>
                                       <small>ผศ. ไม่ต่ำกว่าระดับ 5</small>
                                       <br>
                                       <small>รศ. ไม่ต่ำกว่าระดับ 5</small>
                                       <hr>
                                       <label class="disabled">ระดับสมรรถนะ</label>
                                       <input type="text" class="form-control" id='score_compentency4m' disabled>
                                       <input type="hidden" id="score_compentency4">
                                       <div class="step-actions">
                                          <button class="waves-effect waves-dark btn btn-sm btn-primary next-step">ถัดไป</button>
                                          <button class="waves-effect waves-dark btn btn-sm btn-danger previous-step">กลับ</button>
                                       </div>
                                    </div>
                                 </li>
                                 <li class="step">
                                    <div class="step-title waves-effect waves-dark">5. การทํางานเป็นทีม (Teamwork)</div>
                                    <div class="step-new-content">
                                       <fieldset>
                                          <p style="text-indent: 2.5em;">ความขวนขวาย สนใจใฝ่รู้เพื่อสั่งสมพัฒนาศักยภาพความรู้ความสามารถของตนในการปฏิบัติราชการด้วยการศึกษา ค้นคว้า หาความรู้ พัฒนาตนเองอย่างต่อเนื่อง อีกทั้งรู้จักพัฒนา ปรับปรุง ประยุกต์ใช้ความรู้เชิงวิชาการและเทคโนโลยีต่าง ๆ เข้ากับการปฏิบัติงาน หัวหน้า ให้เกิดผลสัมฤทธิ์ </p>
                                       </fieldset>
                                       <hr>
                                       <div class="form-group" name='compentency5'>
                                          <?php
                                             foreach ($compentency5 as $v) {
                                             ?>
                                          <div class="radio">
                                             <label>
                                             <input type="radio" name="compentency5" id="compentency5" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                          </div>
                                          <?php
                                             }
                                             ?>
                                       </div>
                                       <hr>
                                       <b>ระดับสมรรถนะที่คาดหวัง</b>
                                       <br>
                                       <small>อาจารย์ทั่วไปไม่ต่ำกว่า ระดับ 5</small>
                                       <br>
                                       <small>หัวหน้าสาขาวิชาไม่ต่ำกว่าระดับ 5</small>
                                       <br>
                                       <small>ผศ. ไม่ต่ำกว่าระดับ 5</small>
                                       <br>
                                       <small>รศ. ไม่ต่ำกว่าระดับ 5</small>
                                       <hr>
                                       <label class="disabled">ระดับสมรรถนะ</label>
                                       <input type="text" class="form-control" id='score_compentency5m' disabled>
                                       <input type="hidden" id="score_compentency5">
                                       <div class="step-actions">
                                          <button class="waves-effect waves-dark btn btn-sm btn-primary next-step">ถัดไป</button>
                                          <button class="waves-effect waves-dark btn btn-sm btn-danger previous-step">กลับ</button>
                                       </div>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        
                        <div class="col md-5" style="margin-top:20px">
  <label for="message">จุดเด่นของผู้รับการประเมิน</label>
  <textarea class="form-control" id="message1" rows="3"><?=$data['message1']?></textarea>
</div>
<div class="col md-5" style="margin-top:20px">
  <label for="message">ข้อควรพัฒนา</label>
  <textarea class="form-control" id="message2" rows="3"><?=$data['message2']?></textarea>
</div>
<div class="col md-5" style="margin-top:20px">
  <label for="message">ข้อเสนอแนะเกี่ยวกับวิธีส่งเสริมและพัฒนา เพื่อจัดทำแผนรายบุคคล</label>
  <textarea class="form-control" id="message3" rows="3"><?=$data['message3']?></textarea>
</div>
                    <div class="md-form text-center">
                           <button class="btn btn-danger" type="submit" id="update_rate1"><i class="fa fa-save"></i> บันทึก</button>
                           <button class="btn btn-success" type="submit" id="sent_rate"><i class="fa fa-paper-plane" aria-hidden="true"></i> ส่งแบบประเมิน</button>
                        </div>
                     </div>
                  </div>
                  <div>
                  </div>
               </div>
            </div>
         </div>
         </div>
      
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title w-100" id="myModalLabel"><i class="fa fa-paper-plane" aria-hidden="true"></i> ยืนยันการส่ง</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body" id="score_body">
                  <table class="table">
                     <tr>
                        <td> # </td>
                        <td> คะแนน </td>
                     </tr>
                     <tr>
                        <td> 1) การประเมินผลสัมฤทธ์ของงาน (70 คะแนน) </td>
                        <td id='performance_score_result'> </td>
                     </tr>
                     <tr>
                        <td> 2) การประเมินพฤติกรรมการปฏิบัติราชการ (15 คะแนน) </td>
                        <td id="compentency_score_result"> </td>
                     </tr>
                  </table>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-success btn-sm" id='confirm_score'><i class="fa fa-check"></i> ยืนยัน</button>
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times-circle"></i> ปิด</button>
               </div>
            </div>
         </div>
      </div>
      <script>
         ////////--------Rate System JS----------------/////////
         $(document).ready(function() {
             $('.stepper').mdbStepper();
         })
      </script>
      <script>
         ///----------api คำนวณ-----------------////
         $('input[id=compentency1]').click(() => {
             let compentency1 = $('input[name=compentency1]:checked', ).val();
             $.ajax({
                 url: "../api/calculate",
                 method: 'POST',
                 data: {
                     username: "<?= $data['username'] ?>",
                     status_in: 1,
                     score: compentency1
                 },
                 success: function(data) {
                     if (data.status == true) {
                         $("#score_compentency1m").val(data.message)
                         $("#score_compentency1").val(data.score)
                     }
                 },
                 error: function(request, status, error) {
                     var val = request.responseText;
                     alert("error" + val);
                 }
             })
         })
         $('input[id=compentency2]').click(() => {
             let compentency2 = $('input[name=compentency2]:checked', ).val();
             $.ajax({
                 url: "../api/calculate",
                 method: 'POST',
                 data: {
                     username: "<?= $data['username'] ?>",
                     status_in: 2,
                     score: compentency2
                 },
                 success: function(data) {
                     if (data.status == true) {
                         $("#score_compentency2").val(data.score)
                         $("#score_compentency2m").val(data.message)
                     }
                 },
                 error: function(request, status, error) {
                     var val = request.responseText;
                     alert("error" + val);
                 }
             })
         })
         $('input[id=compentency3]').click(() => {
             let compentency3 = $('input[name=compentency3]:checked', ).val();
             $.ajax({
                 url: "../api/calculate",
                 method: 'POST',
                 data: {
                     username: "<?= $data['username'] ?>",
                     status_in: 3,
                     score: compentency3
                 },
                 success: function(data) {
                     if (data.status == true) {
                         $("#score_compentency3").val(data.score)
                         $("#score_compentency3m").val(data.message)
                     }
                 },
                 error: function(request, status, error) {
                     var val = request.responseText;
                     alert("error" + val);
                 }
             })
         })
         $('input[id=compentency4]').click(() => {
             let compentency4 = $('input[name=compentency4]:checked', ).val();
             $.ajax({
                 url: "../api/calculate",
                 method: 'POST',
                 data: {
                     username: "<?= $data['username'] ?>",
                     status_in: 4,
                     score: compentency4
                 },
                 success: function(data) {
                     if (data.status == true) {
                         $("#score_compentency4").val(data.score)
                         $("#score_compentency4m").val(data.message)
                     }
                 },
                 error: function(request, status, error) {
                     var val = request.responseText;
                     alert("error" + val);
                 }
             })
         })
         $('input[id=compentency5]').click(() => {
             let compentency5 = $('input[name=compentency5]:checked', ).val();
             $.ajax({
                 url: "../api/calculate",
                 method: 'POST',
                 data: {
                     username: "<?= $data['username'] ?>",
                     status_in: 5,
                     score: compentency5
                 },
                 success: function(data) {
                     if (data.status == true) {
                         $("#score_compentency5").val(data.score)
                         $("#score_compentency5m").val(data.message)
                     }
                 },
                 error: function(request, status, error) {
                     var val = request.responseText;
                     alert("error" + val);
                 }
             })
         })
         var performance1_1 = $('input[name=performance1_1]:checked').val();
$('#score1_1').val(performance1_1)
///----------------คำนวนณ 70 คะแนน---------////
$('input[name=performance1_1]').click(() => {
    var performance1_1 = $('input[name=performance1_1]:checked').val();
    $('#score1_1').val(performance1_1)
    var weight = parseInt($('#weight1_1').val())
    var score = parseInt($('#score1_1').val())
    $('#scores1_1').val(weight * score)
    if ($('#scores1_1').val() == 'NaN') {
        $('#scores1_1').val(0)
    }
})
var performance2_1 = $('input[name=performance2_1]:checked').val();
$('#score2_1').val(performance2_1)
///----------------คำนวนณ 70 คะแนน---------////
$('input[name=performance2_1]').click(() => {
    var performance2_1 = $('input[name=performance2_1]:checked').val();
    $('#score2_1').val(performance2_1)
    var weight = parseInt($('#weight2_1').val())
    var score = parseInt($('#score2_1').val())
    $('#scores2_1').val(weight * score)
    if ($('#scores2_1').val() == 'NaN') {
        $('#scores2_1').val(0)
    }
})
var performance2_2 = $('input[name=performance2_2]:checked').val();
$('#score2_2').val(performance2_2)
///----------------คำนวนณ 70 คะแนน---------////
$('input[name=performance2_2]').click(() => {
    var performance2_2 = $('input[name=performance2_2]:checked').val();
    $('#score2_2').val(performance2_2)
    var weight = parseInt($('#weight2_2').val())
    var score = parseInt($('#score2_2').val())
    $('#scores2_2').val(weight * score)
    if ($('#scores2_2').val() == 'NaN') {
        $('#scores2_2').val(0)
    }
})
var performance2_3 = $('input[name=performance2_3]:checked').val();
$('#score2_3').val(performance2_3)
///----------------คำนวนณ 70 คะแนน---------////
$('input[name=performance2_3]').click(() => {
    var performance2_3 = $('input[name=performance2_3]:checked').val();
    $('#score2_3').val(performance2_3)
    var weight = parseInt($('#weight2_3').val())
    var score = parseInt($('#score2_3').val())
    $('#scores2_3').val(weight * score)
    if ($('#scores2_3').val() == 'NaN') {
        $('#scores2_3').val(0)
    }
})
var performance2_4 = $('input[name=performance2_4]:checked').val();
$('#score2_4').val(performance2_4)
///----------------คำนวนณ 70 คะแนน---------////
$('input[name=performance2_4]').click(() => {
    var performance2_4 = $('input[name=performance2_4]:checked').val();
    $('#score2_4').val(performance2_4)
    var weight = parseInt($('#weight2_4').val())
    var score = parseInt($('#score2_4').val())
    $('#scores2_4').val(weight * score)
    if ($('#scores2_4').val() == 'NaN') {
        $('#scores2_4').val(0)
    }
})
var performance3_1 = $('input[name=performance3_1]:checked').val();
$('#score3_1').val(performance3_1)
///----------------คำนวนณ 70 คะแนน---------////
$('input[name=performance3_1]').click(() => {
    var performance3_1 = $('input[name=performance3_1]:checked').val();
    $('#score3_1').val(performance3_1)
    var weight = parseInt($('#weight3_1').val())
    var score = parseInt($('#score3_1').val())
    $('#scores3_1').val(weight * score)
    if ($('#scores3_1').val() == 'NaN') {
        $('#scores3_1').val(0)
    }
})
var performance3_2 = $('input[name=performance3_2]:checked').val();
$('#score3_2').val(performance3_2)
///----------------คำนวนณ 70 คะแนน---------////
$('input[name=performance3_2]').click(() => {
    var performance3_2 = $('input[name=performance3_2]:checked').val();
    $('#score3_2').val(performance3_2)
    var weight = parseInt($('#weight3_2').val())
    var score = parseInt($('#score3_2').val())
    $('#scores3_2').val(weight * score)
    if ($('#scores3_2').val() == 'NaN') {
        $('#scores3_2').val(0)
    }
})
var performance3_3 = $('input[name=performance3_3]:checked').val();
$('#score3_3').val(performance3_3)
///----------------คำนวนณ 70 คะแนน---------////
$('input[name=performance3_3]').click(() => {
    var performance3_3 = $('input[name=performance3_3]:checked').val();
    $('#score3_3').val(performance3_3)
    var weight = parseInt($('#weight3_3').val())
    var score = parseInt($('#score3_3').val())
    $('#scores3_3').val(weight * score)
    if ($('#scores3_3').val() == 'NaN') {
        $('#scores3_3').val(0)
    }
})
var performance4_1 = $('input[name=performance4_1]:checked').val();
$('#score4_1').val(performance4_1)
///----------------คำนวนณ 70 คะแนน---------////
$('input[name=performance4_1]').click(() => {
    var performance4_1 = $('input[name=performance4_1]:checked').val();
    $('#score4_1').val(performance4_1)
    var weight = parseInt($('#weight4_1').val())
    var score = parseInt($('#score4_1').val())
    $('#scores4_1').val(weight * score)
    if ($('#scores4_1').val() == 'NaN') {
        $('#scores4_1').val(0)
    }
})
var performance5_1 = $('input[name=performance5_1]:checked').val();
$('#score5_1').val(performance5_1)
///----------------คำนวนณ 70 คะแนน---------////
$('input[name=performance5_1]').click(() => {
    var performance5_1 = $('input[name=performance5_1]:checked').val();
    $('#score5_1').val(performance5_1)
    var weight = parseInt($('#weight5_1').val())
    var score = parseInt($('#score5_1').val())
    $('#scores5_1').val(weight * score)
    if ($('#scores5_1').val() == 'NaN') {
        $('#scores5_1').val(0)
    }
})
var performance6_1 = $('input[name=performance6_1]:checked').val();
$('#score6_1').val(performance6_1)
///----------------คำนวนณ 70 คะแนน---------////
$('input[name=performance6_1]').click(() => {
    var performance6_1 = $('input[name=performance6_1]:checked').val();
    $('#score6_1').val(performance6_1)
    var weight = parseInt($('#weight6_1').val())
    var score = parseInt($('#score6_1').val())
    $('#scores6_1').val(weight * score)
    if ($('#scores6_1').val() == 'NaN') {
        $('#scores6_1').val(0)
    }
})
      </script>
  
      <script type="text/javascript" src="../asset/js/steppers.min.js"></script>
      <script src="../asset/js/popper.min.js"></script>
      <script src="../asset/js/bootstrap.min.js"></script>
      <script src="../asset/js/toastr.min.js"></script>
      <script type="text/javascript" src="../asset/js/mdb.min.js"></script>
      <script src="../asset/js/script.js"></script>
      <script src="../asset/js/pace.min.js"></script>
   </body>
   <?php
$this->load->view('footer');
$this->load->view('preloader');
?>
  
</html>