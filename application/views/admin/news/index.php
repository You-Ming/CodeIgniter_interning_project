<script>
function Submit(){
  var key = event.keyCode;
  if(key == 13){
    //event.preventDefault();
    $("#btn_search_news").click();
  }
};

</script>
            <div id='admin_news'>
              <h3>新聞管理</h3>
              <?php echo validation_errors(); ?>
              <?php $attribute = array('role' => 'form','onkeypress' => 'Submit()','onSubmit' => 'return false;'); ?>
              <?php echo form_open('',$attribute) ?>
                <div class="form-group">
                  <div class="input-group search-group">
                    <input type="text" class="form-control input-search" id="txt_search_news" placeholder="請輸入關鍵字">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default image-preview-input" id="btn_search_news"">
                        <span class="glyphicon glyphicon-search"></span>
                      </button>
                    </span>
                  </div>
                </div>
              </form><br>
              <table id='tb_admin_news' class="table table-bordered">
                <tr>
                  <th width="44%">標題</th>
                  <th width="36%">時間</th>
                  <th width="20%">修改/刪除</th>
                </tr>
<?php foreach ($admin_news as $news): ?>
                <tr>
                  <td><?php echo $news['newsTitle']?></td>
                  <td><?php echo $news['newsTime']?></td>
                  <td>
                    <button type="button" class="btn btn-info btn-sm" onclick="window.location.href='/admin/news/update/<?php echo $news['newsID']?>'"><span class="glyphicon glyphicon-pencil"></span> <span class="btn_admin">修改</span></button>
                    <button class="btn btn-danger btn-sm" data-toggle="confirmation_news" data-title="確定要刪除嗎?" data-id="<?php echo $news['newsID']?>" data-singleton="true">
                    <span class="glyphicon glyphicon-remove"></span> <span class="btn_admin">刪除</span>
                    </button>
                  </td>
                </tr>
<?php endforeach ?>
              </table>
              <div class="admin_page_link" align="center">
                <ul class="pagination">
                  <?php echo $link ?>
                </ul>
              </div>
              <button type="button" class="btn btn-primary" id="btn_creat_news" onclick="window.location.href='/admin/news/create'">新增</button>
            </div>
