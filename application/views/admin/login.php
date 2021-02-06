<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ สำหรับผู้ดูแล</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="<?= base_url('asset_admin/css/bootstrap.min.css') ?>">
    <script src="<?= base_url('asset_admin/js/sweetalert2.js') ?>"></script>
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('asset_admin/css/style.css') ?>">
    <!-- Font Awesome JS -->
    <script defer src="<?= base_url('asset_admin/js/solid.js') ?>" ></script>
    <script defer src="<?= base_url('asset_admin/js/fontawesome.js') ?>" ></script>
    <script src="<?= base_url('asset/js/jquery.js') ?>"></script>
    
</head>
<body>
    <div class="container" style="margin-top:250px;margin-bottom:120px;">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card my-5">
                    <div class="card-header bg-primary text-light">
                        <h5 class="card-title text-center"> เข้าสู่ระบบ</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" id="usernamea_login" class="form-control" placeholder="ชื่อผู้ใช้งาน" required autofocus>
                        </div>
                        <div class="form-group">
                            <input type="password" id="passworda_login" class="form-control" placeholder="รหัสผ่าน" required>
                        </div>
                        <div class="from-group">
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" id='login_admin' type="submit"> <i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('asset_admin/js/script.js') ?>"></script>
    <script src="<?= base_url('asset_admin/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('asset_admin/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('asset_admin/js/pace.min.js') ?>"></script>
</body>
</html>