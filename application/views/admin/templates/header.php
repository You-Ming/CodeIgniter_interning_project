<!DOCTYPE html>
<html lang="zh-Hant-TW">
    <head>
        <title><?php echo $title?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
        <!--link rel="stylesheet" href="/style.css"-->
        <!--link rel="stylesheet" href="/header.css"-->
        <link rel="shortcut icon" type="image/png" href="/images/Logo.png"/>
        <link rel="stylesheet" href="/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" href="/css/admin-logo-nav.css"/>
        <link rel="stylesheet" href="/css/admin-footer.css"/>
        <link rel="stylesheet" href="/css/admin-styles.css"/>
        <link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css"/>
        <link rel="stylesheet" href="/css/bootstrap-select.min.css"/>

        <script type="text/javascript"></script>
        <!-- jQuery -->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/jquery.crypt.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/metisMenu.min.js"></script>
        <script src="/js/admin.js"></script>
        <script src="/asset/ckeditor/ckeditor.js"></script>
        <script src="/asset/ckfinder/ckfinder.js"></script>
        <script src="/js/moment.js"></script>
        <script src="/js/bootstrap-datetimepicker.min.js"></script>
        <script src="/js/bootstrap-select.min.js"></script>
        <script src="/js/defaults-zh_TW.js"></script>
        <!--script src="/js/bootstrap-datetimepicker.zh-TW.js"></script-->

    </head>
    <body>
      <div class="wrap">
        <!-- header -->
        <div id="admin_wrap">
          <nav id="nav_header" class="navbar navbar-default" role="navigation">
            <div id="admin_header_wrap" class="container-fluid">
                <div id="admin_header" class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#admin_nav_list">
                      <span class="sr-only">Toggle admin navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/admin">
                        <img src="/images/Logo.png" alt="logo" width="40px" height="40px">
                    </a>
                </div>
                    <ul id="ul_header" class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle active" data-toggle="dropdown" data-target="#" href="#" id="dropdownMenu1" aria-haspopup="true" aria-expanded="false">
                              <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                              <?php echo $this->session->userdata('name')?><span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                              <li>
                                  <a href="/admin/log_out" id="signin_link"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> 登出</a>
                              </li>
                            </ul>
                        </li>
                    </ul>
            </div>
          </nav>
          <!-- end of header -->
