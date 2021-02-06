<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>เปลี่ยนรหัสผ่าน</title>
    <link rel="stylesheet" href="<?= base_url('asset_admin/css/datetime.css') ?>">
    </link>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="<?= base_url('asset_admin/css/bootstrap.min.css') ?>">
    <script src="<?= base_url('asset_admin/js/sweetalert2.js') ?>"></script>
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('asset_admin/css/style.css') ?>">
    <!-- Font Awesome JS -->
    <script defer src="<?= base_url('asset_admin/js/solid.js') ?>" ></script>
    <script defer src="<?= base_url('asset_admin/js/fontawesome.js') ?>" ></script>
    <script src="<?= base_url('asset/js/jquery.js') ?>"></script>
</head> <?php
        ///print_r($managementposition);
        ?>

<body>
    <div class="wrapper"> <?php $this->load->view('admin/nav') ?> <div id="content"> <?php $this->load->view('admin/nav2') ?> <div class="card">
                <div class="card-header text-center">
                    <h4><i class="fa fa-key" aria-hidden="true"></i> เปลี่ยนรหัสผ่าน</h4>
                </div>
                <div class="card-body jumbotron">
                    <div class="form-group row justify-content-center">
                        <label for="staticEmail" class="col-sm-1 col-form-label">รหัสผ่านเก่า</label>
                        <div class="col-sm-3">
                            <input type="password" class="form-control" id='password' />
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="inputPassword" class="col-sm-1 col-form-label">รหัสผ่านใหม่</label>
                        <div class="col-sm-3">
                            <input type="password" class="form-control" id='newpassword' />
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="inputPassword" class="col-sm-1 col-form-label">ยืนยันรหัสผ่านใหม่</label>
                        <div class="col-sm-3">
                            <input type="password" id='con_password' class="form-control" />
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <label for="inputPassword" class="col-sm-1 col-form-label"></label>
                        <button class="btn btn-success" id='editpass'><i class="fa fa-edit" aria-hidden="true"></i> แก้ไข</button>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
        $('#editpass').click(() => {
            let password = $("#password").val()
            let newpassword = $("#newpassword").val()
            let con_password = $("#con_password").val()
            if (password == '' || newpassword == '' || con_password == '') {
                Swal.fire("ใส่ข้อมูลไม่ครบถ้วน", '', 'error')
            } else if (newpassword.length < 8) {
                Swal.fire("รหัสผ่านต้องมากกว่า 8 หลัก", '', 'error')
            } else if (newpassword != con_password) {
                Swal.fire("รหัสผ่านไม่ตรงกัน", '', 'error')
            } else {
                $.ajax({
                    url: "../api/change_password",
                    method: "post",
                    data: {
                        password: password,
                        newpassword: newpassword,
                    },
                    success: function(res) {
                        if (res.status == true) {
                            Swal.fire(res.message, '', 'success').then(function() {
                                window.location.reload()
                            });
                        } else {
                            Swal.fire(res.message, '', 'error')
                        }
                    }
                })
            }
        })
    </script>
    <script src="<?= base_url('asset_admin/js/pace.min.js') ?>"></script>
</body>

</html>