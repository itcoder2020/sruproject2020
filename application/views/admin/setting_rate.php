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
                    <h4>ตั้งค่าน้ำหนัก</h4>
                </div>
                <div class="card-body jumbotron">
                    <div class="row py-5">
                        <div class="col-12">
                            <table id="tbdate" class="table table-hover responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ชื่อหัวข้อ</th>
                                        <th>ค่าน้ำหนัก</th>
                                        <th>จัดการ</th>
                                </thead>
                                <tbody> <?php
                                    foreach ($data as $row) {
                                    ?> <tr>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['weight_value'] ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bx bx-cog" data-toggle="tooltip" data-placement="top" title="จัดการ"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                    <a class="dropdown-item" id='edit' id-edit='<?= $row['id'] ?>'><i class="fas fa-user-edit"></i> แก้ไข</a>
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
    <div class="modal fade bd-example-modal-lg" id="editweight" tabindex="-1" role="dialog" aria-labelledby="editweightModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editweightModalLongTitle"><i class="fas fa-user-edit"></i> แก้ไขข้อมูล</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="data_weight">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id='edit_weight'><i class="fas fa-save"></i> ยืนยัน</button>
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
        $(document).on('click', '#edit', function() {
            let id = $(this).attr("id-edit");
           // alert(id)
            $('#editweight').modal()
            $.ajax({
                url: '../api/data_weight',
                method: 'post',
                data: {
                    id: id
                },
                success: function(res) {
                    $('#data_weight').html(res)
                }
            })
        })
        $('#edit_weight').click(() => {
            let weight = $("#weight").val()
            let id = $("#id").val()
            $.ajax({
                url: "../api/edit_weight",
                method: "post",
                data: {
                    id: id,
                    weight: weight,
                },
                success: function(res) {
                    Swal.fire(res.message, '', 'success').then(function() {
                        window.location.reload()
                    });
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