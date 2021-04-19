<!DOCTYPE html>
<html lang="en">
<head>
    @include('front.homePartial._head')
</head>
<body class="">
<div class="container body">
   <div class="main_container">
    <!-- Side Bar -->
{{--@include('front.homePartial._side-nave')--}}
<!-- /Side Bar -->


    <!-- top navigation -->
@include('front.homePartial._top-nav')
<!-- /top navigation -->

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row">
                            <img style="" src="{{asset('images/thik.png')}}" alt="img"></a>
                        </div>
                        <div class="text">
                            <h1 style="margin-top:-380px;text-align:center;color:#ffff;">We are professional developer who coded</h1>
                            <p style="text-align:center;color:#ffff;font-size:18px;  font-family: Times New Roman, Times, serif;">We build products that empower developers and connect them to solutions</p>
                            <div class="x_content">
                                <button style="text-align:center;" type="button" class="btn btn-primary">For Developers</button>
                                <button style="float:left;margin-left:500px; " type="button" class="btn btn-success">For Business</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>

                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel" style="height:600px;">
                            <div class="x_title">
                                <p style="text-align: center;">For developers, by developers</p>
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

                                    <div class="col-md-12">

                                        <!-- price element -->
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="pricing ui-ribbon-container">
                                                <div class="ui-ribbon-wrapper">
                                                    <div class="ui-ribbon">
                                                        Question
                                                    </div>
                                                </div>
                                                <div class="title">
                                                    <h2>Public Question</h2>
                                                    <i class="fa fa-question-circle"></i>
                                                </div>
                                                <div class="x_content">
                                                    <div class="">
                                                        <div class="pricing_features">
                                                            <ul class="list-unstyled text-left">
                                                                <img src="{{asset('images/Capture.png')}}" alt="">
                                                                <li><i class="fa fa-times text-danger"></i> <strong>Unlimited</strong> storage</li>
                                                                <li><i class="fa fa-check text-success"></i> Limited <strong> download quota</strong></li>
                                                                <li><i class="fa fa-check text-success"></i> <strong>Cash on Delivery</strong></li>
                                                                <li><i class="fa fa-check text-success"></i> All time <strong> updates</strong></li>
                                                                <li><i class="fa fa-times text-danger"></i> <strong>Unlimited</strong> access to all files</li>
                                                                <li><i class="fa fa-times text-danger"></i> <strong>Allowed</strong> to be exclusing per sale</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="pricing_footer">
                                                        <a href="javascript:void(0);" class="btn btn-success btn-block" role="button">Brows <span> Question!</span></a>
                                                        <p>
                                                            <a href="javascript:void(0);">Sign up</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- price element -->

                                        <!-- price element -->
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="pricing ui-ribbon-container">
                                                <div class="ui-ribbon-wrapper">
                                                    <div class="ui-ribbon">
                                                       Answer
                                                    </div>
                                                </div>
                                                <div class="title">
                                                    <h2>Public Answer</h2>
                                                    <i class="fa fa-book"></i>
                                                </div>
                                                <div class="x_content">
                                                    <div class="">
                                                        <div class="pricing_features">
                                                            <ul class="list-unstyled text-left">
                                                                <li><i class="fa fa-check text-success"></i> 2 years access <strong> to all storage locations</strong></li>
                                                                <li><i class="fa fa-check text-success"></i> <strong>Unlimited</strong> storage</li>
                                                                <li><i class="fa fa-check text-success"></i> Limited <strong> download quota</strong></li>
                                                                <li><i class="fa fa-check text-success"></i> <strong>Cash on Delivery</strong></li>
                                                                <li><i class="fa fa-check text-success"></i> All time <strong> updates</strong></li>
                                                                <li><i class="fa fa-times text-danger"></i> <strong>Unlimited</strong> access to all files</li>
                                                                <li><i class="fa fa-times text-danger"></i> <strong>Allowed</strong> to be exclusing per sale</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="pricing_footer">
                                                        <a href="javascript:void(0);" class="btn btn-primary btn-block" role="button">Post <span> Answer!</span></a>
                                                        <p>
                                                            <a href="javascript:void(0);">Sign up</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- price element -->

                                        <!-- price element -->
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="pricing ui-ribbon-container">
                                                <div class="ui-ribbon-wrapper">
                                                    <div class="ui-ribbon">
                                                        Job
                                                    </div>
                                                </div>
                                                <div class="title">
                                                    <h2>Developer Job Recruitment</h2>
                                                    <i class="fa fa-spinner"></i>
                                                </div>
                                                <div class="x_content">
                                                    <div class="">
                                                        <div class="pricing_features">
                                                            <ul class="list-unstyled text-left">
                                                                <li><i class="fa fa-check text-success"></i> 2 years access <strong> to all storage locations</strong></li>
                                                                <li><i class="fa fa-check text-success"></i> <strong>Unlimited</strong> storage</li>
                                                                <li><i class="fa fa-check text-success"></i> Limited <strong> download quota</strong></li>
                                                                <li><i class="fa fa-check text-success"></i> <strong>Cash on Delivery</strong></li>
                                                                <li><i class="fa fa-check text-success"></i> All time <strong> updates</strong></li>
                                                                <li><i class="fa fa-times text-danger"></i> <strong>Unlimited</strong> access to all files</li>
                                                                <li><i class="fa fa-times text-danger"></i> <strong>Allowed</strong> to be exclusing per sale</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="pricing_footer">
                                                        <a href="javascript:void(0);" class="btn btn-success btn-block" role="button">Job <span> Recruitment!</span></a>
                                                        <p>
                                                            <a href="javascript:void(0);">Sign up</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- price element -->

                                        <!-- price element -->
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="pricing ui-ribbon-container">
                                                <div class="ui-ribbon-wrapper">
                                                    <div class="ui-ribbon">
                                                        Job Apply
                                                    </div>
                                                </div>
                                                <div class="title">
                                                    <h2>Job Apply</h2>
                                                    <i class="fa fa-laptop"></i>
                                                </div>
                                                <div class="x_content">
                                                    <div class="">
                                                        <div class="pricing_features">
                                                            <ul class="list-unstyled text-left">
                                                                <li><i class="fa fa-check text-success"></i> 2 years access <strong> to all storage locations</strong></li>
                                                                <li><i class="fa fa-check text-success"></i> <strong>Unlimited</strong> storage</li>
                                                                <li><i class="fa fa-check text-success"></i> Limited <strong> download quota</strong></li>
                                                                <li><i class="fa fa-check text-success"></i> <strong>Cash on Delivery</strong></li>
                                                                <li><i class="fa fa-check text-success"></i> All time <strong> updates</strong></li>
                                                                <li><i class="fa fa-check text-success"></i> <strong>Unlimited</strong> access to all files</li>
                                                                <li><i class="fa fa-check text-success"></i> <strong>Allowed</strong> to be exclusing per sale</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="pricing_footer">
                                                        <a href="javascript:void(0);" class="btn btn-success btn-block" role="button">Apply <span> Job!</span></a>
                                                        <p>
                                                            <a href="javascript:void(0);">Sign up</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- price element -->
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

<!-- /page content -->

<!-- footer content -->
<footers>
    <div class="pull-center">
        <p style="text-align: center;">© 2018 Copyright: Sketchflow Developer </p>
        <br>
        <div class="container">

            <!-- Social buttons -->
            <ul class="list-unstyled list-inline text-center">
                <li class="list-inline-item">
                    <a class="btn-floating btn-fb mx-1">
                        <i class="fa fa-facebook-square"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-tw mx-1">
                        <i class="fa fa-google-plus-square"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-gplus mx-1">
                        <i class="fa fa-twitter-square"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-li mx-1">
                        <i class="fa fa-linkedin-square"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-dribbble mx-1">
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>
            </ul>
        </div>
            <!-- Social buttons -->
    </div>

</footers>
<!-- /footer content -->
</div>

</div>
@include('front.homePartial._script')
</body>
</html>
