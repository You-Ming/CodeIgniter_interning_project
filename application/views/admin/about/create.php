<script>
window.onload = function(){
    document.getElementById("txt_about_tile").focus();
};
$(document).ready(function(){
    $('#txt_about_tile').focus(function(){
        $('.about_error1').text('');
        $(this).css("border-color","#006cff");
    })

    var rule1 = /^[\u4e00-\u9fa5\w\-\']+(\s{1}[\u4e00-\u9fa5\w\-\']+)*$/;
    $("#txt_about_tile").blur(function(){
        if($("#txt_about_tile").val()==""){
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

            <div id='admin_about_create'>
              <h3>新增關於我們</h3>
              <?php echo validation_errors(); ?>
              <?php $attribute = array('id' => 'formSetAbout', 'class' => 'form-inline', 'role' => 'form'); ?>
              <?php echo form_open('',$attribute) ?>
                <label for="txt_about_title" class="control-label">標題:</label>
                <input type="text" name="txt_about_title" class="form-control" id="txt_about_tile" placeholder="請輸入標題"><span class="about_error1" style="color:red"></span><br><br>

                <textarea id="textarea_set_about" name="textarea_set_about"></textarea><br>
                <script>
                CKFinder.setupCKEditor();
                CKEDITOR.replace( 'textarea_set_about', {width:1000,});
                </script>

                <input type="button" class="btn btn-primary btn-sm" id="btn_create_about" value="送出">
                <input type="button" class="btn btn-primary btn-sm" value="返回" onclick="window.location.href='/admin/about'">
              </form>
            </div>
