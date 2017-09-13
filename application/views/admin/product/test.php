
            <div id='admin_product_create'>
              <h3>新增產品測試</h3><br>
              <?php echo validation_errors(); ?>
              <?php $attribute = array('id' => 'formSetPproduct', 'class' => 'form-inline', 'role' => 'form', 'enctype' => 'multipart/form-data'); ?>
              <?php echo form_open_multipart('/admin/product/test2',$attribute) ?>
                <div class"form-group">
                  <div id="product_spec">
                    <label for="textarea_set_product_spec" class="control-label">產品規格:</label>
                    <button type="button" class="btn btn-default" id="btn_set_product_spec"><span class="glyphicon glyphicon-plus"></span></button><br><br>
                    <div id="sec_product_spec">
                      <input type="text" name="txt_product_spec_key[]" class="form-control" id="txt_product_spec_key" placeholder="請輸入規格名稱">
                      <input type="text" name="txt_product_spec_value[]" class="form-control" id="txt_product_spec_value" placeholder="請輸入規格">
                      <button type="button" class="btn btn-default" id="btn_remove_product_spec"><span class="glyphicon glyphicon-minus"></span></button>
                    </div>
                  </div>
                </div><br>

                <input type="submit" class="btn btn-primary btn-sm" id="btn_create_product" value="送出">
              </form>
            </div>
