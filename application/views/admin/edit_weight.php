<form>

    <div class="row jumbotron justify-content-center">
        <input type="hidden" id="id_member" value="<?=$data['id']?>">
        <div class="col-sm-6 form-group">
            <input type="hidden" id="id" value="<?=$data['id']?>">
            <label for="name">ค่าน้ำหนัก</label>
            <input type="text" class="form-control" id='weight' value="<?=$data['weight_value']?>" maxlength="15">
        </div>
        
</form>