<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>จัดการวันเปิด-ปิด</title>
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
                    <h4>จัดการวัน เปิด-ปิด ประเมิน</h4>
                </div>
                <div class="card-body jumbotron">
                    <div class="form-group row justify-content-center">
                        <label for="staticEmail" class="col-sm-1 col-form-label">วันเปิด</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name='start_date' id="datetimepicker_mask_open" />
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="inputPassword" class="col-sm-1 col-form-label">วันปิด</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name='end_date' id="datetimepicker_mask_close" />
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="inputPassword" class="col-sm-1 col-form-label">ปีการศึกษา</label>
                        <div class="col-sm-3">
                            <input type="number" name='year' class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="inputPassword" class="col-sm-1 col-form-label">ภาคเรียน</label>
                        <div class="col-sm-3">
                            <input type="number" name='semester' class="form-control" />
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <label for="inputPassword" class="col-sm-1 col-form-label"></label>
                        <button class="btn btn-success" id='add'><i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูล</button>
                        <button class="btn btn-danger" id='reset'><i class="fas fa-undo"></i> รีเซ็ต</button>
                    </div>
                    <hr>
                    <div class="row py-5">
                        <div class="col-12">
                            <table id="tbdate" class="table table-hover responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ปีการศึกษา</th>
                                        <th>ภาคเรียน</th>
                                        <th>วันเปิดประเมิน</th>
                                        <th>วันปิดประเมิน</th>
                                        <th>จัดการ</th>
                                </thead>
                                <tbody> <?php
                                    function DateThai($strDate)
                                    {
                                        $strYear = date("Y", strtotime($strDate)) + 543;
                                        $strMonth = date("n", strtotime($strDate));
                                        $strDay = date("j", strtotime($strDate));
                                        $strHour = date("H", strtotime($strDate));
                                        $strMinute = date("i", strtotime($strDate));
                                        $strSeconds = date("s", strtotime($strDate));
                                        $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
                                        $strMonthThai = $strMonthCut[$strMonth];
                                        return "$strDay $strMonthThai $strYear เวลา  $strHour:$strMinute";
                                    }
                                    foreach ($all as $row) {
                                    ?> <tr>
                                        <td><?= $row['year'] ?></td>
                                        <td><?= $row['semester'] ?></td>
                                        <td><?= DateThai($row['start_date']) ?></td>
                                        <td><?= DateThai($row['end_date']) ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-cog" data-toggle="tooltip" data-placement="top" title="จัดการ"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                    <a class="dropdown-item" id='edit' id-edit='<?= $row['id'] ?>'><i class="fas fa-user-edit"></i> แก้ไข</a>
                                                    <a id='delete' class="dropdown-item text-danger" id-del='<?= $row['id'] ?>' href="#"><i class="bx bxs-trash mr-2"></i> ลบ</a>
                                                </div>
                                            </div>
                                        </td>
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
    <div class="modal fade bd-example-modal-lg" id="editdate" tabindex="-1" role="dialog" aria-labelledby="editdateModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editdateModalLongTitle"><i class="fas fa-user-edit"></i> แก้ไขข้อมูล</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="data_date">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id='edit_data'><i class="fas fa-save"></i> ยืนยัน</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
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
            $("#tbdate").DataTable({
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
        $('#reset').click(() => {
            $('input[name=semester]').val('')
            $('input[name=year]').val('')
            $('input[name=start_date]').val('')
            $('input[name=end_date]').val('')
        })
        $('#add').click(() => {
            let semester = $('input[name=semester]').val()
            let year = $('input[name=year]').val()
            let start_date = $('input[name=start_date]').val()
            let end_date = $('input[name=end_date]').val()
            if (semester == '' || year == '' || start_date == '' || end_date == '') {
                Swal.fire('แจ้งเตือน!', 'ใส่ข้อมูลไม่ครบถ้วน', 'error')
            } else {
                $.ajax({
                    url: '../api/add_date',
                    method: 'post',
                    data: {
                        semester: semester,
                        year: year,
                        start_date: start_date,
                        end_date: end_date,
                        code_date: makeid(5)
                    },
                    success: function(res) {
                        Swal.fire(res.message, '', 'success').then(function() {
                            window.location.reload()
                        });
                    },
                    error: function(request, status, error) {
                        var val = request.responseText;
                        alert("error" + val);
                    }
                })
            }
        })

        function makeid(length) {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }
        $(document).on('click', '#edit', function() {
            let id = $(this).attr("id-edit");
            //alert(id)
            $('#editdate').modal()
            $.ajax({
                url: '../api/data_date',
                method: 'post',
                data: {
                    id: id
                },
                success: function(res) {
                    $('#data_date').html(res)
                }
            })
        })
        $('#edit_data').click(() => {
            let year = $("#year_edit").val()
            let semester = $("#semester_edit").val()
            let start_date = $("input[name=start_date_edit]").val()
            let end_date = $("input[name=end_date_edit]").val()
            let id = $("#id_date").val()
            let code_date = $("#code_date").val()
            $.ajax({
                url: "../api/edit_date",
                method: "post",
                data: {
                    year: year,
                    semester: semester,
                    start_date: start_date,
                    end_date: end_date,
                    id: id,
                    code_date: code_date
                },
                success: function(res) {
                    Swal.fire(res.message, '', 'success').then(function() {
                        window.location.reload()
                    });
                }
            })
        })
        $(document).on('click', '#delete', function() {
            let id = $(this).attr("id-del");
            Swal.fire({
                title: 'ต้องการลบหรือไม่ ?',
                showDenyButton: true,
                icon: 'info',
                confirmButtonText: `ลบ`,
                denyButtonText: `ยกเลิก`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: "../api/del_date",
                        method: 'post',
                        data: {
                            id: id
                        },
                        success: function(res) {
                            Swal.fire(res.message, '', 'success').then(function() {
                                window.location.reload()
                            });
                        },
                        error: function(request, status, error) {
                            var val = request.responseText;
                            alert("error" + val);
                        }
                    })
                } else if (result.isDenied) {}
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