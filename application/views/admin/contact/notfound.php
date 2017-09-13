<script>
$(function(){
  $("#txt_search_contact").keypress(function(){
    var key = event.keyCode;
    if(key == 13){
      $("#btn_search_contact").click();
    }
  })
});

</script>

            <div id='admin_contact'>
              <h3>聯絡我們管理</h3>
              <div class="form-group">
                <div class="input-group search-group">
                  <input type="text" class="form-control input-search" id="txt_search_contact" placeholder="請輸入關鍵字">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-default image-preview-input" id="btn_search_contact">
                      <span class="glyphicon glyphicon-search"></span>
                    </button>
                  </span>
                </div>
              </div><br>
              <h4>查詢不到有關 「<?php echo $notfound?>」 的結果</h4><br>

              <button type="button" class="btn btn-primary" onclick="window.location.href='/admin/contact'">返回留言列表</button>
            </div>
