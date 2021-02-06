<!--Navbar -->
<nav class="fixed-top navbar navbar-expand-lg navbar-dark" style="background:#1e88e5 !important;border-bottom: solid #ffffff;">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('home')?>">หน้าแรก <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('results')?>">ผลการประเมิน</a>
            </li> <?php
                    $user_session = $this->session->userdata('user');
                    $permission = $this->user_model->UserData($user_session);
                    if ($permission['status'] == 1) {
                    ?> <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#rete_president">ทำแบบประเมิน</a>
                </li> <?php
                    }
                        ?>
        </ul>

        <ul class="navbar-nav ml-auto nav-flex-icons">
            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle waves-effect waves-light" id="DropdownMenuUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><img alt="jkjknm123" src="https://icons-for-free.com/iconfiles/png/512/business+costume+male+man+office+user+icon-1320196264882354682.png" class="rounded-circle z-depth-0" height="25px" width="25px">&nbsp; <?=$this->session->userdata('user');?></a>
                <div class="dropdown-menu dropdown-menu-lg-left dropdown-primary" aria-labelledby="DropdownMenuUser"><a class="dropdown-item waves-effect waves-light" href="<?=base_url('profile')?>"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</a><a class="dropdown-item waves-effect waves-light" id="logout"><i class="fa fa-power-off"></i> ออกจากระบบ</a></div>
            </li>
        </ul>
    </div>
</nav>

<!--/.Navbar -->