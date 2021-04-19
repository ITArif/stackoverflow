<!DOCTYPE html>
<html lang="en">
<head>
    @include('front.partials._head')
</head>

<body class="login">
<div>

    <div class="login_wrapper">
        <div>
            <section class="login_content">
                @include('front.partials._message')
                <form action="{{route('password.request')}}" method="post">
                    @csrf
                    <h1>Reset password</h1>
                    <!--.Akhane token dete hobe hidden fild neye avabe---token ta catch krtei hobe..-->
                    <input type="hidden" name="token" value="{{$token}}">
                    <hr>
                    <div>
                        <input type="text" class="form-control" placeholder="Email" name="email" required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="New Password" name="password" required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required=""/>
                    </div>
                    <div>
                        <button class="btn btn-success submit" type="submit">Reset</button>
                    </div>

                    <div class="clearfix"></div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>