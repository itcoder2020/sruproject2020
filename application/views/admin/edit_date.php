<form>
    <div class="row jumbotron">
        <input type="hidden" id="id_date" value="<?= $data['id'] ?>">
        <input type="hidden" id="code_date" value="<?= $data['code_date'] ?>">
        <div class="col-sm-6 form-group">
            <label for="name">วันเปิด</label>
            <input type="text" class="form-control" name="start_date_edit" id="datetimepicker_mask_open_edit">
        </div>
        <div class="col-sm-6 form-group">
            <label for="officialposition">วันปิด</label>
            <input type="text" class="form-control" name="end_date_edit" id="datetimepicker_mask_close_edit">
        </div>
        <div class="col-sm-6 form-group">
            <label for="managementposition">ปีการศึกษา</label>
            <input type="number" class="form-control" id='year_edit' value="<?=$data['year']?>" maxlength="15">
        </div>
        <div class="col-sm-6 form-group">
            <label for="managementposition">ภาคเรียน</label>
            <input type="number" class="form-control" id='semester_edit' value="<?=$data['semester']?>" maxlength="15">
        </div>
    </div>
</form>
<script src="<?= base_url('asset_admin/js/datetime.js') ?>"></script>