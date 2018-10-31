
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/Background/plugins/colorpicker/colorpicker.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/Background/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Background/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Background/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/Background/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Background/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Background/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/Background/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/Background/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Background/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/Background/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Background/css/themer.css" media="screen">

<title>MWS Admin - Icons</title>

</head>

<body>
  <!-- Header -->
  <div id="mws-header" class="clearfix">
    
      <!-- Logo Container -->
      <div id="mws-logo-container">
        
          <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
          <div id="mws-logo-wrap">
              <img src="/Background/images/mws-logo.png" alt="mws admin">
      </div>
        </div>
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
          <!-- Notifications -->
          <div id="mws-user-notif" class="mws-dropdown-menu">
            </div>
            <!-- Messages -->
            <div id="mws-user-message" class="mws-dropdown-menu">
            </div>
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
              <!-- User Photo -->
              <div id="mws-user-photo">
                  <img src="/Background/example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                       hello admin
                    </div>
                    <ul>
                      <li><a href="#">轮廓</a></li>
                        <li><a href="#">更改密码</a></li>
                        <li><a href="index.html">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
      <!-- Necessary markup, do not remove -->
    <div id="mws-sidebar-stitch"></div>
    <div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
          <!-- Searchbox -->
          <div id="mws-searchbox" class="mws-inset">
              <form action="typography.html">
                  <input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- Main Navigation -->
            <!-- 导航栏 开始 -->
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-user"></i>用户管理</a>
                        <ul>
                            <li><a href="/admin/users">用户列表</a></li>
                            <li><a href="/admin/users/create">添加用户</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-align-left"></i>类别管理</a>
                        <ul>
                            <li><a href="/admin/cates/create">添加类别</a></li>
                            <li><a href="/admin/cates">浏览类别</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-tags"></i>标签管理</a>
                        <ul>
                            <li><a href="/admin/tags/create">添加标签</a></li>
                            <li><a href="/admin/tags">浏览标签</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-edit"></i>公告管理</a>
                        <ul>
                            <li><a href="/admin/notice/create">添加公告</a></li>
                            <li><a href="/admin/notice">浏览公告</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-link"></i>友情链接</a>
                        <ul>
                            <li><a href="/admin/link/create">添加链接</a></li>
                            <li><a href="/admin/link">浏览链接</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- 导航栏 结束 -->
        </div>
        
      <!-- 内容 开始 -->
        <div id="mws-container" class="clearfix">
          <!-- 读取提示信息 开始 -->
          @if (session('success'))
            <div class="mws-form-message success">
              {{ session('success') }}
            </div>
          @endif

          @if (session('error'))
            <div class="mws-form-message error">
              {{ session('error') }}
            </div>
          @endif
          <!-- 读取提示信息 结束 -->
          @section('content')

          @show
        </div>
      <!-- 内容 结束 -->>
                       
            <!-- Footer -->
            <div id="mws-footer">
              Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/Background/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/Background/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/Background/js/libs/jquery.placeholder.min.js"></script>
    <script src="/Background/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/Background/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/Background/jui/jquery-ui.custom.min.js"></script>
    <script src="/Background/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/Background/plugins/colorpicker/colorpicker-min.js"></script>

    <!-- Core Script -->
    <script src="/Background/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Background/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/Background/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script type="text/javascript">
        $(function() {
            $.fn.tabs && $('.mws-tabs').tabs();
        });
    </script>

</body>
</html>
