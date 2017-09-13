<script>
$(function(){
  $("#txt_search_news").keypress(function(){
    var key = event.keyCode;
    if(key == 13){
      //event.preventDefault();
      $("#btn_search_news").click();
    }
  })
});

</script>

            <div id='admin_news'>
              <h3>新聞管理</h3>
              <div class="form-group">
                <div class="input-group search-group">
                  <input type="text" class="form-control input-search" id="txt_search_news" placeholder="請輸入關鍵字">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-default image-preview-input" id="btn_search_news">
                      <span class="glyphicon glyphicon-search"></span>
                    </button>
                  </span>
                </div>
              </div><br>
              <h4>查詢不到有關 「<?php echo $notfound?>」的結果</h4>
            
              <button type="button" class="btn btn-primary" onclick="window.location.href='/admin/news/'">返回新聞列表</button>
            </div>
