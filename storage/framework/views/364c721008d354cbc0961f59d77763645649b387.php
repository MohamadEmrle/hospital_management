<!DOCTYPE html>
<html lang="en" dir="rtl" >

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="Spruha -  Admin Panel laravel Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin laravel template, template laravel admin, laravel css template, best admin template for laravel, laravel blade admin template, template admin laravel, laravel admin template bootstrap 4, laravel bootstrap 4 admin template, laravel admin bootstrap 4, admin template bootstrap 4 laravel, bootstrap 4 laravel admin template, bootstrap 4 admin template laravel, laravel bootstrap 4 template, bootstrap blade template, laravel bootstrap admin template">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('dashboard/assets/img/brand/favicon.ico')); ?>" type="image/x-icon"/>

    <!-- Title -->
    <title>
        <?php echo e(setting('name')); ?> <?php if(trim($__env->yieldContent('title'))): ?> |
        <?php echo $__env->yieldContent('title'); ?><?php endif; ?>
    </title>

    <!-- Bootstrap css-->
    <link href="<?php echo e(asset('dashboard/assets/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet"/>

    <!-- Icons css-->
    <link href="<?php echo e(asset('dashboard/assets/plugins/web-fonts/icons.css')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('dashboard/assets/plugins/web-fonts/font-awesome/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/assets/plugins/web-fonts/plugin.css')); ?>" rel="stylesheet"/>

    <!-- Style css-->
    <link href="<?php echo e(asset('dashboard/assets/css-rtl/style/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/assets/css-rtl/skins.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/assets/css-rtl/dark-style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/assets/css-rtl/colors/default.css" rel="stylesheet')); ?>">

    <!-- Color css-->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo e(asset('dashboard/assets/css-rtl/colors/color.css')); ?>">

    <!-- Select2 css -->
    <link href="<?php echo e(asset('dashboard/assets/plugins/select2/css/select2.min.css')); ?>" rel="stylesheet">

    <!-- Mutipleselect css-->
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/assets/plugins/multipleselect/multiple-select.css')); ?>">

    <!-- Sidemenu css-->
    <link href="<?php echo e(asset('dashboard/assets/css-rtl/sidemenu/sidemenu.css')); ?>" rel="stylesheet">

    <!-- Switcher css-->
    <link href="<?php echo e(asset('dashboard/assets/switcher/css/switcher-rtl.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('dashboard/assets/switcher/demo.css')); ?>" rel="stylesheet">


    <!-- CkEditor -->
    <script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>



    <!-- Include this in your blade layout -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php echo toastr_css(); ?>

</head>

<body class="main-body leftmenu">
<?php echo $__env->make('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Loader -->
<div id="global-loader">
    <img src="<?php echo e(asset('dashboard/assets/img/loader.svg')); ?>" class="loader-img" alt="<?php echo app('translator')->get('admin.loader'); ?>">
</div>
<!-- End Loader -->

<!-- Page -->
<div class="page">

    <!-- Sidemenu -->
    <div class="main-sidebar main-sidebar-sticky side-menu">
        <div class="sidemenu-logo">
            <a class="main-logo" href="#">
                <img src="<?php echo e(url('logo/long.png')); ?>" class="header-brand-img desktop-logo" alt="UltimateSoft" style="width: 134px;height: 37px">
                <img src="<?php echo e(url('logo/ico.png')); ?>" class="header-brand-img icon-logo" alt="UltimateSoft" style="width: 45px;height: 45px">
                <img src="<?php echo e(url('logo/ico.png')); ?>" class="header-brand-img desktop-logo theme-logo" alt="<?php echo app('translator')->get('admin.logo'); ?>">
                <img src="<?php echo e(url('logo/ico.png')); ?>" class="header-brand-iultimate type png blue.pngmg icon-logo theme-logo" alt="<?php echo app('translator')->get('admin.logo'); ?>">
            </a>
        </div>
        <div class="main-sidebar-body">
            <ul class="nav">

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('home')); ?>">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fa fa-home sidemenu-icon"></i>
                        <span class="sidemenu-label"><?php echo app('translator')->get('admin.homepage'); ?></span></a>
                </li>
              
              
             

                 
    <?php if((Auth::user()->isAdmin() && Auth::user()->can('Setting')) || Auth::user()->isSuperAdmin() ): ?>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#">
                            <span class="shape1"></span>
                            <span class="shape2"></span>
                            <i class="fas fa-stethoscope sidemenu-icon"></i>
                            <span class="sidemenu-label">الاستقبال </span><i class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?php echo e(route('users.index')); ?>">العملاء</a>
                                </li>
                               
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?php echo e(url('admin/detections/open')); ?>">زيارات مفتوحة</a>
                                </li>
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?php echo e(url('admin/detections/pending')); ?>">زيارات قيد التنفيذ</a>
                                </li>
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?php echo e(url('admin/detections/inprogress')); ?>">زيارات تحت التنفيذ</a>
                                </li>
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?php echo e(url('admin/detections/complete')); ?>">زيارات منتهية</a>
                                </li>
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?php echo e(url('admin/detections/cancelled')); ?>">زيارات ملغاة</a>
                                </li>
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?php echo e(route('files.index')); ?>">الملفات</a>
                                </li>
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?php echo e(route('bills.index')); ?>">الفواتير</a>
                                </li>
                            
                        </ul>
                    </li>
                <?php endif; ?>

  

  


  




 
    <?php if((Auth::user()->isAdmin() && Auth::user()->can('Setting')) || Auth::user()->isSuperAdmin() ): ?>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#">
                            <span class="shape1"></span>
                            <span class="shape2"></span>
                            <i class="fas fa-user-md sidemenu-icon"></i>
                            <span class="sidemenu-label">الاطباء</span><i class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?php echo e(route('doctors.index')); ?>">قائمة الاطباء</a>
                                </li>
                                
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?php echo e(route('prices.index')); ?>">اضافة الأسعار</a>
                                </li>
                        </ul>
                    </li>
                <?php endif; ?>

  


 
    <?php if((Auth::user()->isAdmin() && Auth::user()->can('Setting')) || Auth::user()->isSuperAdmin() ): ?>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#">
                            <span class="shape1"></span>
                            <span class="shape2"></span>
                            <i class="fas fa-hospital-o sidemenu-icon"></i>
                            <span class="sidemenu-label">التخصصات</span><i class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?php echo e(route('specialtys.index')); ?>">قائمة التخصصات</a>
                                </li>
                               
                        </ul>
                    </li>
                <?php endif; ?>

  


 
    <?php if((Auth::user()->isAdmin() && Auth::user()->can('Setting')) || Auth::user()->isSuperAdmin() ): ?>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#">
                            <span class="shape1"></span>
                            <span class="shape2"></span>
                            <i class="fas fa-money sidemenu-icon"></i>
                            <span class="sidemenu-label">الحسابات</span><i class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?php echo e(route('expenses.index')); ?>">المصروفات</a>
                                </li>
                           
                        </ul>
                    </li>
                <?php endif; ?>

  

 
    <?php if((Auth::user()->isAdmin() && Auth::user()->can('Setting')) || Auth::user()->isSuperAdmin() ): ?>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#">
                            <span class="shape1"></span>
                            <span class="shape2"></span>
                            <i class="fas fa-gift sidemenu-icon"></i>
                            <span class="sidemenu-label">العروض</span><i class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?php echo e(route('offers.index')); ?>"> قائمة العروض</a>
                                </li>
                          
                        </ul>
                    </li>
                <?php endif; ?>

  

 
 
    <?php if((Auth::user()->isAdmin() && Auth::user()->can('Setting')) || Auth::user()->isSuperAdmin() ): ?>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#">
                            <span class="shape1"></span>
                            <span class="shape2"></span>
                            <i class="fas fa-briefcase sidemenu-icon"></i>
                            <span class="sidemenu-label">التقارير</span><i class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?php echo e(route('treasury')); ?>">كشف حركة الخزينة</a>
                                </li>
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?php echo e(route('dates')); ?>">تقرير مواعيد الحجز</a>
                                </li>
                                
                        </ul>
                    </li>
                <?php endif; ?>

  
  <?php if((Auth::user()->isAdmin() && Auth::user()->can('Admin')) || Auth::user()->isSuperAdmin() ): ?>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#">
                            <span class="shape1"></span>
                            <span class="shape2"></span>
                            <i class="fas fa-user-shield sidemenu-icon"></i>
                            <span class="sidemenu-label"><?php echo app('translator')->get('admin.admins'); ?></span><i class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="<?php echo e(route('admins.index')); ?>"><?php echo app('translator')->get('admin.Adminlist'); ?></a>
                            </li>
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="<?php echo e(route('roles.index')); ?>"><?php echo app('translator')->get('admin.permissions'); ?></a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                   <?php if((Auth::user()->isAdmin() && Auth::user()->can('User')) || Auth::user()->isSuperAdmin() ): ?>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#">
                            <span class="shape1"></span>
                            <span class="shape2"></span>
                            <i class="fas fa-users sidemenu-icon"></i>
                            <span class="sidemenu-label"><?php echo app('translator')->get('admin.usermanagement'); ?></span><i class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                            <li class="nav-sub-item">
                                <a class="nav-sub-link" href="<?php echo e(route('users.index')); ?>"><?php echo app('translator')->get('admin.userlist'); ?></a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if((Auth::user()->isAdmin() && Auth::user()->can('Setting')) || Auth::user()->isSuperAdmin() ): ?>
                    <li class="nav-item">
                        <a class="nav-link with-sub" href="#">
                            <span class="shape1"></span>
                            <span class="shape2"></span>
                            <i class="fas fa-cogs sidemenu-icon"></i>
                            <span class="sidemenu-label">التعريفات والاعدادات</span><i class="angle fe fe-chevron-left"></i></a>
                        <ul class="nav-sub">
                            <?php $__currentLoopData = $setting_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?php echo e(route('settings.show',$group->name)); ?>"><?php echo e($group->name); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                <?php endif; ?>













                <li class="nav-item mt-3">
                    <a class="nav-link" href="#">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <button class=" btn btn-danger logout mt-3"
                                style="width: 100%">
                            <?php echo app('translator')->get('admin.exit'); ?>
                        </button>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Sidemenu -->		<!-- Main Header-->
    <div class="main-header side-header sticky">
        <div class="container-fluid">
            <div class="main-header-right">
                <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
            </div>
            <div class="main-header-center">
                <div class="responsive-logo">
                    <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(url('logo/long.png')); ?>" class="mobile-logo" alt="<?php echo app('translator')->get('admin.logo'); ?>" style="width: 134px; height: 37px"></a>
                    <a href="<?php echo e(route('home')); ?>"><img src="dashboard/assets/img/brand/logo-light.png" class="mobile-logo-dark" alt="<?php echo app('translator')->get('admin.logo'); ?>"></a>
                </div>
                <div class="input-group">
                    <div class="input-group-btn search-panel">
                       
                        <select class="form-control">
                            <option label="الروابط السريعه">
                            </option>
                            <option value="IT Projects">
                                المشاريع
                            </option>
                            <option value="Business Case">
                                قضية أعمال
                            </option>
                            <option value="Microsoft Project">
                                مشروع ميكروسفت
                            </option>
                            <option value="Risk Management">
                                إدارة المخاطر
                            </option>
                            <option value="Team Building">
                                فريق البناء
                            </option>
                            
                        </select>
                    </div>
                    <input type="search" class="form-control" placeholder="ابحث عن أي شيء ...">
                    <button class="btn search-btn"><i class="fe fe-search"></i></button>
                </div>
            </div>
            <div class="main-header-right">
                <div class="dropdown header-search">
                    <a class="nav-link icon header-search">
                        <i class="fe fe-search header-icons"></i>
                    </a>
                    <div class="dropdown-menu">
                        <div class="main-form-search p-2">
                            <div class="input-group">
                                <div class="input-group-btn search-panel">
                                    <select class="form-control select2-no-search">
                                        <option label="<?php echo app('translator')->get('admin.allcategory'); ?>">
                                        </option>
                                        <option value="IT Projects">
                                           مشاريع تكنولوجيا المعلومات
                                        </option>
                                        <option value="Business Case">
                                          قضية أعمال
                                        </option>
                                        <option value="Microsoft Project">
                                          مشروع ميكروسفت
                                        </option>
                                        <option value="Risk Management">
                                           إدارة المخاطر
                                        </option>
                                        <option value="Team Building">
                                           فريق البناء
                                        </option>
                                    </select>
                                </div>
                                <input type="search" class="form-control" placeholder="ابحث عن أي شيء ...">
                                <button class="btn search-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown d-md-flex">
                    <ul class="list-group">
                        <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="media">
                            <li>
                                <a class="btn btn-link btn btn-outline-secondary" data-toggle="tooltip" data-placement="top"  rel="alternate" hreflang="<?php echo e($localeCode); ?>" href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>">
                                    <?php echo e($properties['native']); ?>

                                </a>
                            </li>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="dropdown d-md-flex">
                    <a class="nav-link icon full-screen-link" href="#">
                        <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                        <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                    </a>
                </div>
                <div class="dropdown main-header-notification">
                    <a class="nav-link icon" href="#">
                        <i class="fe fe-bell header-icons"></i>
                        <span class="badge badge-danger nav-link-badge">4</span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="header-navheading">
                            <p class="main-notification-text">لديك إشعار واحد غير مقروء <span class="badge badge-pill badge-primary mr-3">مشاهدة الكل</span></p>
                        </div>
                        <div class="main-notification-list">
                            <div class="media new">
                                <div class="main-img-user online"><img alt="الصورة الرمزية" src="dashboard/assets/img/users/5.jpg"></div>
                                <div class="media-body">
                                    <p>به <strong>أوليفيا جيمس</strong> تهانينا على بدء نمط جديد</p><span>15 فبراير 12:32 م</span>
                                </div>
                            </div>
                        <div class="media new">
                                <div class="main-img-user online"><img alt="الصورة الرمزية" src="dashboard/assets/img/users/5.jpg"></div>
                                <div class="media-body">
                                    <p>به <strong>أوليفيا جيمس</strong> تهانينا على بدء نمط جديد</p><span>15 فبراير 12:32 م</span>
                                </div>
                            </div>
                               <div class="media new">
                                <div class="main-img-user online"><img alt="الصورة الرمزية" src="dashboard/assets/img/users/5.jpg"></div>
                                <div class="media-body">
                                    <p>به <strong>أوليفيا جيمس</strong> تهانينا على بدء نمط جديد</p><span>15 فبراير 12:32 م</span>
                                </div>
                            </div>

                        </div>
                        <div class="dropdown-footer">
                            <a href="#">عرض جميع الاشعارات</a>
                        </div>
                    </div>
                </div>
                <div class="main-header-notification">
                    <a class="nav-link icon" href="chat.html">
                        <i class="fe fe-message-square header-icons"></i>
                        <span class="badge badge-success nav-link-badge">6</span>
                    </a>
                </div>
                <div class="dropdown main-profile-menu">
                    <a class="d-flex" href="#">
                        <span class="main-img-user"><img alt="<?php echo e(auth()->user()->name); ?>" src="<?php echo e(url(auth()->user()->profile())); ?>"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="header-navheading">
                            <h6 class="main-notification-title"><?php echo e(auth()->user()->name); ?></h6>
                            <p class="main-notification-text">
                                <?php if(auth()->user()->isSuperAdmin()): ?>
                                   مدير موقع الويب
                                <?php elseif(auth()->user()->isAdmin()): ?>
                                    <?php echo e(auth()->user()->role()->first()->name ?? ' - '); ?>

                                <?php else: ?>
                                    عميل
                                <?php endif; ?>
                            </p>
                        </div>
                        <a class="dropdown-item border-top" href="profile.html">
                            <i class="fe fe-user"></i> ملفي
                        </a>
                        <a class="dropdown-item logout" href="#">
                            <i class="fe fe-power"></i> تسجيل خروج
                        </a>
                    </div>
                </div>

                <button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="تغيير التنقل">
                    <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
                </button><!-- Navresponsive closed -->
            </div>
        </div>
    </div>
    <!-- End Main Header-->		<!-- Mobile-header -->
    <div class="mobile-main-header">
        <div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <div class="d-flex order-lg-2 mr-auto">
                    <div class="dropdown header-search">
                        <a class="nav-link icon header-search">
                            <i class="fe fe-search header-icons"></i>
                        </a>
                        <div class="dropdown-menu">
                            <div class="main-form-search p-2">
                                <div class="input-group">
                                    <div class="input-group-btn search-panel">
                                        <select class="form-control select2-no-search">
                                            <option label="<?php echo app('translator')->get('admin.allcategory'); ?>">
                                            </option>
                                        <option value="IT Projects">
                                           مشاريع تكنولوجيا المعلومات
                                        </option>
                                        <option value="Business Case">
                                          قضية أعمال
                                        </option>
                                        <option value="Microsoft Project">
                                          مشروع ميكروسفت
                                        </option>
                                        <option value="Risk Management">
                                           إدارة المخاطر
                                        </option>
                                        <option value="Team Building">
                                           فريق البناء
                                        </option>
                                        </select>
                                    </div>
                                     <input type="search" class="form-control" placeholder="ابحث عن أي شيء ...">
                                    <button class="btn search-btn"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown ">
                        <a class="nav-link icon full-screen-link">
                            <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                            <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                        </a>
                    </div>
                    <div class="dropdown main-header-notification">
                        <a class="nav-link icon" href="#">
                            <i class="fe fe-bell header-icons"></i>
                            <span class="badge badge-danger nav-link-badge">4</span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="header-navheading">
                                <p class="main-notification-text">لديك إشعار واحد غير مقروء <span class="badge badge-pill badge-primary mr-3">مشاهدة الكل</span></p>
                            </div>
                            <div class="main-notification-list">
                                <div class="media new">
                                    <div class="main-img-user online"><img alt="الصورة الرمزية" src="dashboard/assets/img/users/5.jpg"></div>
                                    <div class="media-body">
                                        <p>به <strong>أوليفيا جيمس</strong> تهانينا على بدء نمط جديد</p><span>15 فبراير 12:32 م</span>
                                    </div>
                                </div>

                                 <div class="media new">
                                    <div class="main-img-user online"><img alt="الصورة الرمزية" src="dashboard/assets/img/users/5.jpg"></div>
                                    <div class="media-body">
                                        <p>به <strong>أوليفيا جيمس</strong> تهانينا على بدء نمط جديد</p><span>15 فبراير 12:32 م</span>
                                    </div>
                                </div>
                                <div class="media new">
                                    <div class="main-img-user online"><img alt="الصورة الرمزية" src="dashboard/assets/img/users/5.jpg"></div>
                                    <div class="media-body">
                                        <p>به <strong>أوليفيا جيمس</strong> تهانينا على بدء نمط جديد</p><span>15 فبراير 12:32 م</span>
                                    </div>
                                </div>

                            </div>
                            <div class="dropdown-footer">
                                <a href="#">عرض جميع الاشعارات</a>
                            </div>
                        </div>
                    </div>
                    <div class="main-header-notification mt-2">
                        <a class="nav-link icon" href="chat.html">
                            <i class="fe fe-message-square header-icons"></i>
                            <span class="badge badge-success nav-link-badge">6</span>
                        </a>
                    </div>
                    <div class="dropdown main-profile-menu">
                        <a class="d-flex" href="#">
                            <span class="main-img-user"><img alt="الصورة الرمزية" src="dashboard/assets/img/users/1.jpg"></span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="header-navheading">
                                <h6 class="main-notification-title"><?php echo e(auth()->user()->name); ?></h6>
                                <p class="main-notification-text">
                                    <?php if(auth()->user()->isSuperAdmin()): ?>
                                       مدير الموقع
                                    <?php elseif(auth()->user()->isAdmin()): ?>
                                        <?php echo e(auth()->user()->role()->first()->name ?? ' - '); ?>

                                    <?php else: ?>
                                        عميل
                                    <?php endif; ?>
                                </p>
                            </div>
                            <a class="dropdown-item border-top" href="profile.html">
                                <i class="fe fe-user"></i>ملفي
                            </a>
                            <a class="dropdown-item logout" href="#">
                                <i class="fe fe-power"></i> تسجيل الخروج
                            </a>
                        </div>
                    </div>
                    <div class="dropdown  header-settings">
                        <a href="#" class="nav-link icon" data-toggle="sidebar-left" data-target=".sidebar-left">
                            <i class="fe fe-align-left header-icons"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile-header closed -->
    <!-- Main Content-->
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">

                <?php echo $__env->yieldContent('content'); ?>

            </div>
        </div>
    </div>
    <!-- End Main Content-->

    <!-- Main Footer-->
    <div class="main-footer text-center">
        <div class="container">
            <div class="row row-sm">
                <div class="col-md-12">
                    <span>حقوق النشر © <?php echo e(date('Y')); ?>  . صمم بواسطة <a href="https://dylanu.com">Dylanu</a> كل الحقوق محفوظة.</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->

<!-- REQUIRED SCRIPTS -->
<?php echo jquery(); ?>
<?php echo toastr_js(); ?>
<?php echo app('toastr')->render(); ?>
<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

<!-- Jquery js-->
<script src="<?php echo e(asset('assets/plugins/jquery/jquery.min.js')); ?>"></script>

<!-- Bootstrap js-->
<script src="<?php echo e(asset('assets/plugins/bootstrap/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap-rtl.js')); ?>"></script>

<!-- Perfect-scrollbar js -->
<script src="<?php echo e(asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min-rtl.js')); ?>"></script>

<!-- Internal Jquery-Ui js-->
<script src="<?php echo e(asset('/plugins/jquery-ui/ui/widgets/datepicker.js')); ?>"></script>
<!-- Sidemenu js -->
<script src="<?php echo e(asset('assets/plugins/sidemenu/sidemenu-rtl.js')); ?>"></script>

<!-- Sidebar js -->
<script src="<?php echo e(asset('assets/plugins/sidebar/sidebar-rtl.js')); ?>"></script>

<!-- Select2 js-->
<script src="<?php echo e(asset('assets/plugins/select2/js/select2.min.js')); ?>"></script>

<!-- Internal Chart.Bundle js-->
<script src="<?php echo e(asset('assets/plugins/chart.js/Chart.bundle.min.js')); ?>"></script>

<!-- Peity js-->
<script src="<?php echo e(asset('assets/plugins/peity/jquery.peity.min.js')); ?>"></script>

<!-- Internal Morris js -->
<script src="<?php echo e(asset('assets/plugins/raphael/raphael.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/morris.js/morris.min.js')); ?>"></script>

<!-- Circle Progress js-->
<script src="<?php echo e(asset('assets/js/circle-progress.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart-circle.js')); ?>"></script>

<!-- Internal Dashboard js-->
<script src="<?php echo e(asset('assets/js/index.js')); ?>"></script>

<!-- Sticky js -->
<script src="<?php echo e(asset('assets/js/sticky.js')); ?>"></script>

<!-- Custom js -->
<script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>

<!-- Switcher js -->
<script src="<?php echo e(asset('assets/switcher/js/switcher-rtl.js')); ?>"></script>

<!-- jQuery -->
<script src="<?php echo e(URL::to('/').'/plugins/dataTables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo e(URL::to('/').'/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo e(URL::to('/').'/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo e(URL::to('/').'/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<script>
    $(function () {
        $("#table").DataTable({
            "responsive": true,
            "autoWidth": false,
            "rtl" : true,
            "language": {
                "paginate": {
                    "previous": "سابق",
                    "next" : "التالي"
                },
                "sLengthMenu": "عدد السجلات في الصفحة الواحدة _MENU_ ",
                "sSearch" : "ابحث:",
                "emptyTable":     "لا توجد بيانات لعرضها",
                "info":           "عرض _START_ الي _END_ من _TOTAL_ سجل",
                "infoEmpty":      "عرض 0 من 0 الي 0 سجل",

                "infoFiltered":   "(نتيجة البحث بين _MAX_ سجل)",
                "zeroRecords":    "لا توجد معلومات حول بحثك...",
            },



        });
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>
<!-- CK Editor for all textarea -->
<script>
    $("textarea").not(".no_ck_editor").each(function() {
        CKEDITOR.replace(this);
    });
</script>
<!-- Page script -->
<script>

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    $(document).ready(function() {
        $('.s2').select2();
    });
</script>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script>
        toastr.error('<?php echo e($error); ?>')
    </script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo $__env->yieldContent('js'); ?>

<script>
    $('.logout').on('click',function(){
        event.preventDefault();
        document.getElementById('logout-form').submit();
    })
</script>

</body>
</html><?php /**PATH D:\laragon\www\adminpanellaravel\resources\views/layouts/panel.blade.php ENDPATH**/ ?>