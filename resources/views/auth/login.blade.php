@extends('layouts.auth')
@section('title')
@lang('admin.signin')
@endsection
@section('content')

  <!-- Row -->
  <div class="row signpages text-center">
    <div class="col-md-12">
      <div class="card">
        <div class="row row-sm">
          <div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-primary details">
            <div class="mt-5 pt-4 p-2 pos-absolute">
              <div class="clearfix"></div>
              <img src="{{asset('dashboard/assets/img/svgs/user.svg')}}" class="ht-100 mb-0" alt="user">
              <h5 class="mt-4 text-white">@lang('admin.titlelogin')</h5>
              <span class="tx-white-6 tx-13 mb-5 mt-xl-0">@lang('admin.desclogin')</span>
            </div>
          </div>
          <div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form ">
            <div class="container-fluid">
              <div class="row row-sm">
                <div class="card-body mt-2 mb-2">
                  <img src="assets/img/brand/logo.png" class=" d-lg-none header-brand-img text-left float-left mb-4" alt="logo">
                  <div class="clearfix"></div>
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h5 class="text-right mb-2">@lang('admin.loginhead')</h5>
                    <p class="mb-4 text-muted tx-13 ml-0 text-right">@lang('admin.loginhead')</p>
                    <div class="form-group text-right">
                      <label>@lang('admin.email')</label>
                      <input class="form-control" name="email" placeholder="@lang('admin.email')" type="text">
                    </div>
                    <div class="form-group text-right">
                      <label>@lang('admin.password')</label>
                      <input class="form-control" name="password" placeholder="@lang('admin.password')" type="password">
                    </div>
                    <button class="btn ripple btn-main-primary btn-block">@lang('admin.loginbutton')</button>
                  </form>
                  <div class="text-right mt-5 ml-0">
                    <div class="mb-1"><a href="#">@lang('admin.forgotyourpassword')</a></div>
                    <div>@lang('admin.wewantanaccount') <a href="{{route('register')}}">@lang('admin.registerhere')</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Row -->
@endsection
