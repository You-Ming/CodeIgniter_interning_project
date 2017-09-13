            <div id='admin_news_update'>
              <h3>修改新聞</h3>
              <?php echo validation_errors();?>
              <?php $attribute = array('id' => 'formUpdateNews', 'class' => 'form-inline', 'role' => 'form');?>
              <?php echo form_open('',$attribute)?>

                <div class="form-group">
                  <label for="txt_update_news" class="control-label">標題:</label>
                  <input type="text" name="txt_update_news" class="form-control" id="txt_update_news" value="<?php echo $admin_news['newsTitle']?>"><br><br>
                </div>

                <div class="foum-group">
                  <label for="time_news_update" class="control-label">時間:</label>
                  <div class='input-group' id='datetimepicker_update_news'>
                    <input type="text" name="time_news_update" class="form-control" id="time_mews_update" value="<?php echo $admin_news['newsTime']?>">
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
                </div>

                <br>

                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker_update_news').datetimepicker({
                            locale: 'zh-tw',
                            format: 'YYYY-MM-DD HH:mm:ss'
                        });
                    });
                </script>

                <textarea id="textarea_update_news" name="textarea_update_news"><?php echo $admin_news['newsContent']?></textarea><br>
                <script>
                  CKFinder.setupCKEditor();
                  CKEDITOR.replace( 'textarea_update_news', {width:1000});
                </script>

                <input type="button" class="btn btn-primary btn-sm" id="btn_update_news" data-id="<?php echo $admin_news['newsID']?>" value="送出">
                <input type="button" class="btn btn-primary btn-sm" id="btn_back_admin_news" value="返回" onclick="window.location.href='/admin/news'">

              </form>
            </div>
