<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('images/'.Auth::user()->photo)}}" alt="">{{Auth::user()->name}}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="{{url('user/profile')}}"><i class="fas fa-users pull-right"></i> {{__('auth.profile')}}</a></li>
                        <li><a href="#" onclick="document.getElementById('user-logout').submit()"><i class="fa fa-sign-out pull-right"></i>{{__('auth.logout')}}</a></li>
                        <form id="user-logout" action="{{ route('user.logout') }}" method="post" style="display: none">
                            @csrf
                        </form>
                    </ul>
                </li>
                <!-- help -->
                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-question-circle"></i>
                    </a>
                    <ul style="width:230px;" id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <a href="#">
                                <span>Back To IgnightTech</span>
                                <span class="message">Back to IgnightTech</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('user/help/center')}}">
                                <span>Help center</span>
                                <span class="message">Detailed answers to any questions you might have</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('user/about/us')}}">
                                <span>About Us</span>
                                <span class="message">Learn more about IgnightTech company </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Business</span>
                                <span class="message">Learn more about hiring developers or posting adds with us</span>
                            </a>
                        </li>
                        <li>
                            <div class="text-center">
                                <a href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <a>
                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                            </a>
                        </li>
                        <li>
                            <div class="text-center">
                                <a>
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Language  -->
                <li class="dropdown">
                    <a class="dropdown-toggle info-number" href="#" data-toggle="dropdown">
                        @if(Session::has('locale'))
                            <img src="http://localhost:8000/images/flags/{{Session('locale')}}.png" alt="img" style="max-width: 20px;">
                            {{Session('locale')}}
                        @else
                            {{Config::get('app.locale')}}
                        @endif
                    </a>
                    <div class="dropdown-tasks dropdown-menu dropdown-menu-right animated slideInUp">
                        <div class="t-item">
                            <span class="avatar box-32"></span>
                            <br>
                            <a style="text-align:center;paddding:20px;" class="text-black" href="{{url('language/en')}}">&nbsp;&nbsp;&nbsp;&nbsp;<img src="{{asset('images/eng.png')}}" alt="img"> &nbsp; English(UK)</a>
                        </div>
                        <hr>
                        <div class="t-item">
                            <span class="avatar box-32"></span>
                            <a style="text-align: center;paddding:20px;" class="text-black" href="{{url('language/bangla')}}">&nbsp;&nbsp;&nbsp;&nbsp;<img src="{{asset('images/perfect.png')}}" alt="img"> &nbsp; Bangladesh</a>
                        </div>
                        <hr>
                        <div class="t-item">
                            <span class="avatar box-32"></span>
                            <a style="text-align:center;paddding:20px;" class="text-black" href="#">&nbsp;&nbsp;&nbsp;&nbsp;<img src="{{asset('images/ger.png')}}" alt="img"> &nbsp; German</a>
                        </div>
                        <hr>
                        <div class="t-item">
                            <span class="avatar box-32"></span>
                            <a style="text-align:center;paddding:20px;" class="text-black" href="#">&nbsp;&nbsp;&nbsp;&nbsp;<img src="{{asset('images/neth.png')}}" alt="img"> &nbsp; Netherlands</a>
                        </div>
                        <hr>
                        <a class="t-item text-black text-xs-center" href="#">
                            <strong>View all languages</strong>
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>