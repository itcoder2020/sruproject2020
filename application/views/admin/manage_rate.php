<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ข้อมูลการประเมิน</title>
    <link rel="stylesheet" href="<?= base_url('asset_admin/css/datetime.css') ?>">
    </link>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css">
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
                    <h4>ข้อมูลการประเมิน</h4>
                </div>
                <div class="card-body jumbotron">
                    <div class="row py-5">
                        <div class="col-12">
                            <table id="tbrate" class="table table-hover responsive nowrap text-center" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ชื่อสกุล</th>
                                        <th>ตำแหน่ง</th>
                                        <th>ปีการศึกษา</th>
                                        <th>ภาคเรียน</th>
                                        <th>หน่วยงานที่สังกัด</th>
                                        <th>สถานะการทำแบบประเมิน</th>
                                        <th>ผลการประเมิน</th>
                                </thead>
                                <tbody> <?php
                                    foreach ($data as $row) {
                                    ?> <tr>
                                        <td><?= $row['name_member'] ?></td>
                                        <td>
                                        <?php
                                        if($row['status'] == 0){
                                            echo "อาจารย์";
                                        }else if($row['status'] == 1){
                                            echo "ประธานหลักสูตร";
                                        }else if($row['status'] == 2){
                                            echo "ผู้บริหาร";
                                        }
                                        ?>
                                        </td>
                                        <td><?= $row['year'] ?></td>
                                        <td><?= $row['Semester'] ?></td>
                                        <td><?= $row['name'] ?></td>
  
                                        <td>
                                        <?php
                                        if($row['rate_status'] == 0){
                                            echo "ทำแบบประเมิน";
                                        }else if($row['rate_status'] == 1){
                                            echo "ประธานหลักสูตรประเมิน";
                                        }else if($row['rate_status'] == 2){
                                            echo "ผู้บริหารทำแบบประเมิน";
                                        }else if($row['rate_status'] == 3){
                                            echo "เสร็จสิ้น";
                                        }
                                        ?>
                                        </td>
                                        <td ><a id="result" id-result="<?= $row['id'] ?>">
                                                <i class="fa fa-arrow-right"></i>
                                            </a></td>
                                    </tr> <?php
                                    }
                                    ?> </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalresult" tabindex="-1" role="dialog" aria-labelledby="modalresultModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalresultTitle"><i class="fa fa-list-alt"></i> ผลการประเมิน <small id='name'></small></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover responsive nowrap" border="1">
                    <thead class=""> 
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
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">ปิด</button>
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
        $(document).ready(function() {
            $("#tbrate").DataTable({
                aaSorting: [],
                responsive: true,
                columnDefs: [{
                    responsivePriority: 1,
                    targets: 0
                }, {
                    responsivePriority: 2,
                    targets: -1
                }]
            });
            $(".dataTables_filter input").attr("placeholder", "ค้นหา").css({
                width: "300px",
                display: "inline-block"
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
        $(document).on('click', '#result', function() {
    let id = $(this).attr("id-result");
   // alert(id)

    $.ajax({
        url: "../api/result",
        method: "post",
        data: {
            id: id,
         
        },
        success: function(res) {
            $('#modalresult').modal()
            let sum = parseFloat(res.total_score_c)+parseFloat(res.total_score_p);
            let message = ''
            $('#total_score_p').html(res.total_score_p)
            $('#name').html("("+res.name+")")
            $('#total_score_c').html(res.total_score_c)
            $('#sum_score').html(parseFloat(res.total_score_c)+parseFloat(res.total_score_p))
            if(sum  >= 90){
                message =  '<font color="green">ดีเด่น</font>'
            }else if(sum >=80 && sum <=89.99){
                message =  '<font color="green">ดีมาก</font>'
            }else if(sum >=70 && sum <=79.99){
                message =  '<font color="green">ดี</font>'
            }else if(sum >=60 && sum <=69.99){
                message =  '<font color="#FF9900">พอใช้</font>'
            }else if(sum >=1 && sum <=59.99){
                message =  '<font color="red">ต้องปรับปรุง</font>'
            }
            $('#message').html(message)

            
        }
    })

})
    </script>
    <script src="<?= base_url('asset_admin/js/script.js') ?>"></script>
    <script src="<?= base_url('asset_admin/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('asset_admin/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('asset_admin/js/pace.min.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('asset_admin/js/datetime.js') ?>"></script>
</body>

</html>