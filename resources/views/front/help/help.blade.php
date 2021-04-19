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
                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Asking</h2>
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
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item One Title</a>
                                        <p>What types of questions should I avoid asking?</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Two Title</a>
                                        <p>What topics can I ask about here?</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Three Title</a>
                                        <p>What does it mean if a question is "closed" or "on hold"?</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Four Title</a>
                                        <p>Why are questions no longer being accepted from my account?</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Five Title</a>
                                        <p>How to create a Minimal, Reproducible Example?</p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2 style="text-align:center;">Our model</h2>
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
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item One Title</a>
                                        <p>Code of Conduct and assign to your specific tags</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Two Title</a>
                                        <p>Expected Behavior</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Three Title</a>
                                        <p>How do I find topics I'm interested in this specific sections?</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Four Title</a>
                                        <p>How do I format my posts using Markdown or HTML?</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Five Title</a>
                                        <p>What should a tag wiki excerpt contain?</p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Reputation & Moderation</h2>
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
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item One Title</a>
                                        <p>Who are the site moderators, and what is their role here?</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Two Title</a>
                                        <p>Why is voting important?</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Three Title</a>
                                        <p>What is reputation? How do I earn (and lose) it?</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Four Title</a>
                                        <p>Why do I have a reputation change on my reputation page that says?</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Five Title</a>
                                        <p>What are declined flags, and what should I do about them?</p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Answering</h2>
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
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item One Title</a>
                                        <p>How do I write a good answer to make these system?</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Two Title</a>
                                        <p>What does it mean when an answer is "accepted"?</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Three Title</a>
                                        <p>Why and how are some answers deleted?</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Four Title</a>
                                        <p>Why are answers no longer being accepted from my account?</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Five Title</a>
                                        <p>How to reference material written by others</p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Badges</h2>
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
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item One Title</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Two Title</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Two Title</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Two Title</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Three Title</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Stack Overflow Jobs</h2>
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
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item One Title</a>
                                        <p>What is Stack Overflow Jobs and make stack developer?</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Two Title</a>
                                        <p>Why should I use Stack Overflow Jobs?</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Three Title</a>
                                        <p>What is a fake job listing and to make a full stack developer?</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Four Title</a>
                                        <p>What is recruiter spam?</p>
                                    </div>
                                </article>
                                <article class="media event">
                                    <a class="pull-left date">
                                        <p class="month">Help</p>
                                        <i style="flot:left;margin-left:15px;" class="fa fa-question-circle"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">Item Five Title</a>
                                        <p>Reporting companies.</p>
                                    </div>
                                </article>
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
