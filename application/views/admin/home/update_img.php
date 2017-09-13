            <div id="admin_banner_img_update">
              <h3>更新產品圖片</h3><br>
              <img src="/uploads/images/banner/<?php echo $admin_banner['bannerImgName']?>"><br><br>
              <?php echo $error;?>
              <?php $attribute = array('id' => 'formUpdateBannerImg', 'class' => 'form-inline', 'role' => 'form'); ?>
              <?php echo form_open_multipart('/admin/admin/update_upload/'.$admin_banner['bannerID'],$attribute);?>

                <div class="form-group">
                  <div class="input-group image-preview">
                    <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                    <span class="input-group-btn">
                        <!-- image-preview-clear button -->
                      <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> 清除
                      </button>
                        <!-- image-preview-input -->
                      <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">選擇圖片</span>
                        <input type="file" name="file_bannerImg_update"/> <!-- rename it -->
                      </div>
                    </span>
                  </div>
                </div><br><br>

                <img src="" alt="Banner Image Preview..." class="image_preview" style="display:none"><br><br>

                <input type="submit" class="btn btn-primary btn-sm" value="上傳">
                <input type="button" class="btn btn-primary btn-sm" value="返回" onclick="window.location.href='/admin/home/update_banner/<?php echo $admin_banner['bannerID']?>'">
              </form>
            </div>
