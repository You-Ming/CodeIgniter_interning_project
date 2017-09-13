
            <div id="about_wrap" class="container-fluid text_style">
              <div class="row">
                <div id="about_flip" class="visible-xs panel panel-default" aria-label="about flip">
                  <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                </div>
                  <div id="about_nav" class="col-md-2 col-sm-3 toggle_nav">
                    <div class="sidebar-nav">
                          <ul class="nav navbar-default">
<?php foreach ($about as $aboutItem): ?>
                              <li>
                                  <a href="/about/<?php echo $aboutItem['aboutTitle']?>"><?php echo $aboutItem['aboutTitle'] ?></a>
                              </li>
<?php endforeach ?>
                          </ul>
                    </div>
                  </div>

                  <div class="col-md-10 col-sm-9">
                    <ol class="breadcrumb nav_list" id="about_nav_list">
                      <li><a href="/"><span class="glyphicon glyphicon-home"></span> 首頁</a></li>
                      <?php echo $nav_about != NULL ? '<li><a href="/about">關於我們</a></li>
                      <li class="active">'.$nav_about.'</li>':'<li class="active">關於我們</li>'?>

                    </ol>
                  </div>

                  <div id="about_content_wrap" class="col-md-10 col-sm-9">
                      <div id="about_content">
<?php foreach ($content as $aboutContent): ?>
                      <h1><?php echo $aboutContent['aboutTitle'] ?></h1><br>
                      <p><?php echo $aboutContent['aboutContent'] ?></p>
<?php endforeach ?>
                      </div>
                  </div>
              </div>
            </div>
