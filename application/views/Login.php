<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="asset/img/logo.png" type="image/x-icon" />
    <link rel="shortcut icon" href="asset/img/logo.png" type="image/x-icon" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/mdb.min.css">
    <link rel="stylesheet" href="asset/css/toastr.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/steppers.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="asset/js/jquery.js"></script>
    <title>เข้าสู่ระบบ</title>
</head>

<body>

    <div class="container" style="margin-top:50px;margin-bottom:60px;">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="text-center">
                    <img src="asset/img/SRUlogo.png" alt="" width="300" height="100" class="img-fluid">
                    <p>ระบบประเมินผลปฏิบัติราชการ สายวิชาการ</p>
                    <p>คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏสุราษฎร์ธานี</p>
                </div>
                <div class="card my-5">
                    <div class="card-header">
                        <h5 class="card-title text-center">เข้าสู่ระบบ</h5>
                    </div>
                    <div class="card-body">

                        <div class="md-form">
                            <label for=""><i class="fa fa-user" aria-hidden="true"></i> ชื่อผู้ใช้งาน </label>
                            <input type="text" id="username_login" class="form-control"  required autofocus>
                        </div>
                        <div class="md-form">
                        <label for=""><i class="fa fa-key" aria-hidden="true"></i> รหัสผ่าน </label>
                            <input type="password" id="password_login" class="form-control"  required>
                            <input type="checkbox" onclick=" Showpass()"> <a style="font-size: small;">แสดงรหัสผ่าน</a>
                        </div>
                        <div class="from-group">
                            <button class="btn btn-lg  btn-primary btn-block text-uppercase" id='login' type="submit"> <i class="fa fa-sign-in" aria-hidden="true"></i> เข้าสู่ระบบ</button>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="asset/js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="asset/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="asset/js/mdb.min.js"></script>
    <script src="asset/js/toastr.min.js"></script>
    <script src="asset/js/script.js"></script>
    
    
</body>
<?php
$this->load->view('footer');
$this->load->view('preloader');
?>

</html>