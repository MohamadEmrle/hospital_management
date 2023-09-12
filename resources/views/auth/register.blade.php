@extends('layouts.auth')
@section('title')
@lang('admin.signup')
@endsection
@section('content')


    <!-- Page -->
    <div class="page main-signin-wrapper">

        <!-- Row -->
        <div class="row signpages text-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="row row-sm">
                        <div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-primary details">
                            <div class="mt-5 pt-5 p-2 pos-absolute">
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
                                        <h5 class="text-right mb-2">@lang('admin.signup')</h5>
                                        <p class="mb-4 text-muted tx-13 ml-0 text-right">@lang('admin.Registration')</p>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="form-group text-right">
                                                <label>@lang('admin.fname')</label>
                                                <input name="name" class="form-control" placeholder="@lang('admin.Enteryourname')" type="text">
                                            </div>
                                            <div class="form-group text-right">
                                                <label>@lang('admin.email')</label>
                                                <input class="form-control" name="email" placeholder="@lang('admin.Enteryouremailaddress')" type="text">
                                            </div>
                                            <div class="form-group text-right">
                                                <label>@lang('admin.password')</label>
                                                <input class="form-control" name="password" placeholder="@lang('admin.Enteryouremailaddress')" type="password">
                                            </div>
                                            <div class="form-group text-right">
                                                <label>@lang('admin.password_confirmation')</label>
                                                <input class="form-control" name="password_confirmation" placeholder=" @lang('admin.Enteryouremailaddress')" type="password">
                                            </div>
                                            <button class="btn ripple btn-main-primary btn-block">@lang('admin.Create_an_account')</button>
                                        </form>
                                        <div class="text-right mt-5 ml-0">
                                            <p class="mb-0">@lang('admin.You_already_have_an_account') <a href="{{ route('login') }}">@lang('admin.signin')</a></p>
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

    </div>
    <!-- End Page -->
@endsection
