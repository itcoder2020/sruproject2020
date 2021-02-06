<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/img/logo.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="asset/img/logo.png" type="image/x-icon"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/mdb.min.css">
    <link rel="stylesheet" href="asset/css/toastr.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/steppers.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="asset/js/jquery.js"></script>
    <title>หน้าหลัก</title>
</head>

<body>
    <!--Navbar--> <?php
         $this->load->view('navbar');        
         ?> <div class="container" style="margin-top:120px;margin-bottom:120px;">
        
          
                <div class='card'>
                    <div class='card-header text-center'>
                        <h2> ประเมินผลปฏิบัติราชการ <?php if ($check == 1) {
                           echo "ภาคเรียนที่ " . $Semester . " ปีการศึกษาที่ " . $year;
                           } ?> </h2>
                        <p> <?= ($check == 1 ? '<span class="badge badge-success">เปิดประเมิน</span>' : '<span class="badge badge-danger">ปิดประเมิน</span>'); ?></p>
                        <p> <?php
                           if ($check == 1) {
                               echo $start_date . ' - ' . $end_date;
                           }
                           ?> </p>
                    </div>
                    <div class='card-body'>
                        <h2>สาขา <?= $affiliated_agenciesname; ?></h2>
                        <div class="list-group-flush"> <?php
                           foreach ($data as $v) {
                           ?> <div class="list-group-item">
                                <p class="mb-0"><i class="fa fa-list fa-1x mr-3 blue p-3 white-text rounded " aria-hidden="true"></i><a class="waves-effect waves-dark" href="rate/<?= $v['id'] ?>"><?= $v['name'] ?> </a></p>
                            </div> <?php
                           }
                           ?> </div> <?php
                        //print_r($data);
                        ?>
                    </div>
                </div>
                <!-- <a class='btn btn-success text-light' id='Round'>รอบที่ </a> -->
            
        
    </div>
    <!-- Modal -->
    <div class="modal fade" id="rete_president" tabindex="-1" role="dialog" aria-labelledby="rete_presidentModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rete_presidentTitle">ข้อตกลง</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class='card'>
                            <div class='card-header text-center'>
                                <h2> ประเมินผลการปฏิบัติราชการ <?php if ($check == 1) {
                                 echo "ภาคเรียนที่ " . $Semester . " ปีการศึกษาที่ " . $year;
                                 } ?> </h2>
                                <p> <?= ($check == 1 ? '<span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> เปิดประเมิน</span>' : '<span class="badge badge-danger"><i class="fa fa-times" aria-hidden="true"></i> ปิดประเมิน</span>'); ?></p>
                                <p> <?php
                                 if ($check == 1) {
                                     echo $start_date . ' - ' . $end_date;
                                     echo '<div><button type="submit" class="btn btn-danger btn-sm" id="cancel" ><i class="fa fa-times" aria-hidden="true"></i> ยกเลิกส่งแบบประเมิน</button></div>';
                                 }
                                 ?> </p>
                            </div>
                            <div class='card-body'>
                                <h4>คําชี้แจง</h4>
                                <p>1.แบบข้อตกลงๆ นี้เป็นการกำหนดแผนการปฏิบัติงานซึ่งเป็นข้อตกลงร่วมกันระหว่างผู้ปฏิบัติงานและผู้บังคับบัญชาก่อนเริ่มปฏิบัติงาน</p>
                                <p>2.การกำหนดข้อตกลงร่วม ผู้ปฏิบัติงานจะต้องกรอกรายละเอียดภาระงานโดยสังเขปในส่วนของภาระงานตามหน้าที่ความรับผิดชอบของตำแหน่งและ/หรือภาระงานด้านอื่น ๆ พร้อมกำหนดตัวชี้วัดความสำเร็จของภาระงานแต่ละรายการ ตลอดจนค่าเป้าหมายและน้ำหนักร้อยละ สำหรับในส่วนของพฤติกรรมการปฏิบัติราชการ (สมรรถนะ) ให้ระบุ ระดับสมรรถนะค่ามาตรฐาน</p>
                                <p>3.สำหรับการกรอกรายละเอียดภาระงานตามพันธกิจ ให้อ้างอิงการคํานวณภาระงานขั้นต่ำตามหลักเกณฑ์กรอบมาตรฐานภาระงานที่แนบท้ายประกาศมหาวิทยาลัยราชภัฏสุราษฎร์ธานี ที่บังคับใช้สำหรับการประเมินผลการปฏิบัติราชการ</p>
                                <p>4.การกำหนดตัวชี้วัดความสำเร็จของงาน ทั้งในส่วนของเชิงปริมาณและเชิงคุณภาพ ให้เป็นการกำหนดข้อตกลงภายในหน่วยงานนั้น ๆ </p>
                                <p>5.การจัดทำข้อตกลงภาระงานดังกล่าวนี้ เพื่อใช้เป็นกรอบในประเมินผลการปฏิบัติราชการ เพื่อประกอบการเลื่อนเงินเดือนและค่าจ้างในแต่ละรอบการประเมิน</p>
                                <div class="form-check text-center">
                                    <input type="checkbox" class="form-check-input" id='check'>
                                    <label class="form-check-label" for="materialIndeterminate2">ยอมรับข้อตกลง</label>
                                </div>
                                <div class='form-group text-center'>
                                    
                                <button type="submit" class='btn btn-primary' id='accept'>ทำแบบประเมิน</button>
                                </div>
                            </div>
                        </div>
                        <!-- <a class='btn btn-success text-light' id='Round'>รอบที่ </a> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times-circle"></i> ปิด</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="asset/js/steppers.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/modules/file-input.min.js"></script>
    <script src="asset/js/toastr.min.js"></script>
    <script type="text/javascript" src="asset/js/mdb.min.js"></script>
    <script src="asset/js/script.js"></script>
    <script src="asset/js/pace.min.js"></script>
</body>
<?php
$this->load->view('footer');
$this->load->view('preloader');
?>
</html>