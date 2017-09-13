<script>
window.onload = function(){
    document.getElementById("txt_product_name_update").focus();
};
$(document).ready(function(){
    $('#txt_product_name_update').focus(function(){
        $('.product_error1').text('');
        $(this).css("border-color","#006cff");
    })

    var rule1 = /^[\u4e00-\u9fa5\w\-\']+(\s{1}[\u4e00-\u9fa5\w\-\']+)*$/;
    $("#txt_product_name_update").blur(function(){
        if($("#txt_product_name_update").val()==""){
            $('.product_error1').text('');
        }else if(rule1.test($(this).val())){
            $('.product_error1').text('');
        }else{
            $('.product_error1').text('格式錯誤，只能輸入英文、中文及符號" \' "、"-"、"_"');
            $(this).css("border-color","red");
        }
    })
});
</script>

            <div id='admin_product_update'>
              <h3>修改產品</h3><br>
              <img src="/uploads/images/product/<?php echo $admin_product['productImgName']?>"><br><br>
              <button class="btn btn-primary btn-sm" id="btn_update_product_img" onclick="window.location.href='/admin/product/update_image/<?php echo $admin_product['productName']?>'">更新產品圖片</button><br><br>
              <?php echo validation_errors(); ?>
              <?php $attribute = array('id' => 'formUpdatePproduct', 'class' => 'form-inline', 'role' => 'form'); ?>
              <?php echo form_open('',$attribute) ?>

                <div class="form-group">
                  <label for="txt_product_img_name_update" class="control-label">圖片名稱:</label>
                  <input type="text" class="form-control" id="txt_product_img_name_update" value="<?php echo $admin_product['productImgName']?>" readonly>
                </div><br><br>

                <div class="form-group">
                  <label for="txt_product_name_update" class="control-label">產品名稱:</label>
                  <input type="text" name="txt_product_name_update" class="form-control" id="txt_product_name_update" value="<?php echo $admin_product['productName']?>" placeholder="請輸入產品名稱"><span class="product_error1" style="color:red"></span><br>
                </div><br><br>

                <div class="form-group">
                  <label for="sel_product_type_update" class="control-label">產品分類:</label>
                  <select class="selectpicker" id="sel_product_type_update">
<?php foreach ($admin_type as $type):?>
                    <option <?php echo $admin_product['productType'] == $type['typeName'] ? 'selected' : ''?>><?php echo $type['typeName']?></option>
<?php endforeach?>
                  </select>
                </div><br><br>

                <div class"form-group">
                  <div id="product_spec_update">
                    <label for="product_spec_update" class="control-label">產品規格:</label>
                    <button type="button" class="btn btn-default" id="btn_add_product_spec"><span class="glyphicon glyphicon-plus"></span></button><br><br>
<?php foreach ($admin_product_spec as $key => $value): ?>
                    <div id="sec_product_spec_update">
                      <input type="text" name="txt_product_spec_key_update" class="form-control" id="txt_product_spec_key_update" placeholder="請輸入規格名稱" value="<?php echo $key?>">
                      <input type="text" name="txt_product_spec_value_update" class="form-control" id="txt_product_spec_value_update" placeholder="請輸入規格" value="<?php echo $value?>">
                      <button type="button" class="btn btn-default" id="btn_del_product_spec"><span class="glyphicon glyphicon-minus"></span></button>
                    </div>
<?php endforeach?>
                  </div>
                </div><br>

                <div class"form-group">
                  <label for="textarea_update_product_desc" class="control-label">產品描述:</label>
                  <textarea id="textarea_update_product_desc" name="textarea_update_product_desc"><?php echo $admin_product['productDescription']?></textarea><br>
                </div>

                <script>
                  CKFinder.setupCKEditor();
                  CKEDITOR.replace( 'textarea_update_product_desc', {
                    width:1000,
                  });
                </script>

                <input type="button" class="btn btn-primary btn-sm" id="btn_update_product" value="送出" data-id="<?php echo $admin_product['productID']?>" data-name="<?php echo $admin_product['productName']?>">
                <input type="button" class="btn btn-primary btn-sm" value="返回" onclick="window.location.href='/admin/product'">

              </form>
            </div>
