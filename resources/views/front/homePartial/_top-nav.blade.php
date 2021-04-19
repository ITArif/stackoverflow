
<div class="nav_menu">
    <nav>
        <div class="nav toggle">
            <a style="flot:left;margin-left:50px;" id="menu_toggle"><i class="fa fa-bars"></i></a>
            <a href="#"><img style="flot:left;margin-left:110px;margin-top:-45px;" src="{{asset('images/ok.png')}}" alt="img"></a>

        </div>
        <div class="nav toggle">
            <a href="#"><button style="height:30px; flot:left;margin-left:190px;margin-top:2px; background-color: # background-color: #F1F1F1;" type="button" class="btn btn-round btn-default">Products</a></button>
            <a href="#"><button style="height:30px; flot:left;margin-left:320px;margin-top:-55px;" type="button" class="btn btn-round btn-default">Customers</a></button>
            <input style="flot:left;width:500px; margin-left:550px;margin-top:-55px;" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" placeholder="Search...">
            <!-- <svg  style="flot:right;margin-left:550px;margin-top:-70px;" aria-hidden="true" class="svg-icon s-input-icon s-input-icon__search iconSearch" width="18" height="18" viewBox="0 0 18 18"><path d="M18 16.5l-5.14-5.18h-.35a7 7 0 1 0-1.19 1.19v.35L16.5 18l1.5-1.5zM12 7A5 5 0 1 1 2 7a5 5 0 0 1 10 0z">
            </path></svg> -->
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">

        </div>

        <ul class="nav navbar-nav navbar-right">
            <a href="{{ url('user/login') }}" style="margin-top:20px;" type="button" class="btn btn-default">Login</a>
            <!-- help -->
            <a href="{{ url('user/registration') }}" style="margin-top:20px;" type="button" class="btn btn-success">Sign up</a>
            <li role="presentation" class="dropdown">

            </li>
            <!-- Language  -->
        </ul>
    </nav>
</div>
