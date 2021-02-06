<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>แบบภาระงาน</title>
</head>

<body>

    <div class="caontainer">
        <table class="table table-striped" border="1">
            <thead class="table-dark">
                <tr>
                    <td class="text-center">ประเภทภาระงาน</td>
                    <td class="text-center">หน่วยชั่วโมง/สัปดาห์</td>
                    <td class="text-center">ชื่อวิชา/หัวข้อวิจัย/โครงการ/งาน</td>
                    <td class="text-center">จำนวนคาบปฏิบัติ</td>
                    <td class="text-center">จำนวนคาบบรรยาย</td>
                    <td class="text-center">คิดเป็นหน่วยชั่วโมง/สัปดาห์</td>
                </tr>
            </thead>
            <tbody>
<tr>
    <td>
        1.ภาระงานสอน
    </td>
    <td></td>
    <td>
        <textarea class="form-control" cols="30" rows="10"></textarea>
    </td>
    <td>
    <textarea class="form-control" cols="30" rows="10"></textarea>
    </td>
    <td>
    <textarea class="form-control" cols="30" rows="10"></textarea>
    </td>
    <td>
    <textarea class="form-control" cols="30" rows="10"></textarea>
    </td>
</tr>
<tr></tr>
<tr>
    <td colspan="4" class="text-right">
        รวมภาระงานสอน(หน่วยชั่วโมง/สัปดาห์) =
    </td>
    <td></td>
    <td></td>
</tr>
<tr></tr>
<tr>

    <td>
        1.ภาระงานอื่นๆ
    </td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            //$('#tb_p').DataTable();
            //$('#tb_t').DataTable();
        });
    </script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="asset/js/steppers.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/modules/file-input.min.js"></script>
    <script src="asset/js/toastr.min.js"></script>
    <script type="text/javascript" src="asset/js/mdb.min.js"></script>
    <script src="asset/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
</body>

</html>