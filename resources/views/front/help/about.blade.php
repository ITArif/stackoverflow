@extends('front.master')
@section('page_title')
    <div class="title_left">
        <h3>Help Center</h3>
    </div>
@endsection
@section('stylesheet')
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@8.10.0/dist/sweetalert2.css" rel="stylesheet">
@endsection
@section('contain')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2 style="text-align:center;color:green;">Find out <small>more about…</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <div class="alert alert-warning">
                        <h4><i class="fa fa-warning"></i> Warning!</h4> Apparently, Adblock Plus can remove Font Awesome brand icons with their "Remove Social Media Buttons" setting. We will not use hacks to force them to display. Please
                        <a href="https://adblockplus.org/en/bugs" class="alert-link">report an issue with Adblock Plus</a> if you believe this to be an error. To work around this, you'll need to modify the social icon class names.
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Weekly Summary <small>Activity shares</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                                    Stack Overflow is the largest, most trusted online community for anyone that codes to learn, share their knowledge, and build their careers. More than 50 million unique visitors come to Stack Overflow each month to help solve coding problems, develop new skills, and find job opportunities.

                                    Stack Overflow partners with businesses to help them understand, hire, engage, and enable the world's developers. Our products and services are focused on developer marketing, advertising, technical recruiting, and enterprise knowledge sharing.
                                </div>
                            </div>

                            <div class="">
                                <div class="page-title">
                                    <div class="title_left">
                                        <h3> IgnightTech Gallery <small> gallery design</small> </h3>
                                    </div>

                                    <div class="title_right">
                                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search for...">
                                                <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>IgnightTech Gallery <small> gallery design </small></h2>
                                                <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="#">Settings 1</a>
                                                            </li>
                                                            <li><a href="#">Settings 2</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                    </li>
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">

                                                <div class="row">

                                                    <p>Our gallery design emelents</p>

                                                    <div class="col-md-55">
                                                        <div class="thumbnail">
                                                            <div class="image view view-first">
                                                                <img style="width: 100%; display: block;" src="{{asset('images/hmm.jpg')}}" alt="image">
                                                                <div class="mask">
                                                                    <p>Your Text</p>
                                                                    <div class="tools tools-bottom">
                                                                        <a href="#"><i class="fa fa-link"></i></a>
                                                                        <a href="#"><i class="fa fa-pencil"></i></a>
                                                                        <a href="#"><i class="fa fa-times"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="caption">
                                                                <p>Snow and Ice Incoming for the South</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-55">
                                                        <div class="thumbnail">
                                                            <div class="image view view-first">
                                                                <img style="width: 100%; display: block;" src="{{asset('images/accha.png')}}" alt="image">
                                                                <div class="mask">
                                                                    <p>Your Text</p>
                                                                    <div class="tools tools-bottom">
                                                                        <a href="#"><i class="fa fa-link"></i></a>
                                                                        <a href="#"><i class="fa fa-pencil"></i></a>
                                                                        <a href="#"><i class="fa fa-times"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="caption">
                                                                <p>Snow and Ice Incoming for the South</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-55">
                                                        <div class="thumbnail">
                                                            <div class="image view view-first">
                                                                <img style="width: 100%; display: block;" src="{{asset('images/oicc.png')}}" alt="image">
                                                                <div class="mask">
                                                                    <p>Your Text</p>
                                                                    <div class="tools tools-bottom">
                                                                        <a href="#"><i class="fa fa-link"></i></a>
                                                                        <a href="#"><i class="fa fa-pencil"></i></a>
                                                                        <a href="#"><i class="fa fa-times"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="caption">
                                                                <p>Snow and Ice Incoming for the South</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-55">
                                                        <div class="thumbnail">
                                                            <div class="image view view-first">
                                                                <img style="width: 100%; display: block;" src="{{asset('images/hmm.jpg')}}" alt="image">
                                                                <div class="mask">
                                                                    <p>Your Text</p>
                                                                    <div class="tools tools-bottom">
                                                                        <a href="#"><i class="fa fa-link"></i></a>
                                                                        <a href="#"><i class="fa fa-pencil"></i></a>
                                                                        <a href="#"><i class="fa fa-times"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="caption">
                                                                <p>Snow and Ice Incoming for the South</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-55">
                                                        <div class="thumbnail">
                                                            <div class="image view view-first">
                                                                <img style="width: 100%; display: block;" src="{{asset('images/hmm.jpg')}}" alt="image">
                                                                <div class="mask">
                                                                    <p>Your Text</p>
                                                                    <div class="tools tools-bottom">
                                                                        <a href="#"><i class="fa fa-link"></i></a>
                                                                        <a href="#"><i class="fa fa-pencil"></i></a>
                                                                        <a href="#"><i class="fa fa-times"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="caption">
                                                                <p>Snow and Ice Incoming for the South</p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-55">
                                                        <div class="thumbnail">
                                                            <div class="image view view-first">
                                                                <img style="width: 100%; display: block;" src="{{asset('images/hmm.jpg')}}" alt="image">
                                                                <div class="mask no-caption">
                                                                    <div class="tools tools-bottom">
                                                                        <a href="#"><i class="fa fa-link"></i></a>
                                                                        <a href="#"><i class="fa fa-pencil"></i></a>
                                                                        <a href="#"><i class="fa fa-times"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="caption">
                                                                <p><strong>Image Name</strong>
                                                                </p>
                                                                <p>Snow and Ice Incoming</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-55">
                                                        <div class="thumbnail">
                                                            <div class="image view view-first">
                                                                <img style="width: 100%; display: block;" src="{{asset('images/hmm.jpg')}}" alt="image">
                                                                <div class="mask no-caption">
                                                                    <div class="tools tools-bottom">
                                                                        <a href="#"><i class="fa fa-link"></i></a>
                                                                        <a href="#"><i class="fa fa-pencil"></i></a>
                                                                        <a href="#"><i class="fa fa-times"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="caption">
                                                                <p><strong>Image Name</strong>
                                                                </p>
                                                                <p>Snow and Ice Incoming</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-55">
                                                        <div class="thumbnail">
                                                            <div class="image view view-first">
                                                                <img style="width: 100%; display: block;" src="{{asset('images/hmm.jpg')}}" alt="image">
                                                                <div class="mask no-caption">
                                                                    <div class="tools tools-bottom">
                                                                        <a href="#"><i class="fa fa-link"></i></a>
                                                                        <a href="#"><i class="fa fa-pencil"></i></a>
                                                                        <a href="#"><i class="fa fa-times"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="caption">
                                                                <p><strong>Image Name</strong>
                                                                </p>
                                                                <p>Snow and Ice Incoming</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-55">
                                                        <div class="thumbnail">
                                                            <div class="image view view-first">
                                                                <img style="width: 100%; display: block;" src="{{asset('images/hmm.jpg')}}" alt="image">
                                                                <div class="mask no-caption">
                                                                    <div class="tools tools-bottom">
                                                                        <a href="#"><i class="fa fa-link"></i></a>
                                                                        <a href="#"><i class="fa fa-pencil"></i></a>
                                                                        <a href="#"><i class="fa fa-times"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="caption">
                                                                <p><strong>Image Name</strong>
                                                                </p>
                                                                <p>Snow and Ice Incoming</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-55">
                                                        <div class="thumbnail">
                                                            <div class="image view view-first">
                                                                <img style="width: 100%; display: block;" src="{{asset('images/hmm.jpg')}}" alt="image">
                                                                <div class="mask no-caption">
                                                                    <div class="tools tools-bottom">
                                                                        <a href="#"><i class="fa fa-link"></i></a>
                                                                        <a href="#"><i class="fa fa-pencil"></i></a>
                                                                        <a href="#"><i class="fa fa-times"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="caption">
                                                                <p><strong>Image Name</strong>
                                                                </p>
                                                                <p>Snow and Ice Incoming</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.10.0/dist/sweetalert2.js"></script>
@endsection
