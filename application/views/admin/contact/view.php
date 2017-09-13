            <div id='admin_contact'>
              <h3>留言內容</h3>
                <table id="tb_admin_contact_content" class="table table-bordered">
                  <tr>
                    <th>訪客姓名</th>
                    <td><?php echo $contact_content['guestName']?></td>
                  </tr>
                  <tr>
                    <th>訪客信箱</th>
                    <td><?php echo $contact_content['guestEmail']?></td>
                  </tr>
                  <tr>
                    <th>留言主旨</th>
                    <td><?php echo $contact_content['guestTitle']?></td>
                  </tr>
                  <tr>
                    <th>留言內容</th>
                    <td><?php echo $contact_content['guestContent']?></td>
                  </tr>
                  <tr>
                    <th>留言時間</th>
                    <td><?php echo $contact_content['contactTime']?></td>
                  </tr>
                </table>

                <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/admin/contact'">返回</button>
                <button class="btn btn-danger btn-sm" data-toggle="confirmation_contact" data-title="確定要刪除嗎?" data-id="<?php echo $contact_content['guestID']?>" data-singleton="true">刪除</button>
              </div>

              
