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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="asset/js/jquery.js"></script>
    <title>หน้าหลัก</title>
</head>

<body>
    <!--Navbar--> <?php
         $this->load->view('navbar');
         
         
         ?> <div class="container" style="margin-top:120px;margin-bottom:120px;"> <?php
            //print_r($data_President);
            //print_r($data);
            ?> 
            <div class='card'>
                <div class='card-header text-center'>
                    <h2> ประเมินผลปฏิบัติราชการ <?php if ($check == 1) {
                        echo "ภาคเรียนที่ " . $Semester . " ปีการศึกษาที่ " . $year;
                        } ?> </h2>
                    <p> <?= ($check == 1 ? '<span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> เปิดประเมิน</span>' : '<span class="badge badge-danger"><i class="fa fa-times" aria-hidden="true"></i> ปิดประเมิน</span>'); ?></p>
                    <p> <?php
                        if ($check == 1) {
                            echo $start_date . ' - ' . $end_date;
                        }
                        ?> </p>
                </div>
                <div class='card-body'>
                    <h2 class='mb-3'><i class="fa fa-list-alt"></i> ประเมินประธานหลักสูตร</h2>
                    <div class="table-responsive">
                        <table class="table table-striped text-center"   border="1" id='tb_p'>
                        <thead class="table-dark"> 
                                <tr>
                                    <th scope="col">ชื่อ-สกุล</th>
                                    <th scope="col">หน่วยงานที่สังกัด</th>
                                    <th scope="col">ประเมิน</th>
                                </tr>
                            </thead>
                            <tbody> <?php
                              foreach ($data_President as $key => $value) {
                                  # code...
                              
                              ?> <tr>
                                    <th scope="row"><?= $value['name_member']?></th>
                                    <td><?= $value['name']?></td>
                                    <td> <a href="./rate/<?=$value['id']?>">
                                            <span class="fa fa-arrow-right"></span>
                                        </a>
                                    </td>
                                </tr> <?php
                              }
                              ?> </tbody>
                        </table>
                    </div>
                    <br>
                    <hr>
                    <h2 class='mb-3'><i class="fa fa-list-alt"></i> ประเมินอาจารย์</h2>
                    <div class="table-responsive">
                        <table class="table table-striped text-center"   border="1" id='tb_t'>
                            <thead  class="table-dark">
                                <tr>
                                    <th scope="col">ชื่อ-สกุล</th>
                                    <th scope="col">หน่วยงานที่สังกัด</th>
                                    <th scope="col">ประเมิน</th>
                                </tr>
                            </thead>
                            <tbody> <?php
                              foreach ($data as $key => $value) {
                                  # code...
                              
                              ?> <tr>
                                    <th scope="row"><?= $value['name_member']?></th>
                                    <td><?= $value['name']?></td>
                                    <td> <a href="./rate/<?=$value['id']?>">
                                            <span class="fa fa-arrow-right"></span>
                                        </a>
                                    </td>
                                </tr> <?php
                              }
                              ?> </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- <a class='btn btn-success text-light' id='Round'>รอบที่ </a> -->
        
    </div>
    <script>
        $(document).ready(function() {
            $('#tb_p').DataTable();
            $('#tb_t').DataTable();
        });
    </script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
   
    <script src="asset/js/pace.min.js"></script>
    <script src="asset/js/toastr.min.js"></script>
    <script type="text/javascript" src="asset/js/mdb.min.js"></script>
    <script src="asset/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
</body>
<?php
$this->load->view('footer');
$this->load->view('preloader');
?>
</html>