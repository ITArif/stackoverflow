@extends('front.master')
@section('page_title')
    <div class="title_left">
        <h3>Edit Job Offers</h3>
    </div>
@endsection
@section('stylesheet')
    <link href="{{ asset('js/admin/select2/dist/css/select2.css') }}" rel="stylesheet">
@endsection
@section('contain')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Jobs</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form id="job_form" action="" method="post" class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Company Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="company_name" name="company_name"
                                       value="{{$job->company_name}}"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Job Role <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="job_role" name="job_role"
                                       value="{{$job->job_role}}"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Technology/Tag <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="tag[]" id="tag" class="form-control col-md-7 col-xs-12" required multiple>
                                    <!-- Tag loop -->
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}" {{in_array($tag->id,$tag_array)?'selected':''}}>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Job Type <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="job_type" class="form-control col-md-7 col-xs-12">
                                    <!-- <option value="">-- Selecte Job Type --</option> -->
                                    <!-- category loop -->
                                    <option value="{{$job->id}}" {{$job->job_type==$job->id?'selected':''}}>{{$job->job_type}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Visa Sponsor <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="visa_sponsor" class="form-control col-md-7 col-xs-12">
                                    <!-- <option value="">-- Selecte Visa Sponsor --</option> -->
                                    <!-- category loop -->
                                    <option value="{{$job->id}}" {{$job->visa_sponsor==$job->id?'selected':''}}>{{$job->visa_sponsor}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Job Location <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="location" class="form-control col-md-7 col-xs-12">
                                    <!-- <option value="">-- Selecte Location --</option> -->
                                    <option value="{{$job->id}}" {{$job->location==$job->id?'selected':''}}>{{$job->location}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Remote Job <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="remote_job" class="form-control col-md-7 col-xs-12">
                                    <!-- <option value="">-- Selecte Remote Job --</option> -->
                                    <option value="{{$job->id}}" {{$job->remote_job==$job->id?'selected':''}}>{{$job->remote_job}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <textarea name="job_description" id="job_description">
                                   {!! $job->job_description !!}
                               </textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script src="{{ asset('js/admin/select2/dist/js/select2.js') }}"></script>
    <script>
        CKEDITOR.replace('job_description');
        $(function(){
            $("#tag").select2();
            //For update question
            $("#job_form").submit(function (event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to update the Job Fild Data!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, update it!'
                }).then(function(result){
                    if (result.value) {
                        var form=$("#job_form")[0];//mone ase oi var form=$("this")[0] deleow hoto;
                        var formData=new FormData(form);
                        var url="{{url('update/job')}}"+"/"+"{{$job->id}}";
                        $.ajax({
                            url:url,
                            type:"POST",
                            data:formData,
                            dataType:"json",
                            contentType:false,
                            processData:false,
                            beforeSend:function () {
                                Swal.fire({
                                    title: 'Updating the data.....',
                                    html:"<i class='fa fa-spinner fa-spin' style='font-size: 24px;'></i>",
                                    confirmButtonColor: '#3085d6',
                                    allowOutSideClick:false,
                                    showCancelButton:false,
                                    showConfirmButton:false
                                });
                            },
                            success:function (response) {
                                Swal.close();
                                if(response==="success") {
                                    Swal.fire({
                                        title:'success',
                                        text: 'You Have Successfully Job Data Updated',
                                        type:'success',
                                        confirmButtonText: 'OK'
                                    }).then(function(result){
                                        if (result.value) {
                                            window.location.reload();
                                        }
                                    });
                                }
                                console.log(response)
                            },
                            error:function (error) {
                                Swal.fire({
                                    title: 'Error',
                                    text:'Something Went Wrong',
                                    type:'error',
                                    showConfirmButton: true
                                });
                                console.log(error);
                            }
                        });
                    }
                });
            })
        });
    </script>
@endsection