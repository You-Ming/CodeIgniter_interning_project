            <div id='admin_banner_create'>
              <h3>新增橫幅</h3>
              <?php echo $error;?>
              <?php echo form_open_multipart('/admin/home/create_banner/do_upload');?>
                <input type="file" name="userfile" size="20"><br><br>

                <input type="submit" class="btn btn-primary btn-sm" value="上傳">
                <input type="button" class="btn btn-primary btn-sm" value="返回" onclick="window.location.href='/admin/home'">
              </form>
            </div>
