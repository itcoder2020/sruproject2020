<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/img/logo.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="asset/img/logo.png" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/mdb.min.css">
    <link rel="stylesheet" href="asset/css/toastr.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/steppers.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="asset/js/jquery.js"></script>
    <title>ข้อมูลส่วนตัว</title>
</head>

<body> <?php
        $this->load->view('navbar');


        ?> <div class="container" style="margin-top:120px;margin-bottom:120px;">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">แก้ไขข้อมูลส่วนตัว</h2>
            </div>
            <div class="card-body">
                <label for=""> <b>
                        <h4>1.ข้อมูลส่วนบุคคล</h4>
                    </b></label>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">ชื่อ-สกุล</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id='name' autofocus value="<?= $userdata['name'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ตำแหน่งราชการ</label>
                    <div class="col-sm-10">
                    <select id="officialposition" class="form-control">
                    <?php
                   
                    foreach($officialposition as $v)
                    
                    {
                        if($userdata['officialposition'] == $v['id']){
                            $check = "selected";
                       
                        }else{
                          $check = "";
                        }  
                        ?>
                    
                        <option <?=$check?> value="<?=$v['id']?>"> <?=$v['name']?></option>
                        <?php
                        }
                        ?>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">ตำแหน่งบริหาร</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" disabled value="<?= $managementposition ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">หน่วยงานที่สังกัด</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" disabled value="<?= $affiliated_agencies ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">ประเภทบุคลากร</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" disabled value="<?= $personneltype ?>">
                    </div>
                </div>
                <label for=""> <b>
                        <h4>2.ข้อมูลเข้าสู่ระบบ</h4>
                    </b></label>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">ชื่อผู้ใช้งาน</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" maxlength="15" disabled value="<?= $userdata['username'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">อีเมลล์</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id='email' maxlength="50" disabled value="<?= $userdata['email'] ?>">
                    </div>
                </div>
                <h4>3.รหัสผ่าน</h4>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">แก้ไขรหัสผ่าน</label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-outline-primary btn-sm waves-effect" data-toggle="modal" data-target="#changpass"> <i class="fa fa-edit"></i> แก้ไข</button>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" id='edit_profile' class="btn btn-primary waves-effect"><i class="fa fa-edit"></i> แก้ไข</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="changpass" tabindex="-1" role="dialog" aria-labelledby="changpassModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changpassTitle">แก้ไขรหัสผ่าน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">รหัสผ่านเก่า</label>
                        <input type="password" id='o_password' class="form-control" maxlength="20">
                    </div>
                    <div class="form-group">
                        <label for="">รหัสใหม่</label>
                        <input type="password" id='n_password' class="form-control" maxlength="20">
                    </div>
                    <div class="form-group">
                        <label for="">ยืนยันรหัสผ่านใหม่</label>
                        <input type="password" id='c_password' class="form-control" maxlength="20">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary  btn-sm" id='change_pass'><i class="fa fa-edit"></i> แก้ไขรหัสผ่าน</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times-circle"></i> ปิด</button>
                </div>
            </div>
        </div>
    </div>
    <script src="asset/js/popper.min.js" >
    </script>
    <script src="asset/js/bootstrap.min.js" >
    </script>
    <script src="asset/js/toastr.min.js"></script>
    <script src="asset/js/script.js"></script>
    <script src="asset/js/pace.min.js"></script>
</body>
<?php
$this->load->view('footer');
$this->load->view('preloader');
?>
</html>