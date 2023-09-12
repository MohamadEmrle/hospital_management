@extends('layouts.panel')
@section('Users')
    active
@endsection
@section('User')
    active
@endsection
@section('title', 'حركة الخزينة')
@section('content')

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> حركة الخزينة </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">حركة الخزينة</li>
            </ol>
        </div>
    </div>




    <table id="table" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>التسلسل</th>
                <th>نسبة الدكتور</th>
                <th>نسبة المركز</th>
                <th>القيمة الإجمالية</th>
                <th>الطبيب</th>
            </tr>
        </thead>
        <tbody>
            @php
                $number = 0;
            @endphp
                @foreach ($prices as $price)
                        @php
                            $number++;
                        @endphp
                            <tr>
                                <td>{{$number}}</td>
                                <td>{{$price->Profits_Dr}} جنيه</td>
                                <td>{{$price->Profits_center}} جنيه</td>
                                <td>{{$price->total_value}} جنيه</td>
                        @if (LaravelLocalization::getCurrentLocale() == 'en')
                                <td>{{$price->doctors->name_en }}</td>
                        @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
                            <td>{{$price->doctors->name_ar }}</td>
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
