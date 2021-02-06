<form>
    <div class="row jumbotron">
        <input type="hidden" id="id_member" value="<?=$data['id']?>">
        <div class="col-sm-6 form-group">
            <label for="name">ชื่อ-สกุล</label>
            <input type="text" class="form-control" id='name_edit' value="<?=$data['name']?>" maxlength="15">
        </div>
        <div class="col-sm-6 form-group">
            <label for="officialposition">ตำแหน่งราชการ</label>
            <select id="officialposition_edit" class="form-control"> <?php
                              foreach ($officialposition as  $value) {
                                if($data['officialposition'] == $value['id']){
                                    $check = "selected";
                               
                                }else{
                                  $check = "";
                                }
                              ?> <option <?= $check?> value="<?= $value['id'] ?>"> <?= $value['name'] ?></option> <?php
                              }
                              ?> </select>
        </div>
        <div class="col-sm-6 form-group">
            <label for="managementposition">ตำแหน่งบริหาร</label>
            <select id="managementposition_edit" class="form-control"> <?php
                              //echo $data['managementposition'];
                              foreach ($managementposition as  $value) {
                                  if($data['managementposition'] == $value['id']){
                                      $check = "selected";
                                 
                                  }else{
                                    $check = "";
                                  }
                              ?> <option <?= $check?> value="<?= $value['id'] ?>"> <?= $value['name'] ?></option> <?php
                              }
                              ?> </select>
        </div>
        <div class="col-sm-6 form-group">
            <label for="affiliated_agencies">หน่วยงานที่สังกัด</label>
            <select id="affiliated_agencies_edit" class="form-control"> <?php
                                  foreach ($affiliated_agencies as  $value) {
                                    if($data['affiliated_agencies'] == $value['id']){
                                        $check = "selected";
                                   
                                    }else{
                                      $check = "";
                                    }
                                  ?> <option <?= $check?> value="<?= $value['id'] ?>"> <?= $value['name'] ?></option> <?php
                                  }
                                  ?> </select>
        </div>
        <div class="col-sm-6 form-group">
            <label for="personneltype">ประเภทบุคลากร</label>
            <select id="personneltype_edit" class="form-control"> <?php
                                  foreach ($personneltype as  $value) {
                                    if($data['personneltype'] == $value['id']){
                                        $check = "selected";
                                   
                                    }else{
                                      $check = "";
                                    }
                                  ?> <option <?= $check?> value="<?= $value['id'] ?>"> <?= $value['name'] ?></option> <?php
                                  }
                                  ?> </select>
        </div>
        <div class="col-sm-6 form-group">
        </div>
        <div class="col-sm-6 form-group">
            <label for="username">ชื่อผู้ใช้งาน</label>
            <input type="text" class="form-control" id='username' value="<?=$data['username']?>" maxlength="15" disabled>
        </div>
        <div class="col-sm-6 form-group">
            <label for="email">อีเมลล์</label>
            <input type="email" class="form-control" id='email' value="<?=$data['email']?>" maxlength="50" disabled>
        </div>
        <div class="col-sm-6 form-group">
            <label for="password">รหัสผ่าน</label>
            <input type="password" class="form-control" id='password_edit' maxlength="20" value="<?=$data['password']?>">
        </div>
    </div>
</form>