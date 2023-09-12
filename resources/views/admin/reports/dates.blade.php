@extends('layouts.panel')
@section('Users')
    active
@endsection
@section('User')
    active
@endsection
@section('title', 'تقرير المواعيد')
@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> تقرير المواعيد </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">تقرير المواعيد</li>
            </ol>
        </div>
    </div>

    <table id="table" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>التسلسل</th>
                <th>من الساعة</th>
                <th>إلى الساعة</th>
                <th>اليوم</th>
                <th>الطبيب</th>
            </tr>
        </thead>
        <tbody>
            @php
                $number = 0;
            @endphp
            @foreach ($dates as $date)
                @php
                    $number++;
                @endphp
                <tr>
                    <td>{{ $number }}</td>
                    <td>{{ $date->for_hour }}</td>
                    <td>{{ $date->to_hour }}</td>
                    <td>{{ $date->day }}</td>
                    @if (LaravelLocalization::getCurrentLocale() == 'en')
                        <td>{{ $date->doctors->name_en }}</td>
                    @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
                        <td>{{ $date->doctors->name_ar }}</td>
                    @endif
                </tr>
                @endforeach
        </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>


@endsection
