<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>จัดการสมาชิก</title>
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
                    <h4>จัดการสมาชิก</h4>
                </div>
                <div class="card-body jumbotron">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addmember"><i class="fa fa-user-plus" aria-hidden="true"></i> เพิ่มสมาชิก</button>
                    <div class="row py-5">
                        <div class="col-12">
                            <table id="tbmember" class="table table-hover responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ชื่อ</th>
                                        <th>ตำแหน่งราชการ</th>
                                        <th>ตำแหน่งบริหาร</th>
                                        <th>หน่วยงานที่สังกัด</th>
                                        <th>ประเภทบุคลากร</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody> <?php
                                    foreach ($user as $row) {
                                    ?> <tr>
                                        <td>
                                            <a href="#">
                                                <div class="d-flex align-items-center">
                                                    <!-- <div class="avatar avatar-blue mr-3"</div> -->
                                                    <div class="">
                                                        <p class="font-weight-bold mb-0"><?= $row['name'] ?></p>
                                                        <p class="text-muted mb-0"><?= $row['username'] ?></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td><?php
                                                foreach ($officialposition as  $value) {
                                                    if ($value['id'] == $row['officialposition']) {
                                                        echo $value['name'];
                                                        break;
                                                    }
                                                }
                                                ?></td>
                                        <td><?php
                                                foreach ($managementposition as  $value) {
                                                    if ($value['id'] == $row['managementposition']) {
                                                        echo $value['name'];
                                                        break;
                                                    }
                                                }
                                                ?></td>
                                        <td><?php
                                                foreach ($affiliated_agencies as  $value) {
                                                    if ($value['id'] == $row['affiliated_agencies']) {
                                                        echo $value['name'];
                                                        break;
                                                    }
                                                }
                                                ?></td>
                                        <td> <?php
                                                foreach ($personneltype as  $value) {
                                                    if ($value['id'] == $row['personneltype']) {
                                                        echo $value['name'];
                                                        break;
                                                    }
                                                }
                                                ?> </td>
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
    <!-- Modal Regis-->
    <div class="modal fade bd-example-modal-lg" id="addmember" tabindex="-1" role="dialog" aria-labelledby=addmemberModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addmemberModalLongTitle"><i class="fa fa-user-plus" aria-hidden="true"></i> เพิ่มสมาชิก</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row jumbotron">
                            <div class="col-sm-6 form-group">
                                <label for="name">ชื่อ-สกุล</label>
                                <input type="text" class="form-control" id="name" autofocus>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="officialposition">ตำแหน่งราชการ</label>
                                <select id="officialposition" class="form-control"> <?php
                                    foreach ($officialposition as  $value) {
                                    ?> <option value="<?= $value['id'] ?>"> <?= $value['name'] ?></option> <?php
                                    }
                                    ?> </select>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="managementposition">ตำแหน่งบริหาร</label>
                                <select id="managementposition" class="form-control"> <?php
                                    foreach ($managementposition as  $value) {
                                    ?> <option value="<?= $value['id'] ?>"> <?= $value['name'] ?></option> <?php
                                    }
                                    ?> </select>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="affiliated_agencies">หน่วยงานที่สังกัด</label>
                                <select id="affiliated_agencies" class="form-control"> <?php
                                    foreach ($affiliated_agencies as  $value) {
                                    ?> <option value="<?= $value['id'] ?>"> <?= $value['name'] ?></option> <?php
                                    }
                                    ?> </select>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="personneltype">ประเภทบุคลากร</label>
                                <select id="personneltype" class="form-control"> <?php
                                    foreach ($personneltype as  $value) {
                                    ?> <option value="<?= $value['id'] ?>"> <?= $value['name'] ?></option> <?php
                                    }
                                    ?> </select>
                            </div>
                            <div class="col-sm-6 form-group">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="username">ชื่อผู้ใช้งาน</label>
                                <input type="text" class="form-control" id='username' maxlength="15">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="email">อีเมลล์</label>
                                <input type="email" class="form-control" id='email' maxlength="50">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="password">รหัสผ่าน</label>
                                <input type="password" class="form-control" id='password' maxlength="20">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="con_password">ยืนยันรหัสผ่าน</label>
                                <input type="password" class="form-control" id='con_password' maxlength="20">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id='Register'><i class="fas fa-save"></i> ยืนยัน</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal  Edit-->
    <div class="modal fade bd-example-modal-lg" id="editmember" tabindex="-1" role="dialog" aria-labelledby="editmemberModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editmemberModalLongTitle"><i class="fas fa-user-edit"></i> แก้ไขข้อมูล</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="data_member">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id='edit_data'><i class="fas fa-save"></i> ยืนยัน</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
        $(document).ready(function() {
            $("#tbmember").DataTable({
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
        $(document).on('click', '#edit', function() {
            let id = $(this).attr("id-edit");
            $('#editmember').modal()
            $.ajax({
                url: '../api/data_member',
                method: 'post',
                data: {
                    id: id
                },
                success: function(res) {
                    $('#data_member').html(res)
                }
            })
        })
        $('#edit_data').click(() => {
            let status = 0
            let affiliated_agencies = $('select[id=affiliated_agencies_edit]').find('option:selected').val();
            let personneltype = $('select[id=personneltype_edit]').find('option:selected').val();
            let officialposition = $('select[id=officialposition_edit]').find('option:selected').val();
            //alert(personneltype)
            let managementposition = $('select[id=managementposition_edit]').find('option:selected').val();
            if (officialposition == 1 && managementposition == 4) {
                status = 1
            }
            if (officialposition == 1) {
                status = 0
            }
            if (managementposition == 4) {
                status = 1
            }
            if (managementposition == 1) {
                status = 2
            }
            let name = $('#name_edit').val();
            let password = $('#password_edit').val();
            let id_member = $('#id_member').val();
            //alert(id_member)
            $.ajax({
                url: "../api/edit_member",
                method: "post",
                data: {
                    affiliated_agencies: affiliated_agencies,
                    status: status,
                    personneltype: personneltype,
                    officialposition: officialposition,
                    managementposition: managementposition,
                    name: name,
                    password: password,
                    id: id_member
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
                        url: "../api/del_user",
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