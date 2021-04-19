@extends('admin.master')
@section('page_title')
    <div class="title_left">
        <h3>View Pending Answer</h3>
    </div>
@endsection
@section('stylesheet')

@endsection
@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">

                <div class="x_content">
                    <div class="row">
                        <!-- CONTENT MAIL -->
                        <div class="col-sm-9 mail_view">
                            <div class="inbox-body">
                                <div class="mail_heading row">
                                    <div class="col-md-8">
                                        <div class="btn-group">
                                            <button class="btn btn-md btn-info" type="button">Total Vote <span class="badge badge-danger">{{ isset($answer->votes)?count($answer->votes):0 }}</span></button>
                                            <button class="btn btn-md btn-danger" type="button" id="approve"><i class="fa fa-exclamation-circle"></i> Approve?</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <p class="date">Asked: {{ $answer->created_at }}</p>
                                    </div>
                                    <div class="col-md-12">
                                        <h4> {{ $answer->answer }}</h4>
                                    </div>
                                </div>
                                <div class="view-mail">
                                    <p>
                                    <!-- {{ $question->description }} -->
                                    </p>
                                </div>
                                <div class="attachment">
                                    <ul>
                                        @foreach($answer->questions as $quest)
                                            <button class="btn btn-info btn-xs"><i class="fa fa-tag"></i> {{ $quest->title }}</button>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /CONTENT MAIL -->
                        <div class="col-sm-3 mail_list_column">
                            <a href="#">
                                <div class="mail_list">
                                    <div class="left">
                                        <i class="fa fa-circle"></i>
                                    </div>
                                    <div class="right">
                                        <h3>View <small>16 times</small></h3>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="mail_list">
                                    <div class="left">
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="right">
                                        <h3>Status: <small>{{$answer->status==1?'Yes':'No'}}</small></h3>
                                    </div>
                                </div>
                            </a>
                            <div class="col-xs-12 profile_details">
                                <div class="well profile_view">
                                    <div class="col-sm-12">
                                        <h4 class="brief"><i>Asked By</i></h4>
                                        <div class="right col-xs-8 col-xs-offset-2 text-center">
                                            <img src="{{asset('images/user.png')}}" alt="" class="img-circle img-responsive">
                                        </div>
                                        <div class="left col-xs-12">
                                            <h5>{{$answer->user->name}}</h5>
                                            <p><strong>About: </strong> {{$answer->user->title}}</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 bottom text-center">
                                        <div class="col-xs-12 col-sm-6 emphasis">
                                            <button type="button" class="btn btn-primary btn-xs">
                                                <i class="fa fa-user"> </i> View Profile
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /MAIL LIST -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $("#approve").click(function () {
                var id = "{{ $answer->id }}";
                var url = "{{url('/approve/answer')}}";
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You Want To Approve the Answer",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Approve It'
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            url:url+"/"+id,
                            type:"GET",
                            dataType:'json',
                            beforeSend:function(){
                                Swal.fire({
                                    title: 'Approving.......',
                                    showConfirmButton: false,
                                    html: '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>',
                                    allowOutsideClick: false
                                });
                            },
                            success:function (response) {
                                Swal.close();
                                if (response==="success"){
                                    Swal.fire({
                                        title: 'Successfully Approved',
                                        type: 'success',
                                        showCancelButton: false,
                                        confirmButtonColor: '#3085d6',
                                        allowOutsideClick: false
                                    }).then(function (result) {
                                        if (result.value){
                                            window.location.href = "{{ url('pending/answer') }}";
                                        }
                                    });
                                }
                            },
                            error:function (error) {
                                Swal.close();
                                console.log(error.response);
                                Swal.fire(
                                    'Error!',
                                    'Something Went Wrong',
                                    'error'
                                )
                            }
                        });
                    }
                });
            })
        });
    </script>
@endsection
