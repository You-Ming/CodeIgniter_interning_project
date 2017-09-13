<script>
window.onload = function(){
    document.getElementById("txt_update_about").focus();
};
$(document).ready(function(){
    $('#txt_update_about').focus(function(){
        $('.about_error1').text('');
        $(this).css("border-color","#006cff");
    })

    var rule1 = /^[\u4e00-\u9fa5\w\-\']+(\s{1}[\u4e00-\u9fa5\w\-\']+)*$/;
    $("#txt_update_about").blur(function(){
        if($("#txt_update_about").val()==""){
            $('.about_error1').text('');
        }else if(rule1.test($(this).val())){
            $('.about_error1').text('');
        }else{
            $('.about_error1').text('格式錯誤，只能輸入英文、中文及符號" \' "、"-"、"_"');
            $(this).css("border-color","red");
        }
    })
});
</script>

            <div id='admin_about_update'>
              <h3>修改關於我們</h3>
              <?php echo validation_errors(); ?>
              <?php $attribute = array('id' => 'formUpdateAbout', 'class' => 'form-inline', 'role' => 'form'); ?>
              <?php echo form_open('',$attribute) ?>
                <label for="txt_update_about" class="control-label">標題:</label>
                <input type="text" name="txt_update_about" class="form-control" id="txt_update_about" value="<?php echo $admin_about['aboutTitle']?>"><span class="about_error1" style="color:red"></span><br><br>

                <textarea id="textarea_update_about" name="textarea_update_about"><?php echo $admin_about['aboutContent']?></textarea><br>
                <script>
                CKFinder.setupCKEditor();
                CKEDITOR.replace( 'textarea_update_about', {width:1000,});
                </script>

                <input type="button" class="btn btn-primary" id="btn_update_about" value="送出" data-id="<?php echo $admin_about['aboutTitle']?>">
                <input type="button" class="btn btn-primary" value="返回" onclick="window.location.href='/admin/about'">
              </form>
            </div>
