@extends('layouts.adminLayout')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">overview</h2>
                        </div>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{$student_count}}</h2>
                                        <span>Total Students</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                    <div class="text">
                                        <h2>{{$contacts->count()}}</h2>
                                        <span>Queries Year</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart3"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                            <div class="au-card-title" style="background-image:url('{{asset('admin_assets/images/bg-title-01.jpg')}}');">
                                <div class="bg-overlay bg-overlay--blue"></div>
                                <h3>
                                    <i class="zmdi zmdi-account-calendar"></i>{{ Carbon\Carbon::now()->format('d M, Y')}}</h3>
                            </div>
                            <div class="au-task js-list-load">
                                <div class="au-task-list js-scrollbar3">
                                    @if($contacts->count() > 0)
                                    @foreach($contacts as $contact)
                                    <div class="au-task__item au-task__item--danger">
                                        <div class="au-task__item-inner">
                                            <div class="row">
                                                <div class="col-md-4">
                                                   <b>Name : </b>{{ucfirst($contact->name)}}
                                                </div>
                                                <div class="col-md-5">
                                                   <b>Email :</b> {{$contact->email}}
                                                </div>
                                                <div class="col-md-3">
                                                    {{$contact->created_at->format('d-M-y')}}
                                                </div>
                                                <div class="col-md-12">
                                                  <b> Subject :</b> {{$contact->subject}}
                                                </div>
                                                <div class="col-md-12">
                                                  <b> Message :</b> {{$contact->message}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                        <div class="au-task__item au-task__item--danger">
                                            <div class="au-task__item-inner">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <b>No Query for now</b>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                    <div class="au-task__item au-task__item--warning js-load-item">
                                        <div class="au-task__item-inner">
                                            <h5 class="task">
                                                <a href="#">Create new task for Dashboard</a>
                                            </h5>
                                            <span class="time">11:00 AM</span>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="au-task__footer">--}}
{{--                                    <button class="au-btn au-btn-load js-load-btn">load more</button>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2021. All rights reserved by <a href="#">AGHS</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection

