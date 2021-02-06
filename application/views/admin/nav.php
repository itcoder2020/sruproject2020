<?php $check = $this->uri->segment(2);?>
         <!-- Sidebar Holder -->
         <nav id="sidebar">
            <div class="sidebar-header">
               <h3><i class="fa fa-tasks" aria-hidden="true"></i>
 เมนูจัดการ</h3>
            </div>

                
            <ul class="list-unstyled components">
               
              <!-- <li  <?=$check =='main'? 'class="active"' : ''?>>
                  <a href="main"><i class="fa fa-home" aria-hidden="true"></i>
 หน้าแรก</a>
               </li>-->
               <li  <?=$check =='manage_date'? 'class="active"' : ''?>>
                  <a href="manage_date"> <i class="fa fa-calendar-alt"></i> จัดการวัน เปิด-ปิด ประเมิน</a>
                  
               </li>
               <li  <?=$check =='manage_member'? 'class="active"' : ''?>>
                  <a href="manage_member"> <i class="fa fa-user" aria-hidden="true"></i> จัดการสมาชิก</a>
               </li>
               <li  <?=$check =='manage_rate'? 'class="active"' : ''?>>
                  <a href="manage_rate"> <i class="fa fa-database" aria-hidden="true"></i>
 ข้อมูลการประเมิน</a>
               </li>
               <li  <?=$check =='setting_rate'? 'class="active"' : ''?>>
                  <a href="setting_rate"><i class="fas fa-cog"></i> ตั้งค่าการประเมิน</a>
               </li>
               <li  <?=$check =='change_password'? 'class="active"' : ''?>>
                  <a href="change_password"><i class="fa fa-key" aria-hidden="true"></i>
 เปลี่ยนรหัสผ่าน</a>
               </li>
            </ul>
            <div class="text-center">
            เข้าใช้งานล่าสุด
            <br>
            <?php
            $user_session = $this->session->userdata('admin');
            $user = $this->admin_model->profile($user_session);
            echo  $user['last_login'];
            ?>
            </div>
            <ul class="list-unstyled CTAs">
               <li>
                  <a id="admin_logout"   href="#" class="download">ออกจากระบบ</a>
               </li>
               <li>
                  <a href="https://www.facebook.com/ITCoder2020" target="_blank" class="article">ติดต่อคนเขียนระบบ</a>
               </li>
            </ul>
         </nav>
         <!-- Page Content Holder -->
         <script src="<?=base_url()?>/asset/js/toastr.min.js"></script>
         <script src="<?=base_url()?>/asset_admin/js/script.js"></script>
         
         

    