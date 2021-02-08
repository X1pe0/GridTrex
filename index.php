<?php
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
$recent_cookie = rand(1000,10000000);
setcookie($recent_cookie, htmlspecialchars($_POST['text_box']), time()+2147483647);
}
?>
<?php
$CVE = shell_exec('cat ./scan/*.html| grep -c "VULN"');
$HTTP = shell_exec('cat ./scan/*.html| grep -c "http-enum"');
$SSH = shell_exec('cat ./scan/*.html| grep -c "ssh"');
$i = 0; 
$dir = '/var/www/html/scan/raw';
if ($handle = opendir($dir)) {
    while (($file = readdir($handle)) !== false){
        if (!in_array($file, array('.', '..')) && !is_dir($dir.$file)) 
            $i++;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/99640.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    GridTrex
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
</head>
<style>
html {
    overflow: scroll;
    overflow-x: hidden;
}
::-webkit-scrollbar {
    width: 0px;  /* Remove scrollbar space */
    background: transparent;  /* Optional: just make scrollbar invisible */
}
/* Optional: show position indicator in red */
::-webkit-scrollbar-thumb {
    background: #FF0000;
}
</style>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="green" data-background-color="black" >
      <div class="logo"><a href="/" class="simple-text logo-normal">
          <img height="20" width="20" src="/99640.png"> GridTrex
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="./dashboard.html">
              <i class="material-icons">dashboard</i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/r.php">
              <i class="material-icons">plagiarism</i>
              <p>History</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/a.php">
              <i class="material-icons">art_track</i>
              <p>About</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/ig.php">
              <i class="material-icons">bubble_chart</i>
              <p>Report/Remove</p>
            </a>
          </li>

     
        
        
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            
            <form name="form" method="post">
              <div class="input-group no-border">
                <input type="text" value="" name="text_box" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
              </form>
          
            <ul class="navbar-nav">
              <li class="nav-item">
              
                
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">1</span>
                  <p class="d-lg-none d-md-block">
                    Note
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">This website is in beta. If you come across any issues, please email support@gridtrex.com</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">home</i>
                  </div>
                  <p class="card-category">Hosts Scanned</p>
                  <h3 class="card-title"><?php echo htmlspecialchars($i); ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons"></i>
                    <a>Total scanned from our servers...</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">dns</i>
                  </div>
                  <p class="card-category">SSH Servers</p>
                  <h3 class="card-title"><?php echo htmlspecialchars($SSH); ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons"></i> 
                    <a>Total SSH Servers...</a>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">public</i>
                  </div>
                  <p class="card-category">HTTP Servers</p>
                  <h3 class="card-title"><?php echo htmlspecialchars($HTTP); ?></h3></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  <i class="material-icons"></i> 
                    <a>Total HTTP Servers...</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">CVE's Found</p>
                  <h3 class="card-title"><?php echo htmlspecialchars($CVE); ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  <i class="material-icons"></i> 
                    <a>Total CVE's...</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
           
          
   
     
  
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
        
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <?php
  if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){

  }else{
    echo '<center>';
    echo '<img src="/world-map.gif">';
    echo '</center>';
  }
?>
</body>

<?php

$i = 0;
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{

    $filename = "scan/".$_POST['text_box'].'.html';
    if (file_exists($filename)){
        if (filter_var($_POST['text_box'], FILTER_VALIDATE_IP)) {
            header('Location: /scan/'.$_POST['text_box'].'.html');
        } 
    }

    $path = 'scan/';
    $findThisString = $_POST['text_box'];

    $dir = dir($path);

    // Get next file/dir name in directory
    while (false !== ($file = $dir->read()))
    {   
      if ($file != '.' && $file != '..')
    {
         // Is this entry a file or directory?
         if (is_file($path . '/' . $file))
            
            
         
           
         {
               // Its a file, yay! Lets get the file's contents
            

               if ($file == "IOT_Scanner.py" OR $file == "scan.log" OR $file == "rescan.php"){
                
            }else{

           
             $data = file_get_contents($path . '/' . $file);
             $main_data_search = file_get_contents($path . '/' . $file);


               // Is the str in the data (case-insensitive search)
             if (stripos($data, $findThisString) !== false)
                {
		
		
                // sw00t! we have a match
                ob_flush(); 
                flush(); 
                usleep(10000); 

            
                echo '<div style="width:1300px; margin:0 auto;"><b><a target="_blank" href="/scan/'. $file .'"><img height="50" width="50" src="https://nabyte.com/upload/62939bc11b05b78996cfd7c058b9d09d1797e3felogo-internet-chemiphase-updated-website-goes-live-chemiphase-ltd-12.png"><font style="color:#007446"><b>'. htmlspecialchars(basename($file, ".html")) .' </font></b></a></b><font style="color:black">';
        echo substr (htmlspecialchars($data), 5246, 44).'</font><form action="/scan/rescan.php" method="POST"><input type="hidden" id="rit" name="rit" value="' . htmlspecialchars(basename($file, ".html")) . '"><small><small><small><input class="rescan" type="submit" value="Queue For Rescan"></small></small></small></form><font style="color:#17202A">';
        $ssh = shell_exec('cat ./scan/'. $file . '| grep "ssh"');
        $http = shell_exec('cat ./scan/'. $file . '| grep "http"');
        $CVE = shell_exec('cat ./scan/'. $file . '| grep "VULN"');
        $CVE_Search = shell_exec('cat ./scan/'. $file . '| grep "CVE"');
        
        if ($ssh === NULL){
          echo substr ('<font size="1"><p><font style="color:#6A6A6A"></font>N/A</p></font>');
        }else{
          echo substr ('<font size="1"><p><font style="color:#6A6A6A"></font>' . strip_tags($ssh), 0, 100) . '</p></font>';
        }
        
        if ($http === NULL){
          echo substr ('<font size="1"><p><font style="color:#6A6A6A"></font>N/A</p></font>');
        }else{
          echo substr ('<font size="1"><p><font style="color:#6A6A6A"></font>' . strip_tags($http), 0, 100) . '</p></font>';
        }
        echo substr ('<font size="1"><p><font style="color:#6A6A6A"></font>' . strip_tags($CVE_Search), 0, 150) . '</p></font>';
        if ($CVE === NULL){
          echo substr ('<font size="1" style="color:red"><p><font style="color:#6A6A6A"></font>N/A</p></font></div>');
        }else{
          echo substr ('<font size="1" style="color:red"><p><font style="color:#6A6A6A"></font>' . strip_tags($CVE), 0, 100) . '</p></font></div>';
        }
       
		$i++;
                }
            }
        }
    }
}
}


$dir->close();
?>

</html>
