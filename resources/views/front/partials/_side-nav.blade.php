<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>{{__('auth.user_panel')}}</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{asset('images/'.Auth::user()->photo)}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>{{__('auth.welcome')}},</span>
                <h2>{{Auth::user()->name}}</h2>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>{{__('auth.general')}}</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{__('auth.dashboard')}}</a></li>
                    <li><a href="{{ url('top/question') }}"><i class="fa fa-question"></i>{{__('auth.top_question')}}</a></li>
                    <li><a><i class="fa fa-question-circle"></i> {{__('auth.question')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('new/question')}}">{{__('auth.new')}}</a></li>
                            <li><a href="{{url('question/list/datatable')}}">{{__('auth.list')}}</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-mortar-board"></i> {{__('auth.ans')}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('answered/list')}}">{{__('auth.answer')}}</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('search/question') }}"><i class="fa fa-search"></i> {{__('auth.search_question')}}</a></li>
                    <li><a href="{{url('top/job/offer')}}"><i class="fa fa-laptop"></i>{{__('auth.jobOffer')}}</a></li>
                    <li><a href="{{url('search/job')}}"><i class="fa fa-search"></i>{{__('auth.searchJob')}}</a></li>
                    <li><a><i class="fa fa-desktop"></i>{{__('auth.DevJob')}}<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ url('new/job') }}">New Job Entry</a></li>
                            <li><a href="{{ url('user/job/list/datatable')}}">Job List</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- sidebar menu -->
            <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Level One</a>
                            <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu"><a href="level2.html">Level Two</a>
                                    </li>
                                    <li><a href="#">Level Two</a>
                                    </li>
                                    <li><a href="#">Level Two</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Level One</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
            </div>

        </div>

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>