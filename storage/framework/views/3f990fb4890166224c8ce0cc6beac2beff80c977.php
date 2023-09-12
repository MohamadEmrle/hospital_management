

<?php $__env->startSection('home','active'); ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('admin.dashborad'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"><?php echo app('translator')->get('admin.welcometodashboard'); ?></h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><?php echo app('translator')->get('admin.homepage'); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo app('translator')->get('admin.dashborad'); ?></li>
            </ol>
        </div>
        <div class="d-flex">
            <div class="justify-content-center">
                <button type="button" class="btn btn-white btn-icon-text my-2 ml-2">
                    ادخل<i class="fe fe-download mr-2"></i>
                </button>
                <button type="button" class="btn btn-white btn-icon-text my-2 ml-2">
                    فلتر<i class="fe fe-filter ml-2"></i>
                </button>
                <button type="button" class="btn btn-primary my-2 btn-icon-text">
                    قم بتنزيل التقرير<i class="fe fe-download-cloud mr-2"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <!--Row-->
    <div class="row row-sm">
        <div class="col-sm-12 col-lg-12 col-xl-8">

            <!--Row-->
            <div class="row row-sm  mt-lg-4">
                <div class="col-sm-12 col-lg-12 col-xl-12">
                    <div class="card bg-primary custom-card card-box">
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <div class="offset-xl-3 offset-sm-6 col-xl-8 col-sm-6 col-12 img-bg ">
                                    <h4 class="d-flex  mb-3">
                                        <span class="font-weight-bold text-white ">شريف الخولي</span>
                                    </h4>
                                    <p class="tx-white-7 mb-1">لديك مشروعان لإكمالهما ، <b class="text-warning">57٪</b> لقد أكملت مستواك الشهري ، تابع مستواك
                                    </p></div>
                                <img src="dashboard/assets/img/pngs/work3.png" alt="user-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Row -->

            <!--Row-->
            <div class="row row-sm">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="card-item">
                                <div class="card-item-icon card-icon">
                                    <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect height="14" opacity=".3" width="14" x="5" y="5"></rect><g><rect fill="none" height="24" width="24"></rect><g><path d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z M19,19H5V5h14V19z"></path><rect height="5" width="2" x="7" y="12"></rect><rect height="10" width="2" x="15" y="7"></rect><rect height="3" width="2" x="11" y="14"></rect><rect height="2" width="2" x="11" y="10"></rect></g></g></g></svg>
                                </div>
                                <div class="card-item-title mb-2">
                                    <label class="main-content-label tx-13 font-weight-bold mb-1">إجمالي الدخل </label>
                                    <span class="d-block tx-12 mb-0 text-muted">الشهر السابق مقابل هذه الأشهر</span>
                                </div>
                                <div class="card-item-body">
                                    <div class="card-item-stat">
                                        <h4 class="font-weight-bold">5900.00 جنيه</h4>
                                        <small><b class="text-success">55٪</b> أعلى</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="card-item">
                                <div class="card-item-icon card-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 4c-4.41 0-8 3.59-8 8 0 1.82.62 3.49 1.64 4.83 1.43-1.74 4.9-2.33 6.36-2.33s4.93.59 6.36 2.33C19.38 15.49 20 13.82 20 12c0-4.41-3.59-8-8-8zm0 9c-1.94 0-3.5-1.56-3.5-3.5S10.06 6 12 6s3.5 1.56 3.5 3.5S13.94 13 12 13z" opacity=".3"></path><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z"></path></svg>
                                </div>
                                <div class="card-item-title mb-2">
                                    <label class="main-content-label tx-13 font-weight-bold mb-1">الموظفين الجدد </label>
                                    <span class="d-block tx-12 mb-0 text-muted">انضم هذا الشهر</span>
                                </div>
                                <div class="card-item-body">
                                    <div class="card-item-stat">
                                        <h4 class="font-weight-bold">15</h4>
                                        <small><b class="text-success">5٪</b> زيادة</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="card-item">
                                <div class="card-item-icon card-icon">
                                    <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M12 4c-4.41 0-8 3.59-8 8s3.59 8 8 8 8-3.59 8-8-3.59-8-8-8zm1.23 13.33V19H10.9v-1.69c-1.5-.31-2.77-1.28-2.86-2.97h1.71c.09.92.72 1.64 2.32 1.64 1.71 0 2.1-.86 2.1-1.39 0-.73-.39-1.41-2.34-1.87-2.17-.53-3.66-1.42-3.66-3.21 0-1.51 1.22-2.48 2.72-2.81V5h2.34v1.71c1.63.39 2.44 1.63 2.49 2.97h-1.71c-.04-.97-.56-1.64-1.94-1.64-1.31 0-2.1.59-2.1 1.43 0 .73.57 1.22 2.34 1.67 1.77.46 3.66 1.22 3.66 3.42-.01 1.6-1.21 2.48-2.74 2.77z" opacity=".3"></path><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z"></path></svg>
                                </div>
                                <div class="card-item-title  mb-2">
                                    <label class="main-content-label tx-13 font-weight-bold mb-1">إجمالي التكاليف </label>
                                    <span class="d-block tx-12 mb-0 text-muted">الشهر السابق مقابل هذه الأشهر</span>
                                </div>
                                <div class="card-item-body">
                                    <div class="card-item-stat">
                                        <h4 class="font-weight-bold">8500 جنيه</h4>
                                        <small><b class="text-danger">12٪</b> ينقص</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End row-->

            <!--row-->
            <div class="row row-sm">
                <div class="col-sm-12 col-lg-12 col-xl-12">
                    <div class="card custom-card overflow-hidden">
                        <div class="card-header border-bottom-0">
                            <div>
                                <label class="main-content-label mb-2">الميزانية </label> <span class="d-block tx-12 mb-0 text-muted">المشروع هو أداة يستخدمها مديرو المشاريع لتقدير التكلفة الإجمالية للمشروع</span>
                            </div>
                        </div>
                        <div class="card-body pl-0">
                            <div class="">
                                <div class="container">
                                    <canvas id="chartLine" class="chart-dropshadow2 ht-250"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- col end -->
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card custom-card overflow-hidden">
                        <div class="card-header  border-bottom-0 pb-0">
                            <div>
                                <div class="d-flex">
                                    <label class="main-content-label my-auto pt-2">مهام اليوم</label>
                                    <div class="mr-auto mt-3 d-flex">
                                        <div class="ml-3 d-flex text-muted tx-13"><span class="legend bg-primary rounded-circle"></span>المشروع</div>
                                        <div class="d-flex text-muted tx-13"><span class="legend bg-light rounded-circle"></span>النامية</div>
                                    </div>
                                </div>
                                <span class="d-block tx-12 mt-2 mb-0 text-muted"> UX UI و تطوير Backend. </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 my-auto">
                                    <h6 class="mb-3 font-weight-normal">ميزانية المشروع</h6>
                                    <div class="text-right">
                                        <h3 class="font-weight-bold ml-3 mb-2 text-primary">5240 جنيه</h3>
                                        <p class="tx-13 my-auto text-muted">28 مايو - 01 فبراير (2018)</p>
                                    </div>
                                </div>
                                <div class="col-md-6 my-auto">
                                    <div class="forth circle">
                                        <div class="chart-circle-value circle-style"><div class="tx-16 font-weight-bold">75٪</div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- col end -->
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="card custom-card">
                        <div class="card-header  border-bottom-0 pb-0">
                            <div>
                                <div class="d-flex">
                                    <label class="main-content-label my-auto pt-2">أهم الأسئلة</label>
                                </div>
                                <span class="d-block tx-12 mt-2 mb-0 text-muted"> يتضمن عمل المشروع مجموعة من الطلاب يقومون بالبحث. </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mt-1">
                                <div class="col-5">
                                    <span class=""> العلامة التجارية</span>
                                </div>
                                <div class="col-4 my-auto">
                                    <div class="progress ht-6 my-auto">
                                        <div class="progress-bar ht-6 wd-80p" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="d-flex">
                                        <span class="tx-13"><i class="text-success fe fe-arrow-up"></i><b>24.75٪</b></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-5">
                                    <span class="">تصميم UI و UX</span>
                                </div>
                                <div class="col-4 my-auto">
                                    <div class="progress ht-6 my-auto">
                                        <div class="progress-bar ht-6 wd-70p" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="d-flex">
                                        <span class="tx-13"><i class="text-danger fe fe-arrow-down"></i><b>12.34٪</b></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-5">
                                    <span class="">تصميم المنتج</span>
                                </div>
                                <div class="col-4 my-auto">
                                    <div class="progress ht-6 my-auto">
                                        <div class="progress-bar ht-6 wd-40p" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="d-flex">
                                        <span class="tx-13"><i class="text-success  fe fe-arrow-up"></i><b>12.75٪</b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- col end -->
                <div class="col-lg-12">
                    <div class="card custom-card mg-b-20">
                        <div class="card-body">
                            <div class="card-header border-bottom-0 pt-0 pl-0 pr-0 d-flex">
                                <div>
                                    <label class="main-content-label mb-2">المهام </label> <span class="d-block tx-12 mb-3 text-muted">تكتمل المهمة في موعد نهائي محدد ويجب أن تساهم في أهداف المهمة.</span>
                                </div>
                                <div class="mr-auto">
                                    <a href="#" class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#"></a>
                                        <a class="dropdown-item" href="#">حالة </a><a class="dropdown-item" href="#">فريق </a>
                                        <a class="dropdown-item" href="#">مهمه</a><a class="dropdown-item" href="#"></a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="fa fa-cog ml-2"></i> إعدادات</a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive tasks">
                                <table class="table card-table table-vcenter text-nowrap mb-0  border">
                                    <thead>
                                    <tr>
                                        <th class="wd-lg-10p">مهمه</th>
                                        <th class="wd-lg-20p">فريق</th>
                                        <th class="wd-lg-20p text-center">مهمه مفتوحه</th>
                                        <th class="wd-lg-20p">تقدم</th>
                                        <th class="wd-lg-20p">الحالة</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="font-weight-semibold d-flex"><label class="ckbox my-auto ml-4 mt-1"><input checked="" type="checkbox"><span></span></label><span class="mt-1">تقييم الخطة</span></td>
                                        <td class="text-nowrap">
                                            <div class="demo-avatar-group my-auto float-right">
                                                <div class="main-img-user avatar-sm">
                                                    <img alt="صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/1.jpg">
                                                </div>
                                                <div class="main-img-user avatar-sm">
                                                    <img alt=" صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/2.jpg">
                                                </div>
                                                <div class="main-img-user avatar-sm">
                                                    <img alt=" صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/3.jpg">
                                                </div>
                                                <div class="main-img-user avatar-sm">
                                                    <img alt=" صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/4.jpg">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">37<i class=""></i></td>
                                        <td class="text-primary">قمة</td>
                                        <td><span class="badge badge-pill badge-primary-light">مكتمل</span></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-semibold d-flex"><label class="ckbox my-auto ml-4"><input checked="" type="checkbox"><span></span></label><span class="mt-1"> توليد أفكار التصميم</span></td>
                                        <td class="text-nowrap">
                                            <div class="demo-avatar-group my-auto float-right">
                                                <div class="main-img-user avatar-sm">
                                                    <img alt=" صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/5.jpg">
                                                </div>
                                                <div class="main-img-user avatar-sm">
                                                    <img alt=" صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/6.jpg">
                                                </div>
                                                <div class="main-img-user avatar-sm">
                                                    <img alt=" صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/7.jpg">
                                                </div>
                                                <div class="main-img-user avatar-sm">
                                                    <img alt=" صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/8.jpg">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">37<i class=""></i></td>
                                        <td class="text-secondary">عادي</td>
                                        <td><span class="badge badge-pill badge-warning-light">انتظار</span></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-semibold d-flex"><label class="ckbox my-auto ml-4"><input type="checkbox"><span></span></label><span class="mt-1">عادة المشكلة</span></td>
                                        <td class="text-nowrap">
                                            <div class="demo-avatar-group my-auto float-right">
                                                <div class="main-img-user avatar-sm">
                                                    <img alt=" صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/11.jpg">
                                                </div>
                                                <div class="main-img-user avatar-sm">
                                                    <img alt=" صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/12.jpg">
                                                </div>
                                                <div class="main-img-user avatar-sm">
                                                    <img alt="صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/9.jpg">
                                                </div>
                                                <div class="main-img-user avatar-sm">
                                                    <img alt="صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/10.jpg">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">37<i class=""></i></td>
                                        <td class="text-warning">قليل</td>
                                        <td><span class="badge badge-pill badge-primary-light">مكتمل</span></td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-semibold d-flex"><label class="ckbox my-auto ml-4"><input type="checkbox"><span></span></label><span class="mt-1">نتعاطف مع المستخدمين</span></td>
                                        <td class="text-nowrap">
                                            <div class="demo-avatar-group my-auto float-right">
                                                <div class="main-img-user avatar-sm">
                                                    <img alt="صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/7.jpg">
                                                </div>
                                                <div class="main-img-user avatar-sm">
                                                    <img alt="صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/9.jpg">
                                                </div>
                                                <div class="main-img-user avatar-sm">
                                                    <img alt="صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/11.jpg">
                                                </div>
                                                <div class="main-img-user avatar-sm">
                                                    <img alt="آواتار" class="rounded-circle" src="dashboard/assets/img/users/12.jpg">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">37<i class=""></i></td>
                                        <td class="text-primary">قمة</td>
                                        <td><span class="badge badge-pill badge-danger-light">تم رفض</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- col end -->
            </div><!-- Row end -->
        </div><!-- col end -->
        <div class="col-sm-12 col-lg-12 col-xl-4 mt-xl-4">
            <div class="card custom-card card-dashboard-calendar pb-0">
                <label class="main-content-label mb-2 pt-1">الترجمات الحديثة </label>
                <span class="d-block tx-12 mb-2 text-muted">مشاريع تحت التطوير</span>
                <table class="table table-hover m-b-0 transcations mt-2">
                    <tbody>
                    <tr>
                        <td class="wd-5p">
                            <div class="main-img-user avatar-md">
                                <img alt="صورة رمزية" class="rounded-circle ml-3" src="dashboard/assets/img/users/5.jpg">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-middle mr-3">
                                <div class="d-inline-block">
                                    <h6 class="mb-1">رمش</h6>
                                    <p class="mb-0 tx-13 text-muted">تحسين البرنامج</p>
                                </div>
                            </div>
                        </td>
                        <td class="text-left">
                            <div class="d-inline-block">
                                <h6 class="mb-2 tx-15 font-weight-semibold">45234 جنيه<i class="fas fa-level-up-alt mr-2 text-success m-r-10"></i></h6>
                                <p class="mb-0 tx-11 text-muted">12 مارس 2019 </p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="wd-5p">
                            <div class="main-img-user avatar-md">
                                <img alt="صورة رمزية" class="rounded-circle ml-3" src="dashboard/assets/img/users/6.jpg">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-middle mr-3">
                                <div class="d-inline-block">
                                    <h6 class="mb-1">تسمم</h6>
                                    <p class="mb-0 tx-13 text-muted">نقطة تحول</p>
                                </div>
                            </div>
                        </td>
                        <td class="text-left">
                            <div class="d-inline-block">
                                <h6 class="mb-2 tx-15 font-weight-semibold">23452 جنيه<i class="fas fa-level-down-alt mr-2 text-danger m-r-10"></i></h6>
                                <p class="mb-0 tx-11 text-muted">23 مارس 2019</p>
                            </div>
                        </td>
                    </tr>
                      <tr>
                        <td class="wd-5p">
                            <div class="main-img-user avatar-md">
                                <img alt="صورة رمزية" class="rounded-circle ml-3" src="dashboard/assets/img/users/5.jpg">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-middle mr-3">
                                <div class="d-inline-block">
                                    <h6 class="mb-1">رمش</h6>
                                    <p class="mb-0 tx-13 text-muted">تحسين البرنامج</p>
                                </div>
                            </div>
                        </td>
                        <td class="text-left">
                            <div class="d-inline-block">
                                <h6 class="mb-2 tx-15 font-weight-semibold">45234 جنيه<i class="fas fa-level-up-alt mr-2 text-success m-r-10"></i></h6>
                                <p class="mb-0 tx-11 text-muted">12 مارس 2019 </p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="wd-5p">
                            <div class="main-img-user avatar-md">
                                <img alt="صورة رمزية" class="rounded-circle ml-3" src="dashboard/assets/img/users/6.jpg">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-middle mr-3">
                                <div class="d-inline-block">
                                    <h6 class="mb-1">تسمم</h6>
                                    <p class="mb-0 tx-13 text-muted">نقطة تحول</p>
                                </div>
                            </div>
                        </td>
                        <td class="text-left">
                            <div class="d-inline-block">
                                <h6 class="mb-2 tx-15 font-weight-semibold">23452 جنيه<i class="fas fa-level-down-alt mr-2 text-danger m-r-10"></i></h6>
                                <p class="mb-0 tx-11 text-muted">23 مارس 2019</p>
                            </div>
                        </td>
                    </tr>
                            <tr>
                        <td class="wd-5p">
                            <div class="main-img-user avatar-md">
                                <img alt="صورة رمزية" class="rounded-circle ml-3" src="dashboard/assets/img/users/5.jpg">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-middle mr-3">
                                <div class="d-inline-block">
                                    <h6 class="mb-1">رمش</h6>
                                    <p class="mb-0 tx-13 text-muted">تحسين البرنامج</p>
                                </div>
                            </div>
                        </td>
                        <td class="text-left">
                            <div class="d-inline-block">
                                <h6 class="mb-2 tx-15 font-weight-semibold">45234 جنيه<i class="fas fa-level-up-alt mr-2 text-success m-r-10"></i></h6>
                                <p class="mb-0 tx-11 text-muted">12 مارس 2019 </p>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <div class="card custom-card">
                <div class="card-body">
                    <div class="row row-sm">
                        <div class="col-6">
                            <div class="card-item-title">
                                <label class="main-content-label tx-13 font-weight-bold mb-2">مشروع إطلاق </label>
                                <span class="d-block tx-12 mb-0 text-muted">يتم إطلاق المشروع</span>
                            </div>
                            <p class="mb-0 tx-24 mt-2"><b class="text-primary">145 يوم</b></p>
                            <a href="#" class="text-muted">12 الاثنين فبراير 2019 </a>
                        </div>
                        <div class="col-6">
                            <img src="dashboard/assets/img/pngs/work.png" alt="صورة" class="best-emp">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card custom-card">
                <div class="card-header border-bottom-0 pb-0 d-flex pl-3 ml-1">
                    <div>
                        <label class="main-content-label mb-2 pt-2">في المشاريع الكبيرة </label>
                        <span class="d-block tx-12 mb-2 text-muted">حيث تنتهي أعمال التطوير</span>
                    </div>
                </div>
                <div class="card-body pt-2 mt-0">
                    <div class="list-card">
                        <div class="d-flex">
                            <div class="demo-avatar-group my-auto float-right">
                                <div class="main-img-user avatar-xs">
                                    <img alt="صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/1.jpg">
                                </div>
                                <div class="main-img-user avatar-xs">
                                    <img alt="صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/2.jpg">
                                </div>
                                <div class="main-img-user avatar-xs">
                                    <img alt="صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/3.jpg">
                                </div>
                                <div class="main-img-user avatar-xs">
                                    <img alt="صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/4.jpg">
                                </div>
                                <div class="">فريق التصميم</div>
                            </div>
                            <div class="mr-auto float-right">
                                <div class="">
                                    <a href="#" class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-horizontal"></i></a>
                                    <div class="dropdown-menu dropdown-menu-left" style="">
                                        <a class="dropdown-item" href="#">اليوم </a>
                                        <a class="dropdown-item" href="#">اسبوع </a>
                                        <a class="dropdown-item" href="#">الشهر الماضي </a>
                                        <a class="dropdown-item" href="#">العام الماضي</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-item mt-4">
                            <div class="card-item-icon bg-transparent card-icon">
                                <span class="peity-donut" data-peity="{ &quot;fill&quot;: [&quot;#6259ca&quot;, &quot;rgba(204, 204, 204,0.3)&quot;], &quot;innerRadius&quot;: 15, &quot;radius&quot;: 20}">7/6</span>
                            </div>
                            <div class="card-item-body">
                                <div class="card-item-stat">
                                    <small class="tx-10 text-primary font-weight-semibold">25 مارس 2019</small>
                                    <h6 class=" mt-2">تصميم تطبيقات الهاتف المحمول</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-card mb-0">
                        <div class="d-flex">
                            <div class="demo-avatar-group my-auto float-right">
                                <div class="main-img-user avatar-xs">
                                    <img alt="صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/5.jpg">
                                </div>
                                <div class="main-img-user avatar-xs">
                                    <img alt="صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/6.jpg">
                                </div>
                                <div class="main-img-user avatar-xs">
                                    <img alt="صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/7.jpg">
                                </div>
                                <div class="main-img-user avatar-xs">
                                    <img alt="صورة رمزية" class="rounded-circle" src="dashboard/assets/img/users/8.jpg">
                                </div>
                                <div class="">فريق التصميم</div>
                            </div>
                            <div class="mr-auto float-right">
                                <div class="">
                                    <a href="#" class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-horizontal"></i></a>
                                    <div class="dropdown-menu dropdown-menu-left" style="">
                                        <a class="dropdown-item" href="#">اليوم </a>
                                        <a class="dropdown-item" href="#">اسبوع </a>
                                        <a class="dropdown-item" href="#">الشهر الماضي </a>
                                        <a class="dropdown-item" href="#">السنة الماضية</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-item mt-4">
                            <div class="card-item-icon bg-transparent card-icon">
                                <span class="peity-donut" data-peity="{ &quot;fill&quot;: [&quot;#6259ca&quot;, &quot;rgba(204, 204, 204,0.3)&quot;], &quot;innerRadius&quot;: 15, &quot;radius&quot;: 20}">5/7</span>
                            </div>
                            <div class="card-item-body">
                                <div class="card-item-stat">
                                    <small class="tx-10 text-primary font-weight-semibold">12 فبراير 2019</small>
                                    <h6 class=" mt-2">إعادة تصميم الموقع</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card custom-card">
                <div class="card-body">
                    <div class="d-flex">
                        <label class="main-content-label my-auto">تصميم المواقع</label>
                        <div class="mr-auto  d-flex">
                            <div class="ml-3 d-flex text-muted tx-13">جاري</div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div>
                            <span class="tx-15 text-muted">انتهى العمل: 7/10</span>
                        </div>
                        <div class="container mt-2 mb-2">
                            <canvas id="bar-chart" class="ht-180"></canvas>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mt-4">
                                <div class="d-flex mb-2">
                                    <h5 class="tx-15 my-auto text-muted font-weight-normal">عميل :</h5>
                                    <h5 class="tx-15 my-auto ml-3">جون ديف</h5>
                                </div>
                                <div class="d-flex mb-0">
                                    <h5 class="tx-13 my-auto text-muted font-weight-normal">الموعد النهائي :</h5>
                                    <h5 class="tx-13 my-auto text-muted ml-2">25 مارس 2019</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col col-auto">
                            <div class="mt-3">
                                <div class="">
                                    <img alt="" class="ht-50" src="dashboard/assets/img/media/project-logo.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- col end -->
    </div><!-- Row end -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\adminpanellaravel\resources\views/admin/index.blade.php ENDPATH**/ ?>