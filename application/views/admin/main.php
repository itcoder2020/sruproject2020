<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>จัดการ</title>
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
   <div class="wrapper">
      <?php $this->load->view('admin/nav') ?>
      <div id="content">
         <?php $this->load->view('admin/nav2') ?>
         <div class="card">
            <div class="card-body">

            </div>
         </div>
      </div>
   </div>

   <!-- Popper.JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
   <!-- Bootstrap JS -->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
   <script type="text/javascript">
      $(document).ready(function() {
         $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
         });
      });
   </script>
    <script src="<?= base_url('asset_admin/js/script.js') ?>"></script>
    <script src="<?= base_url('asset_admin/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('asset_admin/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('asset_admin/js/pace.min.js') ?>"></script>

</body>

</html>