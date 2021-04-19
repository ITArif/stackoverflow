<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
            </li>
            @if(auth('system_admin')->user()->role=='master-admin'
            || auth('system_admin')->user()->role=='editor')
                <li><a><i class="fa fa-edit"></i> System User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('new/system/user')}}">New</a></li>
                        <li><a href="{{url('system/user/list')}}">List</a></li>
                    </ul>
                </li>
            @endif
            @if(auth('system_admin')->user()->role=='sub-admin')
                <li><a href="{{url('assign/permission')}}"><i class="fa fa-edit"></i> Assign Permission</a></li>
            @endif
            <li><a href="{{ url('all/front/users') }}"><i class="fa fa-users"></i> Users</a></li>
            <li><a><i class="fa fa-question-circle"></i> Questions <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('all/approved/questions') }}">approved</a></li>
                    <li><a href="{{ url('pending/question') }}">Pending</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-mortar-board"></i> Answers <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('all/approved/answers') }}">approved</a></li>
                    <li><a href="{{ url('pending/answer') }}">Pending</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-home"></i> Jobs <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('all/approved/jobs') }}">approved</a></li>
                    <li><a href="{{ url('pending/job') }}">Pending</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>