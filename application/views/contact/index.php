
<script>
    window.onload = function() {
        document.getElementById("guestName").focus();
    };
    $(document).ready(function(){
            $('#guestName').focus(function(){
                $('.error1').text('');
                $(this).css("border-color","#006cff")
            })
            $('#guestEmail').focus(function(){
                $('.error2').text('');
                $(this).css("border-color","#006cff")
            })

            $('#guestContent').focus(function(){
                $('.error3').text('');
                $(this).css("border-color","#006cff")
            })

        var rule1=/.{0,50}/;
        $("#guestName").blur(function(){
            if(rule1.test($(this).val())){
                $('.error1').text('')
            }else {
                $('.error1').text('格式錯誤')
                $(this).css("border-color","red")
            }
        })
        var rule2=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
        $("#guestEmail").blur(function(){
            if($("#guestEmail").val().indexOf(' ')>=0){
                $('.error2').text('請勿輸入空格')
                $(this).css("border-color","red")
            }else if(rule2.test($(this).val())){
                $('.error2').text('')
            }else{
                $('.error2').text('格式錯誤')
                $(this).css("border-color","red")
            }
        })

        var rule3=/.+/;
            $("#guestContent").blur(function(){
                if(rule3.test($(this).val())){
                    $('.error3').text('')
                }else{
                    $('.error3').text('格式錯誤')
                    $(this).css("border-color","red")
                }
            })
      })
      function sendMessage(){

        if($('.error1').text()=="" && $('.error2').text()=="" && $('.error3').text()==""){
            var guestName = $('#guestName').val();
            var guestEmail = $('#guestEmail').val();
            var guestTitle = $('#guestTitle').val();
            var guestContent = $('#guestContent').val();
            var response = grecaptcha.getResponse();

            if(guestEmail!="" && guestName!="" && guestContent!="" && guestTitle!="" && response!=""){
                if(confirm("您確定要留言嗎?")){
                    $.ajax({
                        url:"ajax/contact",
                        data:"&guestName="+guestName+"&guestEmail="+guestEmail+"&guestTitle="+guestTitle+"&guestContent="+guestContent+"&g-recaptcha-response="+response,
                        type:"POST",
                        datatype:'json',
                        error:function()
                        {
                            alert("失敗");
                        },
                        success:function(msg)
                        {
                            alert(msg);
                            $(location).attr("href","/");
                        }
                    });
                }
            }
            else if(response == ""){
                alert("請驗證不是機器人");
            }
            else{
                alert("請輸入姓名、信箱、主旨及內容");
            }
        }
        else{
            alert("格式錯誤,請重新輸入");

        }
    };

</script>


<div id="contact" class="container text_style">
    <h1 id="lb_contact">聯絡我們</h1>
    <div id = "contact_Box">
        <?php echo validation_errors(); ?>
        <?php $attribute = array('id' => 'contact_form', 'class' => 'form-horizontal', 'role' => 'form'); ?>
        <?php echo form_open('',$attribute) ?>
            <div class="form-group">
                <label for="guestName" class="col-sm-2 control-label">訪客姓名</label>
                <div class="col-sm-10">
                    <input type="text" name="guestName" id="guestName" class="form-control" placeholder="姓名"/><span class='error1'></span>
                </div>
            </div>

            <div class="form-group">
                <label for="guestEmail" class="col-sm-2 control-label">訪客信箱</label>
                <div class="col-sm-10">
                    <input type="text" name="guestEmail" id="guestEmail" class="form-control" placeholder="信箱"/><span class='error2'></span>
                </div>
            </div>

            <div class="form-group">
                <label for="guestTitle" class="col-sm-2 control-label">留言主旨</label>
                <div class="col-sm-10">
                    <input type="text" name="guestTitle" id="guestTitle" class="form-control" placeholder="主旨"/>
                </div>
            </div>

            <div class="form-group">
                <label for="guestContent" class="col-sm-2 control-label">留言內容</label>
                <div class="col-sm-10">
                    <textarea name="guestContent" id="guestContent" class="form-control" placeholder="內容" rows="15" cols="30"></textarea><span class='error3'></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <?php echo $recaptcha?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="button" class="btn btn-default" value="送出" id="btn_sendMessage" onCLick="sendMessage();"/><span class="errorMessage" id="postError"></span>
                  <input type="reset" class="btn btn-default" value="重新輸入">
                  <input type="button" class="btn btn-default" value="返回主頁" onclick="window.location.href='/'">
                </div>
            </div>
        </form>
    </div>
</div>
<!--end of contact form-->
