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
    <link rel="stylesheet" href="asset/css/jquery.dm-uploader.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="asset/js/jquery.js"></script>
    <title>แบบประเมิน</title>
</head>
<style>
    .row {
        margin-bottom: 1rem;
    }

    [class*="col-"] {
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    hr {
        margin-top: 2rem;
        margin-bottom: 2rem;
    }

    #files {
        overflow-y: scroll !important;
        min-height: 320px;
    }

    @media (min-width: 768px) {
        #files {
            min-height: 0;
        }
    }

    #debug {
        overflow-y: scroll !important;
        height: 180px;
    }

    .dm-uploader {
        border: 0.25rem dashed #A5A5C7;
        text-align: center;
    }

    .dm-uploader.active {
        border-color: red;
        border-style: solid;
    }

    .box {
        position: relative;
        background: #ffffff;
        width: 100%;
    }

    .box-header {
        color: #444;
        display: block;
        padding: 10px;
        position: relative;
        border-bottom: 1px solid #f4f4f4;
        margin-bottom: 10px;
    }

    .box-tools {
        position: absolute;
        right: 10px;
        top: 5px;
    }

    .dropzone-wrapper {
        border: 2px dashed #91b0b3;
        color: #92b0b3;
        position: relative;
        height: 150px;
    }

    .dropzone-desc {
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        text-align: center;
        width: 40%;
        top: 50px;
        font-size: 16px;
    }

    .dropzone,
    .dropzone:focus {
        position: absolute;
        outline: none !important;
        width: 100%;
        height: 150px;
        cursor: pointer;
        opacity: 0;
    }

    .dropzone-wrapper:hover,
    .dropzone-wrapper.dragover {
        background: #ecf0f5;
    }

    .preview-zone {
        text-align: center;
    }

    .preview-zone .box {
        box-shadow: none;
        border-radius: 0;
        margin-bottom: 0;
    }
</style>
<style>
    .btn-download {
        background-color: DodgerBlue;
        border: none;
        color: white;
        padding: 12px 30px;
        cursor: pointer;
        font-size: 20px;
    }

    /* Darker background on mouse-over */
    .btn-download:hover {
        background-color: RoyalBlue;
    }
</style>

<body>
    <!--Navbar--> <?php
                    $this->load->view('navbar');


                    ?> <div class="container" style="margin-top:120px;margin-bottom:120px;">
        <div class="card-body">
            <!-- <a class='btn btn-success text-light' id='Round'>รอบที่ </a> -->
            <div class="card">
                <div class='card-header'>
                    <h1 class="text-center">การประเมินปฏิบัติการราชการ</h1>
                </div>
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <a class="btn btn-link text-dark" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h6 class="mb-0"> 1) การประเมินผลสัมฤทธ์ของงาน (70 คะแนน) <i class="fa fa-angle-down rotate-icon"></i> </h6>
                                    </a>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <input type="hidden" id="id_rate" value="<?= $data['id'] ?>">
                                    <input type="hidden" id="status" value="<?= $permission['status'] ?>">
                                    <ul class="stepper">
                                        <li class="step active">
                                            <div data-step-label="" class="step-title waves-effect waves-dark">1.ด้านภาระงาน</div>
                                            <div class="step-new-content"> <?php
                                                                            // print_r($data);
                                                                            ?> <fieldset>
                                                    <legend for="performance1_1">1.1 ภาระงานรวม ภาคปกติ</legend>
                                                    <div class="form-group" name='performance1_1'>
                                                        <p>(หมายถึงผลรวมของภาระงานตามพันธกิจ 4 ด้าน ซึ่งเป็นไปตามเกณฑ์ที่มหาวิทยาลัยประกาศและมีหลักฐานประกอบ)</p> <?php
                                                                                                                                                                    // print_r($performance1_1);
                                                                                                                                                                    foreach ($performance1_1 as $v) {
                                                                                                                                                                        if ($v['level'] == $data['performance1_1']) {
                                                                                                                                                                            $checked = ' checked="checked" ';
                                                                                                                                                                        } else {
                                                                                                                                                                            $checked = '';
                                                                                                                                                                        } ?> <div class="radio">
                                                                <label>
                                                                    <input type="radio" <?= $checked ?> name="performance1_1" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                            </div> <?php
                                                                                                                                                                    }
                                                                    ?>
                                                    </div>
                                                </fieldset>
                                                <button class="waves-effect waves-dark btn btn-sm btn-danger" data-toggle="modal" data-target="#addworkload"><i class="fa fa-briefcase" aria-hidden="true"></i> เพิ่มภาระงาน</button>
                                                <hr>
                                                <div class="form-group">
                                                    <h4>หลักฐาน</h4>
                                                </div>
                                                <main role="main" class="container">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <!-- Our markup, the important part here! -->
                                                            <div id="perfile1" class="dropzone-wrapper">
                                                                <div class="dropzone-desc">
                                                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                                                    <p>เลือกไฟล์</p>
                                                                </div>
                                                                <input type="file" class="dropzone" id="file1_1" title='Click to add Files' accept="application/pdf,application/msword,
                                                   application/vnd.openxmlformats-officedocument.wordprocessingml.document" id-file="1" />
                                                            </div><!-- /uploader -->
                                                        </div>
                                                    </div><!-- /file list --> <?php
                                                                                //print_r($listfile_1_1);
                                                                                if (!empty($listfile_1_1)) {
                                                                                ?>


                                                        <div class="table-responsive">

                                                            <table class="table table-striped text-center" border="1">
                                                                <thead class="table-dark">
                                                                    <tr>
                                                                        <td>ชื่อไฟล์</td>
                                                                        <td>จัดการ</td>
                                                                    </tr>
                                                                </thead>
                                                                <tr> <?php
                                                                                    foreach ($listfile_1_1 as $value) {
                                                                                        # code...

                                                                        ?> <td><?= $value['file_name'] ?></td>
                                                                        <td> <button class="btn btn-danger btn-sm" file-name="<?= $value['file_name'] ?>" id='delfile1' id-del="<?= $value['id'] ?>"><i class="fa fa-trash"></i> ลบ</button></td>
                                                                </tr> <?php
                                                                                    } ?>
                                                            </table>

                                                        </div>
                                                    <?php
                                                                                }
                                                    ?>
                                                </main> <!-- /container -->
                                                <br>
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
                                                        <p>(หมายถึงเอกสารที่จัดทำ/ปรับปรุงขึ้นในปีที่ทำการประเมิน และมีหลักฐานประกอบโดยเอกสาร 1 เล่ม ใช้ประเมินได้ 1 ปีแล้วสามารถปรับปรุงใช้ประเมินในปีต่อไป)</p> <?php
                                                                                                                                                                                                                    foreach ($performance2_1 as $v) {
                                                                                                                                                                                                                        if ($v['level'] == $data['performance2_1']) {
                                                                                                                                                                                                                            $checked = ' checked="checked" ';
                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                            $checked = '';
                                                                                                                                                                                                                        } ?> <div class="radio">
                                                                <label>
                                                                    <input type="radio" <?= $checked ?> name="performance2_1" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                            </div> <?php
                                                                                                                                                                                                                    }
                                                                    ?>
                                                    </div>
                                                </fieldset>
                                                <div class="form-group">
                                                    <h4>หลักฐาน</h4>
                                                </div>
                                                <main role="main" class="container">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div id="perfile2" class="dropzone-wrapper">
                                                                <div class="dropzone-desc">
                                                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                                                    <p>เลือกไฟล์</p>
                                                                </div>
                                                                <input type="file" class="dropzone" id="file2_1" title='Click to add Files' accept="application/pdf,application/msword,
                                                   application/vnd.openxmlformats-officedocument.wordprocessingml.document" id-file="2" />
                                                            </div><!-- /uploader -->
                                                        </div>
                                                    </div><!-- /file list -->
                                                    <?php
                                                    //print_r($listfile_1_1);
                                                    if (!empty($listfile_2_1)) {
                                                    ?>
                                                        <div class="table-responsive">

                                                            <table class="table table-striped text-center" border="1">
                                                                <thead class="table-dark">
                                                                    <tr>
                                                                        <td>ชื่อไฟล์</td>
                                                                        <td>จัดการ</td>
                                                                    </tr>
                                                                </thead>
                                                                <tr> <?php
                                                                        foreach ($listfile_2_1 as $value) {
                                                                            # code...

                                                                        ?> <td><?= $value['file_name'] ?></td>
                                                                        <td> <button class="btn btn-danger btn-sm" file-name="<?= $value['file_name'] ?>" id='delfile2' id-del="<?= $value['id'] ?>"><i class="fa fa-trash"></i> ลบ</button></td>
                                                                </tr> <?php
                                                                        } ?>
                                                            </table>

                                                        </div> <?php
                                                            }
                                                                ?>
                                                </main> <!-- /container -->
                                                <br>
                                                <!-- Field type: "choices" id: "717043520" -->
                                                <fieldset>
                                                    <legend for="717043520">2.2 การจัดกิจกรรมการเรียนการสอน</legend>
                                                    <div class="form-group">
                                                        <p>(การจัดการเรียนการสอน จะประเมินจาก มคอ.3,4 และผลการประเมินความพึงพอใจของนักศึกษาเป็นหลักฐานประกอบ)</p> <?php
                                                                                                                                                                    foreach ($performance2_2 as $v) {
                                                                                                                                                                        if ($v['level'] == $data['performance2_2']) {
                                                                                                                                                                            $checked = ' checked="checked" ';
                                                                                                                                                                        } else {
                                                                                                                                                                            $checked = '';
                                                                                                                                                                        } ?> <div class="radio">
                                                                <label>
                                                                    <input type="radio" <?= $checked ?> name="performance2_2" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                            </div> <?php
                                                                                                                                                                    }
                                                                    ?>
                                                    </div>
                                                </fieldset>
                                                <div class="form-group">
                                                    <h4>หลักฐาน</h4>
                                                </div>
                                                <main role="main" class="container">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div id="perfile3" class="dropzone-wrapper">
                                                                <div class="dropzone-desc">
                                                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                                                    <p>เลือกไฟล์</p>
                                                                </div>
                                                                <input type="file" class="dropzone" id="file2_2" title='Click to add Files' accept="application/pdf,application/msword,
                                                   application/vnd.openxmlformats-officedocument.wordprocessingml.document" id-file="3" />
                                                            </div><!-- /uploader -->
                                                        </div>
                                                    </div><!-- /file list --> <?php
                                                                                //print_r($listfile_1_1);
                                                                                if (!empty($listfile_2_2)) {
                                                                                ?>
                                                        <div class="table-responsive">

                                                            <table class="table table-striped text-center" border="1">
                                                                <thead class="table-dark">
                                                                    <tr>
                                                                        <td>ชื่อไฟล์</td>
                                                                        <td>จัดการ</td>
                                                                    </tr>
                                                                </thead>
                                                                <tr> <?php
                                                                                    foreach ($listfile_2_2 as $value) {
                                                                                        # code...

                                                                        ?> <td><?= $value['file_name'] ?></td>
                                                                        <td> <button class="btn btn-danger btn-sm" file-name="<?= $value['file_name'] ?>" id='delfile3' id-del="<?= $value['id'] ?>"><i class="fa fa-trash"></i> ลบ</button></td>
                                                                </tr> <?php
                                                                                    } ?>
                                                            </table>

                                                        </div> <?php
                                                                                }
                                                                ?>
                                                </main> <!-- /container -->
                                                <br>
                                                <!-- Field type: "choices" id: "106633996" -->
                                                <fieldset>
                                                    <legend for="106633996">2.3 ผลการบริหารหลักสูตร </legend>
                                                    <div class="form-group">
                                                        <p>(หมายถึงผลการประกันคุณภาพในระดับหลักสูตร ที่อาจารย์สังกัดในปีล่าสุด ก่อนภาคเรียนที่ทำการประเมิน แต่จะไม่รวมตัวบ่งชี้คุณสมบัติอาจารย์ประจำหลักสูตร)</p> <?php
                                                                                                                                                                                                                    foreach ($performance2_3 as $v) {
                                                                                                                                                                                                                        if ($v['level'] == $data['performance2_3']) {
                                                                                                                                                                                                                            $checked = ' checked="checked" ';
                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                            $checked = '';
                                                                                                                                                                                                                        } ?> <div class="radio">
                                                                <label>
                                                                    <input type="radio" <?= $checked ?> name="performance2_3" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                            </div> <?php
                                                                                                                                                                                                                    }
                                                                    ?>
                                                    </div>
                                                </fieldset>
                                                <div class="form-group">
                                                    <h4>หลักฐาน</h4>
                                                </div>
                                                <main role="main" class="container">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div id="perfile4" class="dropzone-wrapper">
                                                                <div class="dropzone-desc">
                                                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                                                    <p>เลือกไฟล์</p>
                                                                </div>
                                                                <input type="file" class="dropzone" id="file2_3" title='Click to add Files' accept="application/pdf,application/msword,
                                                   application/vnd.openxmlformats-officedocument.wordprocessingml.document" id-file="4" />
                                                            </div><!-- /uploader -->
                                                        </div>
                                                    </div><!-- /file list --> <?php
                                                                                //print_r($listfile_1_1);
                                                                                if (!empty($listfile_2_3)) {
                                                                                ?>
                                                        <div class="table-responsive">

                                                            <table class="table table-striped text-center" border="1">
                                                                <thead class="table-dark">
                                                                    <tr>
                                                                        <td>ชื่อไฟล์</td>
                                                                        <td>จัดการ</td>
                                                                    </tr>
                                                                </thead>
                                                                <tr> <?php
                                                                                    foreach ($listfile_2_3 as $value) {
                                                                                        # code...

                                                                        ?> <td><?= $value['file_name'] ?></td>
                                                                        <td> <button class="btn btn-danger btn-sm" file-name="<?= $value['file_name'] ?>" id='delfile4' id-del="<?= $value['id'] ?>"><i class="fa fa-trash"></i> ลบ</button></td>
                                                                </tr> <?php
                                                                                    } ?>
                                                            </table>

                                                        </div> <?php
                                                                                }
                                                                ?>
                                                </main> <!-- /container -->
                                                <br>
                                                <!-- Field type: "short" id: "1600155582" -->
                                                <!-- Field type: "choices" id: "933038004" -->
                                                <fieldset>
                                                    <legend for="933038004">2.4 ด้านการพัฒนาตนเอง เพื่อการผลิตบัณฑิตที่พึงประสงค์</legend>
                                                    <div class="form-group"> <?php
                                                                                foreach ($performance2_4 as $v) {
                                                                                    if ($v['level'] == $data['performance2_4']) {
                                                                                        $checked = ' checked="checked" ';
                                                                                    } else {
                                                                                        $checked = '';
                                                                                    } ?> <div class="radio">
                                                                <label>
                                                                    <input type="radio" <?= $checked ?> name="performance2_4" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                            </div> <?php
                                                                                }
                                                                    ?> </div>
                                                </fieldset>
                                                <div class="form-group">
                                                    <h4>หลักฐาน</h4>
                                                </div>
                                                <main role="main" class="container">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div id="perfile5" class="dropzone-wrapper">
                                                                <div class="dropzone-desc">
                                                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                                                    <p>เลือกไฟล์</p>
                                                                </div>
                                                                <input type="file" class="dropzone" id="file2_4" title='Click to add Files' accept="application/pdf,application/msword,
                                                   application/vnd.openxmlformats-officedocument.wordprocessingml.document" id-file="5" />
                                                            </div><!-- /uploader -->
                                                        </div>
                                                    </div><!-- /file list --> <?php
                                                                                //print_r($listfile_1_1);
                                                                                if (!empty($listfile_2_4)) {
                                                                                ?>
                                                        <div class="table-responsive">

                                                            <table class="table table-striped text-center" border="1">
                                                                <thead class="table-dark">
                                                                    <tr>
                                                                        <td>ชื่อไฟล์</td>
                                                                        <td>จัดการ</td>
                                                                    </tr>
                                                                </thead>
                                                                <tr> <?php
                                                                                    foreach ($listfile_2_4 as $value) {
                                                                                        # code...

                                                                        ?> <td><?= $value['file_name'] ?></td>
                                                                        <td> <button class="btn btn-danger btn-sm" file-name="<?= $value['file_name'] ?>" id='delfile5' id-del="<?= $value['id'] ?>"><i class="fa fa-trash"></i> ลบ</button></td>
                                                                </tr> <?php
                                                                                    } ?>
                                                            </table>

                                                        </div><?php
                                                                                }
                                                                ?>
                                                </main> <!-- /container -->
                                                <br>
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
                                                        <p>(งานวิจัยที่ได้รับจัดสรรทุน สามารถใช้ในการประเมินในช่วงเวลา1 ปี หลังจากการทำสัญญาขอรับทุน โดยไม่นับการขยายเวลา)</p> <?php
                                                                                                                                                                                foreach ($performance3_1 as $v) {
                                                                                                                                                                                    if ($v['level'] == $data['performance3_1']) {
                                                                                                                                                                                        $checked = ' checked="checked" ';
                                                                                                                                                                                    } else {
                                                                                                                                                                                        $checked = '';
                                                                                                                                                                                    } ?> <div class="radio">
                                                                <label>
                                                                    <input type="radio" <?= $checked ?> name="performance3_1" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                            </div> <?php
                                                                                                                                                                                }
                                                                    ?>
                                                    </div>
                                                </fieldset>
                                                <div class="form-group">
                                                    <h4>หลักฐาน</h4>
                                                </div>
                                                <main role="main" class="container">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div id="perfile6" class="dropzone-wrapper">
                                                                <div class="dropzone-desc">
                                                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                                                    <p>เลือกไฟล์</p>
                                                                </div>
                                                                <input type="file" class="dropzone" id="file3_1" title='Click to add Files' accept="application/pdf,application/msword,
                                                   application/vnd.openxmlformats-officedocument.wordprocessingml.document" id-file="6" />
                                                            </div><!-- /uploader -->
                                                        </div>
                                                    </div><!-- /file list --> <?php
                                                                                //print_r($listfile_1_1);
                                                                                if (!empty($listfile_3_1)) {
                                                                                ?>
                                                        <div class="table-responsive">

                                                            <table class="table table-striped text-center" border="1">
                                                                <thead class="table-dark">
                                                                    <tr>
                                                                        <td>ชื่อไฟล์</td>
                                                                        <td>จัดการ</td>
                                                                    </tr>
                                                                </thead>
                                                                <tr> <?php
                                                                                    foreach ($listfile_3_1 as $value) {
                                                                                        # code...

                                                                        ?> <td><?= $value['file_name'] ?></td>
                                                                        <td> <button class="btn btn-danger btn-sm" file-name="<?= $value['file_name'] ?>" id='delfile6' id-del="<?= $value['id'] ?>"><i class="fa fa-trash"></i> ลบ</button></td>
                                                                </tr> <?php
                                                                                    } ?>
                                                            </table>

                                                        </div> <?php
                                                                                }
                                                                ?>
                                                </main> <!-- /container -->
                                                <br>
                                                <!-- Field type: "choices" id: "1300834964" -->
                                                <fieldset>
                                                    <legend for="1300834964">3.2 การมีส่วนร่วมในงานวิจัยที่มีการดำเนินการ</legend>
                                                    <div class="form-group">
                                                        <p>(งานวิจัยที่ได้รับจัดสรรทุน สามารถใช้ในการประเมินในช่วงเวลา 1 ปี หละงจากการทำสัญญาขอรับทุน โดยไม่นับการขยายเวลา)</p> <?php
                                                                                                                                                                                foreach ($performance3_2 as $v) {
                                                                                                                                                                                    if ($v['level'] == $data['performance3_2']) {
                                                                                                                                                                                        $checked = ' checked="checked" ';
                                                                                                                                                                                    } else {
                                                                                                                                                                                        $checked = '';
                                                                                                                                                                                    } ?> <div class="radio">
                                                                <label>
                                                                    <input type="radio" <?= $checked ?> name="performance3_2" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                            </div> <?php
                                                                                                                                                                                }
                                                                    ?>
                                                    </div>
                                                </fieldset>
                                                <div class="form-group">
                                                    <h4>หลักฐาน</h4>
                                                </div>
                                                <main role="main" class="container">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div id="perfile7" class="dropzone-wrapper">
                                                                <div class="dropzone-desc">
                                                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                                                    <p>เลือกไฟล์</p>
                                                                </div>
                                                                <input type="file" class="dropzone" id="file3_2" title='Click to add Files' accept="application/pdf,application/msword,
                                                   application/vnd.openxmlformats-officedocument.wordprocessingml.document" id-file="7" />
                                                            </div><!-- /uploader -->
                                                        </div>
                                                    </div><!-- /file list --> <?php
                                                                                //print_r($listfile_1_1);
                                                                                if (!empty($listfile_3_2)) {
                                                                                ?>
                                                        <div class="table-responsive">

                                                            <table class="table table-striped text-center" border="1">
                                                                <thead class="table-dark">
                                                                    <tr>
                                                                        <td>ชื่อไฟล์</td>
                                                                        <td>จัดการ</td>
                                                                    </tr>
                                                                </thead>
                                                                <tr> <?php
                                                                                    foreach ($listfile_3_2 as $value) {
                                                                                        # code...

                                                                        ?> <td><?= $value['file_name'] ?></td>
                                                                        <td> <button class="btn btn-danger btn-sm" file-name="<?= $value['file_name'] ?>" id='delfile7' id-del="<?= $value['id'] ?>"><i class="fa fa-trash"></i> ลบ</button></td>
                                                                </tr> <?php
                                                                                    } ?>
                                                            </table>

                                                        </div> <?php
                                                                                }
                                                                ?>
                                                </main> <!-- /container -->
                                                <br>
                                                <!-- Field type: "choices" id: "1303417440" -->
                                                <fieldset>
                                                    <legend for="1303417440">3.3 กระบวนการดำเนินการวิจัย</legend>
                                                    <div class="form-group">
                                                        <p>(ระดับ 5 สามารถใช้ผลงานตีพิมพ์ เผยแพร่ ในรอบที่มีการตีพิมพ์เผยแพร่ของรอบประเมินนั้น ซึ่งอาจจะอยู่ในรอบวิจัยหลังจากปีที่ทำวิจัยก็ได้)</p> <?php
                                                                                                                                                                                                    foreach ($performance3_3 as $v) {
                                                                                                                                                                                                        if ($v['level'] == $data['performance3_3']) {
                                                                                                                                                                                                            $checked = ' checked="checked" ';
                                                                                                                                                                                                        } else {
                                                                                                                                                                                                            $checked = '';
                                                                                                                                                                                                        } ?> <div class="radio">
                                                                <label>
                                                                    <input type="radio" <?= $checked ?> name="performance3_3" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                            </div> <?php
                                                                                                                                                                                                    }
                                                                    ?>
                                                    </div>
                                                </fieldset>
                                                <div class="form-group">
                                                    <h4>หลักฐาน</h4>
                                                </div>
                                                <main role="main" class="container">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div id="perfile8" class="dropzone-wrapper">
                                                                <div class="dropzone-desc">
                                                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                                                    <p>เลือกไฟล์</p>
                                                                </div>
                                                                <input type="file" class="dropzone" id="file3_3" title='Click to add Files' accept="application/pdf,application/msword,
                                                   application/vnd.openxmlformats-officedocument.wordprocessingml.document" id-file="8" />
                                                            </div><!-- /uploader -->
                                                        </div>
                                                    </div><!-- /file list --> <?php
                                                                                //print_r($listfile_1_1);
                                                                                if (!empty($listfile_3_3)) {
                                                                                ?>
                                                        <div class="table-responsive">

                                                            <table class="table table-striped text-center" border="1">
                                                                <thead class="table-dark">
                                                                    <tr>
                                                                        <td>ชื่อไฟล์</td>
                                                                        <td>จัดการ</td>
                                                                    </tr>
                                                                </thead>
                                                                <tr> <?php
                                                                                    foreach ($listfile_3_3 as $value) {
                                                                                        # code...

                                                                        ?> <td><?= $value['file_name'] ?></td>
                                                                        <td> <button class="btn btn-danger btn-sm" file-name="<?= $value['file_name'] ?>" id='delfile8' id-del="<?= $value['id'] ?>"><i class="fa fa-trash"></i> ลบ</button></td>
                                                                </tr> <?php
                                                                                    } ?>
                                                            </table>

                                                        </div> <?php
                                                                                }
                                                                ?>
                                                </main> <!-- /container -->
                                                <br>
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
                                                    <div class="form-group"> <?php
                                                                                foreach ($performance4_1 as $v) {
                                                                                    if ($v['level'] == $data['performance4_1']) {
                                                                                        $checked = ' checked="checked" ';
                                                                                    } else {
                                                                                        $checked = '';
                                                                                    } ?> <div class="radio">
                                                                <label>
                                                                    <input type="radio" <?= $checked ?> name="performance4_1" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                            </div> <?php
                                                                                }
                                                                    ?> </div>
                                                </fieldset>
                                                <div class="form-group">
                                                    <h4>หลักฐาน</h4>
                                                </div>
                                                <main role="main" class="container">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div id="perfile9" class="dropzone-wrapper">
                                                                <div class="dropzone-desc">
                                                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                                                    <p>เลือกไฟล์</p>
                                                                </div>
                                                                <input type="file" class="dropzone" id="file4_1" title='Click to add Files' accept="application/pdf,application/msword,
                                                   application/vnd.openxmlformats-officedocument.wordprocessingml.document" id-file="9" />
                                                            </div><!-- /uploader -->
                                                        </div>
                                                    </div><!-- /file list --> <?php
                                                                                //print_r($listfile_1_1);
                                                                                if (!empty($listfile_4_1)) {
                                                                                ?>
                                                        <div class="table-responsive">

                                                            <table class="table table-striped text-center" border="1">
                                                                <thead class="table-dark">
                                                                    <tr>
                                                                        <td>ชื่อไฟล์</td>
                                                                        <td>จัดการ</td>
                                                                    </tr>
                                                                </thead>
                                                                <tr> <?php
                                                                                    foreach ($listfile_4_1 as $value) {
                                                                                        # code...

                                                                        ?> <td><?= $value['file_name'] ?></td>
                                                                        <td> <button class="btn btn-danger btn-sm" file-name="<?= $value['file_name'] ?>" id='delfile9' id-del="<?= $value['id'] ?>"><i class="fa fa-trash"></i> ลบ</button></td>
                                                                </tr> <?php
                                                                                    } ?>
                                                            </table>

                                                        </div> <?php
                                                                                }
                                                                ?>
                                                </main> <!-- /container -->
                                                <br>
                                                <div class="step-actions">
                                                    <button class="waves-effect waves-dark btn btn-sm btn-primary next-step"><i class="fa fa-arrow-right"></i> ถัดไป</button>
                                                    <button class="waves-effect waves-dark btn btn-sm btn-danger previous-step">กลับ</button>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="step">
                                            <div class="step-title waves-effect waves-dark">5.ด้านการทำนุบำรุงศิลปวัฒนธรรม</div>
                                            <div class="step-new-content">
                                                <fieldset>
                                                    <legend for="1881094579">5.1 การเข้าร่วมกิจกรรมและรับผิดชอบโครงการทำนุบำรุงศิลปวัฒนธรรมของสาขาวิชา/คณะ/มหาวิทยาลัย</legend>
                                                    <div class="form-group"> <?php
                                                                                foreach ($performance5_1 as $v) {
                                                                                    if ($v['level'] == $data['performance5_1']) {
                                                                                        $checked = ' checked="checked" ';
                                                                                    } else {
                                                                                        $checked = '';
                                                                                    } ?> <div class="radio">
                                                                <label>
                                                                    <input type="radio" <?= $checked ?> name="performance5_1" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                            </div> <?php
                                                                                }
                                                                    ?> </div>
                                                </fieldset>
                                                <div class="form-group">
                                                    <h4>หลักฐาน</h4>
                                                </div>
                                                <main role="main" class="container">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div id="perfile10" class="dropzone-wrapper">
                                                                <div class="dropzone-desc">
                                                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                                                    <p>เลือกไฟล์</p>
                                                                </div>
                                                                <input type="file" class="dropzone" id="file5_1" title='Click to add Files' accept="application/pdf,application/msword,
                                                   application/vnd.openxmlformats-officedocument.wordprocessingml.document" id-file="10" />
                                                            </div><!-- /uploader -->
                                                        </div>
                                                    </div><!-- /file list --> <?php
                                                                                //print_r($listfile_1_1);
                                                                                if (!empty($listfile_5_1)) {
                                                                                ?>
                                                        <div class="table-responsive">

                                                            <table class="table table-striped text-center" border="1">
                                                                <thead class="table-dark">
                                                                    <tr>
                                                                        <td>ชื่อไฟล์</td>
                                                                        <td>จัดการ</td>
                                                                    </tr>
                                                                </thead>
                                                                <tr> <?php
                                                                                    foreach ($listfile_5_1 as $value) {
                                                                                        # code...

                                                                        ?> <td><?= $value['file_name'] ?></td>
                                                                        <td> <button class="btn btn-danger btn-sm" file-name="<?= $value['file_name'] ?>" id='delfile10' id-del="<?= $value['id'] ?>"><i class="fa fa-trash"></i> ลบ</button></td>
                                                                </tr> <?php
                                                                                    } ?>
                                                            </table>

                                                        </div> <?php
                                                                                }
                                                                ?>
                                                </main> <!-- /container -->
                                                <br>
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
                                                        <p>(เป็นกิจกรรม/โครงการ/งาน ที่ได้ดำเนินการแต่ไม่ปรากฏในแบบข้อตกลงฉบับนี้และยังไม่มีการกำหนดภาระงาน โดยให้อธิบายลักษณะและขอบเขตของงาน/กิจกรรมพอสังเขป)</p> <?php
                                                                                                                                                                                                                    foreach ($performance6_1 as $v) {
                                                                                                                                                                                                                        if ($v['level'] == $data['performance6_1']) {
                                                                                                                                                                                                                            $checked = ' checked="checked" ';
                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                            $checked = '';
                                                                                                                                                                                                                        } ?> <div class="radio">
                                                                <label>
                                                                    <input type="radio" <?= $checked ?> name="performance6_1" value="<?= $v['level'] ?>"> <?= $v['detail'] ?> </label>
                                                            </div> <?php
                                                                                                                                                                                                                    }
                                                                    ?>
                                                    </div>
                                                </fieldset>
                                                <div class="form-group">
                                                    <h4>หลักฐาน</h4>
                                                </div>
                                                <main role="main" class="container">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <div id="perfile11" class="dropzone-wrapper">
                                                                <div class="dropzone-desc">
                                                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                                                    <p>เลือกไฟล์</p>
                                                                </div>
                                                                <input type="file" class="dropzone" id="file6_1" title='Click to add Files' accept="application/pdf,application/msword,
                                                   application/vnd.openxmlformats-officedocument.wordprocessingml.document" id-file="11" />
                                                            </div><!-- /uploader -->
                                                        </div>
                                                    </div><!-- /file list --> <?php
                                                                                //print_r($listfile_1_1);
                                                                                if (!empty($listfile_6_1)) {
                                                                                ?>
                                                        <div class="table-responsive">

                                                            <table class="table table-striped text-center" border="1">
                                                                <thead class="table-dark">
                                                                    <tr>
                                                                        <td>ชื่อไฟล์</td>
                                                                        <td>จัดการ</td>
                                                                    </tr>
                                                                </thead>
                                                                <tr> <?php
                                                                                    foreach ($listfile_6_1 as $value) {
                                                                                        # code...

                                                                        ?> <td><?= $value['file_name'] ?></td>
                                                                        <td> <button class="btn btn-danger btn-sm" file-name="<?= $value['file_name'] ?>" id='delfile11' id-del="<?= $value['id'] ?>"><i class="fa fa-trash"></i> ลบ</button></td>
                                                                </tr> <?php
                                                                                    } ?>
                                                            </table>

                                                        </div> <?php
                                                                                }
                                                                ?>
                                                </main> <!-- /container -->
                                                <br>
                                                <div class="step-actions">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
 
                                    <div class='form-group text-center'>
                                        <button class="waves-effect waves-dark btn btn-primary" id="update_rate"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                        <button class="waves-effect waves-dark btn btn-danger" id="sent"><i class="fa fa-paper-plane" aria-hidden="true"></i> ส่งข้อมูล</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg" id="addworkload" tabindex="-1" role="dialog" aria-labelledby="addworkloadModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addworkloadModalLongTitle"><i class="fas fa-user-edit"></i> เพิ่มภาระงาน</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <div class="col md-5">
                                    <a href="workload_file/ภาระงาน.xlsx" class="btn-download nav-link"><i class="fa fa-download"></i> ดาวน์โหลดไฟล์ภาระงาน</a>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div id="perfile2" class="dropzone-wrapper">
                                            <div class="dropzone-desc">
                                                <i class="fa fa-upload" aria-hidden="true"></i>
                                                <p>อัพโหลดภาระงาน</p>
                                            </div>
                                            <input type="file" class="dropzone" id="workload_file" title='Click to add Files' accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />
                                        </div><!-- /uploader -->
                                    </div>
                                </div><!-- /file list -->
                                 <?php
                                if (!empty($workload_file['file_name'])) {
                                    ?>                                               
                                <div class="table-responsive">
                                    <table class="table table-striped text-center" border="1">
                                        <thead class="table-dark">
                                            <tr>
                                                <td>ไฟล์</td>
                                               
                                            </tr>
                                        </thead>
                                        <tr> 
                                             <td><?=$workload_file['file_name']?></td>                                   
                                         </tr>
                                    </table>

                                </div>
                                <?php
                                }
                                ?>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-window-close"></i> Close</button>
                            </div>
                        </div>
                    </div>
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
                <script type="text/javascript" src="asset/js/steppers.min.js"></script>
                <script src="asset/js/popper.min.js"></script>
                <script src="asset/js/upload.js"></script>
                <script src="asset/js/bootstrap.min.js"></script>
                <script src="asset/js/jquery.dm-uploader.js"></script>
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