

            <div id='admin_about'>
              <h3>關於我們管理</h3>
              <table id='tb_admin_about' class="table table-bordered">
                <tr>
                  <th width="50%">標題</th>
                  <th width="25%">修改</th>
                  <th width="25%">刪除</th>
                </tr>
<?php foreach ($admin_about as $about): ?>
                <tr>
                  <td><?php echo $about['aboutTitle']?></td>
                  <td><button type="button" class="btn btn-info btn-sm" onclick="window.location.href='/admin/about/update/<?php echo $about['aboutTitle']?>'"><span class="glyphicon glyphicon-pencil"></span> <span class="btn_admin">修改</span></button></td>
                  <td>
                    <button class="btn btn-danger btn-sm" data-toggle="confirmation_about" data-title="確定要刪除嗎?" data-id="<?php echo $about['aboutTitle']?>" data-singleton="true">
                    <span class="glyphicon glyphicon-remove"></span> <span class="btn_admin">刪除</span>
                    </button>
                  </td>
                </tr>
<?php endforeach ?>
              </table>
              <button type="button" class="btn btn-primary" id="btn_creat_about" onclick="window.location.href='/admin/about/create'">新增</button>
            </div>
