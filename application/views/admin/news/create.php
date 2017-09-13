            <div id='admin_news_create'>
              <h3>新增新聞</h3>
              <?php echo validation_errors(); ?>
              <?php $attribute = array('id' => 'formSetNews', 'class' => 'form-inline', 'role' => 'form'); ?>
              <?php echo form_open('',$attribute) ?>

                <div class="form-group">
                  <label for="txt_news_title" class="control-label">標題:</label>
                  <input type="text" name="txt_news_title" class="form-control" id="txt_news_title" placeholder="請輸入標題"><br><br>
                </div>

                <div class="foum-group">
                  <label for="time_news" class="control-label">時間:</label>
                  <div class='input-group' id='datetimepicker_set_news'>
                    <input type="text" name="time_news" class="form-control" id="time_news">
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
                </div>

                <br>

                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker_set_news').datetimepicker({
                            locale: 'zh-tw',
                            format: 'YYYY-MM-DD HH:mm:ss'
                        });
                    });
                </script>


                <textarea id="textarea_set_news" name="textarea_set_news"></textarea><br>
                <script>
                  CKFinder.setupCKEditor();
                  CKEDITOR.replace( 'textarea_set_news', {
                    width:1000,
                    /*filebrowserBrowseUrl: '/asset/ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl: '/asset/ckfinder/ckfinder.html?type=Images',
                    filebrowserUploadUrl:'/asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl:'/asset/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&currentFolder=/product/'
                    */
                  });
                </script>

                <input type="button" class="btn btn-primary btn-sm" id="btn_create_news" value="送出">
                <input type="button" class="btn btn-primary btn-sm" value="返回" onclick="window.location.href='/admin/news'">
              </form>
            </div>
