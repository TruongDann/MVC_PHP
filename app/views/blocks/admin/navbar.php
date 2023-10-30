<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?php echo (!empty($title)) ? $title:'Trang Chủ' ?></li>
          </ol>
          <h6 class="font-weight-bolder mb-0"><?php echo (!empty($title)) ? $title:'Trang Chủ' ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank" href="https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard">Online Builder</a>
            </li>
            <li class="nav-item d-flex align-items-center">
              <a href="<?= _WEB_ROOT . 'admin/logout'; ?>" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Đăng Xuất</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                @foreach($comments as $comment)
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="comments/detail?id={{$comment['id']}}">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="<?= _WEB_ROOT; ?>/public/assets/admin/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> {{$comment['name']}}
                        </h6>
                        <p class="text-xs text-secondary mb-0 ">
                          <i class="fa fa-clock me-1"></i>
                          <?php 
                          $commentTime = strtotime($comment['created_at']);
                          $currentTime = time(); 
                          
                          $timeDiff = $currentTime - $commentTime; 
                          
                          if ($timeDiff < 60) {
                              $timeAgo = $timeDiff . ' giây trước';
                          } elseif ($timeDiff < 3600) {
                              $timeAgo = floor($timeDiff / 60) . ' phút trước';
                          } elseif ($timeDiff < 86400) {
                              $timeAgo = floor($timeDiff / 3600) . ' giờ trước';
                          } else {
                              $timeAgo = floor($timeDiff / 86400) . ' ngày trước';
                          }
                          
                          echo $timeAgo;
                          ?>
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                @endforeach
              
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <? 
echo show_message('  <div class="alert alert-primary alert-dismissible fade show mx-4" role="alert">
<span class="alert-text"><strong>Primary!</strong>', '</span>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button> </div>');
?>
    <!-- End Navbar -->