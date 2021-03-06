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
                @if(session('status'))
                    <div class="alert alert-success">
                        <label>{{session('status')}}</label>
                    </div>
                @endif
                <form action="{{route('send.reset.link')}}" method="post">
                    @csrf
                    <h1>Forgot password</h1>
                    <hr>
                    <div>
                        <input type="text" class="form-control" placeholder="Email" name="email" required="" value="{{old('email')}}" />
                    </div>
                    <div>
                        <button class="btn btn-success submit" type="submit">Send Reset Link</button>
                    </div>

                    <div class="clearfix"></div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>