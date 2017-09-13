            <div id="admin_product_img_update">
              <h3>更新產品圖片</h3><br>
              <?php echo $error;?>
              <?php echo form_open_multipart('/admin/product/do_upload');?>
                <input type="file" name="file_productImg" size="20"><br><br>

                <input type="submit" class="btn btn-primary btn-sm" value="上傳">
                <input type="button" class="btn btn-primary btn-sm" value="返回" onclick="window.location.href='/admin/product'">
              </form>
            </div>
