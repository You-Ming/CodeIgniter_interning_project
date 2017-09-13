<script>
window.onload = function(){
    document.getElementById("txt_banner_name_update").focus();
};
$(document).ready(function(){
    $('#txt_banner_name_update').focus(function(){
        $('.banner_error1').text('');
        $(this).css("border-color","#006cff");
    })
    $('#txt_banner_title_update').focus(function(){
        $('.banner_error2').text('');
        $(this).css("border-color","#006cff");
    })

    var rule1 = /^[\u4e00-\u9fa5\w\-\']+(\s{1}[\u4e00-\u9fa5\w\-\']+)*$/;
    $("#txt_banner_name_update").blur(function(){
        if($("#txt_banner_name_update").val()==""){
            $('.banner_error1').text('');
        }else if(rule1.test($(this).val())){
            $('.banner_error1').text('');
        }else{
            $('.banner_error1').text('格式錯誤，只能輸入英文、中文及符號" \' "、"-"、"_"');
            $(this).css("border-color","red");
        }
    })

});
</script>

            <div id='admin_banner_update'>
              <h3>修改橫幅</h3><br>
              <img src="/uploads/images/banner/<?php echo $admin_banner['bannerImgName']?>"><br><br>
              <button class="btn btn-primary btn-sm" id="btn_update_product_img" onclick="window.location.href='/admin/home/update_image/<?php echo $admin_banner['bannerID']?>'">更新橫幅圖片</button><br><br>
              <?php echo validation_errors(); ?>
              <?php $attribute = array('id' => 'formUpdateBanner', 'class' => 'form-inline', 'role' => 'form'); ?>
              <?php echo form_open('',$attribute) ?>

                <div class="form-group">
                  <label for="txt_banner_img_name" class="control-label">圖片名稱:</label>
                  <input type="text" class="form-control" id="txt_banner_img_name" value="<?php echo $admin_banner['bannerImgName']?>" readonly>
                </div><br><br>

                <div class="form-group">
                  <label for="txt_banner_name_update" class="control-label">橫幅名稱:</label>
                  <input type="text" name="txt_banner_name_update" class="form-control" id="txt_banner_name_update" placeholder="請輸入橫幅名稱"value="<?php echo $admin_banner['bannerName']?>"><span class="banner_error1" style="color:red"></span><br>
                </div><br><br>

                <div class="form-group">
                  <label for="txt_banner_title_update" class="control-label">橫幅標題:</label>
                  <input type="text" name="txt_banner_title_update" class="form-control" id="txt_banner_title_update" placeholder="請輸入橫幅標題" value="<?php echo $admin_banner['bannerTitle']?>"><br>
                </div><br><br>

                <input type="button" class="btn btn-primary btn-sm" id="btn_update_banner" value="送出" data-id="<?php echo $admin_banner['bannerID']?>" data-name="<?php echo $admin_banner['bannerName']?>">
                <input type="button" class="btn btn-primary btn-sm" value="返回" onclick="window.location.href='/admin/home'">
              </form>
            </div>
